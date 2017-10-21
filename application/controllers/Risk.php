<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Risk extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('registry_model');
    }


    // controller to view one risk item
    function Single($item_id)
    {
    	$data = array('title' => 'Risk Item');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get risk data
            $risk = $this->registry_model->getRegistry($data['user_id']);

            //check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            // load page to show all registered risks
            $this->template->load('dashboard', 'risk_registry/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
}