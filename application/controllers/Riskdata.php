<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Riskdata extends RISK_Controller
{

    private $risk_data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('riskdata_model');
        $this->load->library('userproject');
        
        // array for risk data tables
        $this->risk_data = array(
            "risk_category" => array("tbl_name"=>"RiskCategories","title"=>"Risk Category"),
            "system_safety" => array("tbl_name"=>"SystemSafety", "title"=>"System Safety"),
            "materialization_phase" => array("tbl_name"=>"MaterializationPhase", "title"=>"Materialization Phase"),
            "realization" => array("tbl_name"=>"Realization", "title"=>"Materialization Phase"),
            "status" => array("tbl_name"=>"Status", "title"=>"Status"),
            "risk_owner" => array("tbl_name"=>"RiskOwner", "title"=>"Risk Owner"),
            "cost_metric" => array("tbl_name"=>"CostMetric", "title"=>"Cost Metric"),
            "schedule_metric" => array("tbl_name"=>"ScheduleMetric", "title"=>"Schedule Metric"),
            "risk_strategy" => array("tbl_name"=>"RiskStrategies", "title"=>"Risk Strategies"),
            "response_title" => array("tbl_name"=>"ResponseTitle", "title"=>"Response Title"),
            "entity" => array("tbl_name"=>"Entity", "title"=>"Entity")
        );
    }

    // first page for risk data settings
    function index()
    {
        
    }

    // view items for the selected risk data type
    function view()
    {   
        if($this->session->userdata('logged_in'))
        {
            // get risk data type from uri 3rd segment
            $data_type = $this->uri->segment(3);

            // get title from uri
            $data = array('title' => $this->risk_data[$data_type]['title']);

            $data['data_type'] = $data_type;

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get project ID from session data
            $session_data = $this->session->userdata('logged_in');

            $data['project_id'] = $session_data['user_project_id'];

            // get info of the risk data type by project ID and table name
            $risk_data_type = $this->riskdata_model->getRiskData($data['project_id'], $this->risk_data[$data_type]['tbl_name']);

            // check if result is true
            ($risk_data_type) ? $data['risk_data'] = $risk_data_type : $data['risk_data'] = false;

            // load page to show selected risk data type
            $this->template->load('dashboard', 'settings/data/view', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // view for registering a new risk data item
    function add_view()
    {

        if($this->session->userdata('logged_in'))
        {
            $data_type = $this->uri->segment(4); // get risk data type from uri 4th segment

            // get title from uri
            $data = array('title' => $this->risk_data[$data_type]['title']);

            // store data type in array
            $data['data_type'] = $data_type;

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // get project ID from session data
            $session_data = $this->session->userdata('logged_in');
            ($session_data['user_project_id']) ? $data['project_id'] = $session_data['user_project_id'] : $data['project_id'] = 1;
 
            $this->template->load('dashboard', 'settings/data/add', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // view for editing a risk data item
    function edit_view()
    {

        if($this->session->userdata('logged_in'))
        {
            $data_type = $this->uri->segment(4); // get risk data type from uri 4th segment

            $data_type_item_id = $this->uri->segment(5); // get risk data type from uri 5th segment

            // get title from uri
            $data = array('title' => 'Edit '.$this->risk_data[$data_type]['title']);

            // store data type in array
            $data['data_type'] = $data_type;

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // get data based on risk data item id and table name
            $data['riskdata'] = $this->riskdata_model->getSingleRiskData($data_type_item_id, $this->risk_data[$data_type]['tbl_name']);
    
            $this->template->load('dashboard', 'settings/data/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // insert item
    function insert()
    {
        $project_id = $this->input->post('project');

        // get data type from hidden field
        $data_type = $this->input->post('data_type');

        // get name of table to be updated
        $tbl_name = $this->risk_data[$data_type]['tbl_name'];

        $data = array(
            'name' => $this->input->post('name'),
            'Project_project_id' => $project_id
        );

        // insert form data into database
        if ($this->riskdata_model->insert($tbl_name, $data))
        {
            $this->session->set_flashdata('positive_msg','You have successfully registered the risk data item!');
            redirect('settings/data/'.$data_type);
        }
        else
        {
            // error
            $this->session->set_flashdata('negative_msg','Oops! Error. Please try again later!');
            redirect('settings/user/add');
        }
    }


    // update risk data type item
    function update()
    {
       
        // get id from hidden field
        $id =  $this->input->post('id');

        // get data type from hidden field
        $data_type = $this->input->post('data_type');

        // get name of table to be updated
        $tbl_name = $this->risk_data[$data_type]['tbl_name'];
        
        $data = array(
            'name' => $this->input->post('name'),
        );

        // update table
        if ($this->riskdata_model->update($data, $id, $tbl_name))
        {
            $this->session->set_flashdata('positive_msg','You have successfully updated the risk data item!');
            redirect('settings/data/edit/'.$data_type.'/'.$id);
        }
        else
        {
            // error
            $this->session->set_flashdata('negative_msg','Oops! Error. Please try again later!');
            redirect('settings/data/edit/'.$data_type.'/'.$id);
        }   
    }

    // delete item
    function delete()
    {
        $data_type = $this->uri->segment(4); // get risk data type from uri 4th segment

        $data_type_item_id = $this->uri->segment(5); // get risk data type from uri 5th segment

        $tbl_name = $this->risk_data[$data_type]['tbl_name'];

        if($this->riskdata_model->delete($data_type_item_id, $tbl_name))
        {
            $this->session->set_flashdata('positive_msg','You have deleted the risk data item successfully!');
            redirect('settings/data/'.$data_type);
        }
        else
        {
            // error
            $this->session->set_flashdata('negative_msg','Oops! Error.  Please try again later!');
            redirect('settings/data/'.$data_type);
        }
    }
}