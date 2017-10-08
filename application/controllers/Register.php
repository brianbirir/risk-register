<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Register extends CI_Controller
{    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('user_model');
    }

    // registration view
    function index($page = 'index')
    {
        if ( ! file_exists(APPPATH.'views/registration/'.$page.'.php'))
        {
            show_404();
        }
        
        $data = array('title' => 'Registration');

        // get user's ID from session
        $session_data = $this->session->userdata('logged_in');
        $data['user_id'] = $session_data['user_id'];

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

        // load default template with signup view
        $this->template->load('default', 'registration/'.$page, $data);
    }

     
    // registration of user
    function signup()
    {

        //set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[User.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|md5');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            $data = array('title' => 'Registration');
            $this->template->load('default', 'registration/index', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            //insert the user registration details into database
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'Role_role_id' => $this->input->post('role'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
            
            // insert form data into database
            if ($this->user_model->insertUser($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered! Please login.');
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