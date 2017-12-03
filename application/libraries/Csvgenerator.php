<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Csvgenerator extends CI_Controller
{

    // private $_riskdata;
    // private $_reportmodel;
    // public $ci;

    public function __construct()
    {
        $CI =& get_instance();

        // load database report module
        $CI->load->model('report_model');

        //  $this->_riskdata = $CI->report_model->getData();

        $this->ci = $CI;
    }
    

    function fetch_data($user_id,$main_category,$risk_level)
    {
        // $db_data = $this->ci->report_model->getData($main_category);
        $db_data = $this->ci->report_model->getFilteredRisk($user_id,$main_category,$risk_level);
        
        if($db_data)
        {
            $delimiter = ",";

            $filename = "risk_report_" . date('Y-m-d') . ".csv";

            // create file pointer
            $f = fopen('php://memory', 'w');
            
            //set column headers
            $fields = array(
                'Risk ID', 
                'Main Category', 
                'Identified Hazard/ Identified Risk', 
                'Cause/Trigger',
                'Effect', 
                'Risk Materialization Phase', 
                'Risk Owner',
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
                'Strategy',
                'Combinations of Measures/Controls:', 
                'System Safety', 
                'Realization', 
                'Likelihood', 
                'Impact', 
                'Risk Rating',
                'Risk Level', 
                'Action Owner', 
                'Milestone Target Date', 
                'Status'      
            );

            fputcsv($f, $fields, $delimiter);

            //  output each row of the data, format line as csv and write to file pointer
            foreach ($db_data as $data_row) {

                $lineData = array(
                    $data_row->item_id,
                    $this->ci->report_model->getRiskCategoriesName($data_row->RiskCategories_category_id), 
                    $data_row->cause_trigger, 
                    $data_row->identified_hazard_risk, 
                    $data_row->effect, 
                    $data_row->materialization_phase,
                    $data_row->risk_owner,
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
                    $this->ci->report_model->getRiskStrategiesName($data_row->RiskStrategies_strategy_id),
                    $data_row->control_mitigation,
                    $this->ci->report_model->getSystemSafetyName($data_row->SystemSafety_safety_id), 
                    $this->ci->report_model->getRealizationName($data_row->Realization_realization_id),
                    $data_row->residual_risk_likelihood,
                    $data_row->residual_risk_impact, 
                    $data_row->residual_risk_rating, 
                    $data_row->residual_risk_level,
                    $data_row->action_owner, 
                    $data_row->milestone_target_date,
                    $this->ci->report_model->getStatusName($data_row->Status_status_id)
                );

                fputcsv($f, $lineData, $delimiter);

            }

            //  move back to beginning of file
            fseek($f, 0);
            
            //  set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            
            //  output all remaining data on a file pointer
            fpassthru($f);
        }
        exit;
    }

    function filter_data($category)
    {
        $db_data = $this->ci->report_model->getData();
    }
}