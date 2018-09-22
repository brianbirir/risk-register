<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Settings extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('data_model');
        $this->load->model('project_model');
    }


    function risk_data()
    {
        $data = array('title' => 'Risk Data');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add('Settings','/dashboard/settings');
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get project data
            // $data['select_project'] = $this->getProject( $data['user_id'] );

            // get project data based on role type
            if($data['role_name'] == "Super Administrator") // super admin should see all projects
            {
                $data['select_project'] = $this->getProject(array());
            }
            else
            {
                $data['select_project'] = $this->getProject(array("user_id"=>$data['user_id'], "role_name"=>$data['role_name']));
            }

            // load page to show all status
            $this->template->load('dashboard', 'settings/data/project_select', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function set_project()
    {
        $data = array('title' => 'Project Settings');
        
        // breadcrumb
        $this->breadcrumb->add('Settings','/dashboard/settings');
        $this->breadcrumb->add('Risk Data','/settings/data');
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();
        
        // get global data
        $data = array_merge($data,$this->get_global_data());
        
        // get project ID from drop down form input
        $data['risk_project'] = $this->input->post('risk_project');

        // get project data by project ID
        $single_project = $this->project_model->getSingleProject($data['risk_project']);

        // add project id and project name to session data
        $session_data = $this->session->userdata('logged_in');
        $session_data['user_project_id'] = $data['risk_project']; // project ID
        $session_data['project_name'] = $single_project->project_name;// project name
        $session_data['register_name'] = null; // set register name to null when selecting project
        $this->session->set_userdata('logged_in', $session_data); // set newly added session data

        // load view to dashboard template
        $this->template->load('dashboard', 'settings/data/index', $data);
    }


    // get project
    function getProject($params = array())
    {
        // $project = $this->project_model->getProjects( $user_id );

        if(array_key_exists("user_id",$params))
        {   
            if($params['role_name'] == 'Program Manager' || $params['role_name'] == 'Project Manager')
            {
                // get all projects by user ID if user is manager
                $owned_projects = $this->project_model->getOwnedProjects($params['user_id']);
                $assigned_projects = $this->project_model->getProjects($params['user_id']);

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
                $projects[] = $this->project_model->getAssignedProject($params['user_id']);
            } 
        }
        else
        {
            // get all projects if user is super admin
            $projects[] = $this->project_model->getAllProjects();
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
}