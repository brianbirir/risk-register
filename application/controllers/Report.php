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
        $this->load->library('Ajax_pagination');
        $this->load->library('pagination');
        $this->load->model('report_model');
        $this->load->model('risk_model');
        $this->load->model('response_model');
        $this->load->model('project_model');
        $this->load->model('user_model');
        $this->perPage = 20;
    }
    
    function index()
    {
        if($this->input->post('risk_project') != 'none')
        {
            $data = array('title' => 'Risk Report');

            // get global data
            $data = array_merge($data,$this->get_global_data());
            
            // breadcrumb
            $this->breadcrumb->add('Select Report','/dashboard/reports/risk_project');
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // init params
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $total_records = count($this->report_model->getRisks(array('user_id'=>$data['user_id'])));

            // load pagination config file
            $this->config->load('pagination', TRUE);
            $settings = $this->config->item('pagination');
            $settings['total_rows'] = $total_records;
            $settings['base_url'] = base_url() . 'report/index';

            if ( $data['role_id'] == 8 ) // if general user
            {
                $register_row = $this->project_model->getAssignedRiskRegisterName( $data['user_id'] );
                $assigned_register_id = $register_row->subproject_id;
                
                // get risk data
                $risk = $this->risk_model->getReportRisks( $data['user_id'], $assigned_register_id );
                ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
            }
            else if( $data['role_id'] == 1 ) // if super admin
            {
                $risk = $this->risk_model->getAllRisks();
                ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
            }
            else 
            {
                // get current page results
                $risk = $this->report_model->getRisks(array('limit'=>$settings['per_page'],'start'=>$start_index,'user_id'=>$data['user_id']));
                ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
            }

            // initialize pagination    
            $this->pagination->initialize($settings);
            // build paging links
            $data["pagination_links"] = $this->pagination->create_links();

            // PROJECT ID
            // add assigned project ID to session data
            $session_data = $this->session->userdata('logged_in');
            
            $session_data['report_project_id'] = $this->input->post('risk_project');

            $single_project = $this->project_model->getSingleProject($this->input->post('risk_project')); // get project name from ID
            $session_data['project_name'] = $single_project->project_name;
            $session_data['register_name'] = null;
            $this->session->set_userdata('logged_in', $session_data);

            // clear session data for filter data
            $this->clear_filter_session();

            // project name
            $data['project_name'] = $single_project->project_name;
            
            // data for filter drop down
            $data['select_category'] = $this->getCategories($this->input->post('risk_project'));
            $data['select_register'] = $this->getSubProject($data['user_id'], $this->input->post('risk_project'));
            $data['selected_category'] = "none"; 
            $data['selected_register'] = "none";
            
            // load view
            $this->template->load('dashboard', 'report/index', $data);
        }
        else
        {
            redirect('/dashboard/reports/risk_project');
        }
    }


    function report_view() 
    { 
        if($this->session->userdata('logged_in')) 
        { 
            $data = array('title' => 'Generate Risk Report'); 
 
            // get global data 
            $data = array_merge($data,$this->get_global_data()); 
             
            // breadcrumb 
            $this->breadcrumb->add('Select Report','/dashboard/reports/risk_project');
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();  
 
            // get current session data 
            $session_data = $this->session->userdata('logged_in'); 
 
            // get data for select fields 
            $data['select_category'] = $this->getCategories($session_data['report_project_id']); 
            $data['select_register'] = $this->getSubProject( $data['user_id'], $session_data['report_project_id'] ); 
            $data['selected_category'] = "none";  
            $data['selected_register'] = "none"; 
 
            // load view 
            $this->template->load('dashboard', 'report/report', $data); 
        } 
        else 
        { 
            // if no session, redirect to login page 
            redirect('login', 'refresh'); 
        } 
    } 
    

    function ajax_report()
    {

        // Data tables POST Variables
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $category = intval($this->input->post("category"));
        $register = intval($this->input->post("register"));
        $date_from = intval($this->input->post("date_from"));
        $date_to = intval($this->input->post("date_to"));
        $order = $this->input->post("order"); // get order array


        // get current session data and assign new sessions data from filter form fields
        $session_data = $this->session->userdata('logged_in');
        $session_data['category_id'] = $this->input->post("category");
        $session_data['register_id'] = $this->input->post("register");
        $session_data['date_from'] = $this->input->post("date_from");
        $session_data['date_to'] = $this->input->post("date_to");

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
            "risk_title",
            "RiskCategories_category_id",
            "cause_trigger",
            "identified_hazard_risk",
            "effect",
            "project_location",
            "description_change",
            "materialization_phase_materialization_id",
            "Subproject_subproject_id",
            "likelihood",
            "time_impact",
            "cost_impact",
            "reputation_impact",
            "hs_impact",
            "env_impact",
            "legal_impact",
            "quality_impact",
            "risk_rating",
            "risk_level",
            "action_owner",
            "action_item",
            "milestone_target_date",
            "Status_status_id"
        );

        if(!isset($columns_valid[$col])) 
        {
           $orderCol = null;
        } 
        else 
        {
           $orderCol = $columns_valid[$col];
        }

        // get user id from session data
        $user_id = $session_data['user_id'];

        // get project id from session data
        $project_id = $session_data['report_project_id'];

        $db_data = array();

        if($session_data['role_name'] == 'Super Administrator')
        {
            // get row results
            $risk_result = $this->report_model->getAjaxRisks(array('start'=>$start,'limit'=>$length,'category_id'=>$category,'register_id'=>$register,'date_from'=>$date_from,'date_to'=>$date_to,'order'=>$orderCol,'sortType'=>$dir));

            // get number of total rows by user ID
            $total_risks = $this->report_model->getTotalRisks(array('category_id'=>$category,'register_id'=>$register,'date_from'=>$date_from,'date_to'=>$date_to));
        }
        else
        {
            // get row results
            $risk_result = $this->report_model->getAjaxRisks(array('project_id'=>$project_id,'start'=>$start,'limit'=>$length,'user_id'=>$user_id,'category_id'=>$category,'register_id'=>$register,'date_from'=>$date_from,'date_to'=>$date_to,'order'=>$orderCol,'sortType'=>$dir));

            // get number of total rows by user ID
            $total_risks = $this->report_model->getTotalRisks(array('project_id'=>$project_id,'user_id'=>$user_id,'category_id'=>$category,'register_id'=>$register,'date_from'=>$date_from,'date_to'=>$date_to));
        }

        if($risk_result)
        {
            foreach ($risk_result as $data_row) {
                $db_data[] = array(
                    $data_row->risk_title,
                    $this->report_model->getRiskCategoriesName($data_row->RiskCategories_category_id), 
                    $data_row->cause_trigger, 
                    $data_row->identified_hazard_risk, 
                    $data_row->effect,
                    $data_row->project_location, 
                    $data_row->description_change, 
                    $this->report_model->getRiskMaterializationName($data_row->materialization_phase_materialization_id),
                    $this->report_model->getSubProjectName($data_row->Subproject_subproject_id),
                    $data_row->likelihood, 
                    $data_row->time_impact, 
                    $data_row->cost_impact, 
                    $data_row->reputation_impact,
                    $data_row->hs_impact, 
                    $data_row->env_impact, 
                    $data_row->legal_impact, 
                    $data_row->quality_impact,
                    $data_row->risk_rating,
                    $data_row->risk_level,
                    $this->user_model->getUserNames($data_row->action_owner),
                    $data_row->action_item,
                    $data_row->milestone_target_date,
                    $this->report_model->getStatusName($data_row->Status_status_id)
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

    // clear session data for filter data
    function clear_filter_session()
    {
        $session_data = $this->session->userdata('logged_in');

        if(isset($session_data['category_id']) || isset($session_data['register_id']) || isset($session_data['date_from']) || isset($session_data['date_to']))
        {
            $session_data['category_id'] = '';
            $session_data['register_id'] = '';
            $session_data['date_from'] = '';
            $session_data['date_to'] = '';
        }
    }


    function getFilterResults()
    {   
        // title
        $data = array('title' => 'Reports');

        // get current session data 
        $session_data = $this->session->userdata('logged_in');
        
        if($this->input->post('btn_filter'))
        {
            // get filter criteria from post input
            $category_id = $this->input->post('risk_category'); // get category id
            $register_id = $this->input->post('risk_register'); // get register
            $date_from = $this->input->post('date_from'); // date from
            $date_to = $this->input->post('date_to'); // date to

            $session_data['category_id'] = $category_id;
            $session_data['register_id'] = $register_id;
            $session_data['date_from'] = $date_from;
            $session_data['date_to'] = $date_to;

            $this->session->set_userdata('logged_in', $session_data);
        }
            // get global data
            $data = array_merge($data,$this->get_global_data());

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // PAGINATION
            // init pagination params
            $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            // $total_records = count($this->report_model->getRisks(array('user_id'=>$data['user_id'])));
            $total_records = $this->report_model->getTotalRisks(array('user_id'=>$session_data['user_id'],'category_id'=>$session_data['category_id'],'register_id'=>$session_data['register_id'],'date_from'=>$session_data['date_from'],'date_to'=>$session_data['date_to']));

            // load pagination configurations
            $this->config->load('pagination', TRUE);
            $settings = $this->config->item('pagination');
            $settings['total_rows'] = $total_records;
            $settings['base_url'] = base_url() . 'report/getFilterResults';

            ($start_index == 0) ? $offset = 0 : $offset = $start_index;

            // get current page results
            $risk = $this->report_model->getRisks(array(
                'limit'=>$settings['per_page'],
                'start'=>$offset,
                'user_id'=>$data['user_id'],
                'category_id'=>$session_data['category_id'],
                'register_id'=>$session_data['register_id'],
                'date_from'=>$session_data['date_from'],
                'date_to'=>$session_data['date_to']
            ));

            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            // data for filter drop down
            $data['select_category'] = $this->getCategories($session_data['report_project_id']);
            $data['selected_category'] = $session_data['category_id'];
            
            $data['select_register'] = $this->getSubProject($data['user_id'], $data['role_id']);
            $data['selected_register'] = $session_data['register_id'];

            // initialize pagination    
            $this->pagination->initialize($settings);
            // build paging links
            $data["pagination_links"] = $this->pagination->create_links();

            // load view
            $this->template->load('dashboard', 'report/index', $data);

    }


    // generate report in CSV format
    function export_report()
    {
        // load csv generator library
        $this->load->library('csvgenerator');
        
        // get current session data 
        $session_data = $this->session->userdata('logged_in');

        $project_id = $session_data['report_project_id'];

        // get filter criteria from post input
        $category_id = $this->input->post('risk_category'); // get category id
        $register_id = $this->input->post('risk_register'); // get register
        $date_from = $this->input->post('date_from'); // date from
        $date_to = $this->input->post('date_to'); // date to

        $data = array(
            'risk_category' => $category_id,
            'risk_register' => $register_id,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'user_id' => $session_data['user_id'],
            'project_id' => $project_id
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
            $this->csvgenerator->fetch_manager_data($data);
        }
        
        redirect('dashboard/report/generate'); 
    }
    

    function ajax_report_export()
    {
        // load csv generator library
        $this->load->library('csvgenerator');

        // get current session data 
        $session_data = $this->session->userdata('logged_in');

        // use filter session values to generate report
        $data = array(
            'risk_category' => $session_data['category_id'],
            'risk_register' => $session_data['register_id'],
            'date_from' => $session_data['date_from'],
            'date_to' => $session_data['date_to'],
            'user_id' => $session_data['user_id']
        );

        $this->csvgenerator->fetch_manager_data($data);
        
        redirect('dashboard/reports/risk_project');
    }


    function export_response_report()
    {
        // load csv generator library
        $this->load->library('csvgenerator');
        
        // get current session data 
        $session_data = $this->session->userdata('logged_in');

        // use filter session values to generate report
        $response_user_id = $session_data['response_user_id'];
        $response_register_id = $session_data['response_register_id'];

        // get global data
        $data = array();
        $data = array_merge($data,$this->get_global_data());

        if ($data['role_id'] == 8)
        {
            // get assigned risk register and its ID
            $register_row = $this->project_model->getAssignedRiskRegisterName($data['user_id']);
            $assigned_register_id = $register_row->subproject_id;
            $this->csvgenerator->fetch_data($user_id, $main_category, $risk_level, $risk_register, $assigned_register_id);
        }
        else
        {
            $this->csvgenerator->fetch_response_data(array(
                'user_id' => $response_user_id,
                'register_id' => $response_register_id
            ));
        }
        
        redirect('dashboard/report/response'); 
    }

    function ajaxPaginationData()
    {
        $data = array();

        // get global data
        $data = array_merge($data,$this->get_global_data());

        // total row counts
        $total_rows = count($this->report_model->getRisks(array('user_id'=>$data['user_id'])));

        $page = $this->input->post('page');
        
        if(!$page)
        {
            $offset = 0;
        }
        else
        {
            $offset = $page;
        }
        
        
        //pagination configuration
        $config['target']      = '#report-data';
        $config['base_url']    = base_url().'report/ajaxPaginationData';
        $config['total_rows']  = $total_rows;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        //get the risk data
        $risk = $this->report_model->getRisks(array('start'=>$offset,'limit'=>$this->perPage, 'user_id'=>$data['user_id']));
            
        // check if result is true
        ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
        
        //load the view
        $this->load->view('report/ajax_pagination_data', $data, false);
    }


    // view to select project
    function select_project()
    {
        $data = array('title' => 'Select Report');
        
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
            $this->template->load('dashboard', 'report/select_project', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // view to select project
    function select_response_project()
    {
        $data = array('title' => 'Response Report');
        
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
                $data['select_project'] = $this->getProject(array("user_id"=>$data['user_id']));
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


    // generate and export report
    function export()
    {   
        $this->load->library('csvgenerator');
        $data = array('title' => 'Reports');

        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();
        
        // get global data
        $data = array_merge($data,$this->get_global_data());
        
        // get user id from session data                
        $user_id = $data['user_id'];

        // get project ID
        $data['risk_project_id'] = $this->input->post('risk_project');

        // validation succeeds
        if ($this->input->post('btn_filter') == "Filter")
        {
          
            if($this->session->userdata('logged_in'))
            {
                $risk_register = $this->input->post('risk_register');
                $main_category = $this->input->post('main_category');
                $risk_level = $this->input->post('risk_level');
                //$date_from = $this->input->post('date_from');
                //$date_to = $this->input->post('date_to');

                $data['risk_register'] = $risk_register;
                $data['main_category'] = $main_category;
                $data['risk_level'] = $risk_level;
                //$data['date_from'] = $date_to;
                //$data['date_to'] = $date_from;


                if ( $data['role_id'] != 8 )
                {
                    // get filtered data
                    $filtered_risk_data = $this->report_model->getManagerFilteredRisk( $main_category, $risk_level, $risk_register );

                    // check if result is true
                    ( $filtered_risk_data ) ? $data['risk_data'] = $filtered_risk_data : $data['risk_data'] = false;
    
                    // select drop down
                    $data['select_category'] = $this->getCategories( $data['risk_project_id'] );
                    $data['select_subproject'] = $this->getSubProject( $data['user_id'], $data['role_id'] );
        
                    // load page to show filtered registered risks
                    $this->template->load('dashboard', 'report/index', $data);
                }
                else
                {
                    // get assigned risk register and its ID
                    $register_row = $this->project_model->getAssignedRiskRegisterName( $data['user_id'] );
                    $assigned_register_id = $register_row->subproject_id;

                    // get filtered data
                    $filtered_risk_data = $this->report_model->getFilteredRisk( $user_id, $main_category, $risk_level, $risk_register, $assigned_register_id );

                    // check if result is true
                    ( $filtered_risk_data ) ? $data['risk_data'] = $filtered_risk_data : $data['risk_data'] = false;
        
                    // select drop down
                    $data['select_category'] = $this->getCategories($data['risk_project_id']);
                    $data['select_subproject'] = $this->getSubProject( $data['user_id'], $data['role_id'] );
        
                    // load page to show filtered registered risks
                    $this->template->load('dashboard', 'report/index', $data);

                    //$this->session->set_flashdata('positive-msg','You have successfully registered the subproject! Please login.');

                    //redirect('dashboard/reports');
                }
            }
            else
            {
                // if no session, redirect to login page
                redirect('login', 'refresh');
            }
        } 
        else
        {
            $risk_register = $this->input->post('risk_register');
            $main_category = $this->input->post('main_category');
            $risk_level = $this->input->post('risk_level');

            // get assigned risk register and its ID
            $register_row = $this->project_model->getAssignedRiskRegisterName( $data['user_id'] );
            $assigned_register_id = $register_row->subproject_id;


            if ($data['role_id'] == 8)
            {
                $this->csvgenerator->fetch_data( $user_id, $main_category, $risk_level, $risk_register, $assigned_register_id );
            }
            else
            {
                $this->csvgenerator->fetch_manager_data( $main_category, $risk_level, $risk_register );
            }
            
            redirect('dashboard/reports/project');   
        }
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
                $category_id = $row->id;
                $category_name = $row->name;
                $options[$category_id] = $category_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }

    function getAjaxCategories($project_id)
    {
        $categories = $this->risk_model->getRiskCategories($project_id);
        
        if($categories)
        {
            $options = array();

            foreach ($categories as $row) 
            {
                $category_id = $row->category_id;
                $category_name = $row->category_name;
                $options[$category_name] = $category_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }

    // get risk register by project ID
    function getSubProject( $user_id, $project_id )
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
    
    // get users
    function getGeneralUsers($user_id, $role_id)
    {
        if ( $role_id == 8 ) 
        {
            $user = $this->user_model->getUsers( $user_id );
        }
        else
        {
            $user = $this->user_model->getUsers( $user_id );
        }
        
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


    // responses report view
    function response_view()
    {
        $data = array('title' => 'Response Report');

        // get global data
        $data = array_merge($data,$this->get_global_data());

        // breadcrumb
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
            // $risk = $this->response_model->getRisks(array('limit'=>$settings['per_page'],'start'=>$start_index,'user_id'=>$data['user_id']));
            $response = $this->response_model->getAllResponses(array());
            ($response) ? $data['response_data'] = $response : $data['response_data'] = false;
        }

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
        $session_data['response_user_id'] = 'None';
        $session_data['response_register_id'] = 'None';

        // set session data
        $this->session->set_userdata('logged_in', $session_data);

        // data for filter drop down
        $data['select_register'] = $this->getSubProject( $data['user_id'], $data['role_id'] ); // risk register
        $data['selected_user'] = "None"; 
        $data['selected_register'] = "None";
        $data['select_user'] = $this->getGeneralUsers($data['user_id'], $data['role_id']); // user

        // load view
        $this->template->load('dashboard', 'report/response', $data);
    }

    
    function getResponseFilterResults()
    {   
        // title
        $data = array('title' => 'Reponse Report');

        // get current session data 
        $session_data = $this->session->userdata('logged_in');
        
        if($this->input->post('btn_filter'))
        {
            // get filter criteria from post input
            $user_id = $this->input->post('general_user'); // get user id
            $register_id = $this->input->post('risk_register'); // get register id
            $session_data['response_user_id'] = $user_id;
            $session_data['response_register_id'] = $register_id;
            $this->session->set_userdata('logged_in', $session_data);
        }

        // get global data
        $data = array_merge($data,$this->get_global_data());

        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();

        // PAGINATION
        // init pagination params
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = count($this->response_model->getResponseByUser(array('user_id'=>$data['user_id'])));

        // load pagination configurations
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['total_rows'] = $total_records;
        $settings['base_url'] = base_url() . 'report/getResponseFilterResults';

        ($start_index == 0) ? $offset = 0 : $offset = $start_index;

        // get current page results
        $response = $this->response_model->getResponses(array(
            'limit'=>$settings['per_page'],
            'start'=>$offset,
            'user_id'=>$data['user_id'],
            'user_id'=>$session_data['response_user_id'],
            'register_id'=>$session_data['response_register_id']
        ));

        ($response) ? $data['response_data'] = $response : $data['response_data'] = false;

        // data for filter drop down
        $data['select_user'] = $this->getGeneralUsers($data['user_id'], $data['role_id']);;
        $data['selected_user'] = $session_data['response_user_id'];
        
        $data['select_register'] = $this->getSubProject($data['user_id'], $data['role_id']);
        $data['selected_register'] = $session_data['response_register_id'];

        // initialize pagination    
        $this->pagination->initialize($settings);
        
        // build paging links
        $data["pagination_links"] = $this->pagination->create_links();

        // load view
        $this->template->load('dashboard', 'report/response', $data);
    }


    // get associated risks of the response
    function associated_risks()
    {
        $data = array('title' => 'Response Associated Risks');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $response_title_id = $this->uri->segment(4); // get id from fourth segment of uri

            // get risk items
            $risk_items = $this->response_model->getResponseRisks($response_title_id);

            //check if result is true
            ($risk_items) ? $data['risk_items'] = $risk_items : $data['risk_items'] = false;

            $data['response_title_id'] = $response_title_id;

            // load page to show all response
            $this->template->load('dashboard', 'report/response_risks', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
}