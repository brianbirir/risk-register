<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Entity extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('entity_model');
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

            // load page to show all entity
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_entity()
    {
        $data = array('title' => 'Entity');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['project_id'] = $this->uri->segment(4); // get id from fourth segment of uri

            // get entity
            $entity = $this->entity_model->getEntity( $data['project_id'] );

            //check if result is true
            ($entity) ? $data['entity_data'] = $entity : $data['entity_data'] = false;

            // load page to show all entity
            $this->template->load('dashboard', 'settings/data/entity/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_entity_view()
    {
        $data = array('title' => 'Add Entity');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to show all entity
            $this->template->load('dashboard', 'settings/data/entity/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_entity()
    {
        //set validation rules
        $this->form_validation->set_rules('entity_name', 'Entity Name', 'trim|required');

        $data = array('title' => 'Add Entity');

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

            // load page to show all entity
            $this->template->load('dashboard', 'settings/data/entity/add', $data);
        }
        else
        {
            $project_id = $this->input->post('project_name');
            $data = array(
                'entity_name' => $this->input->post('entity_name'),
                'Project_project_id' => $this->input->post('project_name')
            );

            // insert form data into database
            if ($this->entity_model->insertEntity($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a entity item!');
                redirect('settings/data/entity/'.$project_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }   
        }
    }


    function edit_entity_view()
    {
        $data = array('title' => 'Edit Entity');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['entity'] = $this->entity_model->getSingleEntity($id);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get userproject data
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to edit entity
            $this->template->load('dashboard', 'settings/data/entity/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_entity()
    {
        //set validation rules
        $this->form_validation->set_rules('entity_name', 'Entity Name', 'trim|required');
        
        $data = array('title' => 'Edit Entity');

        // get global data
        $data = array_merge($data, $this->get_global_data());
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // get data based on id from uri
            $data['entity'] = $this->entity_model->getSingleEntity($id);

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // load page to show all entity
            $this->template->load('dashboard', 'settings/data/entity/edit', $data);
        }
        else
        {
            // get entity id from hidden field
            $entity_id =  $this->input->post('entity_id');
            
            $data = array(
                'entity_name' => $this->input->post('entity_name'),
            );

            // update table
            if ($this->entity_model->updateEntity($data,$entity_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a entity item!');
                redirect('settings/data/entity/edit/'.$entity_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/entity/edit/'.$entity_id);
            }   
        }
    }


    // delete entity
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete entity record
        if($this->entity_model->deleteEntity($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the entity successfully!');

            // load page for viewing all roles
            redirect('settings/data/entity');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/entity');
        }
    }
}