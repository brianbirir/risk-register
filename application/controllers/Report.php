<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Report extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('report_model');
        $this->load->model('risk_model');
        $this->load->model('project_model');
    }

    // view for report page
    function index()
    {
        $data = array('title' => 'Reports');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get risk register id
            // if general user
            if ( $data['role_id'] == 8 ) 
            {
                $register_row = $this->project_model->getAssignedRiskRegisterName( $data['user_id'] );
                $assigned_register_id = $register_row->subproject_id;
                
                // get risk data
                $risk = $this->risk_model->getReportRisks($data['user_id'], $assigned_register_id);
            }
            else // if manager or super admin
            {
                $risk = $this->risk_model->getAllRisks();
            }
            
            // check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            // select drop down
            $data['select_category'] = $this->getCategories();
            $data['select_subproject'] = $this->getSubProject( $data['user_id'], $data['role_id'] );

            // load page to show all registered risks
            $this->template->load('dashboard', 'report/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // generate and export report
    function export()
    {   
        // load InfluxDB Client library
        $this->load->library('csvgenerator');
        $data = array('title' => 'Reports');

        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();
        
        // get global data
        $data = array_merge($data,$this->get_global_data());
        // get user id from session data                
        $user_id = $data['user_id'];

        //validation succeeds
        if ($this->input->post('btn_filter') == "Filter")
        {
          
            if($this->session->userdata('logged_in'))
            {
                $risk_register = $this->input->post('risk_register');
                $main_category = $this->input->post('main_category');
                $risk_level = $this->input->post('risk_level');
                //$date_from = $this->input->post('date_from');
                //$date_to = $this->input->post('date_to');

                $data['risk_register'] = $risk_register;
                $data['main_category'] = $main_category;
                $data['risk_level'] = $risk_level;
                //$data['date_from'] = $date_to;
                //$data['date_to'] = $date_from;

                // get filtered data
                $filtered_risk_data = $this->report_model->getFilteredRisk( $user_id, $main_category, $risk_level, $risk_register );

                // check if result is true
                ( $filtered_risk_data ) ? $data['risk_data'] = $filtered_risk_data : $data['risk_data'] = false;
    
                // select drop down
                $data['select_category'] = $this->getCategories();
                $data['select_subproject'] = $this->getSubProject( $data['user_id'] );
    
                // load page to show all registered risks
                $this->template->load('dashboard', 'report/filter', $data);
            }
            else
            {
                // if no session, redirect to login page
                redirect('login', 'refresh');
            }
        } 
        else if ($this->input->post('btn_report') == "Generate Report")
        {
            $risk_register = $this->input->post('risk_register');
            $main_category = $this->input->post('main_category');
            $risk_level = $this->input->post('risk_level');
            $this->csvgenerator->fetch_data( $user_id, $main_category, $risk_level, $risk_register );
            redirect('dashboard/reports');   
        }
    }


    // risk strategies
    function getRiskStrategies()
    {
        $strategies = $this->risk_model->getRiskStrategies();
        
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
        $status = $this->risk_model->getStatus();
        
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
        $safety = $this->risk_model->getSystemSafety();
        
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
        $realization = $this->risk_model->getRealization();
        
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
        $categories = $this->risk_model->getRiskCategories();
        
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

    // risk registers
    function getSubProject( $user_id, $role_id )
    {
        if ( $role_id == 8 ) 
        {
            $risk_register = $this->project_model->getAssignedRiskRegisters( $user_id );
        }
        else
        {
            $risk_register = $this->project_model->getRiskRegisters( $user_id );
        }
        
        if( $risk_register )
        {
            $options = array();

            foreach ( $risk_register as $row ) 
            {
                $subproject_id = $row->subproject_id;
                $subproject_name = $row->name;
                $options[$subproject_id] = $subproject_name;  
            }

            return $options;
        }
        else
        {
            return 'No Data!';
        }
    }
}