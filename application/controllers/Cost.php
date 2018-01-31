<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Cost extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('cost_model');
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

            // load page to show all cost
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_cost()
    {
        $data = array('title' => 'Cost');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['project_id'] = $this->uri->segment(4); // get id from fourth segment of uri

            // get cost
            $cost = $this->cost_model->getCost($data['project_id']);

            //check if result is true
            ($cost) ? $data['cost_data'] = $cost : $data['cost_data'] = false;

            // load page to show all cost
            $this->template->load('dashboard', 'settings/data/cost/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_cost_view()
    {
        $data = array('title' => 'Add Cost');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get userproject data
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to show all cost
            $this->template->load('dashboard', 'settings/data/cost/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_cost()
    {
        //set validation rules
        $this->form_validation->set_rules('cost_name', 'Cost Name', 'trim|required');

        $data = array('title' => 'Add Cost');

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

            // load page to show all cost
            $this->template->load('dashboard', 'settings/data/cost/add', $data);
        }
        else
        {
            $project_id = $this->input->post('project_name');
            $data = array(
                'cost_rating' => $this->input->post('cost_name'),
                'cost_description' => $this->input->post('cost_description'),
                'Project_project_id' => $this->input->post('project_name')
            );

            // insert form data into database
            if ($this->cost_model->insertCost($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a cost item!');
                redirect('settings/data/cost/'.$project_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/cost/add');
            }   
        }
    }


    function edit_cost_view()
    {
        $data = array('title' => 'Edit Cost');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['cost'] = $this->cost_model->getSingleCost($id);

            // get userproject data
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to edit cost
            $this->template->load('dashboard', 'settings/data/cost/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_cost()
    {
        //set validation rules
        $this->form_validation->set_rules('cost_name', 'Cost Name', 'trim|required');
        
        $data = array('title' => 'Edit Cost');

        // get global data
        $data = array_merge($data, $this->get_global_data());
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // get data based on id from uri
            $data['cost'] = $this->cost_model->getSingleCost($id);

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // load page to show all cost
            $this->template->load('dashboard', 'settings/data/cost/edit', $data);
        }
        else
        {
            // get cost id from hidden field
            $cost_id =  $this->input->post('cost_id');
            
            $data = array(
                'cost_rating' => $this->input->post('cost_name'),
                'cost_description' => $this->input->post('cost_description')
            );

            // update table
            if ($this->cost_model->updateCost($data,$cost_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a cost item!');
                redirect('settings/data/cost/edit/'.$cost_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/cost/edit/'.$cost_id);
            }   
        }
    }


    // delete cost
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete cost record
        if($this->cost_model->deleteCost($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the cost successfully!');

            // load page for viewing all roles
            redirect('settings/data/cost');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/cost');
        }
    }
}