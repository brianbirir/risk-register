<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Role extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('role_model');
    }

    // view all roles
    function index()
    {
        $data = array('title' => 'User Roles');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get role data
            $role = $this->role_model->getRoles($data['user_id']);

            //check if result is true
            ($role) ? $data['role_data'] = $role : $data['role_data'] = false;

            // load page to show all registered risks
            $this->template->load('dashboard', 'settings/role/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // the view for adding a user role
    function add()
    {
        $data = array('title' => 'Add User Role');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // load page to show all roles
            $this->template->load('dashboard', 'settings/role/index', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // role registration function
    function register()
    {

        //set validation rules
        $this->form_validation->set_rules('role_name', 'Role Name', 'trim|required');
        $this->form_validation->set_rules('role_description', 'Role Description', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            $data = array('title' => 'Add User Role');
            $this->template->load('dashboard', 'settings/role/index', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            //insert the user registration details into database
            $data = array(
                'role_name' => $this->input->post('role_name'),
                'role_description' => $this->input->post('role_description'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
            
            // insert form data into database
            if ($this->role_model->insertRole($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered the user role! Please login.');
                redirect('login');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('signup');
            }
        }
    }
}