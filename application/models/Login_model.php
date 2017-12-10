<?php
class Login_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // get all details from users table
    function get_user($user,$password)
    {
        // check if both password and username checkers are true
        //if ($this->check_password($password) && $this->check_username($user))
        //{
            $this->db->select('*');
            $this->db->from('User');
            $this->db->where('username', $user);
            $this->db->where('password', md5($password));
            $query = $this->db->get();
            // $row = $query->row();

            // if ($row->password != $password) {
            //     return "Wrong Password";
            // } else {
                return ($query->num_rows() == 1) ? $query->result() : false;
            //}
        
        //}
        // check if username checker is true and password checker is false
        // elseif($this->check_username($user) && !$this->check_password($password))
        // {   
        //     return "Wrong Password";
        // }
        // check if username checker is false
        // elseif(!$this->check_username($user))
        // {
        //     return "No Username";
        // }
    }

    
    // update password
    function updatePassword($data,$user_id)
    {
        $this->db->set($data);
        $this->db->where('user_id',$user_id);
        $this->db->update('User',$data);
        return true;
    }

    // check if username exists
    function check_username($user)
    {
        $this->db->select('username');
        $this->db->from('User');
        $this->db->where('username', $user);
        $query = $this->db->get();
        return ($query->num_rows() == 1) ? true : false;
    }


    // check password is the same as that in the user table row
    function check_password($user_id)
    {
        $this->db->select('password');
        $this->db->from('User');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();   
        $row = $query->row();
        return (isset($row)) ? $row->password : false; // return password
    }

}
?>
