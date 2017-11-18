<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('user_model');
    }

    // view all users
    function index()
    {
        $data = array('title' => 'Users');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get user data
            $user = $this->user_model->getUsers();

            //check if result is true
            ($user) ? $data['user_data'] = $user : $data['user_data'] = false;

            // load page to show all registered users
            $this->template->load('dashboard', 'settings/user/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // the view for adding a user
    function add()
    {   
        if($this->session->userdata('logged_in'))
        {
            $data = array('title' => 'Add User');
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get role names from database & add them to select form element
            $roles = $this->user_model->getRoles();
            
            if($roles)
            {
                $options = array();

                foreach ($roles as $row) 
                {
                    $role_id = $row->role_id;
                    $role_name = $row->role_name;
                    $options[$role_id] = $role_name;  
                }

                $data['select_option'] = $options;
            }
            else 
            {
                $data['select_option'] = 'No Data!';
            }

            // load page to show all roles
            $this->template->load('dashboard', 'settings/user/add', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // the view for editing a user
    function edit()
    {   
        if($this->session->userdata('logged_in'))
        {
            $data = array('title' => 'Edit User');
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get id from third segment of uri
            $id = $this->uri->segment(3);

            // get user data based in id from uri
            $data['user'] = $this->user_model->getUser($id);

            // load page to show all roles
            $this->template->load('dashboard', 'settings/user/edit', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // user registration function
    function register()
    {
        //set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[User.email]');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            $data = array('title' => 'Add User');
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get role names from database & add them to select form element in sign up form
            $roles = $this->user_model->getRoles();
            
            if($roles)
            {
                $options = array();

                foreach ($roles as $row) 
                {
                    $role_id = $row->role_id;
                    $role_name = $row->role_name;
                    $options[$role_id] = $role_name;  
                }

                $data['select_option'] = $options;
            }
            else 
            {
                $data['select_option'] = 'No Data!';
            }

            // load page to show all roles
            $this->template->load('dashboard','settings/user/add', $data);
        }
        else
        {
            $default_password = md5('password');
            $timestamp = date('Y-m-d G:i:s');

            //insert the user registration details into database
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $default_password,
                'Role_role_id' => $this->input->post('role'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
            
            // insert form data into database
            if ($this->user_model->insertUser($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered! Please login.');
                redirect('settings/users');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }
        }
    }

    // user updating function
    function update()
    {
        //set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            $data = array('title' => 'Edit User');
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get id from third segment of uri
            $id = $this->uri->segment(3);

            // get user data based in id from uri
            $data['user'] = $this->user_model->getUser($id);

            // load page to show all roles
            $this->template->load('dashboard', 'settings/user/edit', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            // get user id from hidden field
            $user_id= $this->input->post('user_id');

            // insert the role details into database
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'updated_at' => $timestamp
            );
            
            // insert form data into database
            if ($this->user_model->updateUser($data,$user_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated this user!');
                redirect('settings/user/'.$user_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('negative-msg','Oops! Error. Please try again later!');
                redirect('settings/user/'.$user_id);
            }
        }
    }

    // delete a user
    function delete()
    {
        // get id from fourth segment of uri
        $id = $this->uri->segment(4);

        // delete role record
        if($this->user_model->deleteUser($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the user successfully!');

            // load page for viewing all roles
            redirect('settings/users');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/users');
        }
    }
}