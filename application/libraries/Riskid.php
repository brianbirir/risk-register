<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Riskid extends CI_Controller
{
    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->model('risk_model');
        $this->ci = $CI;
    }

    function generateRiskID($category_id,$subcategory_id)
    {
        $last_risk_id = $this->ci->risk_model->getLastRiskID();

        $risk_hazard_id = strval($category_id) . "." . strval($subcategory_id) . "." . strval($last_risk_id + 1);

        return $risk_hazard_id;
    }
}