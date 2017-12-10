<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends RISK_Controller
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


  // login function
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
        // load if validation failed
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
            * set session data
            * session data is obtained from the users table via login model
            */
            $sess_array = array();

            foreach($user_result as $row)
            {
              $sess_array = array(
                'user_id' => $row->user_id,
                'username' => $row->username,
                'first_name' => $row->first_name,
                'last_name'=> $row->last_name,
                'role_id'=> $row->Role_role_id
              );
              $this->session->set_userdata('logged_in', $sess_array);
            }
            $session_data = $this->session->userdata('logged_in');

            $data['user_id'] = $session_data['user_id'];

            if ($this->check_password($data['user_id']))
            {
              redirect('change_password');
            } else {
              redirect('dashboard');
            }
  
          }
          else
          {
            $this->session->set_flashdata('negative-msg', 'Unable to login!');
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


  // change password view
  function change_password_view()
  {
    $data = array('title' => 'Change Password');
    
    // load default template with change password view
    $this->template->load('default', 'login/change_password', $data);
  }


  // change password function
  function change_password()
  {
    //get the posted values
    $username = $this->input->post("new_password");

    // validate passowrd
    $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|md5');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]|md5');

    //validate form input
    if ($this->form_validation->run() == FALSE)
    {
        $data = array('title' => 'Confirm Password');
        $this->template->load('default', 'login/change_password', $data);
    }
    else
    {
      $timestamp = date('Y-m-d G:i:s');

      // get global data
      $global_data = $this->get_global_data();

      // update password with time stamp
      $db_data = array(
          'password' => $this->input->post('new_password'),
          'updated_at' => $timestamp
      );
      
      // insert form data into database
      if ($this->login_model->updatePassword($db_data,$global_data['user_id']))
      {
        $this->session->set_flashdata('positive-msg','You have successfully updated your password.');
        redirect('dashboard');
      }
      else
      {
          // error
          $this->session->set_flashdata('negative-msg','Oops! Error. Please try again later!');
          redirect('change_password');
      }
    }

  }


  // check password
  function check_password($user_id)
  {
    // get password of user based on user id
    $password_check = $this->login_model->check_password($user_id);

    if ($password_check == md5('password'))
    {
      return true;
    }
    else {
      return false;
    }
  }

  // log out function
  function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    $this->session->set_flashdata('logout_msg', 'You have logged out successfully!');
    redirect(site_url()); //redirect to home page
  }
}?>