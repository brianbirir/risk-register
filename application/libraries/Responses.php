<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Responses extends CI_Controller
{

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->model('report_model');
        $this->ci = $CI;
    }

    // collect all risk responses belonging to a single risk item
    function collectResponses($risk_uuid)
    {
        // get response data via report model
        $response_data = $this->ci->report_model->getResponses($risk_uuid);

        $response_output = [];

        if ($response_data && !empty($response_data)) {
	        
	        $count = 0; // initialize count
	        // loop through each row output
	        foreach ($response_data as $row) 
	        {
	            $count += 1;
	            $response_title = $row->response_title; 
	            $response_strategy = $this->ci->report_model->getRiskStrategiesName($row->RiskStrategies_strategy_id);
	            $response = $count . " [Response Title: " . $response_title . ", Response Strategy: " . $response_strategy . "]";
	            //	$response_output = $count . " [Response Title: " . $response_title;
	            array_push($response_output, $response);
	            //	return $response;
	        }

	        return $response_output;
    	}
    	else 
    	{
    		array_push($response_output, 'No reponse data!');
    		return $response_output;
    	}
    }

}