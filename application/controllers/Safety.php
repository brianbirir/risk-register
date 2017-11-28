<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Safety extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('safety_model');
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

            // load page to show all safety
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_safety()
    {
        $data = array('title' => 'Safety');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get safety
            $safety = $this->safety_model->getSafety();

            //check if result is true
            ($safety) ? $data['safety_data'] = $safety : $data['safety_data'] = false;

            // load page to show all safety
            $this->template->load('dashboard', 'settings/data/safety/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_safety_view()
    {
        $data = array('title' => 'Add Safety');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to show all safety
            $this->template->load('dashboard', 'settings/data/safety/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_safety()
    {
        //set validation rules
        $this->form_validation->set_rules('safety_name', 'Safety Name', 'trim|required');

        $data = array('title' => 'Add Safety');

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

            // load page to show all safety
            $this->template->load('dashboard', 'settings/data/safety/add', $data);
        }
        else
        {
            $data = array(
                'safety_name' => $this->input->post('safety_name'),
            );

            // insert form data into database
            if ($this->safety_model->insertSafety($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a safety item!');
                redirect('settings/data/safety');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }   
        }
    }


    function edit_safety_view()
    {
        $data = array('title' => 'Edit Safety');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['safety'] = $this->safety_model->getSingleSafety($id);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to edit safety
            $this->template->load('dashboard', 'settings/data/safety/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_safety()
    {
        //set validation rules
        $this->form_validation->set_rules('safety_name', 'Safety Name', 'trim|required');
        
        $data = array('title' => 'Edit Safety');

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

            // load page to show all safety
            $this->template->load('dashboard', 'settings/data/safety/edit', $data);
        }
        else
        {
            // get safety id from hidden field
            $safety_id =  $this->input->post('safety_id');
            
            $data = array(
                'safety_name' => $this->input->post('safety_name'),
            );

            // update table
            if ($this->safety_model->updateSafety($data,$safety_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a safety item!');
                redirect('settings/data/safety/edit/'.$safety_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/safety/edit/'.$safety_id);
            }   
        }
    }


    // delete safety
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete safety record
        if($this->safety_model->deleteSafety($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the safety successfully!');

            // load page for viewing all roles
            redirect('settings/data/safety');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/safety');
        }
    }
}