<?php

/* This class handles global variables to be used throughout the system
 * It extends the core CI controller class
*/

class RISK_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	function get_global_data()
	{
        $session_data = $this->session->userdata('logged_in');
        $global_data['first_name'] = $session_data['first_name'];
        $global_data['last_name'] = $session_data['last_name'];
        $global_data['user_id'] = $session_data['user_id'];
        $global_data['role_id'] = $session_data['role_id'];
        return $global_data;
	}

	function get_role_data()
	{
        // get role names from database
        $roles = $this->user_model->getRoles();

        if($roles)
        {
            $options = array();

            foreach ($roles as $row) {
                $role_id = $row->role_id;
                $role_type = $row->role_type;
                $options[$role_id] = $role_type;
            }

            return $data['select_option'] = $options;
        }
        else
        {
            return $data['select_option'] = 'No Data!';
        }
	}

}