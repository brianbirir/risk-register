<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Userproject
{
    public function __construct()
    {
        $CI =& get_instance();

        // load database project module
        $CI->load->model('project_model');
        $CI->load->model('user_model');
        $this->ci = $CI;
    }

    // get project data
    function getProject( $user_id )
    {
        // get project that belong to user (manager)
        $project = $this->ci->project_model->getProjects( $user_id );
        
        if($project)
        {
            $options = array();

            foreach ($project as $row) 
            {
                $project_id = $row->project_id;
                $project_name = $row->project_name;
                $options[$project_id] = $project_name;  
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
        // get project that belong to user (manager)
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