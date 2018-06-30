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
            "risk_subcategory" => array("tbl_name"=>"RiskSubCategories","title"=>"Risk Sub-Category"),
            "system_safety" => array("tbl_name"=>"SystemSafety", "title"=>"System Safety"),
            "materialization_phase" => array("tbl_name"=>"MaterializationPhase", "title"=>"Materialization Phase"),
            "realization" => array("tbl_name"=>"Realization", "title"=>"Materialization Phase"),
            "status" => array("tbl_name"=>"Status", "title"=>"Status"),
            "risk_owner" => array("tbl_name"=>"RiskOwner", "title"=>"Risk Owner"),
            "cost_rating" => array("tbl_name"=>"CostMetric", "title"=>"Cost Metric"),
            "schedule_rating" => array("tbl_name"=>"ScheduleMetric", "title"=>"Schedule Metric"),
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
        $timestamp = date('Y-m-d');

        // get data type from hidden field
        $data_type = $this->input->post('data_type');

        // get name of table to be updated
        $tbl_name = $this->risk_data[$data_type]['tbl_name'];

        if($data_type == 'cost_rating' || $data_type == 'schedule_rating')
        {
            $data = array(
                'rating' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'Project_project_id' => $project_id,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
        }
        else
        {
            $data = array(
                'name' => $this->input->post('name'),
                'Project_project_id' => $project_id,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
        }

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

    // insert item via AJAX post
    function ajax_insert()
    {
        // values to be inserted into table
        $project_id = $this->input->post('project_id');
        $data_name = $this->input->post('data_name');
        $data_description = $this->input->post('data_desc');
        $timestamp = date('Y-m-d');
        $db_response = array();

        // ajax response
        $response = array();

        // data type to determine table type
        $data_type = $this->input->post('data_type');

        // get name of table to be updated
        $tbl_name = $this->risk_data[$data_type]['tbl_name'];

        if($data_type == 'cost_rating' || $data_type == 'schedule_rating')
        {
            $data = array(
                'rating' => $data_name,
                'description' => $data_description,
                'Project_project_id' => $project_id,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
        }
        else
        {
            $data = array(
                'name' => $data_name,
                'Project_project_id' => $project_id,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
        }

        // insert form data into database
        if ($this->riskdata_model->insert($tbl_name, $data))
        {   
            // get row count
            $row_count = $this->riskdata_model->getTotalRiskData($project_id, $tbl_name);

            $db_response['data_count'] = $row_count;
            
            echo json_encode($db_response);
        }
        else
        {
            echo json_encode($response['value'] = false);
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


    // get number of project settings
    function getNumberofProjectSettings()
    {   
        // initialize array
        $num_rows = array();

        // get POST values
        $project_settings_list = $this->input->post('project_settings_list');
        $project_id = $this->input->post('project_id');

        // loop through settings array list
        for ($i=0; $i < count($project_settings_list); $i++) 
        { 
            $setting = str_replace("-link","",$project_settings_list[$i]);

            // get number of rows and add to array
            array_push($num_rows, $this->riskdata_model->getNumberOfProjectSettings($project_id, $setting));
        }

        // return as array
        echo json_encode($num_rows);

        exit();
    }


    function getAjaxProjectSettings()
    {
        // Data tables POST Variables
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $tbl_name = str_replace("-link","",$this->input->post("project_setting"));
        $project_id = intval($this->input->post("project_id"));
        $order = $this->input->post("order");

        // ordering configuration
        $col = 0;
        $dir = "";

        if(!empty($order)) 
        {
            foreach($order as $o) 
            {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }

        if($dir != "asc" && $dir != "desc") 
        {
            $dir = "asc";
        }

        $columns_valid = array("id","name");

        if(!isset($columns_valid[$col])) 
        {
           $orderCol = null;
        } 
        else 
        {
           $orderCol = $columns_valid[$col];
        }

        // initialize array for table data
        $db_data = array();

        $result = $this->riskdata_model->getRiskData($project_id,$tbl_name);
        $total = $this->riskdata_model->getTotalRiskData($project_id,$tbl_name);

        if($result)
        {

            if($tbl_name == 'CostMetric' || $tbl_name == 'ScheduleMetric')
            {
                foreach ($result as $data_row) 
                {
                    $db_data[] = array(
                        $data_row->id,
                        $data_row->rating
                    );
                }
            }
            else
            {
                foreach ($result as $data_row) 
                {
                    $db_data[] = array(
                        $data_row->id,
                        $data_row->name
                    );
                }
            }
    
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $total,
                "recordsFiltered" => $total,
                "data" => $db_data
            );
        }
        else
        {
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $total,
                "recordsFiltered" => $total,
                "data" => ""
            );
        }

        echo json_encode($output);
        exit();
    }
}