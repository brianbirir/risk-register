<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Schedule extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('schedule_model');
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

            // load page to show all schedule
            $this->template->load('dashboard', 'settings/data/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function index_schedule()
    {
        $data = array('title' => 'Schedule');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get schedule
            $schedule = $this->schedule_model->getSchedule();

            //check if result is true
            ($schedule) ? $data['schedule_data'] = $schedule : $data['schedule_data'] = false;

            // load page to show all schedule
            $this->template->load('dashboard', 'settings/data/schedule/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_schedule_view()
    {
        $data = array('title' => 'Add Schedule');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to show all schedule
            $this->template->load('dashboard', 'settings/data/schedule/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function add_schedule()
    {
        //set validation rules
        $this->form_validation->set_rules('schedule_name', 'Schedule Name', 'trim|required');

        $data = array('title' => 'Add Schedule');

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

            // load page to show all schedule
            $this->template->load('dashboard', 'settings/data/schedule/add', $data);
        }
        else
        {
            $data = array(
                'schedule_rating' => $this->input->post('schedule_name'),
                'schedule_description' => $this->input->post('schedule_description')
            );

            // insert form data into database
            if ($this->schedule_model->insertSchedule($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered a schedule item!');
                redirect('settings/data/schedule');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/schedule/add');
            }   
        }
    }


    function edit_schedule_view()
    {
        $data = array('title' => 'Edit Schedule');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get id from a segment of uri
            $id = $this->uri->segment(5);
            
            // get data based on id from uri
            $data['schedule'] = $this->schedule_model->getSingleSchedule($id);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // load page to edit schedule
            $this->template->load('dashboard', 'settings/data/schedule/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    function update_schedule()
    {
        //set validation rules
        $this->form_validation->set_rules('schedule_name', 'Schedule Name', 'trim|required');
        
        $data = array('title' => 'Edit Schedule');

        // get global data
        $data = array_merge($data, $this->get_global_data());
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // get data based on id from uri
            $data['schedule'] = $this->schedule_model->getSingleSchedule($id);

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // load page to show all schedule
            $this->template->load('dashboard', 'settings/data/schedule/edit', $data);
        }
        else
        {
            // get schedule id from hidden field
            $schedule_id =  $this->input->post('schedule_id');
            
            $data = array(
                'schedule_rating' => $this->input->post('schedule_name'),
                'schedule_description' => $this->input->post('schedule_description')
            );

            // update table
            if ($this->schedule_model->updateSchedule($data,$schedule_id))
            {
                $this->session->set_flashdata('positive-msg','You have successfully updated a schedule item!');
                redirect('settings/data/schedule/edit/'.$schedule_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('settings/data/schedule/edit/'.$schedule_id);
            }   
        }
    }


    // delete schedule
    function delete()
    {
        // get id from fifth segment of uri
        $id = $this->uri->segment(5);

        // delete schedule record
        if($this->schedule_model->deleteSchedule($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the schedule successfully!');

            // load page for viewing all roles
            redirect('settings/data/schedule');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('settings/data/schedule');
        }
    }
}