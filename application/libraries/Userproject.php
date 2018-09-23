<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Userproject
{
    public function __construct()
    {
        $CI =& get_instance();

        // load database project & user module
        $CI->load->model('project_model');
        $CI->load->model('user_model');
        $this->ci = $CI;
    }

    // get project
    function getProject($params = array())
    {
        // $project = $this->project_model->getProjects( $user_id );

        if(array_key_exists("user_id", $params))
        {   
            if($params['role_name'] == 'Program Manager' || $params['role_name'] == 'Project Manager')
            {
                // get all projects by user ID if user is manager
                $owned_projects = $this->ci->project_model->getOwnedProjects($params['user_id']);
                $assigned_projects = $this->ci->project_model->getProjects($params['user_id']);
                $projects = array();

                // check first if user owns a project and then add them to an associative array key
                if($owned_projects && !$assigned_projects)
                {
                    $projects[] = $owned_projects;
                }
                else if($owned_projects && $assigned_projects)
                {
                    $projects[] = $owned_projects;
                    array_push($projects, $assigned_projects);
                }
                else if($assigned_projects && !$owned_projects)
                {       
                    $projects[] = $assigned_projects;
                }
                else
                {
                    $projects[] = false;
                }
            } 
            else
            {
                // get all projects by user ID if user is general user
                $projects[] = $this->ci->project_model->getAssignedProject($params['user_id']);
            } 
        }
        else
        {
            // get all projects if user is super admin
            $projects[] = $this->ci->project_model->getAllProjects();
        }
        
        if($projects)
        {
            $options = array();
            foreach ($projects as $project) 
            {
                foreach ($project as $row) 
                {
                    $project_id = $row->project_id;
                    $project_name = $row->project_name;
                    $options[$project_id] = $project_name;  
                }
            }
            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }

    function getGeneralUsers( $user_id )
    {
        // get users that assigned to a manager
        $user = $this->ci->user_model->getUsers( $user_id );
        
        if($user)
        {
            $options = array();

            foreach ($user as $row) 
            {
                $user_id = $row->user_id;
                $user_fname = $row->first_name;
                $user_lname = $row->last_name;
                $user_name = $user_fname." ".$user_lname;
                $options[$user_id] = $user_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }
}