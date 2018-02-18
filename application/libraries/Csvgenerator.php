<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Csvgenerator extends CI_Controller
{

    public function __construct()
    {
        $CI =& get_instance();

        // load database report module
        $CI->load->model( 'report_model' );

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
                'Likelihood', 
                'Impact', 
                'Risk Rating',
                'Risk Level', 
                'A.O. First Name',
                'A.O. Last Name', 
                'A.O. Email',
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
                        $data_row->residual_risk_likelihood,
                        $data_row->residual_risk_impact, 
                        $data_row->residual_risk_rating, 
                        $data_row->residual_risk_level,
                        $data_row->action_owner_fname,
                        $data_row->action_owner_lname, 
                        $data_row->action_owner_email, 
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

    function fetch_manager_data($params = array())
    {
        $db_data = $this->ci->report_model->getManagerData(array(
            'category_id' => $params['risk_category'],
            'register_id' => $params['risk_register'],
            'user_id' => $params['user_id']
        ));
        
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
                'Comments', 
                'Risk Rating', 
                'Risk Level',
                'Risk Responses',
                'System Safety', 
                'Realization', 
                'Likelihood', 
                'Impact', 
                'Risk Rating',
                'Risk Level', 
                'A.O. First Name',
                'A.O. Last Name', 
                'A.O. Email', 
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
                        $data_row->comments,  
                        $data_row->risk_rating,
                        $data_row->risk_level,
                        $value,
                        $this->ci->report_model->getSystemSafetyName($data_row->SystemSafety_safety_id), 
                        $this->ci->report_model->getRealizationName($data_row->Realization_realization_id),
                        $data_row->residual_risk_likelihood,
                        $data_row->residual_risk_impact, 
                        $data_row->residual_risk_rating, 
                        $data_row->residual_risk_level,
                        $data_row->action_owner_fname,
                        $data_row->action_owner_lname, 
                        $data_row->action_owner_email,
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

}