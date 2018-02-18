<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Test extends RISK_Controller
{  
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->library('Ajax_pagination');
        $this->load->library('pagination');
        $this->load->model('report_model');
        $this->load->model('risk_model');
        $this->load->model('project_model');
        $this->perPage = 20;
    }

    function index()
    {
        redirect('test/load_data');
    }


    function load_data($row_no=0)
    {
        $data = array('title' => 'Reports');

        // filter data
        $category_id = '';

        // set category id in session
        if($this->input->post('submit') != NULL )
        {
            $category_id = $this->input->post('risk_category');
            $session_data = $this->session->userdata('logged_in');
            $session_data['risk_category_id'] = $category_id;
            $this->session->set_userdata('logged_in', $session_data); 
        }
        else
        {
            if($this->session->userdata('risk_category') != NULL)
            {
              $category_id = $this->session->userdata('risk_category');
            }
        }

        // get global data
        $data = array_merge($data,$this->get_global_data());
        
        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();

        // init params for pagination
        // $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->report_model->getRecordCount($category_id, $data['user_id']);

        // load pagination config file
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['total_rows'] = $total_records;
        $settings['base_url'] = base_url() . 'test/load_data';

        // Row position
        if($row_no != 0){
            $row_no = ($row_no-1) * $settings['per_page'];
        }
        
        // get current page results
        $risk = $this->report_model->getRisks($row_no,$settings['per_page'],$data['user_id']);

        ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

        // initialize pagination    
        $this->pagination->initialize($settings);
            
        // build paging links
        $data["pagination_links"] = $this->pagination->create_links();

        // get project ID and add to session logged in data
        // $data['risk_project_id'] = $this->input->post('risk_project');
        $data['risk_project_id'] = 7;
        $session_data = $this->session->userdata('logged_in');
        $session_data['report_project_id'] = $data['risk_project_id'];
        $this->session->set_userdata('logged_in', $session_data); 

        // select drop down data
        $data['select_category'] = $this->getCategories( $data['risk_project_id'] );
        // $data['select_subproject'] = $this->getSubProject( $data['user_id'], $data['role_id'] );

        // load view
        $this->template->load('dashboard', 'report/index', $data);
    }

    // categories
    function getCategories($project_id)
    {
        $categories = $this->risk_model->getRiskCategories($project_id);
        
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
}