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
        $this->load->model('risk_model');
        $this->load->model('project_model');
        $this->load->model('response_model');
        $this->load->model('user_model');
        $this->load->model('team_model');
    }

    // view all registered risks owned by a user
    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            // title
            $data = array('title' => 'Risks');

            // session data
            $session_data = $this->session->userdata('logged_in');
            $session_project_id = $session_data['user_project_id'];


            // breadcrumb
            $this->breadcrumb->add($session_data['project_name']." Project", 'dashboard/project/'.$session_data['user_project_id']);
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            if ($data['role_id'] == 1)
            {
                $risk = $this->risk_model->getAllRisks();
            } 
            else if ($data['role_id'] == 8)
            {
                $risk = $this->risk_model->getRisks(array("user_id"=>$data['user_id'],"project_id"=>$session_project_id));
            }
            else
            {
                $risk = $this->risk_model->getRisks(array("user_id"=>$data['user_id'], "project_id"=>$session_project_id));
            }
            
            //check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            // check if project id, project name or register id are missing from session data
            if(!empty($session_project_id) || !empty($session_data['project_name']) || !empty($session_data['register_id']))
            {
                // load page to show all registered risks
                $this->template->load('dashboard', 'risk/index', $data);
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


    // view all archived risks owned by a user
    function index_archive()
    {
        $data = array('title' => 'Archived Risks');

        if($this->session->userdata('logged_in'))
        {
            
            // session data
            $session_data = $this->session->userdata('logged_in');
            $session_project_id = $session_data['user_project_id'];
            $session_register_id = $session_data['register_id'];

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get risk data belonging to specific user and project
            $risk = $this->risk_model->getArchivedRisks(array("register_id" =>$session_register_id ));

            // breadcrumb
            $this->breadcrumb->add($session_data['project_name']." Project", 'dashboard/project/'.$session_data['user_project_id']);
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            //check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            // load page to show all registered risks
            $this->template->load('dashboard', 'risk/archive', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    
    
    // the view for adding risk
    function add()
    {   
        if($this->session->userdata('logged_in'))
        {
            // title
            $data = array('title' => 'Register Risk');

            // get register id from fourth segment of uri
            $data['register_id'] = $this->uri->segment(4);

            // check if users have been assigned to selected register
            if($this->team_model->checkForUsers($data['register_id']))
            {

                // get project ID from session data
                $session_data = $this->session->userdata('logged_in');
                $data['user_project_id'] = $session_data['user_project_id'];

                // get global data
                $data = array_merge($data, $this->get_global_data());

                // check if project id, project name or register id are missing from session data
                if(!empty($session_project_id) || !empty($session_data['project_name']) || !empty($session_data['register_id']))
                {

                    if ( $data['role_id'] == 8 ) 
                    {
                        $data['register_row'] = $this->project_model->getAssignedRiskRegisterName($data['user_id']);   
                    }
                    else
                    {
                        $data['register_row'] = $this->project_model->getManagerRegisterName($data['register_id']);
                    }

                    // single project
                    $single_project = $this->project_model->getSingleProject($session_data['user_project_id']);

                    // breadcrumb
                    $this->breadcrumb->add($single_project->project_name." Project", 'dashboard/project/'.$session_data['user_project_id']);
                    $this->breadcrumb->add($data['register_row']->name,'dashboard/riskregister/'.$data['register_id']);
                    $this->breadcrumb->add($data['title']);
                    $data['breadcrumb'] = $this->breadcrumb->output();
                
                    // select drop down
                    $data['select_materialization_phase'] = $this->getMaterialization($data['user_project_id']);
                    $data['select_status'] = $this->getStatus($data['user_project_id']);
                    $data['select_category'] = $this->getCategories($data['user_project_id']);
                    $data['select_strategy'] = $this->getRiskStrategies($data['user_project_id']);
                    $data['select_subproject'] = $this->getSubProject();
                    $data['select_risk_owner'] = $this->getRiskOwner($data['user_project_id']);
                    $data['select_risk_cost'] = $this->getRiskCost($data['user_project_id']);
                    $data['select_risk_schedule'] = $this->getRiskSchedule($data['user_project_id']);         
                    $data['select_user'] = $this->getRegisterUser($data['register_id']);
                    $data['select_response_name'] = $this->getRiskResponseTitle($data['user_project_id']);

                    // select drop down for project on the form for adding a response title
                    $this->load->library('userproject'); 
                    $data['select_project'] = $this->userproject->getProject( $data['user_id'] ); 

                    // load page to show all devices
                    $this->template->load('dashboard', 'risk/add', $data);
                }
                else
                {
                    redirect('dashboard/project'); // redirect to projects page if session data for project id or register id are missing
                }
            }
            else 
            {
                $this->session->set_flashdata('negative_msg','The selected register has no users. Please assign users to the register before adding risk items! Add a user on the sidebar section.');
                redirect('dashboard/riskregister/'.  $this->uri->segment(4));
            }
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // view for editing risk item
    function edit()
    {
        $data = array('title' => 'Edit Risk Item');
        
        if($this->session->userdata('logged_in'))
        {

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // load session data
            $session_data = $this->session->userdata('logged_in');

            // get risk id from fourth segment of uri
            $data['risk_id'] = $this->uri->segment(4);

            // get register data
            // if ( $data['role_id'] == 8 ) 
            // {
            //     $data['register_row'] = $this->project_model->getAssignedRiskRegisterName($data['user_id']);   
            // }

            // get project ID from session data
            $session_data = $this->session->userdata('logged_in');
            $data['user_project_id'] = $session_data['user_project_id'];

            // single project
            $single_project = $this->project_model->getSingleProject($session_data['user_project_id']);

            // get risk data based on id from uri
            $data['risk'] = $this->risk_model->getRisk($data['risk_id']);

            // breadcrumb
            $this->breadcrumb->add($single_project->project_name." Project", 'dashboard/project/'.$session_data['user_project_id']);
            $this->breadcrumb->add($session_data['register_name'],'dashboard/riskregister/'.$data['risk']->Subproject_subproject_id);
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();
                
            // get risk responses data
            $data['risk_response'] = $this->risk_model->getRiskResponse($data['risk']->risk_uuid);

            // select drop down
            $data['select_materialization_phase'] = $this->getMaterialization($data['user_project_id']);
            $data['select_status'] = $this->getStatus($data['user_project_id']);
            $data['select_category'] = $this->getCategories($data['user_project_id']);
            $data['select_subcategory'] = $this->getSubCategories($data['risk']->RiskCategories_category_id); // get subcategory from category ID
            $data['select_strategy'] = $this->getRiskStrategies($data['user_project_id']);
            $data['select_subproject'] = $this->getSubProject();
            $data['select_risk_owner'] = $this->getRiskOwner($data['user_project_id']);
            $data['select_risk_cost'] = $this->getRiskCost($data['user_project_id']);
            $data['select_risk_schedule'] = $this->getRiskSchedule($data['user_project_id']);
            $data['select_user'] = $this->getRegisterUser($session_data['register_id']); // from session data
            $data['select_response_name'] = $this->getRiskResponseTitle($data['user_project_id']);
            
            
            // load page to show all devices
            $this->template->load('dashboard', 'risk/edit', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // update function for a risk item
    function update()
    {   
        // load UUID library for use in generating respone UUID
        $this->load->library('uuid');

        //$timestamp = date('Y-m-d G:i:s');
        $timestamp = date('Y-m-d');

        // get risk id from hidden field
        $risk_id = $this->input->post('risk_id');

        // get risk uuid
        $risk_uuid = $this->input->post('risk_uuid');

        /**
         * NOTE:
         * The risk UUID is a very unique identifier hence cannot be updated.
         * It should not be included in the updated data array below
         * 
         * Also archive variable is only used in the archiving function
         */

        // insert the risk data into database
        $risk_data = array(
            'identified_hazard_risk' => $this->input->post('identified_hazard_risk'),
            'cause_trigger' => $this->input->post('cause_trigger'),
            'risk_title' => $this->input->post('risk_title'),
            'project_location' => $this->input->post('project_location'),
            'effect' => $this->input->post('effect'),
            'materialization_phase_materialization_id' => $this->input->post('materialization_phase'),
            'likelihood' => $this->input->post('likelihood'),
            'reputation_impact' => $this->input->post('reputationimpact'),
            'hs_impact' => $this->input->post('hsimpact'),
            'env_impact' => $this->input->post('environmentimpact'),
            'legal_impact' => $this->input->post('legalimpact'),
            'quality_impact' => $this->input->post('qualityimpact'),
            'risk_rating' => $this->input->post('risk_rating'),
            'risk_level' => $this->input->post('risk_level'),
            'control_mitigation' => $this->input->post('control_mitigation'),
            'action_owner' => $this->input->post('action_owner'),
            'milestone_target_date' => $this->input->post('milestone_target_date'),
            'RiskCategories_category_id' => $this->input->post('main_category'),
            'Status_status_id' => $this->input->post('status'),
            'RiskOwner_riskowner_id' => $this->input->post('risk_owner'),
            'Subproject_subproject_id' => $this->input->post('register_id'),
            'description_change' => $this->input->post('description_change'),
            'effective_date' => $timestamp,
            'CostMetric_cost_id' => $this->input->post('costimpact'),
            'ScheduleMetric_schedule_id' => $this->input->post('timeimpact'),
            'likelihood_current' => $this->input->post('likelihood_current'),
            'reputation_impact_current' => $this->input->post('reputationimpact_current'),
            'hs_impact_current' => $this->input->post('hsimpact_current'),
            'env_impact_current' => $this->input->post('environmentimpact_current'),
            'legal_impact_current' => $this->input->post('legalimpact_current'),
            'quality_impact_current' => $this->input->post('qualityimpact_current'),
            'time_impact_current' => $this->input->post('timeimpact_current'),
            'cost_impact_current' => $this->input->post('costimpact_current'),
            'risk_rating_current' => $this->input->post('currentrisk_rating'),
            'risk_level_current' => $this->input->post('currentrisk_level'),
            'likelihood_target' => $this->input->post('likelihood_target'),
            'reputation_impact_target' => $this->input->post('reputationimpact_target'),
            'hs_impact_target' => $this->input->post('hsimpact_target'),
            'env_impact_target' => $this->input->post('environmentimpact_target'),
            'legal_impact_target' => $this->input->post('legalimpact_target'),
            'quality_impact_target' => $this->input->post('qualityimpact_target'),
            'time_impact_target' => $this->input->post('timeimpact_target'),
            'cost_impact_target' => $this->input->post('costimpact_target'),
            'risk_rating_target' => $this->input->post('targetrisk_rating'),
            'risk_level_target' => $this->input->post('targetrisk_level'),
            'action_item' => $this->input->post('action_item'),
            'RiskSubCategories_subcategory_id' => $this->input->post('sub_category')
        );

        /**
         * Get data for risk row before being updated
         * and insert this data in revisions table
         */
        $current_risk_row = $this->risk_model->getRisk($risk_id);

        if ( $current_risk_row )
        {
            // insert duplicated data and insert in revisions table
            $this->risk_model->insertRiskRevision($current_risk_row, $risk_id);
        }


        // check first if there are any response fields that have been added
        if ( !empty($_POST['risk_response']['title']) && !empty($_POST['risk_response']['strategy']) )
        {
            $num_fields = count($_POST['risk_response']['title']);
            $post_date = date('Y-m-d');

            for ($i = 0; $i < $num_fields; $i++) 
            {
                if(empty($_POST['risk_response']['title'][$i])) { break; }

                // no response uuid generation when updating
                $field_data = array(
                    'RiskStrategies_strategy_id' => $_POST['risk_response']['strategy'][$i],
                    'updated_at' => $post_date,
                    'user_id' => serialize($_POST['risk_response']['user']),
                    'due_date' => $this->getResponseDueDate($_POST['risk_response']['date'][$i]),
                    'ResponseTitle_id' => $_POST['risk_response']['title'][$i]
                );

                $this->risk_model->updateResponse($field_data,$_POST['risk_response']['id'][$i]);
            }
        }
            
        // insert form data into database
        if ($this->risk_model->updateRisk($risk_data,$risk_id))
        {
            $this->session->set_flashdata('positive-msg','Risk has been successfully updated.');
            redirect('dashboard/risk/edit/'.$risk_id);
        }
        else
        {
            // error
            $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
            redirect('dashboard/risk/edit/'.$risk_id);
        }
    }

    // delete a risk item
    function delete()
    {
        // get id from fourth segment of uri
        $id = $this->uri->segment(4);

        // delete risk record
        if($this->risk_model->deleteRisk($id))
        {
            $this->session->set_flashdata('positive-msg','You have deleted the risk item successfully!');

            // load page for viewing all roles
            redirect('dashboard/risks');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative-msg','Oops! Error.  Please try again later!');
            redirect('dashboard/risks');
        }
    }

    // archive a risk item
    function archive()
    {
        $timestamp = date('Y-m-d');
        $archived = true; // set as true

        // get id from fourth segment of uri
        $id = $this->uri->segment(4);
        
        $archive_data = array(
            'archived_date' => $timestamp,
            'archived' =>  $archived
        );

        // archive risk record
        if($this->risk_model->archiveRisk($archive_data,$id))
        {
            $this->session->set_flashdata('positive_msg','You have archived the risk item successfully!');

            // load page for viewing all roles
            redirect('dashboard/risks');
        }
        else
        {
            // error
            $this->session->set_flashdata('negative_msg','Oops! Error.  Please try again later!');
            redirect('dashboard/risks');
        }
    }

    // response view
    function response_view()
    {
        $data = array('title' => 'Responses');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $data['select_strategy'] = $this->getRiskStrategies();

            // load page to show all registered risks
            $this->template->load('dashboard', 'risk/test_response', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function register_response()
    {
        $this->load->library('uuid');
        
        $data = array('title' => 'Test');

        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();

        // get global data
        $data = array_merge($data, $this->get_global_data());        

        // set validation rules
        // $this->form_validation->set_rules('risk_reponse[]', 'Identified Hazard Risk', 'trim|required');
        $timestamp = date('Y-m-d');
        
        // get global data
        $global_data = $this->get_global_data();
        
        // $num_fields = $this->input->post('risk_response');

        $num_fields = count($_POST['risk_response']['id']);

        for ($i = 0; $i < $num_fields; $i++) 
        {
            // Pack the field up in an array for ease-of-use.
            $field = array(
                'risk_uuid'=> $this->uuid->generate_uuid(),
                'response_uuid'=> $this->uuid->generate_uuid(),
                'response_title' => $_POST['risk_response']['title'][$i],
                'RiskStrategies_strategy_id' => $_POST['risk_response']['strategy'][$i]
            );

            $this->risk_model->insertResponse($field);
        }

        redirect('dashboard');
        
    }
    
    // function for adding risk
    function register()
    {
        // load UUID library
        $this->load->library('uuid');

        //  set validation rules
        // $this->form_validation->set_rules('identified_hazard_risk', 'Identified Hazard Risk', 'trim|required');
        // $this->form_validation->set_rules('cause_trigger', 'Cause Trigger', 'trim|required');
        // $this->form_validation->set_rules('effect', 'Effect', 'trim|required');
        // $this->form_validation->set_rules('materialization_phase', 'Materialization Phase', 'trim|required');
        // $this->form_validation->set_rules('risk_rating', 'Risk Rating', 'trim|required');
        // $this->form_validation->set_rules('risk_level', 'Risk Level', 'trim|required');
        // $this->form_validation->set_rules('comments', 'Comments', 'trim|required');
        // $this->form_validation->set_rules('control_mitigation', 'Risk Control Mitigation', 'trim|required');
        // $this->form_validation->set_rules('residual_risk_rating', 'Residual Risk Rating', 'trim|required');
        // $this->form_validation->set_rules('residual_risk_level', 'Residual Risk Level', 'trim|required');
        // $this->form_validation->set_rules('action_owner', 'Action Owner', 'trim|required');
        // $this->form_validation->set_rules('milestone_target_date', 'Milestone Target Date', 'trim|required');
        // $this->form_validation->set_rules('risk_title', 'Risk Title', 'trim|required');
        // $this->form_validation->set_rules('project_location', 'Project Location', 'trim|required');
        // $this->form_validation->set_rules('description_change', 'Description Change', 'trim|required');
        // $this->form_validation->set_rules('risk_response[title][]', 'Risk Response', 'trim|required');

        $data = array('title' => 'Add Risk');

        // breadcrumb
        $this->breadcrumb->add($data['title']);
        $data['breadcrumb'] = $this->breadcrumb->output();

        // get global data
        $data = array_merge($data, $this->get_global_data());
        
        // validate form input
        // if ($this->form_validation->run() == FALSE)
        // {
        //     // select drop down
        //     $data['select_status'] = $this->getStatus();
        //     $data['select_category'] = $this->getCategories();
        //     $data['select_strategy'] = $this->getRiskStrategies();
        //     $data['select_safety'] = $this->getSystemSafety();
        //     $data['select_realization'] = $this->getRealization();
        //     $data['select_subproject'] = $this->getSubProject();
        //     $data['select_risk_owner'] = $this->getRiskOwner();            

        //     // load page to show all devices
        //     $this->template->load('dashboard', 'risk/add', $data);
        // }
        // else
        // {
            // $timestamp = date('Y-m-d G:i:s');
            $timestamp = date('Y-m-d');

            // get global data
            $global_data = $this->get_global_data();

            // get risk uuid
            $risk_uuid = $this->input->post('risk_uuid');

            // get risk register from post
            $risk_subcategory_id = $this->input->post('sub_category');

            // get risk category from post
            $risk_category_id = $this->input->post('main_category');


            // check if selected register has a risk item
            $this->load->model('category_model'); // load category model

            if($this->risk_model->getRiskbyRegisterID($this->input->post('register_id')))
            {
                // increase identifier by one
                $latest_risk_identifier = $this->risk_model->getLatestRiskIdentifier();
                $latest_risk_identifier = $latest_risk_identifier + 1;
                $risk_hazard_id = strval($this->category_model->getCategoryIdentifier($risk_category_id)) . "." . strval($risk_subcategory_id) . "." . strval($latest_risk_identifier);
            } 
            else
            {
                // reset identifier to one if risk item for selected register does not exist
                $latest_risk_identifier = 1;
                $risk_hazard_id = strval($this->category_model->getCategoryIdentifier($risk_category_id)) . "." . strval($risk_subcategory_id) . "." . strval($latest_risk_identifier);
            }

            //insert the risk data into database
            $risk_data = array(
                'identified_hazard_risk' => $this->input->post('identified_hazard_risk'),
                'cause_trigger' => $this->input->post('cause_trigger'),
                'risk_title' => $this->input->post('risk_title'),
                'project_location' => $this->input->post('project_location'),
                'effect' => $this->input->post('effect'),
                'materialization_phase_materialization_id' => $this->input->post('materialization_phase'),
                'likelihood' => $this->input->post('likelihood'),
                'reputation_impact' => $this->input->post('reputationimpact'),
                'hs_impact' => $this->input->post('hsimpact'),
                'env_impact' => $this->input->post('environmentimpact'),
                'legal_impact' => $this->input->post('legalimpact'),
                'quality_impact' => $this->input->post('qualityimpact'),
                'risk_rating' => $this->input->post('risk_rating'),
                'risk_level' => $this->input->post('risk_level'),
                'control_mitigation' => $this->input->post('control_mitigation'),
                'action_owner' => $this->input->post('action_owner'),
                'milestone_target_date' => $this->input->post('milestone_target_date'),
                'RiskCategories_category_id' => $risk_category_id,
                'Status_status_id' => $this->input->post('status'),
                'RiskOwner_riskowner_id' => $this->input->post('risk_owner'),
                'Subproject_subproject_id' => $this->input->post('register_id'),
                'CostMetric_cost_id' => $this->input->post('costimpact'),
                'ScheduleMetric_schedule_id' => $this->input->post('timeimpact'),
                'archived' => false,
                'User_user_id' => $global_data['user_id'],
                'created_at' => $timestamp,
                'effective_date' => $timestamp,
                'risk_uuid' => $risk_uuid,
                'description_change' => $this->input->post('description_change'),
                'likelihood_current' => $this->input->post('likelihood_current'),
                'reputation_impact_current' => $this->input->post('reputationimpact_current'),
                'hs_impact_current' => $this->input->post('hsimpact_current'),
                'env_impact_current' => $this->input->post('environmentimpact_current'),
                'legal_impact_current' => $this->input->post('legalimpact_current'),
                'quality_impact_current' => $this->input->post('qualityimpact_current'),
                'time_impact_current' => $this->input->post('timeimpact_current'),
                'cost_impact_current' => $this->input->post('costimpact_current'),
                'risk_rating_current' => $this->input->post('currentrisk_rating'),
                'risk_level_current' => $this->input->post('currentrisk_level'),
                'likelihood_target' => $this->input->post('likelihood_target'),
                'reputation_impact_target' => $this->input->post('reputationimpact_target'),
                'hs_impact_target' => $this->input->post('hsimpact_target'),
                'env_impact_target' => $this->input->post('environmentimpact_target'),
                'legal_impact_target' => $this->input->post('legalimpact_target'),
                'quality_impact_target' => $this->input->post('qualityimpact_target'),
                'time_impact_target' => $this->input->post('timeimpact_target'),
                'cost_impact_target' => $this->input->post('costimpact_target'),
                'risk_rating_target' => $this->input->post('targetrisk_rating'),
                'risk_level_target' => $this->input->post('targetrisk_level'),
                'action_item' => $this->input->post('action_item'),
                'RiskSubCategories_subcategory_id' => $risk_subcategory_id,
                'original_risk_id' => $risk_hazard_id,
                'risk_identifier' => $latest_risk_identifier
            );
            
            // insert form data into database
            if ($this->risk_model->insertRegistry($risk_data))
            {

                $post_date = date('Y-m-d');

                $num_fields = count($_POST['risk_response']['title']);

                for ($i = 0; $i < $num_fields; $i++) 
                {   
                    // Pack the field up in an array for ease-of-use.
                    $field = array(
                        'risk_uuid'=> $risk_uuid,
                        'response_uuid'=> $this->uuid->generate_uuid(),
                        'ResponseTitle_id' => $_POST['risk_response']['title'][$i],
                        'RiskStrategies_strategy_id' => $_POST['risk_response']['strategy'][$i],
                        'register_id' => $this->input->post('register_id'),
                        'user_id' => serialize($_POST['risk_response']['user']),
                        'created_at' => $post_date,
                        'updated_at' => $post_date,
                        'due_date' => $this->getResponseDueDate($_POST['risk_response']['date'][$i])
                    );
                    
                    // insert risk response data first
                    $this->risk_model->insertResponse($field);

                    // send email notifications for risk response due date
                    // $this->load->library('riskemail');
                    // $this->riskemail->send_response_notification($field['response_title'], $this->user_model->getUserEmail($field['user_id']), $field['created_at']);
                }

                $this->session->set_flashdata('positive_msg','Risk has been successfully added.');
                redirect('dashboard/risks');
            }
            else
            {
                // error
                $this->session->set_flashdata('negative_msg','Oops! Error. Please try again later!');
                redirect('dashboard/risks');
            }
        // }
    }

    function getMaterialization($project_id)
    {
        $materialization = $this->risk_model->getRiskMaterialization($project_id);
        
        if($materialization)
        {
            $options = array();

            foreach ($materialization as $row) 
            {
                $materialization_id = $row->id;
                $materialization_name = $row->name;
                $options[$materialization_id] = $materialization_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        } 
    }


    // risk strategies
    function getRiskStrategies($project_id)
    {
        $strategies = $this->risk_model->getRiskStrategies($project_id);
        
        if($strategies)
        {
            $options = array();

            foreach ($strategies as $row) 
            {
                $strategy_id = $row->id;
                $strategy_name = $row->name;
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
    function getStatus($project_id)
    {
        $status = $this->risk_model->getStatus($project_id);
        
        if($status)
        {
            $options = array();

            foreach ($status as $row) 
            {
                $status_id = $row->id;
                $status_name = $row->name;
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
    function getSystemSafety($project_id)
    {
        $safety = $this->risk_model->getSystemSafety($project_id);
        
        if($safety)
        {
            $options = array();

            foreach ($safety as $row) 
            {
                $safety_id = $row->id;
                $safety_name = $row->name;
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
    function getRealization($project_id)
    {
        $realization = $this->risk_model->getRealization($project_id);
        
        if($realization)
        {
            $options = array();

            foreach ($realization as $row) 
            {
                $realization_id = $row->id;
                $realization_name = $row->name;
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

    // subcategories
    function getSubCategories($category_id)
    {
        $subcategories = $this->risk_model->getRiskSubCategories($category_id);
        
        if($subcategories)
        {
            $options = array();

            foreach ($subcategories as $row) 
            {
                $subcategory_id = $row->subcategory_id;
                $subcategory_name = $row->subcategory_name;
                $options[$subcategory_id] = $subcategory_name;  
            }
            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }


    // risk owners
    function getRiskOwner($project_id)
    {
        $owners = $this->risk_model->getRiskOwner($project_id);
        
        if($owners)
        {
            $options = array();

            foreach ($owners as $row) 
            {
                $owner_id = $row->id;
                $owner_name = $row->name;
                $options[$owner_id] = $owner_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }

    // risk entity
    function getRiskEntity($project_id)
    {
        $entity = $this->risk_model->getRiskEntity($project_id);
        
        if($entity)
        {
            $options = array();

            foreach ($entity as $row) 
            {
                $entity_id = $row->id;
                $entity_name = $row->name;
                $options[$entity_id] = $entity_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }


    // risk response title
    function getRiskResponseTitle($project_id)
    {
        $response = $this->response_model->getResponseTitle($project_id);
        
        if($response)
        {
            $options = array();

            foreach ($response as $row) 
            {
                $response_id = $row->id;
                $response_name = $row->name;
                $options[$response_id] = $response_name;  
            }
            
            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }


    // risk cost
    function getRiskCost($project_id)
    {
        $cost = $this->risk_model->getRiskCost($project_id);
        
        if($cost)
        {
            $options = array();

            foreach ($cost as $row) 
            {
                $cost_id = $row->id;
                $cost_rating = $row->rating;
                $options[$cost_rating] = $cost_rating;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }


    // risk schedule
    function getRiskSchedule($project_id)
    {
        $schedule = $this->risk_model->getRiskSchedule($project_id);
        
        if($schedule)
        {
            $options = array();

            foreach ($schedule as $row) 
            {
                $schedule_id = $row->id;
                $schedule_rating = $row->rating;
                $options[$schedule_rating] = $schedule_rating;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }


    // risk registers
    function getSubProject()
    {
        $subproject = $this->risk_model->getSubProject();
        
        if($subproject)
        {
            $options = array();

            foreach ($subproject as $row) 
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


    // controller to view one risk item
    function single()
    {
    	$data = array();

        if($this->session->userdata('logged_in'))
        {
            // get global data
            $data = array_merge($data,$this->get_global_data());

            $uri_id = $this->uri->segment(3); // get id from third segment of uri

            // get risk data
            $risk = $this->risk_model->getRisk( $uri_id );

            // get risk revision data
            $revision = $this->risk_model->getRiskRevisions( $uri_id );

            $session_data = $this->session->userdata('logged_in');
            $data['user_project_id'] = $session_data['user_project_id'];

            //check if result is true
            // ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            if($risk) 
            {
                $data['risk_data'] = $risk;
                $data['revision_data'] = $revision;
                $data['title'] = $risk->original_risk_id; // assign risk title to page title

                // single project
                $single_project = $this->project_model->getSingleProject($session_data['user_project_id']);

                // breadcrumb
                $this->breadcrumb->add($single_project->project_name, 'dashboard/project/'.$session_data['user_project_id']);
                $this->breadcrumb->add($session_data['register_name'],'dashboard/riskregister/'.$risk->Subproject_subproject_id);
                $this->breadcrumb->add($data['title']);
                $data['breadcrumb'] = $this->breadcrumb->output();
                
                // get risk responses
                $data['risk_response'] = $this->risk_model->getRiskResponse( $risk->risk_uuid );
                
            } else
            {
                $data['risk_data'] = false;
            }

            // load page to show single risk item
            $this->template->load('dashboard', 'risk/single', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    // controller to view an old risk version
    function revision()
    {
    	$data = array('title' => 'Risk Revision');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $uri_id = $this->uri->segment(4); // get id from fourth segment of uri

            // get risk revision data
            $revision = $this->risk_model->getSingleRevision( $uri_id );

            if($revision) 
            {
                $data['revision_data'] = $revision;
                // get risk responses
                $data['risk_response'] = $this->risk_model->getRiskResponse( $revision->risk_uuid );
            } 
            else
            {
                $data['risk_data'] = false;
            }

            // load page to show single revision version
            $this->template->load('dashboard', 'risk/revision', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // view for duplicating risk based on selected register
    function duplicate_risk_view()
    {
        $data = array('title' => 'Duplicate Risk');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            $data['select_register_option'] = $this->get_register_name($data['user_id']);

            $project = $this->project_model->getProjects($data['user_id']);

            //check if result is true
            ($project) ? $data['project_data'] = $project : $data['project_data'] = false;

            // load page to show all devices
            $this->template->load('dashboard', 'registry/duplicate', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // get register name
    function get_register_name($user_id)
    {
      // get register information
      $register = $this->project_model->getRiskRegisters($user_id);

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

    // get risk response titles
    function getResponseTitle($register_id)
    {
        $response = $this->response_model->getResponseByRegister($register_id);
        
        if($response)
        {
            $options = array();

            foreach ($response as $row) 
            {
                $response_id = $row->response_id;
                $response_title = $row->response_title;
                $options[$response_id] = $response_title;  
            }
            return $options;
        }
        else
        {
            return FALSE;
        }
    }

    function getRegisterUser($register_id)
    {
        $user = $this->user_model->getRegisterUser($register_id);
        
        if($user)
        {
            $options = array();

            foreach ($user as $row) 
            {
                $user_id = $row->user_id;
                $user_name = $row->first_name . " " . $row->last_name;
                $options[$user_id] = $user_name;  
            }
            return $options;
        }
        else
        {
            return 'No Data!';
        }
    }


    # get reponse due date of which is after 7 days of the target date
    function getResponseDueDate($date)
    {
        return date("Y-m-d",strtotime("+7 days",strtotime($date)));
    }
}