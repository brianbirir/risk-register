<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Strategy extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('strategy_model');
        $this->load->library('project');
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

            // load page to show all strategy
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_strategy()
    {
        $data = array('title' => 'Strategy');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get strategy
            $strategy = $this->strategy_model->getStrategy();

            //check if result is true
            ($strategy) ? $data['strategy_data'] = $strategy : $data['strategy_data'] = false;

            // load page to show all strategy
            $this->template->load('dashboard', 'settings/data/strategy/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_strategy_view()
    {
        $data = array('title' => 'Add Strategy');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['select_project'] = $this->project->getProject( $data['user_id'] );

            // load page to show all strategy
            $this->template->load('dashboard', 'settings/data/strategy/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_strategy()
    {
        //set validation rules
        $this->form_validation->set_rules('strategy_name', 'Strategy Name', 'trim|required');

        $data = array('title' => 'Add Strategy');

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

            // load page to show all strategy
            $this->template->load('dashboard', 'settings/data/strategy/add', $data);
        }
        else
        {
            $data = array(
                'strategy_name' => $this->input->post('strategy_name'),
                'Project_project_id' => $this->input->post('project_name')
            );

            // insert form data into database
            if ($this->strategy_model->insertStrategy($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a strategy item!');
                redirect('settings/data/strategy');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }   
        }
    }


    function edit_strategy_view()
    {
        $data = array('title' => 'Edit Strategy');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['strategy'] = $this->strategy_model->getSingleStrategy($id);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get project data
            $data['select_project'] = $this->project->getProject( $data['user_id'] );

            // load page to edit strategy
            $this->template->load('dashboard', 'settings/data/strategy/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_strategy()
    {
        //set validation rules
        $this->form_validation->set_rules('strategy_name', 'Strategy Name', 'trim|required');
        
        $data = array('title' => 'Edit Strategy');

        // get global data
        $data = array_merge($data, $this->get_global_data());
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // get data based on id from uri
            $data['strategy'] = $this->strategy_model->getSingleStrategy($id);

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // load page to show all strategy
            $this->template->load('dashboard', 'settings/data/strategy/edit', $data);
        }
        else
        {
            // get strategy id from hidden field
            $strategy_id =  $this->input->post('strategy_id');
            
            $data = array(
                'strategy_name' => $this->input->post('strategy_name'),
            );

            // update table
            if ($this->strategy_model->updateStrategy($data,$strategy_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a strategy item!');
                redirect('settings/data/strategy/edit/'.$strategy_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/strategy/edit/'.$strategy_id);
            }   
        }
    }


    // delete strategy
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete strategy record
        if($this->strategy_model->deleteStrategy($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the strategy successfully!');

            // load page for viewing all roles
            redirect('settings/data/strategy');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/strategy');
        }
    }
}