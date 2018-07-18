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

            // set project name, register name and project ID to null
            $session_data = $this->session->userdata('logged_in');
            $session_data['user_project_id'] = null; // project ID set to null on project index page
            $session_data['project_name'] = null;// project name set to null on project index page
            $session_data['register_name'] = null; // set register name to null when selecting project
            $this->session->set_userdata('logged_in', $session_data);

            if ($data['role_id'] == 8)
            {
                // get numbers
                $data['subproject_numbers'] = $this->project_model->getUserRegisterNumbers( $data['user_id'] );
                $data['risk_numbers'] = $this->risk_model->getUsersRiskNumbers( $data['user_id']);
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
                $data['subproject_numbers'] = $this->project_model->getRegisterNumbers( array('user_id'=>$data['user_id']) );
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