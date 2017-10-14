<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class RiskRegistry extends MY_Controller
{    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('registry_model');
    }

    
    // view all registered risks owned by a subproject
    function index()
    {
        $data = array('title' => 'Risk Registry');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get risk data
            $risk = $this->registry_model->getRegistry($data['user_id']);

            //check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            // load page to show all registered risks
            $this->template->load('dashboard', 'risk_registry/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    
    
    // the view for adding risk registry
    function add()
    {
        $data = array('title' => 'Register Risk');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // select drop down
            $data['select_status'] = $this->getStatus();
            $data['select_category'] = $this->getCategories();
            $data['select_strategy'] = $this->getRiskStrategies();
            $data['select_safety'] = $this->getSystemSafety();
            $data['select_realization'] = $this->getRealization();

            // load page to show all devices
            $this->template->load('dashboard', 'risk_registry/add', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    // function for adding risk
    function register()
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


    // risk strategies
    function getRiskStrategies()
    {
        $strategies = $this->registry_model->getRiskStrategies();
        
        if($strategies)
        {
            $options = array();

            foreach ($strategies as $row) 
            {
                $strategy_id = $row->strategy_id;
                $strategy_name = $row->strategy_name;
                $options[$strategy_id] = $strategy_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }


    // status
    function getStatus()
    {
        $status = $this->registry_model->getStatus();
        
        if($status)
        {
            $options = array();

            foreach ($status as $row) 
            {
                $status_id = $row->status_id;
                $status_name = $row->status_name;
                $options[$status_id] = $status_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }


    // safety
    function getSystemSafety()
    {
        $safety = $this->registry_model->getSystemSafety();
        
        if($safety)
        {
            $options = array();

            foreach ($safety as $row) 
            {
                $safety_id = $row->safety_id;
                $safety_name = $row->safety_name;
                $options[$safety_id] = $safety_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }

    // realization
    function getRealization()
    {
        $realization = $this->registry_model->getRealization();
        
        if($realization)
        {
            $options = array();

            foreach ($realization as $row) 
            {
                $realization_id = $row->realization_id;
                $realization_name = $row->realization_name;
                $options[$realization_id] = $realization_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }

    // categories
    function getCategories()
    {
        $categories = $this->registry_model->getRiskCategories();
        
        if($categories)
        {
            $options = array();

            foreach ($categories as $row) 
            {
                $category_id = $row->category_id;
                $category_name = $row->category_name;
                $options[$category_id] = $category_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }
}