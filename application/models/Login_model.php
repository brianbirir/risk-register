<?php
class Login_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // get all details from users table
    function get_user($user,$password)
    {
        $this->db->select('*');
        $this->db->from('User');
        $this->db->where('username', $user);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        return ($query->num_rows() == 1) ? $query->result() : false;
    }

}
?>
