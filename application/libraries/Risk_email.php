<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Risk_email extends CI_Controller
{

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->library('email');
        $CI->load->library('encrypt');
        $this->ci = $CI;
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

    function send_response_notification($title,$email,$due_date)
    {	
    	// initialize email library with configs
    	$this->ci->email->initialize($this->set_email_configs());
		$this->ci->email->set_newline("\r\n");

		$email_message ='Your risk reponse ' .$title. ' is due '.$due_date;

		log_message("debug", $email_message." of email: ".$email);
		
    	$this->ci->email->from('brianbirir1985@gmail.com', 'Risk Register Test');
		$this->ci->email->to($email);
		$this->ci->email->subject('Risk Response Notification');
		$this->ci->email->message($email_message);
		
		if($this->ci->email->send())
		{
			log_message("info","Response notification has been sent successfully");
		}
		else
		{
			log_message("error","Email notification sending has failed");
		}
    }

}