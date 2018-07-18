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
        $this->load->model('project_model');
        $this->load->model('team_model');
    }

    // view all users
    function index()
    {
        $data = array('title' => 'Users');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add('Settings','/dashboard/settings');
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            if ($data['role_id'] == 1) 
            {
                // get user data based from session user id to be used as parent user id
                $user = $this->user_model->getUsers(array());

                //check if result is true
                ($user) ? $data['user_data'] = $user : $data['user_data'] = false;
            } 
            else 
            {
                // get user data
                $user = $this->user_model->getUsers(array('user_id'=> $data['user_id']));
                
                //check if result is true
                ($user) ? $data['user_data'] = $user : $data['user_data'] = false;
            }
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
            $data = array('title' => 'Register User');
            
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            if ($data['role_id'] == 1) {
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
                
            } else {
                // get registers from database & add them to select form element
                $register = $this->project_model->getUserSubProjects($data['user_id']);
                
                if($register)
                {
                    $options = array();

                    foreach ($register as $row) 
                    {
                        $subproject_id = $row->subproject_id;
                        $subproject_name = $row->name;
                        $options[$subproject_id] = $subproject_name;  
                    }

                    $data['select_option'] = $options;
                }
                else 
                {
                    $data['select_option'] = 'No Data!';
                }
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
            $this->breadcrumb->add('Settings','/dashboard/settings');
            $this->breadcrumb->add('Users','/settings/users');
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get id from fourth segment of uri
            $id = $this->uri->segment(3);

            // get user data based on id from uri
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


    // view for assigning a user to a project
    function assign_project_view()
    {
        if($this->session->userdata('logged_in'))
        {
            $data = array('title' => 'Assign Project to User');
            
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());
            
            // get managers
            $managers = $this->user_model->getManagerUsers(array('user_id'=>$data['user_id']));

            // get project ID from uri segment
            $data['project_id'] = $this->uri->segment(4);

            $single_project = $this->project_model->getSingleProject($this->uri->segment(4));

            // get project name
            $data['project_name'] = $single_project->project_name;
            
            if($managers)
            {
                $options = array();

                foreach ($managers as $row) 
                {
                    $user_id = $row->user_id;
                    $f_name = $row->first_name;
                    $l_name = $row->last_name;
                    $user_name = $f_name.' '.$l_name;
                    $options[$user_id] = $user_name;  
                }

                $data['select_user'] = $options;
            }
            else 
            {
                $data['select_user'] = 'No Users!';
            }

            // load page to show form
            $this->template->load('dashboard', 'project/assign_user', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // function to assign user to specified project
    function assign_project()
    {
        $timestamp = date('Y-m-d G:i:s');

        // check if user has been assigned a project
        $assigned = $this->team_model->is_assigned_project($this->input->post('project_user'), $this->input->post('project_id'));

        $data = array(
            'Project_Project_id' => $this->input->post('project_id'),
            'User_user_id' => $this->input->post('project_user'),
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        );

        // check if user has been assigned specified project
        if($assigned)
        {
            $this->session->set_flashdata('negative_msg','The user has already been assigned to this project!');
            redirect('/settings/user/project/'. $this->input->post('project_id'));
        }
        else
        {
            // insert form data into database
            if ($this->team_model->insertProjectMember($data))
            {
                $this->session->set_flashdata('positive_msg','You have successfully assigned your user a project!');
                redirect('dashboard/project/'. $this->input->post('project_id'));
            }
            else
            {
                // error
                $this->session->set_flashdata('negative_msg','Oops! Error. Please try again later!');
                redirect('dashboard/project/'. $this->input->post('project_id'));
            }
        }
    }


    // get user names
    function getUsers($users)
    {
        if($users)
        {
            $options = array();

            foreach ($users as $row) 
            {
                $user_id = $row->user_id;
                $f_name = $row->first_name;
                $l_name = $row->last_name;
                $user_name = $f_name.' '.$l_name;
                $options[$user_id] = $user_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Users!';
        }

    }

    // view for assigning a user to a register
    function assign_register_view()
    {
        if($this->session->userdata('logged_in'))
        {
            $data = array('title' => 'Assign Register to User');
            
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());
            
            // get users belonging to the parent user AKA project/programme manager
            $users = $this->user_model->getUsers(array('user_id'=>$data['user_id']));

            // get register ID from uri segment
            $data['register_id'] = $this->uri->segment(4);

            $single_register = $this->project_model->getSingleRiskRegister($data['register_id']);

            // get register name
            $data['register_name'] = $single_register->name;
            
            if($users)
            {
                $options = array();

                foreach ($users as $row) 
                {
                    $user_id = $row->user_id;
                    $f_name = $row->first_name;
                    $l_name = $row->last_name;
                    $user_name = $f_name.' '.$l_name;
                    $options[$user_id] = $user_name;  
                }

                $data['select_user'] = $options;
            }
            else 
            {
                $data['select_user'] = 'No Users!';
            }

            // load page to show form
            $this->template->load('dashboard', 'registry/assign_user', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // function to assign user to specified register
    function assign_register()
    {
        $timestamp = date('Y-m-d G:i:s');

        $assigned = $this->team_model->is_assigned($this->input->post('register_user'), $this->input->post('register_id'));

        $data = array(
            'Subproject_subproject_id' => $this->input->post('register_id'),
            'User_user_id' => $this->input->post('register_user'),
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        );


        // check if user has been assigned specified register
        if($assigned)
        {
            $this->session->set_flashdata('negative_msg','The user has already been assigned to this register!');
            redirect('/settings/user/riskregister/'. $this->input->post('register_id'));
        }
        else
        {
            // insert form data into database
            if ($this->team_model->insertTeamMember($data))
            {
                $this->session->set_flashdata('positive_msg','You have successfully assigned your user a risk register!');
                redirect('dashboard/riskregister/'. $this->input->post('register_id'));
            }
            else
            {
                // error
                $this->session->set_flashdata('negative_msg','Oops! Error. Please try again later!');
                redirect('dashboard/riskregister/'. $this->input->post('register_id'));
            }
        }
    }

    // user registration function
    function register()
    {
        //set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

        $data = array('title' => 'Register User');

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

            if ($data['role_id'] == 1) 
            {
                //insert the user registration details into database
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => $default_password,
                    'Role_role_id' => $this->input->post('role'),
                    'parent_user_id' => $data['user_id'],
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                );

                // insert form data into database
                if ($this->user_model->insertUser($data))
                {
                    $this->session->set_flashdata('positive_msg','You have successfully registered a user!');
                    redirect('settings/users');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('negative_msg','Oops! Error. Please try again later!');
                    redirect('settings/user/add');
                }
            } 
            else 
            {
                $general_role = 8;

                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => $default_password,
                    'Role_role_id' => $general_role,
                    'parent_user_id' => $data['user_id'],
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                );

                // insert form data into database
                if ($this->user_model->insertUser($data))
                {
                    $this->session->set_flashdata('positive_msg','You have successfully registered your user!');
                    redirect('settings/users');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('negative_msg','Oops! Error. Please try again later!');
                    redirect('settings/user/add');
                }
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

        // delete user record
        if($this->user_model->deleteUser($id))
        {
            $this->session->set_flashdata('positive_msg','You have deleted the user successfully!');

            // load page for viewing all roles
            redirect('settings/users');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative_msg','Oops! Error.  Please try again later!');
            redirect('settings/users');
        }
    }


    // change user password
    function change_password_view()
    {
        if($this->session->userdata('logged_in'))
        {
            $data = array('title' => "Change User's Password");

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get id from fourth segment of uri
            $id = $this->uri->segment(4);

            // get user data based on id from uri
            $data['user'] = $this->user_model->getUser($id);

            // load page to show all roles
            $this->template->load('dashboard', 'settings/user/change-password', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function change_password()
    {
        //set validation rules
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|md5');
        
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
            $id = $this->uri->segment(4);

            // get user data based in id from uri
            $data['user'] = $this->user_model->getUser($id);

            // load page to show all roles
            $this->template->load('dashboard', 'settings/user/change-password', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            // get user id from hidden field
            $user_id= $this->input->post('user_id');

            // insert the role details into database
            $data = array(
                'password' => $this->input->post('password'),
                'updated_at' => $timestamp
            );
            
            // insert form data into database
            if ($this->user_model->updateUser($data,$user_id))
            {
                $this->session->set_flashdata('positive-msg',"You have successfully change this user's password!");
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
}