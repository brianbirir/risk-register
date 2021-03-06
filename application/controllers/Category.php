<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Category extends RISK_Controller
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

            // load page to show all category
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_category()
    {
        $data = array('title' => 'Category');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['project_id'] = $this->uri->segment(4); // get id from fourth segment of uri

            // get category
            $category = $this->category_model->getCategory($data['project_id']);

            //check if result is true
            ($category) ? $data['category_data'] = $category : $data['category_data'] = false;

            // load page to show all category
            $this->template->load('dashboard', 'settings/data/category/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_category_view()
    {
        $data = array('title' => 'Add Category');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get userproject data
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to show all category
            $this->template->load('dashboard', 'settings/data/category/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_category()
    {
        //set validation rules
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');

        $data = array('title' => 'Add Category');

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

            // load page to show all category
            $this->template->load('dashboard', 'settings/data/category/add', $data);
        }
        else
        {
            $project_id = $this->input->post('project_name');
            $data = array(
                'category_name' => $this->input->post('category_name'),
                'Project_project_id' => $this->input->post('project_name')
            );

            // insert form data into database
            if ($this->category_model->insertCategory($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a category item!');
                redirect('settings/data/category/'.$project_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/user/add');
            }   
        }
    }


    function edit_category_view()
    {
        $data = array('title' => 'Edit Category');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['category'] = $this->category_model->getSingleCategory($id);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get userproject data
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // load page to edit category
            $this->template->load('dashboard', 'settings/data/category/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_category()
    {
        //set validation rules
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        
        $data = array('title' => 'Edit Category');

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

            // load page to show all category
            $this->template->load('dashboard', 'settings/data/category/edit', $data);
        }
        else
        {
            // get category id from hidden field
            $category_id =  $this->input->post('category_id');
            
            $data = array(
                'category_name' => $this->input->post('category_name'),
            );

            // update table
            if ($this->category_model->updateCategory($data,$category_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a category item!');
                redirect('settings/data/category/edit/'.$category_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/category/edit/'.$category_id);
            }   
        }
    }


    // delete category
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete category record
        if($this->category_model->deleteCategory($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the category successfully!');

            // load page for viewing all roles
            redirect('settings/data/category');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/category');
        }
    }
}