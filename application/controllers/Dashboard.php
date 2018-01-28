<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends RISK_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('risk_model');
        $this->load->model('project_model');
    }

    // dashboard home page
    function index()
    {
        $data = array('title' => 'Dashboard');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data and merge with new array
            $data = array_merge($data,$this->get_global_data());

            if ($data['role_id'] == 8)
            {
                // get assigned risk register ID
                $register_row = $this->project_model->getAssignedRiskRegisterName( $data['user_id'] );
                $assigned_register_id = $register_row->subproject_id;

                // get numbers
                $data['subproject_numbers'] = $this->project_model->getUserRegisterNumbers( $data['user_id'] );
                $data['risk_numbers'] = $this->risk_model->getUsersRiskNumbers( $data['user_id'], $assigned_register_id );
                $data['project_numbers'] = $this->project_model->getUserProjectNumbers( $data['user_id'] );
            }
            else if ( $data['role_id'] == 1 )
            {
                // get numbers
                $data['subproject_numbers'] = $this->project_model->getAllRegisterNumbers();
                $data['risk_numbers'] = $this->risk_model->getAllRiskNumbers();
                $data['project_numbers'] = $this->project_model->getAllProjectNumbers();
            }
            else
            {
                // get numbers
                $data['subproject_numbers'] = $this->project_model->getRegisterNumbers( $data['user_id'] );
                $data['risk_numbers'] = $this->risk_model->getRiskNumbers( $data['user_id'] );
                $data['project_numbers'] = $this->project_model->getProjectNumbers( $data['user_id'] );
            }
            

            $this->template->load('dashboard', 'dashboard/index', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // dashboard settings page
    function settings()
    {
        $data = array('title' => 'Settings');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data and merge with new array
            $data = array_merge($data,$this->get_global_data());

            $this->template->load('dashboard', 'settings/index', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
}