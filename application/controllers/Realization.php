<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Realization extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->library('userproject');
        $this->load->model('realization_model');
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

            // load page to show all realization
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_realization()
    {
        $data = array('title' => 'Realization');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['project_id'] = $this->uri->segment(4); // get id from fourth segment of uri

            // get realization
            $realization = $this->realization_model->getRealization($data['project_id']);

            //check if result is true
            ($realization) ? $data['realization_data'] = $realization : $data['realization_data'] = false;

            // load page to show all realization
            $this->template->load('dashboard', 'settings/data/realization/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_realization_view()
    {
        $data = array('title' => 'Add Realization');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get userproject data
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to show all realization
            $this->template->load('dashboard', 'settings/data/realization/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_realization()
    {
        //set validation rules
        $this->form_validation->set_rules('realization_name', 'Realization Name', 'trim|required');

        $data = array('title' => 'Add Realization');

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

            // load page to show all realization
            $this->template->load('dashboard', 'settings/data/realization/add', $data);
        }
        else
        {
            $project_id = $this->input->post('project_name');
            $data = array(
                'realization_name' => $this->input->post('realization_name'),
                'Project_project_id' => $this->input->post('project_name')
            );

            // insert form data into database
            if ($this->realization_model->insertRealization($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a realization item!');
                redirect('settings/data/realization/'.$project_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }   
        }
    }


    function edit_realization_view()
    {
        $data = array('title' => 'Edit Realization');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['realization'] = $this->realization_model->getSingleRealization($id);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get userproject data
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to edit realization
            $this->template->load('dashboard', 'settings/data/realization/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_realization()
    {
        //set validation rules
        $this->form_validation->set_rules('realization_name', 'Realization Name', 'trim|required');
        
        $data = array('title' => 'Edit Realization');

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

            // load page to show all realization
            $this->template->load('dashboard', 'settings/data/realization/edit', $data);
        }
        else
        {
            // get realization id from hidden field
            $realization_id =  $this->input->post('realization_id');
            
            $data = array(
                'realization_name' => $this->input->post('realization_name'),
            );

            // update table
            if ($this->realization_model->updateRealization($data,$realization_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a realization item!');
                redirect('settings/data/realization/edit/'.$realization_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/realization/edit/'.$realization_id);
            }   
        }
    }


    // delete realization
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete realization record
        if($this->realization_model->deleteRealization($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the realization successfully!');

            // load page for viewing all roles
            redirect('settings/data/realization');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/realization');
        }
    }
}