<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Subcategory extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->library('userproject');
        $this->load->model('subcategory_model');
        $this->load->model('category_model');
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

            // load page to show all subcategory
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_subcategory()
    {
        $data = array('title' => 'Subcategory');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['category_id'] = $this->uri->segment(4); // get id from fourth segment of uri

            // get subcategory
            $subcategory = $this->subcategory_model->getSubcategory($data['category_id']);

            //check if result is true
            ($subcategory) ? $data['subcategory_data'] = $subcategory : $data['subcategory_data'] = false;

            // load page to show all subcategory
            $this->template->load('dashboard', 'settings/data/subcategory/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_subcategory_view()
    {
        $data = array('title' => 'Add Subcategory');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get category id from fifth segment of uri
            $category_id = $this->uri->segment(5); 

            // get category data
            $category_row = $this->category_model->getSingleCategory($category_id);
            
            // assign category name and id
            $data['category_name'] = $category_row->category_name;
            $data['category_id'] = $category_id;

            // load page to show all subcategory
            $this->template->load('dashboard', 'settings/data/subcategory/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_subcategory()
    {
        //set validation rules
        $this->form_validation->set_rules('subcategory_name', 'Subcategory Name', 'trim|required');

        $data = array('title' => 'Add Subcategory');

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

            // load page to show all subcategory
            $this->template->load('dashboard', 'settings/data/subcategory/add', $data);
        }
        else
        {
            $category_id = $this->input->post('category_id');
            
            $timestamp = date('Y-m-d');

            $data = array(
                'subcategory_name' => $this->input->post('subcategory_name'),
                'RiskCategories_category_id' =>  $category_id,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );

            // insert form data into database
            if ($this->subcategory_model->insertSubcategory($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a subcategory item!');
                redirect('settings/data/subcategory/'.$category_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }   
        }
    }


    function edit_subcategory_view()
    {
        $data = array('title' => 'Edit Subcategory');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['subcategory'] = $this->subcategory_model->getSingleSubcategory($id);

            $category_row = $this->category_model->getSingleCategory($data['subcategory']->RiskCategories_category_id);
            
            $data['category_name'] = $category_row->category_name;

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to edit subcategory
            $this->template->load('dashboard', 'settings/data/subcategory/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_subcategory()
    {
        //set validation rules
        $this->form_validation->set_rules('category_name', 'Subcategory Name', 'trim|required');
        
        $data = array('title' => 'Edit Subcategory');

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

            // load page to show all subcategory
            $this->template->load('dashboard', 'settings/data/subcategory/edit', $data);
        }
        else
        {
            // get subcategory id from hidden field
            $category_id =  $this->input->post('category_id');
            
            $data = array(
                'category_name' => $this->input->post('category_name'),
            );

            // update table
            if ($this->category_model->updateSubcategory($data,$category_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a subcategory item!');
                redirect('settings/data/subcategory/edit/'.$category_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/subcategory/edit/'.$category_id);
            }   
        }
    }


    // delete subcategory
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete subcategory record
        if($this->category_model->deleteSubcategory($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the subcategory successfully!');

            // load page for viewing all roles
            redirect('settings/data/subcategory');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/subcategory');
        }
    }


    // get sub category list
    function get_subcategory_list()
    {
        $category_id =  $this->input->post('category_id');
        
        // get data from database
        $subcategory_data = $this->subcategory_model->getSubcategory($category_id);

        if($subcategory_data)
        {
            $options = array();
            foreach ($subcategory_data as $row) 
            {
                $subcategory_id = $row->subcategory_id;
                $subcategory_name = $row->subcategory_name;
                $options[$subcategory_id] = $subcategory_name;  
            }
            echo json_encode($options);
        }
    }
}