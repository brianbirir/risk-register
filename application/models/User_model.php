<?php

class User_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    // insert data into users table
    function insertUser($data)
    {
        return $this->db->insert('User', $data);
    }

    // get all roles 
    function getRoles()
    {
        $this->db->select('role_id,role_name'); // select role_name and role_id columns
        $this->db->where('role_id !=',1);
        $this->db->where('role_name !=','General User');
        $query = $this->db->get('Role'); // select role table
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    // get a specific role from the database
    function getRole($id)
    {
        $this->db->select('role_name'); // select role_name column
        $this->db->where('role_id',$id); // select based on role id
        $query = $this->db->get('Role'); // select role table
        $row = $query->row();
        return $row->role_type;
    }
    
    // return role id
    function getRoleID($role_name)
    {
        $this->db->select('role_id');
        $this->db->from('Role');
        $this->db->where('role_name',$role_name);
        $query = $this->db->get();
        $row = $query->row();
        return $row->role_id;
    }


    function getUsers($user_id)
    {
        $this->db->select('*');
        $this->db->from('User');
        // $this->db->where('user_id !=',1);
        $this->db->where('parent_user_id',$user_id);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : false;
    }


    // get a single user
    function getUser($id)
    {
        $this->db->select('*');
        $this->db->from('User');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        $row = $query->row();
        return ($query->num_rows() == 1) ? $row : false;
    }

     // get a single user of general role
     function getUserNames($id)
     {
         $this->db->select('*');
         $this->db->from('User');
         $this->db->where('user_id',$id);
         $query = $this->db->get();
         $row = $query->row();
         $first_name = $row->first_name;
         $last_name = $row->last_name;
         $full_name = $first_name." ".$last_name;
         // return ($query->num_rows() == 1) ? $full_name : false;

         return $full_name;
     }


    // update user
    function updateUser($data,$id)
    {
        $this->db->set($data);
        $this->db->where('user_id',$id);
        $this->db->update('User',$data);
        return true;
    }


    // delete user
    function deleteUser($user_id)
    {
        $this->db->delete('User',array('user_id'=>$user_id));
        return true;
    }
}
?>