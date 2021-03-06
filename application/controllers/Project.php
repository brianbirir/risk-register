<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends RISK_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('project_model');
        $this->load->model('risk_model');
        $this->load->model('team_model');
        $this->load->model('riskdata_model');
        $this->load->library('breadcrumb');
        $this->load->library('userproject');
    }


    // view all projects owned by a particular user
    function index()
    {
        $data = array('title' => 'Projects');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // set project name, register name and project ID to null
            $session_data = $this->session->userdata('logged_in');
            $session_data['user_project_id'] = null; // project ID set to null on project index page
            $session_data['project_name'] = null;// project name set to null on project index page
            $session_data['register_name'] = null; // set register name to null when selecting project
            $this->session->set_userdata('logged_in', $session_data);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            if ($data['role_id'] == 8)
            {
                $project = $this->project_model->getAssignedProject($data['user_id']);

                //check if result is true
                ($project) ? $data['project_data'][] = $project : $data['project_data'][] = false;
            }
            else if ( $data['role_id'] == 1 )
            {
                $project = $this->project_model->getAllProjects();

                //check if result is true
                ($project) ? $data['project_data'][] = $project : $data['project_data'][] = false;
            }
            else
            {
                $owned_projects = $this->project_model->getOwnedProjects($data['user_id']);
                $assigned_projects = $this->project_model->getProjects($data['user_id']);

                // check first if user owns a project
                if($owned_projects && !$assigned_projects)
                {
                    $data['project_data'][] = $owned_projects;
                }
                else if($owned_projects && $assigned_projects)
                {
                    $data['project_data'][] = $owned_projects;
                    array_push($data['project_data'], $assigned_projects);
                }
                else if($assigned_projects && !$owned_projects)
                {
                    $data['project_data'][] = $assigned_projects;
                }
                else
                {
                    $data['project_data'][] = false;
                }
            }

            // load page to show all devices
            $this->template->load('dashboard', 'project/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // view archived projects
    function archived_project()
    {
        $data = array('title' => 'Archived Projects');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // set project name, register name and project ID to null
            $session_data = $this->session->userdata('logged_in');

            // get global data
            $data = array_merge($data,$this->get_global_data());

            if ($data['role_id'] == 8)
            {

                $project = $this->project_model->getAssignedProject($data['user_id']);

                //check if result is true
                ($project) ? $data['project_data'] = $project : $data['project_data'] = false;
            }
            else if ( $data['role_id'] == 1 )
            {
                $project = $this->project_model->getAllProjects();

                //check if result is true
                ($project) ? $data['project_data'] = $project : $data['project_data'] = false;
            }
            else
            {
                $project = $this->project_model->getArchivedProjects($data['user_id']);

                //check if result is true
                ($project) ? $data['project_data'] = $project : $data['project_data'] = false;
            }

            // load page to show all devices
            $this->template->load('dashboard', 'project/archived', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // view a single project
    function view_project()
    {
        $data = array();

        if($this->session->userdata('logged_in'))
        {
            // get global data
            $data = array_merge($data,$this->get_global_data());

            $uri_project_id = $this->uri->segment(3); // get id from third segment of uri

            $single_project = $this->project_model->getSingleProject($uri_project_id);

            $data['project_id'] = $uri_project_id;
            $data['project_name'] = $single_project->project_name;
            $data['title'] = $single_project->project_name . ' Project'; // assign project name to page title
            $data['project_description'] = $single_project->project_description;

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // add uri id i.e. project id to session data
            $session_data = $this->session->userdata('logged_in');
            $session_data['user_project_id'] = $uri_project_id; // project ID
            $session_data['project_name'] = $single_project->project_name; // project name
            $session_data['register_name'] = null; // set register name to null when selecting project

            $check_setting = $this->check_project_setting($uri_project_id);
            $session_data['tbl_no_project_settings'] = $check_setting;

            $this->session->set_userdata('logged_in', $session_data);

            // get assigned users to project
            $data['project_users'] = $this->team_model->getProjectUsers($uri_project_id);

            if(empty($check_setting))
            {
                // get all risk registers for specific user
                if ($session_data['role_name'] == 'Project Manager' || $session_data['role_name'] == 'Program Manager')
                {
                    $assigned_registers = $this->project_model->getRiskRegisters( array('project_id'=>$uri_project_id,'user_id'=>$data['user_id']));
                    $owned_registers = $this->project_model->getOwnedRiskRegisters( array('project_id'=>$uri_project_id,'user_id'=>$data['user_id']));

                    // check first if user owns a project and then add them to an associative array key
                    if($owned_registers)
                    {
                        $data['subproject_data'] = $owned_registers;
                    }
                    else if($owned_registers && $assigned_registers)
                    {
                        $data['subproject_data'] = $owned_registers;
                        array_push($data['subproject_data'], $assigned_registers);
                    }
                    else if($assigned_registers)
                    {
                        $data['subproject_data'] = $assigned_registers;
                    }
                    else
                    {
                        $data['subproject_data'] = false;
                    }
                }
                else if($session_data['role_name'] == 'General User')
                {
                    $risk_register = $this->project_model->getAssignedRiskRegisters($data['user_id']);
                    ($risk_register) ? $data['subproject_data'] = $risk_register : $data['subproject_data'] = false;
                }
                else
                {
                    $risk_register = $this->project_model->getOwnedRiskRegisters( array('project_id'=>$uri_project_id));
                    ($risk_register) ? $data['subproject_data'] = $risk_register : $data['subproject_data'] = false;
                }

                $this->template->load('dashboard', 'project/view_single_project', $data);
            }
            else // redirect to project settings page
            {
                redirect('project/settings');
            }
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // view archived register
    function archived_register()
    {
        $data = array();

        if($this->session->userdata('logged_in'))
        {
            // get global data
            $data = array_merge($data,$this->get_global_data());

            $uri_project_id = $this->uri->segment(4); // get id from 4th segment of uri
            $single_project = $this->project_model->getSingleProject($uri_project_id);
            $data['project_id'] = $uri_project_id;
            $data['project_name'] = $single_project->project_name;

            // append project name to page title
            $data['title'] = 'Archived Risk Registers';

            // project description
            $data['project_description'] = $single_project->project_description;

            // add uri id i.e. project id to session data
            $session_data = $this->session->userdata('logged_in');
            $session_data['user_project_id'] = $uri_project_id; // project ID
            $session_data['project_name'] = $single_project->project_name; // project name
            $session_data['register_name'] = null; // set register name to null when selecting project

            $check_setting = $this->check_project_setting($uri_project_id);
            $session_data['tbl_no_project_settings'] = $check_setting;
            $this->session->set_userdata('logged_in', $session_data);

            // breadcrumb
            $this->breadcrumb->add($single_project->project_name, 'dashboard/project/'.$session_data['user_project_id']);
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            if(empty($check_setting))
            {
                // get all risk registers for specific user
                if ($session_data['role_name'] == 'Project Manager' || $session_data['role_name'] == 'Program Manager')
                {
                    $risk_register = $this->project_model->getArchivedRiskRegisters( array('project_id'=>$uri_project_id,'user_id'=>$data['user_id']));
                }
                else if($session_data['role_name'] == 'General User')
                {
                    $risk_register = $this->project_model->getAssignedRiskRegisters($data['user_id']);
                }
                else
                {
                    $risk_register = $this->project_model->getArchivedRiskRegisters( array('project_id'=>$uri_project_id));
                }

                // check if result is true
                ($risk_register) ? $data['subproject_data'] = $risk_register : $data['subproject_data'] = false;
                $this->template->load('dashboard', 'project/archived_register', $data);
            }
            else // redirect to project settings page
            {
                redirect('project/settings');
            }
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // check if project settings exist for specified project
    function check_project_setting($project_id)
    {
        // store tables where project has no settings
        $no_settings = array();

        // store all database tables related to project settings in an array
        $db_table = array("Status","CostMetric","ScheduleMetric","ResponseTitle","MaterializationPhase","RiskOwner","RiskStrategies","RiskCategories");

        // loop through db table array
        for($x = 0;$x < count($db_table); $x++)
        {
            $settings_status = $this->project_model->getProjectSetting($project_id, $db_table[$x]);

            // does setting exist for project
            if(!$settings_status)
            {
                // add table that has no settings for specified project
                array_push($no_settings, $db_table[$x]);
            }
        }

        return $no_settings;
    }


    // view a single risk register
    function view_risk_register()
    {
        $data = array();

        if($this->session->userdata('logged_in'))
        {
            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get id from third segment of uri and use as id for retrieving register data
            $uri_id = $this->uri->segment(3);
            $single_register = $this->project_model->getSingleRiskRegister($uri_id);

            // data for a single register
            $data['register_id'] = $single_register->subproject_id;
            $data['register_name'] = $single_register->name;
            $data['title'] = $single_register->name . ' Register'; // assign register name to page title
            $data['register_description'] = $single_register->description;

            // get user project id from session data
            $session_data = $this->session->userdata('logged_in');
            $data['user_project_id'] = $session_data['user_project_id'];
            $session_data['register_name'] = $single_register->name; // register name
            $session_data['register_id'] = $single_register->subproject_id; // register id
            $this->session->set_userdata('logged_in', $session_data);

            // single project
            $single_project = $this->project_model->getSingleProject($session_data['user_project_id']);

            // breadcrumb
            $this->breadcrumb->add($single_project->project_name, 'dashboard/project/'.$session_data['user_project_id']);
            $this->breadcrumb->add(mb_strimwidth($data['title'], 0, 20, "..."));
            $data['breadcrumb'] = $this->breadcrumb->output();

            // assign role name in session
            $data['role_name'] = $session_data['role_name'];

            // get assigned users
            $data['register_users'] = $this->team_model->getRegisterUsers($data['register_id']);

            // get all risks of user and assigned register
            // $risk = $this->risk_model->getUserRisk( $data['user_id'], $data['register_id'] );

            // get all risks that belong to a manager's users and assigned register
            $users_risk = $this->risk_model->getManagerRisk( $data['user_id'], $data['register_id'] );

            // get unapproved revised risks
            // $unapproved_risk = $this->risk_model->getUnapprovedRevisions( $data['user_id'], $data['register_id'] );

            // check if result is true
            // ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            ($users_risk) ? $data['user_risk_data'] = $users_risk : $data['user_risk_data'] = false;

            // ($unapproved_risk) ? $data['unapproved_risk'] = $unapproved_risk : $data['unapproved_risk'] = false;

            $this->template->load('dashboard', 'registry/view_single_register', $data);
        }
        else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    // get risk items for a single risk register
    function single_register_risks()
    {
        // load risk matrix calculator library
        $this->load->library('riskmatrix');
        
        // Data tables POST Variables
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $registerID = intval($this->input->post("registerID"));
        $order = $this->input->post("order");

        // get session data
        $session_data = $this->session->userdata('logged_in');

        // ordering configuration
        $col = 1;
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
            "original_risk_id",
            "reference_number",
            "risk_title",
            "RiskCategories_category_id",
            "risk_rating",
            "risk_rating_target",
            "actions"
        );

        if(!isset($columns_valid[$col]))
        {
           $order_col = null;
        }
        else
        {
           $order_col = $columns_valid[$col];
        }

        $db_data = array();

        if($session_data['role_name'] == 'Super Administrator')
        {
            // get risks without user id
            $risk_result = $this->risk_model->getUserRisk(array('start'=>$start,'limit'=>$length, 'register_id'=>$registerID,'order'=>$order_col,'sortType'=>$dir));

            // get number of total rows without user id
            $total_risks = $this->risk_model->getTotalRisks(array('register_id'=>$registerID));
        }
        else if($session_data['role_name'] == 'Project Manager' || $session_data['role_name'] == 'Program Manager')
        {
            // get risks with user id
            $risk_result = $this->risk_model->getUserRisk(array('start'=>$start,'limit'=>$length,'user_id'=>$session_data['user_id'], 'register_id'=>$registerID,'order'=>$order_col,'sortType'=>$dir));

            // get number of total rows by user ID
            $total_risks = $this->risk_model->getTotalRisks(array('user_id'=>$session_data['user_id'],'register_id'=>$registerID));
        }
        else
        {
            // get risks with user id
            $risk_result = $this->risk_model->getUserRisk(array('start'=>$start,'limit'=>$length,'user_id'=>$session_data['user_id'], 'register_id'=>$registerID,'order'=>$order_col,'sortType'=>$dir,'role_name'=> $session_data['role_name'] ));

            // get number of total rows by user ID
            $total_risks = $this->risk_model->getTotalRisks(array('user_id'=>$session_data['user_id'],'register_id'=>$registerID));
        }

        if ($risk_result)
        {
            // action row content for risk table
            foreach ($risk_result as $data_row)
            {

                $action_row = "<span><a title='view' href='/dashboard/risk/".$data_row->item_id."'><i class='fas fa-eye' aria-hidden='true'></i></a></span><span><a title='edit' href='/dashboard/risk/edit/".$data_row->item_id."'><i class='fas fa-edit' aria-hidden='true'></i></a></span><span><a class='delete-action' data-toggle='confirmation' data-title='Archive Risk?' href='/dashboard/risk/archive/".$data_row->item_id."'><i class='fas fa-trash' aria-hidden='true'></i></a></span>";

                // get label color of risk rating from risk matrix library
                // and build html structure
                $rr_label = $this->riskmatrix->label_color($data_row->risk_rating);
                $rr_target_label = $this->riskmatrix->label_color($data_row->risk_rating_target);

                $risk_rating = "<small class='label ".$rr_label."'>".$data_row->risk_rating."</small>";
                $risk_rating_target = "<small class='label ".$rr_target_label."'>".$data_row->risk_rating_target."</small>";

                $db_data[] = array(
                    $data_row->original_risk_id,
                    $data_row->reference_number,
                    $data_row->risk_title,
                    $this->risk_model->getRiskCategoryName($data_row->RiskCategories_category_id),
                    $risk_rating,
                    $risk_rating_target,
                    $action_row
                );
            }

            $output = array(
                "draw" => $draw,
                "recordsTotal" => $total_risks,
                "recordsFiltered" => $total_risks,
                "data" => $db_data
            );

            echo json_encode($output);
        }
        else {

            $output = array(
                "draw" => $draw,
                "recordsTotal" => $total_risks,
                "recordsFiltered" => $total_risks,
                "data" => ""
            );

            echo json_encode($output);
        }

        exit();
    }


    // view all risk registers
    function view_risk_registers()
    {
        $data = array(
            'title' => 'Risk Registers'
        );

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // set register name to null
            $session_data = $this->session->userdata('logged_in');
            $session_data['register_name'] = null; // set register name to null when selecting project
            $this->session->set_userdata('logged_in', $session_data);

            // get global data
            $data = array_merge($data,$this->get_global_data());

            if ($data['role_id'] == 8)
            {

                $risk_register = $this->project_model->getAssignedRiskRegisters($data['user_id']);

                //check if result is true
                ($risk_register) ? $data['riskregister_data'] = $risk_register : $data['riskregister_data'] = false;
            }
            else if($data['role_id'] == 1)
            {
                $risk_register = $this->project_model->getAllRiskRegisters();

                //check if result is true
                ($risk_register) ? $data['riskregister_data'] = $risk_register : $data['riskregister_data'] = false;
            }
            else
            {
                $risk_register = $this->project_model->getRiskRegistersByID($data['user_id']);

                //check if result is true
                ($risk_register) ? $data['riskregister_data'] = $risk_register : $data['riskregister_data'] = false;
            }

            if(!empty($session_data['project_name']))
            {
                $this->template->load('dashboard', 'registry/index', $data);
            }
            else
            {
                redirect('dashboard/project'); // redirect to projects page
            }

        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // view for registering a project
    function reg_project_view()
    {
        $data = array('title' => 'Register Project');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // load page to show all devices
            $this->template->load('dashboard', 'project/register_project', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // view for editing a project
    function edit_project()
    {
        $data = array('title' => 'Edit Project');

        if($this->session->userdata('logged_in'))
        {

            // breadcrumb
            $this->breadcrumb->add('Projects', 'dashboard/project');
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get id from fourth segment of uri
            $project_id = $this->uri->segment(4);

            // get data for the project
            $data['project'] = $this->project_model->getSingleProject($project_id);

            // load page to show all devices
            $this->template->load('dashboard', 'project/edit_project', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // view for editing a register
    function edit_register()
    {
        $data = array('title' => 'Edit Register');

        if($this->session->userdata('logged_in'))
        {

            $session_data = $this->session->userdata('logged_in');

            // breadcrumb
            $this->breadcrumb->add('Projects', 'dashboard/project/'. $session_data['user_project_id']);
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get id from fourth segment of uri
            $register_id = $this->uri->segment(4);

            // get data for the project
            $data['register'] = $this->project_model->getSingleRiskRegister($register_id);

            // load page to show all devices
            $this->template->load('dashboard', 'registry/edit_register', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // update register
    function update_register()
    {
        // // set validation rules
        $this->form_validation->set_rules('register_name', 'Register Name', 'trim|required');
        $this->form_validation->set_rules('register_description', 'Register Description', 'trim|required');

        // validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // breadcrumb
            $this->breadcrumb->add('Projects', 'dashboard/project');
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get id from fourth segment of uri
            $register_id = $this->uri->segment(4);

            // get data for the project
            $data['register'] = $this->project_model->getSingleRiskRegister($register_id);

            // load page to show all devices
            $this->template->load('dashboard', 'registry/edit_register', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            $register_id = $this->input->post('register_id');
            $register_name = $this->input->post('register_name');

            // insert the register details into database
            $register_data = array(
                'name' => $register_name,
                'description' => $this->input->post('register_description'),
                'updated_at' => $timestamp
            );

            // insert form data into database
            if ($this->project_model->updateRegister($register_data, $register_id))
            {
                $this->session->set_flashdata('positive_msg','You have successfully updated the '.$register_name.' register!');
                redirect('/dashboard/riskregister/'.$register_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('negative_msg','Oops! Error. Please try again later!');
                redirect('dashboard/riskregister/edit/'.$register_id);
            }
        }
    }

    // function for updating project
    function update_project()
    {
        //set validation rules
        $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
        $this->form_validation->set_rules('project_description', 'Project Description', 'trim|required');

        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            $data = array('title' => 'Update Project');

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());
            $this->template->load('dashboard', 'project/edit_project', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            $project_id = $this->input->post('project_id');
            $project_name = $this->input->post('project_name');

            // insert the project details into database
            $project_data = array(
                'project_name' => $project_name,
                'project_description' => $this->input->post('project_description'),
                'updated_at' => $timestamp
            );

            // insert form data into database
            if ($this->project_model->updateProject($project_data, $project_id))
            {
                $this->session->set_flashdata('positive_msg','You have successfully updated the '.$project_name.' project!');
                redirect('dashboard/project');
            }
            else
            {
                // error
                $this->session->set_flashdata('negative_msg','Oops! Error. Please try again later!');
                redirect('dashboard/project/add');
            }
        }
    }

    // view for adding a risk register
    function add_register_view()
    {
        $data = array('title' => 'Add Risk Registry');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // $project = $this->project_model->getProjects($data['user_id']);
            $owned_projects = $this->project_model->getOwnedProjects($data['user_id']);
            $assigned_projects = $this->project_model->getProjects($data['user_id']);

            // check first if user owns a project
            if($owned_projects && !$assigned_projects)
            {
                $data['project_data'][] = $owned_projects;
            }
            else if($owned_projects && $assigned_projects)
            {
                $data['project_data'][] = $owned_projects;
                array_push($data['project_data'], $assigned_projects);
            }
            else if($assigned_projects && !$owned_projects)
            {
                $data['project_data'][] = $assigned_projects;
            }
            else
            {
                $data['project_data'][] = false;
            }

            // get project ID from session data
            $session_data = $this->session->userdata('logged_in');
            $data['project_id'] = $session_data['user_project_id'];

            // $data['project_name'] = $this->project_model->getRegisterProjectName($session_data['user_project_id']);
            $data['select_project_option'] = $this->get_project_name($data['project_id']);

            // load page to show all devices
            $this->template->load('dashboard', 'registry/register_subproject', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // assign user to register view
    function assign_user_view()
    {
        $data = array('title' => 'Assign User to Register');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            $uri_id = $this->uri->segment(4); // get id from fourth segment of uri
            $single_register = $this->project_model->getSingleRiskRegister($uri_id);

            // get project id
            $data['Project_project_id'] = $single_register->Project_project_id;

            // get general users belonging to current manager user
            $data['general_user'] = $this->userproject->getGeneralUsers($data['user_id']);

            // get register name and ID
            $data['register_id'] = $single_register->subproject_id;
            $data['register_name'] = $single_register->name;

            // load page to show duplicating page
            $this->template->load('dashboard', 'project/assign_user', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function assign_user()
    {
        // get data from forms
        $general_user_id = $this->input->post('general_user');
        $register_id = $this->input->post('register_id');
        $project_id = $this->input->post('Project_project_id');

        if($general_user_id != ''  and $register_id != '')
        {
            // get the details from the form
            $data = array(
                'Subproject_subproject_id' => $register_id,
                'User_user_id' => $general_user_id
            );

            if ($this->project_model->assignUser($data))
            {
                $this->session->set_flashdata('positive_msg','You have successfully assigned a user to this register!');
                redirect('dashboard/riskregister/'.$register_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('negative_msg','Unable to assign user. Please try again!');
                redirect('dashboard/project/'.$project_id);
            }
        }
    }


    // view for duplicating a register
    function add_duplicate_view()
    {

        $data = array('title' => 'Duplicate Risk Register');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());
            $uri_id = $this->uri->segment(4); // get id from fourth segment of uri
            $single_register = $this->project_model->getSingleRiskRegister($uri_id);

            // get the last row's ID from registry table
            $data['last_reg_id'] = $this->project_model->lastRegisterID();
            $data['Project_project_id'] = $single_register->Project_project_id;
            $data['register_id'] = $single_register->subproject_id;
            $data['register_name'] = $single_register->name;
            $data['register_description'] = $single_register->description;

            // get project data
            $data['select_project'] = $this->userproject->getProject( $data['user_id'] );

            // get risk ids associated with the register id
            $data['risk_ids'] = $this->risk_model->getRiskIDs($data['register_id']);

            // load page to show duplicating page
            $this->template->load('dashboard', 'registry/duplicate', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // duplication function
    function duplicate_register()
    {
        //set validation rules
        $this->form_validation->set_rules('subproject_name', 'Subproject Name', 'trim|required');
        $this->form_validation->set_rules('subproject_description', 'Subproject Description', 'trim|required');

        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            $data = array('title' => 'Register Subproject');

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());
            $this->template->load('dashboard', 'registry/duplicate', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            $uri_id = $this->uri->segment(4);

            // load UUID library
            $this->load->library('uuid');
            $new_risk_uuid = $this->uuid->generate_uuid();

            // get original register to duplicate all risk items for that particular register
            $original_register_id = $this->input->post('register_id');
            $original_project_id = $this->input->post('Project_project_id');
            $new_project_id = $this->input->post('project_name');

            // get risk ids associated with the register id
            $risk_ids = $this->risk_model->getRiskIDs($original_register_id);

            if( $new_project_id == "none" )
            {

                // get the register details from the form
                $data = array(
                    'name' => $this->input->post('subproject_name'),
                    'description' => $this->input->post('subproject_description'),
                    'duplicate' => TRUE,
                    'Project_project_id' => $original_project_id,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                );
            }
            else
            {
                // get the register details from the form
                $data = array(
                    'name' => $this->input->post('subproject_name'),
                    'description' => $this->input->post('subproject_description'),
                    'duplicate' => TRUE,
                    'Project_project_id' => $new_project_id,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                );
            }

            $table = 'RiskRegistry';

            if ($this->project_model->insertSubProject($data))
            {
                // get the last row's ID from registry table added by the above function
                $last_register_id = $this->project_model->lastRegisterID();

                foreach ($risk_ids as $key_field)
                {
                    $this->risk_model->duplicateRiskRecord($table, $key_field, $original_register_id, $last_register_id,$new_risk_uuid);
                }

                // data for register copy
                $copy_data = array(
                    'Subproject_subproject_id' => $last_register_id,
                    'original_id' => $original_register_id
                );

                // set copy of original register in register copy table
                $this->project_model->copyRegister($copy_data);

                $this->session->set_flashdata('positive_msg','You have successfully duplicated the register!');
                redirect('dashboard/riskregisters');
            }
            else
            {
                // error
                $this->session->set_flashdata('negative_msg','Unable to duplicate register. Please try again!');
                redirect('dashboard/riskregister/duplicate/'.$uri_id);
            }
        }
    }

    // project registration process
    function reg_project()
    {
        //set validation rules
        $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
        $this->form_validation->set_rules('project_description', 'Project Description', 'trim|required');

        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            $data = array('title' => 'Register Project');
            $this->template->load('dashboard', 'project/register_project', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            // get user's ID from session
            $session_data = $this->session->userdata('logged_in');
            $user_id = $session_data['user_id'];

            //insert the user registration details into database
            $data = array(
                'project_name' => $this->input->post('project_name'),
                'project_description' => $this->input->post('project_description'),
                'archived' => false,
                'User_user_id' => $user_id,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );

            // insert form data into database
            if ($this->project_model->insertProject($data))
            {
                $this->session->set_flashdata('positive_msg', 'You have successfully registered the project! Please login.');
                redirect('project/settings');
            }
            else
            {
                // error
                $this->session->set_flashdata('negative_msg', 'Oops! Error. Please try again later!');
                redirect('dashboard/project/add');
            }
        }
    }


    // add risk register
    function reg_subproject()
    {
        //set validation rules
        $this->form_validation->set_rules('subproject_name', 'Subproject Name', 'trim|required');
        $this->form_validation->set_rules('subproject_description', 'Subproject Description', 'trim|required');

        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            $data = array('title' => 'Register Subproject');
            $this->template->load('dashboard', 'project/register_subproject', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            $project_id = $this->input->post('project');

            // check if selected register has a risk item
            if($this->project_model->getRegisterbyProjectID($project_id))
            {
                // increase identifier by one
                $latest_register_identifier = $this->project_model->getLatestRegisterIdentifier();
                $latest_register_identifier = $latest_register_identifier + 1;
            }
            else
            {
                // reset identifier to one if register item for selected project does not exist
                $latest_register_identifier = 1;
            }

            //insert the user registration details into database
            $data = array(
                'name' => $this->input->post('subproject_name'),
                'description' => $this->input->post('subproject_description'),
                'Project_project_id' => $project_id,
                'duplicate' => FALSE,
                'register_identifier' => $latest_register_identifier,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );

            // insert form data into database
            if ($this->project_model->insertSubProject($data))
            {
                $this->session->set_flashdata('positive_msg','You have successfully registered the risk register!');
                redirect('dashboard/project/'.$project_id);
            }
            else
            {
                // error
                $this->session->set_flashdata('negative_msg','Oops! Error. Please try again later!');
                redirect('dashboard/subproject/add');
            }
        }
    }


    // get project name
    function get_project_name($project_id)
    {
      // get project info from project table
      // $project = $this->project_model->getProjectName($user_id);
      $project = $this->project_model->getRegisterProjectName($project_id);

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

    // get register name
    function get_register_name($user_id)
    {
      // get register information
      $register = $this->project_model->getRiskRegistersByID($user_id);

      if($register)
      {
        $options = array();

        foreach ($register as $row)
        {
            $register_id = $row->register_id;
            $register_name = $row->register_name;
            $options[$register_id] = $register_name;
        }
        return $options;
      }
      else
      {
        return 'No Data!';
      }
    }


    // view for project settings setup
    function project_settings()
    {
        if($this->session->userdata('logged_in'))
        {
            // get title from uri
            $data = array();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $session_data = $this->session->userdata('logged_in');

            // set project id
            $data['project_id'] = $session_data['user_project_id'];

            // set project name
            $data['project_name'] = $session_data['project_name'] ;

            $data['title'] = $session_data['project_name'].' Project Settings';

            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            $this->template->load('dashboard', 'settings/data/project_settings', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // view for subcategory settings setup
    function subcategory_settings()
    {
        if($this->session->userdata('logged_in'))
        {
            // get title from uri
            $data = array();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $session_data = $this->session->userdata('logged_in');

            $check_setting = $this->check_project_setting($session_data['user_project_id']);

            $session_data['tbl_no_project_settings'] = $check_setting;

            if(empty($check_setting)) // go to subcategory page
            {

                // set project id
                $data['project_id'] = $session_data['user_project_id'];

                // set project name
                $data['project_name'] = $session_data['project_name'] ;

                $data['title'] = $session_data['project_name'].' Subcategory Settings';

                $tbl_name = 'RiskCategories'; // table name for categories

                // get category data
                $data['category_result'] = $this->riskdata_model->getRiskData($session_data['user_project_id'],$tbl_name);

                // breadcrumb
                $this->breadcrumb->add($data['title']);
                $data['breadcrumb'] = $this->breadcrumb->output();

                $this->template->load('dashboard', 'settings/data/subcategory_settings', $data);
            }
            else
            {
                redirect('project/settings');
            }
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // delete project
    function delete_project()
    {
        $timestamp = date('Y-m-d G:i:s'); // timestamp

        // get id from fourth segment of uri
        $id = $this->uri->segment(4);

        $archive_data = array(
            'archived_date' => $timestamp,
            'archived' => true
        );

        // archive register record
        if($this->project_model->archiveProject($archive_data,$id))
        {
            $this->session->set_flashdata('positive_msg','You have deleted the project successfully!');
            // load page for viewing all projects
            redirect('dashboard/project');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative_msg','Error. Unable to delete project!');
            redirect('dashboard/project');
        }
    }


    // delete register
    function delete_register()
    {
        // load session data to get project id
        $session_data = $this->session->userdata('logged_in');

        // timestamp
        $timestamp = date('Y-m-d G:i:s');

        // get id from fourth segment of uri
        $id = $this->uri->segment(4);

        $archive_data = array(
            'archived_date' => $timestamp,
            'archived' => true
        );

        // archive register record
        if($this->project_model->archiveRegister($archive_data,$id))
        {
            $this->session->set_flashdata('positive_msg','You have deleted the register successfully!');

            // load page for viewing all registers
            redirect('dashboard/project/'.$session_data['user_project_id']);
        }
        else
        {
            // error
            $this->session->set_flashdata('negative_msg','Error. Unable to delete register!');
            redirect('dashboard/project/'.$session_data['user_project_id']);
        }
    }
}
