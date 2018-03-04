<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Response extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('responsetitle_model');
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

            // load page to show all response
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_response()
    {
        $data = array('title' => 'Response');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['project_id'] = $this->uri->segment(4); // get id from fourth segment of uri

            // get response
            $response = $this->responsetitle_model->getResponse($data['project_id']);

            //check if result is true
            ($response) ? $data['response_data'] = $response : $data['response_data'] = false;

            // load page to show all response
            $this->template->load('dashboard', 'settings/data/response/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_response_view()
    {
        $data = array('title' => 'Add Response');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to show all response
            $this->template->load('dashboard', 'settings/data/response/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_response()
    {
        //set validation rules
        $this->form_validation->set_rules('response_name', 'Response Name', 'trim|required');

        $data = array('title' => 'Add Response');

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

            // load page to show all response
            $this->template->load('dashboard', 'settings/data/response/add', $data);
        }
        else
        {
            $project_id = $this->input->post('project_name');
            $data = array(
                'response_name' => $this->input->post('response_name'),
                'Project_project_id' => $this->input->post('project_name')
            );

            // insert form data into database
            if ($this->responsetitle_model->insertResponse($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a response item!');
                redirect('settings/data/response/'.$project_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }   
        }
    }


    function edit_response_view()
    {
        $data = array('title' => 'Edit Response');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['response'] = $this->responsetitle_model->getSingleResponse($id);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get userproject data
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to edit response
            $this->template->load('dashboard', 'settings/data/response/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_response()
    {
        //set validation rules
        $this->form_validation->set_rules('response_name', 'Response Name', 'trim|required');
        
        $data = array('title' => 'Edit Response');

        // get global data
        $data = array_merge($data, $this->get_global_data());
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // get data based on id from uri
            $data['response'] = $this->responsetitle_model->getSingleResponse($id);

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // load page to show all response
            $this->template->load('dashboard', 'settings/data/response/edit', $data);
        }
        else
        {
            // get response id from hidden field
            $response_id =  $this->input->post('response_id');
            
            $data = array(
                'response_name' => $this->input->post('response_name'),
            );

            // update table
            if ($this->responsetitle_model->updateResponse($data,$response_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a response item!');
                redirect('settings/data/response/edit/'.$response_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/response/edit/'.$response_id);
            }   
        }
    }


    // delete response
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete response record
        if($this->responsetitle_model->deleteResponse($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the response successfully!');

            // load page for viewing all roles
            redirect('settings/data/response');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/response');
        }
    }
}