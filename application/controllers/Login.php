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
     }

     function index()
     {
        
        $data = array(
                'title' => 'Login'
        );
        
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
               //validation fails
               $this->load->view('login_view');
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
                            //'role_id' => $row->role_id,
                            'first_name' => $row->first_name,
                            'last_name'=> $row->last_name,
                           );
                          $this->session->set_userdata('logged_in', $sess_array);
                        }
                       
                        // get company name
                        
                        // $data['company_name'] = $this->company_model->getCompanyName($session_data['id']);
                        
                        $session_data = $this->session->userdata('logged_in');
                        $data['user_id'] = $session_data['user_id'];


                        // check from profile table if profile data exists 
                        $profile_exists = $this->profile_model->getProfile($session_data['user_id']);
                        
                        // if profile exists then load dashboard
                        if($profile_exists)
                        {

                          redirect('dashboard');

                        } else // if profile data does not exist redirect to profile registration
                        {
                          $this->session->set_flashdata('warning-msg', 'Please fill in your profile details before accessing the dashboard'); 
                          redirect('profile_registration');
                        }
                         //redirect('dashboard');
                    }
                    else
                    {
                         $this->session->set_flashdata('negative-msg', 'Invalid username and password!');
                         redirect('login');
                    }
               }
               else
               {
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