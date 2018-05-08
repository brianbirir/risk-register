<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Response extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('responsetitle_model');
        $this->load->library('userproject');
    }

    function ajax_response()
    {
    
        $timestamp = date('Y-m-d');

        $db_response = array();
        
        $data = array(
            'name' => $this->input->post('response_name'),
            'Project_project_id' => $this->input->post('project_name'),
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        );

        $insert_data = $this->responsetitle_model->insertResponse($data);

        if ($insert_data)
        {  
            $this->load->model('response_model');

            $response = $this->response_model->getResponseTitle($data['Project_project_id']);
            
            if($response)
            {
                $options = array();

                foreach ($response as $row) 
                {
                    $response_id = $row->id;
                    $response_name = $row->name;
                    $options[$response_id] = $response_name;  
                }
                echo json_encode($options);
            }
        } 
    }
}