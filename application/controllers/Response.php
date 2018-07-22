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
        $this->load->model('project_model');
        $this->load->model('response_model');
        $this->load->model('risk_model');
        $this->load->model('user_model');
        $this->load->library('userproject');
        $this->load->library('pagination');
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


    // view to select project
    function select_project()
    {
        $data = array('title' => 'Responses - Select Project');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge( $data, $this->get_global_data() );

            // get project data based on role type
            if($data['role_name'] == "Super Administrator") // super admin should see all projects
            {
                $data['select_project'] = $this->getProject(array());
            }
            else
            {
                $data['select_project'] = $this->getProject(array("user_id"=>$data['user_id'], "role_name"=>$data['role_name']));
            }

            // load page to show all status
            $this->template->load('dashboard', 'report/select_response_project', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // responses report view
    function index()
    {
        if ($this->input->post('risk_project') != 'none') 
        {
            $data = array('title' => 'Response Report');

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // breadcrumb
            $this->breadcrumb->add('Responses - Select Project','/dashboard/reports/response_project');
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // init params
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $total_records = count($this->response_model->getResponseByUser(array('user_id'=>$data['user_id'])));

            // load pagination config file
            $this->config->load('pagination', TRUE);
            $settings = $this->config->item('pagination');
            $settings['total_rows'] = $total_records;
            $settings['base_url'] = base_url() . 'report/response';

            // initialize pagination    
            $this->pagination->initialize($settings);

            // build paging links
            $data["pagination_links"] = $this->pagination->create_links();

            // PROJECT ID
            // add assigned project ID to session data
            $risk_project_id = $this->input->post('risk_project');
            $session_data = $this->session->userdata('logged_in');
            $session_data['report_project_id'] = $risk_project_id;

            // initialize session data for response user id and response register id
            $session_data['response_user_id'] = 'none';
            $session_data['response_register_id'] = 'none';

            // set project name for session
            $single_project = $this->project_model->getSingleProject($this->input->post('risk_project')); // get project name from ID
            $session_data['project_name'] = $single_project->project_name;

            // set session data
            $this->session->set_userdata('logged_in', $session_data);

            if ( $data['role_id'] == 8 ) // if general user
            {
                $register_row = $this->project_model->getAssignedRiskRegisterName( $data['user_id'] );
                $assigned_register_id = $register_row->subproject_id;
                
                // get risk data
                $risk = $this->risk_model->getReportRisks( $data['user_id'], $assigned_register_id );
                ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
            }
            else if( $data['role_id'] == 1 ) // if manager or super admin
            {
                $risk = $this->risk_model->getAllRisks();
                ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
            }
            else 
            {
                // get current page results
                $response = $this->response_model->getResponseByProject(array('project_id'=> $session_data['report_project_id']));
                ($response) ? $data['response_data'] = $response : $data['response_data'] = false;
            }

            // data for filter drop down
            $data['select_register'] = $this->getSubProject($session_data['report_project_id']); // get register by project id
            $data['selected_user'] = "none"; 
            $data['selected_register'] = "none";
            $data['select_user'] = $this->getGeneralUsers($data['user_id']); // user

            // load view
            $this->template->load('dashboard', 'report/response', $data);
        }
        else
        {
            redirect('/dashboard/reports/response_project');
        }
    }

    // get project
    function getProject($params = array())
    {
        if(array_key_exists("user_id",$params))
        {   
            if($params['role_name'] == 'Program Manager' || $params['role_name'] == 'Project Manager')
            {
                // get all projects by user ID if user is manager
                $owned_projects = $this->project_model->getOwnedProjects($params['user_id']);
                $assigned_projects = $this->project_model->getProjects($params['user_id']);

                $project = array();

                // check first if user owns a project and then add them to an associative array key
                if($owned_projects)
                {
                    $project = $owned_projects;
                }
                else if($owned_projects && $assigned_projects)
                {
                    $project = $owned_projects;
                    array_push($project, $assigned_projects);
                }
                else if($assigned_projects)
                {       
                    $project = $assigned_projects;
                }
                else
                {
                    $project = false;
                }
            } 
            else
            {
                // get all projects by user ID if user is general user
                $project = $this->project_model->getAssignedProject($params['user_id']);
            } 
        }
        else
        {
            // get all projects if user is super admin
            $project = $this->project_model->getAllProjects();
        }
        
        if($project)
        {
            $options = array();

            foreach ($project as $row) 
            {
                $project_id = $row->project_id;
                $project_name = $row->project_name;
                $options[$project_id] = $project_name;  
            }
            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }


    // get risk register by project ID
    function getSubProject($project_id )
    {
        $risk_register = $this->project_model->getRiskRegisters(array('project_id'=>$project_id));

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
    
    // get general users
    function getGeneralUsers($user_id)
    {
        $user = $this->user_model->getProjectGeneralUsers( $user_id );
        
        if( $user )
        {
            $options = array();

            foreach ( $user as $row ) 
            {
                $user_id = $row->user_id;
                $user_fname = $row->first_name;
                $user_lname = $row->last_name;
                $options[$user_id] = $user_fname ." ".$user_lname;  
            }

            return $options;
        }
        else
        {
            return 'No Data!';
        }
    }

    // get response report values via AJAX
    function ajax_report()
    {

        // Data tables POST Variables
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $user = intval($this->input->post("user"));
        $register = intval($this->input->post("register"));
        $order = $this->input->post("order"); // get order array

        // get current session data and assign new sessions data from filter form fields
        $session_data = $this->session->userdata('logged_in');
        $session_data['response_user_id'] = $this->input->post("user");
        $session_data['response_register_id'] = $this->input->post("register");

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

        $columns_valid = array(
            "response_id",
            "risk_uuid",
            "ResponseTitle_id",
            "RiskStrategies_strategy_id",
            "user_id",
            "register_id",
            "due_date",
            "associated_risk"
        );

        if(!isset($columns_valid[$col])) 
        {
           $orderCol = null;
        } 
        else 
        {
           $orderCol = $columns_valid[$col];
        }

        // get project id from session data
        $project_id = $session_data['report_project_id'];

        $db_data = array();

        // get responses from database
        $response = $this->response_model->getResponseByProject(array('project_id'=> $session_data['report_project_id'],'register'=>$register,'user'=>$user, 'order'=>$orderCol,'sortType'=>$dir));

        // get number of total rows by project ID
        $total_risks = $this->response_model->getTotalResponsesByProject(array('project_id'=> $session_data['report_project_id'],'register'=>$register,'user'=>$user));

        if($response)
        {
            foreach ($response as $data_row) {

                // construct button for viewing risks associated with the response
                $view_button = "<a href='/dashboard/response/risks/".$data_row->ResponseTitle_id."' class='btn btn-xs btn-primary btn-view'>View Risks</a></td>";

                $view_button = (string) $view_button;

                // construct list of response users from blob
                $response_assigned_users = unserialize($data_row->user_id);
                
                $response_users_html = '';
                                         
                foreach ($response_assigned_users as $db_value)  
                { 
                    $response_users_html .= '<span class="label label-success">'.$this->user_model->getUserNames($db_value).'</span>'; 
                }

                $db_data[] = array(
                    $data_row->response_id,
                    $this->risk_model->getRiskNameByUUID($data_row->risk_uuid),
                    $this->response_model->getResponseName($data_row->ResponseTitle_id),
                    $this->risk_model->getRiskStrategiesName($data_row->RiskStrategies_strategy_id),
                    $response_users_html,
                    $this->risk_model->getSubProjectName($data_row->register_id),
                    $data_row->due_date,
                    $view_button
                );
            }
    
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $total_risks,
                "recordsFiltered" => $total_risks,
                "data" => $db_data
            );
        }
        else
        {
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $total_risks,
                "recordsFiltered" => $total_risks,
                "data" => ""
            );
        }

        echo json_encode($output);
        exit();
        
    }


    function report_view() 
    { 
        if($this->session->userdata('logged_in')) 
        { 
            $data = array('title' => 'Generate Response Report'); 
 
            // get global data 
            $data = array_merge($data,$this->get_global_data()); 
             
            // breadcrumb 
            $this->breadcrumb->add('Responses - Select Project','/dashboard/reports/response_project');
            $this->breadcrumb->add($data['title']); 
            $data['breadcrumb'] = $this->breadcrumb->output(); 
 
            // get current session data 
            $session_data = $this->session->userdata('logged_in'); 

            // data for filter drop down
            $data['select_register'] = $this->getSubProject($session_data['report_project_id']); // get register by project id
            $data['selected_user'] = "none"; 
            $data['selected_register'] = "none";
            $data['select_user'] = $this->getGeneralUsers($data['user_id'], $data['role_id']); // user
 
            // load view 
            $this->template->load('dashboard', 'report/generate_response_report', $data); 
        } 
        else 
        { 
            // if no session, redirect to login page 
            redirect('login', 'refresh'); 
        } 
    }

    // generate response report in CSV format
    function export_report()
    {
        // load csv generator library
        $this->load->library('csvgenerator');
        
        // get current session data 
        $session_data = $this->session->userdata('logged_in');

        // get filter criteria from post input
        $data = array(
            'risk_register' => $this->input->post('risk_register'),
            'user_id' => $this->input->post('general_user'),
            'project_id' => $session_data['report_project_id']
        );

        if ($session_data['role_id'] == 8)
        {
            // get assigned risk register and its ID
            $register_row = $this->project_model->getAssignedRiskRegisterName($data['user_id']);
            $assigned_register_id = $register_row->subproject_id;
            $this->csvgenerator->fetch_data( $user_id, $main_category, $risk_level, $risk_register, $assigned_register_id );
        }
        else
        {
            if($this->csvgenerator->fetch_response_data($data))
            {
                redirect('dashboard/report_response/generate'); 
            }
            else
            {
                // error
                $this->session->set_flashdata('negative_msg','Sorry. No report or data for the selected data filter!');
                redirect('dashboard/reports/response_project');
            }
        }       
    }
}