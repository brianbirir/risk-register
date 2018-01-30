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
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get project data
            $data['select_project'] = $this->getProject( $data['user_id'] );

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
        $data = array('title' => 'Risk Data');
        
        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();
        
        // get global data
        $data = array_merge($data,$this->get_global_data());
        
        $data['risk_project'] = $this->input->post('risk_project');

        $this->template->load('dashboard', 'settings/data/index', $data);
    }


    // get project
    function getProject( $user_id )
    {
        $project = $this->project_model->getProjects( $user_id );
        
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
}