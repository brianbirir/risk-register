<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class RiskRegistry extends MY_Controller
{    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('breadcrumb');
        $this->load->model('registry_model');
    }

    
    // view all registered risks owned by a subproject
    function index()
    {
        $data = array('title' => 'Risk Registry');

        if($this->session->userdata('logged_in'))
        {
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data,$this->get_global_data());

            // get risk data
            $risk = $this->registry_model->getRegistry($data['user_id']);

            //check if result is true
            ($risk) ? $data['risk_data'] = $risk : $data['risk_data'] = false;

            // load page to show all registered risks
            $this->template->load('dashboard', 'risk_registry/index', $data);
        }
        else
        {
            // if no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    
    
    // the view for adding risk registry
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

            // select drop down
            $data['select_status'] = $this->getStatus();
            $data['select_category'] = $this->getCategories();
            $data['select_strategy'] = $this->getRiskStrategies();
            $data['select_safety'] = $this->getSystemSafety();
            $data['select_realization'] = $this->getRealization();
            $data['select_subproject'] = $this->getSubProject();

            // load page to show all devices
            $this->template->load('dashboard', 'risk_registry/add', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    // function for adding risk
    function register()
    {
        //set validation rules
        $this->form_validation->set_rules('identified_hazard_risk', 'Identified Hazard Risk', 'trim|required');
        $this->form_validation->set_rules('cause_trigger', 'Cause Trigger', 'trim|required');
        $this->form_validation->set_rules('effect', 'Effect', 'trim|required');
        $this->form_validation->set_rules('materialization_phase', 'Materialization Phase', 'trim|required');
        $this->form_validation->set_rules('risk_owner', 'Risk Owner', 'trim|required');
        $this->form_validation->set_rules('risk_rating', 'Risk Rating', 'trim|required');
        $this->form_validation->set_rules('risk_level', 'Risk Level', 'trim|required');
        $this->form_validation->set_rules('comments', 'Comments', 'trim|required');
        $this->form_validation->set_rules('control_mitigation', 'Risk Control Mitigation', 'trim|required');
        $this->form_validation->set_rules('residual_risk_rating', 'Residual Risk Rating', 'trim|required');
        $this->form_validation->set_rules('residual_risk_level', 'Residual Risk Level', 'trim|required');
        $this->form_validation->set_rules('action_owner', 'Action Owner', 'trim|required');
        $this->form_validation->set_rules('milestone_target_date', 'Milestone Target Date', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            $data = array('title' => 'Register Risk');
            // breadcrumb
            $this->breadcrumb->add($data['title']);
            $data['breadcrumb'] = $this->breadcrumb->output();

            // get global data
            $data = array_merge($data, $this->get_global_data());

            // select drop down
            $data['select_status'] = $this->getStatus();
            $data['select_category'] = $this->getCategories();
            $data['select_strategy'] = $this->getRiskStrategies();
            $data['select_safety'] = $this->getSystemSafety();
            $data['select_realization'] = $this->getRealization();
            $data['select_subproject'] = $this->getSubProject();

            // load page to show all devices
            $this->template->load('dashboard', 'risk_registry/add', $data);
        }
        else
        {
            $timestamp = date('Y-m-d G:i:s');

            //insert the risk data into database
            $data = array(
                'identified_hazard_risk' => $this->input->post('identified_hazard_risk'),
                'cause_trigger' => $this->input->post('cause_trigger'),
                'effect' => $this->input->post('effect'),
                'materialization_phase' => $this->input->post('materialization_phase'),
                'risk_owner' => $this->input->post('risk_owner'),
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
                'residual_risk_likelihood' => $this->input->post('residual_likelihood'),
                'residual_risk_impact' => $this->input->post('residual_impact'),
                'residual_risk_rating' => $this->input->post('residual_risk_rating'),
                'residual_risk_level' => $this->input->post('residual_risk_level'),
                'Subproject_subproject_id' => $this->input->post('sub_project'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            );
            
            // insert form data into database
            if ($this->registry_model->insertRegistry($data))
            {
                $this->session->set_flashdata('positive-msg','Risk has been successfully added.');
                redirect('dashboard/riskregistry');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','Oops! Error. Please try again later!');
                redirect('signup');
            }
        }
    }


    // risk strategies
    function getRiskStrategies()
    {
        $strategies = $this->registry_model->getRiskStrategies();
        
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
        $status = $this->registry_model->getStatus();
        
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
        $safety = $this->registry_model->getSystemSafety();
        
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
        $realization = $this->registry_model->getRealization();
        
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
        $categories = $this->registry_model->getRiskCategories();
        
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

    // categories
    function getSubProject()
    {
        $subproject = $this->registry_model->getSubProject();
        
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
}