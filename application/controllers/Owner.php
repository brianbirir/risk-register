<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Owner extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('owner_model');
    }


    function index_owner()
    {
        $data = array('title' => 'Owner');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get owner
            $owner = $this->owner_model->getOwner();

            //check if result is true
            ($owner) ? $data['owner_data'] = $owner : $data['owner_data'] = false;

            // load page to show all owner
            $this->template->load('dashboard', 'settings/data/owner/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_owner_view()
    {
        $data = array('title' => 'Add Owner');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to show all owner
            $this->template->load('dashboard', 'settings/data/owner/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_owner()
    {
        //set validation rules
        $this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required');

        $data = array('title' => 'Add Owner');

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

            // load page to show all owner
            $this->template->load('dashboard', 'settings/data/owner/add', $data);
        }
        else
        {
            $data = array(
                'risk_owner' => $this->input->post('owner_name'),
            );

            // insert form data into database
            if ($this->owner_model->insertOwner($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a owner item!');
                redirect('settings/data/owner');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }   
        }
    }


    function edit_owner_view()
    {
        $data = array('title' => 'Edit Owner');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['owner'] = $this->owner_model->getSingleOwner($id);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to edit owner
            $this->template->load('dashboard', 'settings/data/owner/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_owner()
    {
        //set validation rules
        $this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required');
        
        $data = array('title' => 'Edit Owner');

        // get global data
        $data = array_merge($data, $this->get_global_data());
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // get data based on id from uri
            $data['owner'] = $this->owner_model->getSingleOwner($id);

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // load page to show all owner
            $this->template->load('dashboard', 'settings/data/owner/edit', $data);
        }
        else
        {
            // get owner id from hidden field
            $owner_id =  $this->input->post('owner_id');
            
            $data = array(
                'risk_owner' => $this->input->post('owner_name'),
            );

            // update table
            if ($this->owner_model->updateOwner($data,$owner_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a owner item!');
                redirect('settings/data/owner/edit/'.$owner_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/owner/edit/'.$owner_id);
            }   
        }
    }


    // delete owner
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete owner record
        if($this->owner_model->deleteOwner($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the owner successfully!');

            // load page for viewing all roles
            redirect('settings/data/owner');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/owner');
        }
    }
}