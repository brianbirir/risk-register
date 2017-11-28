<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Status extends RISK_Controller
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

            // load page to show all status
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_status()
    {
        $data = array('title' => 'Status');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get status
            $status = $this->data_model->getStatus();

            //check if result is true
            ($status) ? $data['status_data'] = $status : $data['status_data'] = false;

            // load page to show all status
            $this->template->load('dashboard', 'settings/data/status/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_status_view()
    {
        $data = array('title' => 'Add Status');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to show all status
            $this->template->load('dashboard', 'settings/data/status/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_status()
    {
        //set validation rules
        $this->form_validation->set_rules('status_name', 'Status Name', 'trim|required');

        $data = array('title' => 'Add Status');

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

            // load page to show all status
            $this->template->load('dashboard', 'settings/data/status/add', $data);
        }
        else
        {
            $data = array(
                'status_name' => $this->input->post('status_name'),
            );

            // insert form data into database
            if ($this->data_model->insertStatus($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a status item!');
                redirect('settings/data/status');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }   
        }
    }


    function edit_status_view()
    {
        $data = array('title' => 'Edit Status');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['status'] = $this->data_model->getSingleStatus($id);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to edit status
            $this->template->load('dashboard', 'settings/data/status/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_status()
    {
        //set validation rules
        $this->form_validation->set_rules('status_name', 'Status Name', 'trim|required');
        
        $data = array('title' => 'Edit Status');

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

            // load page to show all status
            $this->template->load('dashboard', 'settings/data/status/edit', $data);
        }
        else
        {
            // get status id from hidden field
            $status_id =  $this->input->post('status_id');
            
            $data = array(
                'status_name' => $this->input->post('status_name'),
            );

            // update table
            if ($this->data_model->updateStatus($data,$status_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a status item!');
                redirect('settings/data/status/edit/'.$status_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/status/edit/'.$status_id);
            }   
        }
    }


    // delete status
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete status record
        if($this->data_model->deleteStatus($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the status successfully!');

            // load page for viewing all roles
            redirect('settings/data/status');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/status');
        }
    }
}