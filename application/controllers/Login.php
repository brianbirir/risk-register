<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller
{
  function __construct()
  {
      parent::__construct();
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->helper('html');
      $this->load->library('form_validation');
      $this->load->library('template');
      $this->load->model('login_model');
  }

  function index()
  {
    
    $data = array('title' => 'Login');
    
    // load default template with login view
    $this->template->load('default', 'login/index', $data);
    
  }

  function login()
  {
    //get the posted values
    $username = $this->input->post("txt_username");
    $password = $this->input->post("txt_password");

    //set validations
    $this->form_validation->set_rules("txt_username", "Username", "trim|required");
    $this->form_validation->set_rules("txt_password", "Password", "trim|required");

      if ($this->form_validation->run() == FALSE)
      {
        // load if validation failes
        $data = array('title' => 'Login');
        $this->template->load('default', 'login/index', $data);
      }
      else
      {
        //validation succeeds
        if ($this->input->post('btn_login') == "Login")
        {
          //check if username and password is correct from database
          $user_result = $this->login_model->get_user($username, $password);
          
          if ($user_result) //if active user record is present
          {
            /* 
            set session data
            session data is obtained from the users table via login model
            */
            $sess_array = array();

            foreach($user_result as $row)
            {
              $sess_array = array(
                'user_id' => $row->user_id,
                'username' => $row->username,
                'first_name' => $row->first_name,
                'last_name'=> $row->last_name,
                );
              $this->session->set_userdata('logged_in', $sess_array);
            }
            $session_data = $this->session->userdata('logged_in');
            $data['user_id'] = $session_data['user_id'];
            redirect('dashboard');
          }
          else
          {
            $this->session->set_flashdata('negative-msg', 'Invalid username and password!');
            redirect('login');
          }
        }
        else
        {
          $this->session->set_flashdata('negative-msg', 'Login button name does not match');
          redirect('login');
        }
      }
  }

    function logout()
    {
      $this->session->unset_userdata('logged_in');
      session_destroy();
      $this->session->set_flashdata('logout_msg', 'You have logged out successfully!');
      redirect(site_url()); //redirect to home page
    }
}?>