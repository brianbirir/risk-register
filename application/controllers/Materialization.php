<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Materialization extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('materialization_model');
        $this->load->library('userproject');
    }


    function index()
    {
        $data = array('title' => 'Risk Data');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to show all materialization
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_materialization()
    {
        $data = array('title' => 'Materialization');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['project_id'] = $this->uri->segment(4); // get id from fourth segment of uri

            // get materialization
            $materialization = $this->materialization_model->getMaterialization($data['project_id']);

            //check if result is true
            ($materialization) ? $data['materialization_data'] = $materialization : $data['materialization_data'] = false;

            // load page to show all materialization
            $this->template->load('dashboard', 'settings/data/materialization/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_materialization_view()
    {
        $data = array('title' => 'Add Materialization');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to show all materialization
            $this->template->load('dashboard', 'settings/data/materialization/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_materialization()
    {
        //set validation rules
        $this->form_validation->set_rules('materialization_name', 'Materialization Name', 'trim|required');

        $data = array('title' => 'Add Materialization');

        // get global data
        $data = array_merge($data, $this->get_global_data());
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // get role names from database & add them to select form element in sign up form
            $roles = $this->user_model->getRoles();

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // load page to show all materialization
            $this->template->load('dashboard', 'settings/data/materialization/add', $data);
        }
        else
        {
            $project_id = $this->input->post('project_name');
            $data = array(
                'materialization_name' => $this->input->post('materialization_name'),
                'Project_project_id' => $this->input->post('project_name')
            );

            // insert form data into database
            if ($this->materialization_model->insertMaterialization($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a materialization item!');
                redirect('settings/data/materialization/'.$project_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }   
        }
    }


    function edit_materialization_view()
    {
        $data = array('title' => 'Edit Materialization');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['materialization'] = $this->materialization_model->getSingleMaterialization($id);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get userproject data
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to edit materialization
            $this->template->load('dashboard', 'settings/data/materialization/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_materialization()
    {
        //set validation rules
        $this->form_validation->set_rules('materialization_name', 'Materialization Name', 'trim|required');
        
        $data = array('title' => 'Edit Materialization');

        // get global data
        $data = array_merge($data, $this->get_global_data());
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // get data based on id from uri
            $data['materialization'] = $this->materialization_model->getSingleMaterialization($id);

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // load page to show all materialization
            $this->template->load('dashboard', 'settings/data/materialization/edit', $data);
        }
        else
        {
            // get materialization id from hidden field
            $materialization_id =  $this->input->post('materialization_id');
            
            $data = array(
                'materialization_name' => $this->input->post('materialization_name'),
            );

            // update table
            if ($this->materialization_model->updateMaterialization($data,$materialization_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a materialization item!');
                redirect('settings/data/materialization/edit/'.$materialization_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/materialization/edit/'.$materialization_id);
            }   
        }
    }


    // delete materialization
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete materialization record
        if($this->materialization_model->deleteMaterialization($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the materialization successfully!');

            // load page for viewing all roles
            redirect('settings/data/materialization');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/materialization');
        }
    }
}