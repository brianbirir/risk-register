<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Email extends RISK_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->library('email');
        $this->load->library('encrypt');
    }

    // set email configurations
    function set_email_configs()
    {
    	$sender_email = 'brianbirir1985@gmail.com';
    	$user_password = 'Breal@1985#!';

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = $sender_email;
		$config['smtp_pass'] = $user_password;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['smtp_crypto'] = 'ssl';

		return $config;
    }

    function send_response_notification()
    {	
    	// initialize email library with configs
    	$this->email->initialize($this->set_email_configs());

		$this->email->set_newline("\r\n");

    	$this->email->from('brianbirir1985@gmail.com', 'Risk Register Test');
		$this->email->to('brianbirir@gmail.com');
		$this->email->subject('Risk Response Notification');
		$this->email->message('Your risk reponse is due 20th August 2018');
		$this->email->send();

		echo $this->email->print_debugger(array('headers','subject','body'));
    }

}