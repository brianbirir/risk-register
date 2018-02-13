<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends RISK_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('project_model');
        $this->load->model('risk_model');
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
                $project = $this->project_model->getProjects($data['user_id']);
                
                //check if result is true
                ($project) ? $data['project_data'] = $project : $data['project_data'] = false;
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

    
    // view a single risk register
    function view_project()
    {
        $data = array('title' => 'Single Project');
        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();
        
        if($this->session->userdata('logged_in'))
        {
            // get global data
            $data = array_merge($data,$this->get_global_data());
            
            $uri_project_id = $this->uri->segment(3); // get id from third segment of uri

            // add uri id i.e. project id to session data
            $session_data = $this->session->userdata('logged_in');
            $session_data['user_project_id'] = $uri_project_id;
            $this->session->set_userdata('logged_in', $session_data); 
            
            $single_project = $this->project_model->getSingleProject($uri_project_id);

            $data['project_name'] = $single_project->project_name;

            $data['project_description'] = $single_project->project_description;

            // get all risk registers for specific user

            if ($data['role_id'] != 8) 
            {

                $risk_register = $this->project_model->getRiskRegisters( $uri_project_id, $data['user_id'] );

                //  check if result is true
                ($risk_register) ? $data['riskregister_data'] = $risk_register : $data['riskregister_data'] = false;
            }
            else 
            {
                $risk_register = $this->project_model->getAssignedRiskRegisters($data['user_id']);
                
                //  check if result is true
                ($risk_register) ? $data['riskregister_data'] = $risk_register : $data['riskregister_data'] = false;
            }

            // check if result is true
            ($risk_register) ? $data['subproject_data'] = $risk_register : $data['subproject_data'] = false;

            $this->template->load('dashboard', 'project/view', $data);
        }
        else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    // view a single risk register
    function view_risk_register()
    {
        $data = array('title' => 'Single Risk Register');
        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();
        
        if($this->session->userdata('logged_in'))
        {
            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get id from third segment of uri and use as id for retrieving register data
            $uri_id = $this->uri->segment(3);
            $single_register = $this->project_model->getSingleRiskRegister($uri_id);


            // get user project id from session data
            $session_data = $this->session->userdata('logged_in');
            $data['user_project_id'] = $session_data['user_project_id'];

            // data for a single register
            $data['register_id'] = $single_register->subproject_id;
            $data['register_name'] = $single_register->name;
            $data['register_description'] = $single_register->description;
            
            // get all risks of user and assigned register
            $risk = $this->risk_model->getUserRisk( $data['user_id'], $data['register_id'] );

            // get all risks that belong to a manager's users and assigned register
            $users_risk = $this->risk_model->getManagerRisk( $data['user_id'], $data['register_id'] );

            // get unapproved revised risks
            // $unapproved_risk = $this->risk_model->getUnapprovedRevisions( $data['user_id'], $data['register_id'] );

            // check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            ($users_risk) ? $data['user_risk_data'] = $users_risk : $data['user_risk_data'] = false;

            // ($unapproved_risk) ? $data['unapproved_risk'] = $unapproved_risk : $data['unapproved_risk'] = false;

            $this->template->load('dashboard', 'registry/view_single_register', $data);
        }
        else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
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
            // load page to show all devices
            $this->template->load('dashboard', 'registry/index', $data);
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

            $data['select_project_option'] = $this->get_project_name($data['user_id']);

            $project = $this->project_model->getProjects($data['user_id']);

            //check if result is true
            ($project) ? $data['project_data'] = $project : $data['project_data'] = false;

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
                'User_user_id' => $user_id,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
            
            // insert form data into database
            if ($this->project_model->insertProject($data))
            {
                $this->session->set_flashdata('positive-msg','You have successfully registered the project! Please login.');
                redirect('dashboard/project');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('dashboard/project/add');
            }
        }
    }


    // risk register registration process
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

            //insert the user registration details into database
            $data = array(
                'name' => $this->input->post('subproject_name'),
                'description' => $this->input->post('subproject_description'),
                'Project_project_id' => $this->input->post('project'),
                'duplicate' => FALSE,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
            
            // insert form data into database
            if ($this->project_model->insertSubProject($data))
            {
                $this->session->set_flashdata('positive_msg','You have successfully registered the risk register!');
                redirect('dashboard/project');
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
    function get_project_name($user_id)
    {
      // get project info from project table
      $project = $this->project_model->getProjectName($user_id);

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
      } else {
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
}