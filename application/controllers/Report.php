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
        $this->load->model('project_model');
        $this->perPage = 20;
    }


    // view for report page
    function test1()
    {
        $data = array('title' => 'Reports');

        // total row counts
        $total_rows = count($this->report_model->getRisks());


        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'posts/ajaxPaginationData';
        $config['total_rows']  = $total_rows;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();
        
        // get global data
        $data = array_merge($data,$this->get_global_data());

        // get project ID
        $data['risk_project_id'] = $this->input->post('risk_project');

        // get risk register id
        // if general user
        if ( $data['role_id'] == 8 ) 
        {
            $register_row = $this->project_model->getAssignedRiskRegisterName( $data['user_id'] );
            $assigned_register_id = $register_row->subproject_id;
            
            // get risk data
            $risk = $this->risk_model->getReportRisks( $data['user_id'], $assigned_register_id );

            // check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
        }
        else if( $data['role_id'] == 1 ) // if manager or super admin
        {
            $risk = $this->risk_model->getAllRisks();
            
            // check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
        }
        else
        {
            // $risk = $this->risk_model->getRisks( $data['user_id'] );

            //get the risk data
            $risk = $this->report_model->getRisks(array('limit'=>$this->perPage, 'user_id'=>$data['user_id']));
            
            // check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
        }

        // add project ID to session logged in data
        $session_data = $this->session->userdata('logged_in');
        $session_data['report_project_id'] = $data['risk_project_id'];
        $this->session->set_userdata('logged_in', $session_data); 

        // select drop down
        $data['select_category'] = $this->getCategories( $data['risk_project_id'] );
        $data['select_subproject'] = $this->getSubProject( $data['user_id'], $data['role_id'] );

        $this->template->load('dashboard', 'report/index', $data);
    }


    function test()
    {
        $data = array('title' => 'Reports');

        // get global data
        $data = array_merge($data,$this->get_global_data());

        // total row counts
        $total_rows = count($this->report_model->getRisks(array('user_id'=>$data['user_id'])));


        //pagination configuration
        $config['target']      = '#report-data';
        $config['base_url']    = base_url().'report/ajaxPaginationData';
        $config['total_rows']  = $total_rows;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();

        // if general user
        if ( $data['role_id'] == 8 ) 
        {
            $register_row = $this->project_model->getAssignedRiskRegisterName( $data['user_id'] );
            $assigned_register_id = $register_row->subproject_id;
            
            // get risk data
            $risk = $this->risk_model->getReportRisks( $data['user_id'], $assigned_register_id );

            // check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
        }
        else if( $data['role_id'] == 1 ) // if manager or super admin
        {
            $risk = $this->risk_model->getAllRisks();
            
            // check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
        }
        else
        {
            //get the risk data
            $risk = $this->report_model->getRisks(array('limit'=>$this->perPage,'user_id'=>$data['user_id']));
            
            // check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
        }

        $this->template->load('dashboard', 'report/test', $data);
    }

    function index()
    {
        $data = array('title' => 'Reports');

        // get global data
        $data = array_merge($data,$this->get_global_data());
        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();

        // init params
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = count($this->report_model->getRisks(array('user_id'=>$data['user_id'])));

        // load pagination config file
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['total_rows'] = $total_records;
        $settings['base_url'] = base_url() . 'report/test1';

        if ( $data['role_id'] == 8 ) 
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
            $risk = $this->report_model->getRisks(array('limit'=>$settings['per_page'],'start'=>$start_index,'user_id'=>$data['user_id']));
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
        }

        // initialize pagination    
        $this->pagination->initialize($settings);
            
        // build paging links
        $data["pagination_links"] = $this->pagination->create_links();

        // load view
        $this->template->load('dashboard', 'report/index', $data);
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


    function report_view()
    {
        $data = array('title' => 'Reports');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get risk register id
            // if general user
            if ( $data['role_id'] == 8 ) 
            {
                $register_row = $this->project_model->getAssignedRiskRegisterName( $data['user_id'] );
                $assigned_register_id = $register_row->subproject_id;
                
                // get risk data
                $risk = $this->risk_model->getReportRisks( $data['user_id'], $assigned_register_id );

                // check if result is true
                ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
            }
            else // if manager or super admin
            {
                $risk = $this->risk_model->getAllRisks();
                // check if result is true
                ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;
            }
            
            // select drop down
            $data['select_category'] = $this->getCategories($data['risk_project_id']);
            $data['select_subproject'] = $this->getSubProject( $data['user_id'], $data['role_id'] );

            // load page to show all registered risks
            $this->template->load('dashboard', 'report/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // view to select project
    function select_project()
    {
        $data = array('title' => 'Risk Report');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge( $data, $this->get_global_data() );

            // get project data
            $data['select_project'] = $this->getProject( $data['user_id'], $data['role_id'] );

            // load page to show all status
            $this->template->load('dashboard', 'report/select_project', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // get project
    function getProject( $user_id, $role_id )
    {
        if ($role_id == 8)
        {
            $project = $this->project_model->getAssignedProject( $user_id );
        }
        else
        {
            $project = $this->project_model->getProjects( $user_id );
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
        // load InfluxDB Client library
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


    // risk strategies
    function getRiskStrategies()
    {
        $strategies = $this->risk_model->getRiskStrategies();
        
        if($strategies)
        {
            $options = array();

            foreach ($strategies as $row) 
            {
                $strategy_id = $row->strategy_id;
                $strategy_name = $row->strategy_name;
                $options[$strategy_id] = $strategy_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }


    // status
    function getStatus()
    {
        $status = $this->risk_model->getStatus();
        
        if($status)
        {
            $options = array();

            foreach ($status as $row) 
            {
                $status_id = $row->status_id;
                $status_name = $row->status_name;
                $options[$status_id] = $status_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }


    // safety
    function getSystemSafety()
    {
        $safety = $this->risk_model->getSystemSafety();
        
        if($safety)
        {
            $options = array();

            foreach ($safety as $row) 
            {
                $safety_id = $row->safety_id;
                $safety_name = $row->safety_name;
                $options[$safety_id] = $safety_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }

    // realization
    function getRealization()
    {
        $realization = $this->risk_model->getRealization();
        
        if($realization)
        {
            $options = array();

            foreach ($realization as $row) 
            {
                $realization_id = $row->realization_id;
                $realization_name = $row->realization_name;
                $options[$realization_id] = $realization_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
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

    // risk registers
    function getSubProject( $user_id, $role_id )
    {
        if ( $role_id == 8 ) 
        {
            $risk_register = $this->project_model->getAssignedRiskRegisters( $user_id );
        }
        else
        {
            $risk_register = $this->project_model->getReportRiskRegisters( $user_id );
        }
        
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
}