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
        $this->load->model('registry_model');
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

            // get numbers
            $data['subproject_numbers'] = $this->project_model->getSubProjectNumbers();
            $data['risk_numbers'] = $this->registry_model->getRiskNumbers();
            $data['project_numbers'] = $this->project_model->getProjectNumbers();

            $this->template->load('dashboard', 'dashboard/index', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
}