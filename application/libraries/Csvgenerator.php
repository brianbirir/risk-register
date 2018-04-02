<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Csvgenerator extends CI_Controller
{

    public function __construct()
    {
        $CI =& get_instance();

        $CI->load->model('report_model');
        $CI->load->model('risk_model');
        $CI->load->model('user_model');
        $CI->load->helper('url');

        // load response library
        $CI->load->library( 'responses' );

        $this->ci = $CI;
    }
    

    function fetch_data( $user_id, $main_category, $risk_level, $risk_register, $assigned_register_id )
    {
        $db_data = $this->ci->report_model->getFilteredRisk( $user_id, $main_category, $risk_level, $risk_register, $assigned_register_id );
        
        if($db_data)
        {
            $delimiter = ",";

            $filename = "risk_report_" . date('Y-m-d') . ".csv";

            // create file pointer
            $f = fopen('php://memory', 'w');
            
            //set column headers
            $fields = array(
                'Risk ID', 
                'Risk Unique ID',
                'Title',
                'Main Category', 
                'Identified Hazard/ Identified Risk', 
                'Cause/Trigger',
                'Effect',
                'Project Location',
                'Description & Change', 
                'Risk Materialization Phase', 
                'Risk Register',
                'Likelihood', 
                'Time Impact', 
                'Cost Impact', 
                'Reputation Impact', 
                'H&S Impact', 
                'Environment Impact',
                'Legal Impact', 
                'Quality Impact', 
                'Risk Rating', 
                'Risk Level',
                'Risk Responses',
                'System Safety', 
                'Realization',  
                'Action Owner',
                'Action Item',
                'Milestone Target Date', 
                'Status',
                'Entity'      
            );

            fputcsv($f, $fields, $delimiter);

            //  output each row of the data, format line as csv and write to file pointer
            foreach ($db_data as $data_row) 
            {
                $risk_response = $this->ci->responses->collectResponses($data_row->risk_uuid);
                
                foreach ($risk_response as $value) {

                    $lineData = array(
                        $data_row->item_id,
                        $data_row->risk_uuid,
                        $data_row->risk_title,
                        $this->ci->report_model->getRiskCategoriesName($data_row->RiskCategories_category_id), 
                        $data_row->cause_trigger, 
                        $data_row->identified_hazard_risk, 
                        $data_row->effect,
                        $data_row->project_location, 
                        $data_row->description_change, 
                        // $data_row->materialization_phase,
                        $this->ci->report_model->getRiskMaterializationName($data_row->materialization_phase_materialization_id),
                        $this->ci->report_model->getSubProjectName($data_row->Subproject_subproject_id),
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
                        $value,
                        $this->ci->report_model->getSystemSafetyName($data_row->SystemSafety_safety_id), 
                        $this->ci->report_model->getRealizationName($data_row->Realization_realization_id),
                        $data_row->action_owner,
                        $data_row->action_item,
                        $data_row->milestone_target_date,
                        $this->ci->report_model->getStatusName($data_row->Status_status_id),
                        $this->ci->report_model->getRiskEntityName($data_row->Entity_entity_id)
                    );

                    fputcsv($f, $lineData, $delimiter);
                }
            }

            //  move back to beginning of file
            fseek($f, 0);
            
            //  set headers to download file rather than be displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            
            //  output all remaining data on a file pointer
            fpassthru($f);
        }
        redirect('dashboard/reports/risk_project'); 
        exit;
    }

    function fetch_manager_data($params = array())
    {
        $db_data = $this->ci->report_model->getManagerData(array(
            'category_id' => $params['risk_category'],
            'register_id' => $params['risk_register'],
            'date_to' => $params['date_to'],
            'date_from' => $params['date_from'],
            'user_id' => $params['user_id']
        ));
        
        if($db_data)
        {
            $delimiter = ",";

            $filename = "risk_report_" . date('Y-m-d_H-i-s') . ".csv";

            // create file pointer
            $f = fopen('php://memory', 'w');
            
            //set column headers
            $fields = array(
                'Risk ID', 
                'Risk Unique ID',
                'Title',
                'Main Category', 
                'Identified Hazard/ Identified Risk', 
                'Cause/Trigger',
                'Effect',
                'Project Location',
                'Description & Change', 
                'Risk Materialization Phase', 
                'Risk Register',
                'Likelihood', 
                'Time Impact', 
                'Cost Impact', 
                'Reputation Impact', 
                'H&S Impact', 
                'Environment Impact',
                'Legal Impact', 
                'Quality Impact', 
                'Risk Rating', 
                'Risk Level',
                'Risk Responses',
                'System Safety', 
                'Realization', 
                'Action Owner',
                'Action Item', 
                'Milestone Target Date', 
                'Status',
                'Entity'      
            );

            fputcsv($f, $fields, $delimiter);

            //  output each row of the data, format line as csv and write to file pointer
            foreach ($db_data as $data_row) 
            {
                $risk_response = $this->ci->responses->collectResponses($data_row->risk_uuid);
                
                foreach ($risk_response as  $value) {

                    $lineData = array(
                        $data_row->item_id,
                        $data_row->risk_uuid,
                        $data_row->risk_title,
                        $this->ci->report_model->getRiskCategoriesName($data_row->RiskCategories_category_id), 
                        $data_row->cause_trigger, 
                        $data_row->identified_hazard_risk, 
                        $data_row->effect,
                        $data_row->project_location, 
                        $data_row->description_change,
                        $this->ci->report_model->getRiskMaterializationName($data_row->materialization_phase_materialization_id),
                        $this->ci->report_model->getSubProjectName($data_row->Subproject_subproject_id),
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
                        $value,
                        $this->ci->report_model->getSystemSafetyName($data_row->SystemSafety_safety_id), 
                        $this->ci->report_model->getRealizationName($data_row->Realization_realization_id),
                        $data_row->action_owner,
                        $data_row->action_item,
                        $data_row->milestone_target_date,
                        $this->ci->report_model->getStatusName($data_row->Status_status_id),
                        $this->ci->report_model->getRiskEntityName($data_row->Entity_entity_id)
                    );

                    fputcsv($f, $lineData, $delimiter);
                }
            }

            //  move back to beginning of file
            fseek($f, 0);
            
            //  set headers to download file rather than be displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            
            //  output all remaining data on a file pointer
            fpassthru($f);
        }
        exit;
    }

    // filter data function
    function filter_data($category)
    {
        $db_data = $this->ci->report_model->getData();
    }
    
    
    function fetch_response_data($params = array())
    {
        $db_data = $this->ci->response_model->getResponseData(array(
            'user_id' => $params['user_id'],
            'register_id' => $params['register_id']
        ));
        
        if($db_data)
        {
            $delimiter = ",";
            $filename = "response_report_" . date('Y-m-d_H-i-s') . ".csv";
            
            // create file pointer
            $f = fopen('php://memory', 'w');
            
            //set column headers
            $fields = array(
                'Response ID', 
                'Risk Unique ID',
                'Response UUID',
                'Response Title', 
                'Risk Strategy', 
                'Register User',
                'Register',
                'Creation Date' 
            );

            fputcsv($f, $fields, $delimiter);

            // output each row of the data, format line as csv and write to file pointer
            foreach ($db_data as $data_row) 
            {
                $lineData = array(
                    $data_row->response_id,
                    $this->ci->risk_model->getRiskNameByUUID($data_row->risk_uuid),
                    $data_row->response_title,
                    $this->ci->risk_model->getRiskStrategiesName($data_row->RiskStrategies_strategy_id),
                    $this->ci->user_model->getUserNames($data_row->user_id),
                    $this->ci->risk_model->getSubProjectName($data_row->register_id),
                    $data_row->created_at
                );

                fputcsv($f, $lineData, $delimiter);
            }

            // move back to beginning of file
            fseek($f, 0);
            
            // set headers to download file rather than be displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            
            // output all remaining data on a file pointer
            fpassthru($f);
        }
        exit;
    }
}