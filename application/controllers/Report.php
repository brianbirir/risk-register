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

            // get risk data
            $risk = $this->risk_model->getUserRisk($data['user_id']);

            // check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            // select drop down
            $data['select_status'] = $this->getStatus();
            $data['select_category'] = $this->getCategories();
            $data['select_strategy'] = $this->getRiskStrategies();
            $data['select_safety'] = $this->getSystemSafety();
            $data['select_realization'] = $this->getRealization();
            $data['select_subproject'] = $this->getSubProject();

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
        /*$data = array('title' => 'Exported Data');

        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();

        // get global data
        $data = array_merge($data,$this->get_global_data());*/

        // load InfluxDB Client library
        $this->load->library('csvgenerator');

        // $data['db_dump'] = $this->csvgenerator->fetch_data();

        $this->csvgenerator->fetch_data();

        // load page to show all registered risks
        // $this->template->load('dashboard', 'report/filter', $data);

        redirect('dashboard/reports');
        
        // $filter_data = array(
        //     'sub_project' => $this->post('sub_project'),
        //     'main_category' => $this->post('main_category'),
        //     'risk_level' => $this->post('risk_level')
        // );

        // $subproject = $this->post('sub_project');
        // $main_category = $this->post('main_category');
        // $risk_level = $this->post('risk_level');

        // $result = $this->report_model->filter($filter_data);

        // $data = array('result' => $result);
        
        // load page to show all registered risks
        // $this->template->load('dashboard', 'report/filter', $data);

        // // use form data to search database
        // if ($this->report_model->filter($filter_data))
        // {
        //     $this->session->set_flashdata('positive-msg','Risk has been successfully added.');
        //     redirect('dashboard/risks');
        // }
        // else
        // {
        //     // error
        //     $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
        //     redirect('dashboard/risks');
        // }
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
    function getSubProject()
    {
        $subproject = $this->risk_model->getSubProject();
        
        if($subproject)
        {
            $options = array();

            foreach ($subproject as $row) 
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