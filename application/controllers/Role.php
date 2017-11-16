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
            $this->template->load('dashboard', 'settings/role/add', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // the view for editing a user role
    function edit()
    {
        $data = array('title' => 'Edit User Role');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get id from third segment of uri
            $id = $this->uri->segment(3);

            // get role data based in id from uri
            $data['role'] = $this->role_model->getRole($id);

            // load page to show all roles
            $this->template->load('dashboard', 'settings/role/edit', $data);
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
            // page title
            $data = array('title' => 'Add User Role');
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // load page to show all roles
            $this->template->load('dashboard', 'settings/role/add', $data);
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
                $this->session->set_flashdata('positive-msg','You have successfully registered the user role!');
                redirect('settings/role');
            }
            else
            {
                // error: redirect to page for registering a user role
                $this->session->set_flashdata('negative-msg','Oops! Error. Please try again later!');
                redirect('settings/role/add');
            }
        }
    }

    // role updating function
    function update()
    {
        //set validation rules
        $this->form_validation->set_rules('role_name', 'Role Name', 'trim|required');
        $this->form_validation->set_rules('role_description', 'Role Description', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // page title
            $data = array('title' => 'Edit User Role');
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // load page to show all roles
            $this->template->load('dashboard', 'settings/role/edit', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            // get role id from hidden field
            $role_id= $this->input->post('role_id');

            // insert the role details into database
            $data = array(
                'role_name' => $this->input->post('role_name'),
                'role_description' => $this->input->post('role_description'),
                'updated_at' => $timestamp
            );
            
            // insert form data into database
            if ($this->role_model->updateRole($data,$role_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated this user role!');
                redirect('settings/role/'.$role_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('negative-msg','Oops! Error. Please try again later!');
                redirect('settings/role/'.$role_id);
            }
        }
    }

    // delete a user role
    function delete()
    {
        // get id from fourth segment of uri
        $id = $this->uri->segment(4);

        // delete role record
        if($this->role_model->deleteRole($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the role successfully!');

            // load page for viewing all roles
            redirect('settings/role');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/role');
        }
    }
}