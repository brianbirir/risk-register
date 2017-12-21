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
    }

    // view all registered risks owned by a user
    function index()
    {
        $data = array('title' => 'Risks');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get risk data belonging to specific user 
            $risk = $this->risk_model->getUserRisk($data['user_id']);

            //check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            // load page to show all registered risks
            $this->template->load('dashboard', 'risk/index', $data);
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
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get risk data belonging to specific user 
            $risk = $this->risk_model->getUserArchivedRisk($data['user_id']);

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
        $data = array('title' => 'Register Risk');
        
        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            $data['register_row'] = $this->project_model->getAssignedRiskRegisterName($data['user_id']);
        
            // select drop down
            $data['select_status'] = $this->getStatus();
            $data['select_category'] = $this->getCategories();
            $data['select_strategy'] = $this->getRiskStrategies();
            $data['select_safety'] = $this->getSystemSafety();
            $data['select_realization'] = $this->getRealization();
            $data['select_subproject'] = $this->getSubProject();
            $data['select_risk_owner'] = $this->getRiskOwner();            

            // load page to show all devices
            $this->template->load('dashboard', 'risk/add', $data);
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
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get id from fourth segment of uri
            $id = $this->uri->segment(4);

            // get risk data based on id from uri
            $data['risk'] = $this->risk_model->getRisk($id);

            $data['register_row'] = $this->project_model->getAssignedRiskRegisterName($data['user_id']);
                
            // get risk responses
            $data['risk_response'] = $this->risk_model->getRiskResponse($data['risk']->risk_uuid);

            // select drop down
            $data['select_status'] = $this->getStatus();
            $data['select_category'] = $this->getCategories();
            $data['select_strategy'] = $this->getRiskStrategies();
            $data['select_safety'] = $this->getSystemSafety();
            $data['select_realization'] = $this->getRealization();
            $data['select_subproject'] = $this->getSubProject();
            $data['select_risk_owner'] = $this->getRiskOwner();

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
        // view title
        $data = array('title' => 'Edit Risk');

        //set validation rules
        $this->form_validation->set_rules('identified_hazard_risk', 'Identified Hazard Risk', 'trim|required');
        $this->form_validation->set_rules('cause_trigger', 'Cause Trigger', 'trim|required');
        $this->form_validation->set_rules('effect', 'Effect', 'trim|required');
        $this->form_validation->set_rules('materialization_phase', 'Materialization Phase', 'trim|required');
        $this->form_validation->set_rules('risk_rating', 'Risk Rating', 'trim|required');
        $this->form_validation->set_rules('risk_level', 'Risk Level', 'trim|required');
        $this->form_validation->set_rules('comments', 'Comments', 'trim|required');
        $this->form_validation->set_rules('control_mitigation', 'Risk Control Mitigation', 'trim|required');
        $this->form_validation->set_rules('residual_risk_rating', 'Residual Risk Rating', 'trim|required');
        $this->form_validation->set_rules('residual_risk_level', 'Residual Risk Level', 'trim|required');
        $this->form_validation->set_rules('action_owner', 'Action Owner', 'trim|required');
        $this->form_validation->set_rules('milestone_target_date', 'Milestone Target Date', 'trim|required');

        // validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // get risk id from hidden field
            $risk_id= $this->input->post('risk_id');

            // get risk data based on id hidden field
            $data['risk'] = $this->risk_model->getRisk($risk_id);

            // select drop down
            $data['select_status'] = $this->getStatus();
            $data['select_category'] = $this->getCategories();
            $data['select_strategy'] = $this->getRiskStrategies();
            $data['select_safety'] = $this->getSystemSafety();
            $data['select_realization'] = $this->getRealization();
            $data['select_subproject'] = $this->getSubProject();
            $data['select_risk_owner'] = $this->getRiskOwner();

            // load page to show all devices
            $this->template->load('dashboard', 'risk/edit', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            // get risk id from hidden field
            $risk_id= $this->input->post('risk_id');

            //insert the risk data into database
            $risk_data = array(
                'identified_hazard_risk' => $this->input->post('identified_hazard_risk'),
                'cause_trigger' => $this->input->post('cause_trigger'),
                'effect' => $this->input->post('effect'),
                'materialization_phase' => $this->input->post('materialization_phase'),
                'likelihood' => $this->input->post('likelihood'),
                'time_impact' => $this->input->post('timeimpact'),
                'cost_impact' => $this->input->post('costimpact'),
                'reputation_impact' => $this->input->post('reputationimpact'),
                'hs_impact' => $this->input->post('hsimpact'),
                'env_impact' => $this->input->post('environmentimpact'),
                'legal_impact' => $this->input->post('legalimpact'),
                'quality_impact' => $this->input->post('qualityimpact'),
                'risk_rating' => $this->input->post('risk_rating'),
                'risk_level' => $this->input->post('risk_level'),
                'comments' => $this->input->post('comments'),
                'control_mitigation' => $this->input->post('control_mitigation'),
                'action_owner' => $this->input->post('action_owner'),
                'milestone_target_date' => $this->input->post('milestone_target_date'),
                'RiskCategories_category_id' => $this->input->post('main_category'),
                'RiskStrategies_strategy_id' => $this->input->post('strategy'),
                'SystemSafety_safety_id' => $this->input->post('system_safety'),
                'Status_status_id' => $this->input->post('status'),
                'Realization_realization_id' => $this->input->post('realization'),
                'RiskOwner_riskowner_id' => $this->input->post('risk_owner'),
                'residual_risk_likelihood' => $this->input->post('residual_likelihood'),
                'residual_risk_impact' => $this->input->post('residual_impact'),
                'residual_risk_rating' => $this->input->post('residual_risk_rating'),
                'residual_risk_level' => $this->input->post('residual_risk_level'),
                'Subproject_subproject_id' => $this->input->post('sub_project'),
                'updated_at' => $timestamp
            );
            
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
        $timestamp = date('Y-m-d G:i:s');
        $archived = true;

        // get id from fourth segment of uri
        $id = $this->uri->segment(4);
        
        $archive_data = array(
            'archived_date' => $timestamp,
            'archived' =>  $archived
        );

        // archive risk record
        if($this->risk_model->archiveRisk($archive_data,$id))
        {
            $this->session->set_flashdata('positive-msg','You have archived the risk item successfully!');

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
        $timestamp = date('Y-m-d G:i:s');
        
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
        // load uuid library
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
            $timestamp = date('Y-m-d G:i:s');

            // get global data
            $global_data = $this->get_global_data();

            // get risk uuid
            $risk_uuid = $this->input->post('risk_uuid');

            //insert the risk data into database
            $risk_data = array(
                'identified_hazard_risk' => $this->input->post('identified_hazard_risk'),
                'cause_trigger' => $this->input->post('cause_trigger'),
                'risk_title' => $this->input->post('risk_title'),
                'project_location' => $this->input->post('project_location'),
                'effect' => $this->input->post('effect'),
                'materialization_phase' => $this->input->post('materialization_phase'),
                'likelihood' => $this->input->post('likelihood'),
                'time_impact' => $this->input->post('timeimpact'),
                'cost_impact' => $this->input->post('costimpact'),
                'reputation_impact' => $this->input->post('reputationimpact'),
                'hs_impact' => $this->input->post('hsimpact'),
                'env_impact' => $this->input->post('environmentimpact'),
                'legal_impact' => $this->input->post('legalimpact'),
                'quality_impact' => $this->input->post('qualityimpact'),
                'risk_rating' => $this->input->post('risk_rating'),
                'risk_level' => $this->input->post('risk_level'),
                'comments' => $this->input->post('comments'),
                'control_mitigation' => $this->input->post('control_mitigation'),
                'action_owner' => $this->input->post('action_owner'),
                'milestone_target_date' => $this->input->post('milestone_target_date'),
                'RiskCategories_category_id' => $this->input->post('main_category'),
                'SystemSafety_safety_id' => $this->input->post('system_safety'),
                'Status_status_id' => $this->input->post('status'),
                'Realization_realization_id' => $this->input->post('realization'),
                'RiskOwner_riskowner_id' => $this->input->post('risk_owner'),
                'residual_risk_likelihood' => $this->input->post('residual_likelihood'),
                'residual_risk_impact' => $this->input->post('residual_impact'),
                'residual_risk_rating' => $this->input->post('residual_risk_rating'),
                'residual_risk_level' => $this->input->post('residual_risk_level'),
                'Subproject_subproject_id' => $this->input->post('register_id'),
                'archived' => false,
                'User_user_id' => $global_data['user_id'],
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
                'risk_uuid' => $risk_uuid,
                'entity' => $this->input->post('entity'),
                'description_change' => $this->input->post('description_change')
            );
            
            // insert form data into database
            if ($this->risk_model->insertRegistry($risk_data))
            {
                $num_fields = count($_POST['risk_response']['title']);

                for ($i = 0; $i < $num_fields; $i++) 
                {
                    // Pack the field up in an array for ease-of-use.
                    $field = array(
                        'risk_uuid'=> $risk_uuid,
                        'response_uuid'=> $this->uuid->generate_uuid(),
                        'response_title' => $_POST['risk_response']['title'][$i],
                        'RiskStrategies_strategy_id' => $_POST['risk_response']['strategy'][$i]
                    );

                    $this->risk_model->insertResponse($field);
                }

                $this->session->set_flashdata('positive-msg','Risk has been successfully added.');
                redirect('dashboard/risks');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('dashboard/risks');
            }
        // }
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
    function getCategories()
    {
        $categories = $this->risk_model->getRiskCategories();
        
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


    // risk owners
    function getRiskOwner()
    {
        $owners = $this->risk_model->getRiskOwner();
        
        if($owners)
        {
            $options = array();

            foreach ($owners as $row) 
            {
                $owner_id = $row->riskowner_id;
                $owner_name = $row->risk_owner;
                $options[$owner_id] = $owner_name;  
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
    	$data = array('title' => 'Risk Item');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            $uri_id = $this->uri->segment(3); // get id from third segment of uri

            // get risk data
            $risk = $this->risk_model->getRisk($uri_id);

            //check if result is true
            // ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            if($risk) 
            {
                $data['risk_data'] = $risk;
                
                // get risk responses
                $data['risk_response'] = $this->risk_model->getRiskResponse($risk->risk_uuid);
                
            } else
            {
                $data['risk_data'] = false;
            }

            // load page to show all registered risks
            $this->template->load('dashboard', 'risk/single', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
}