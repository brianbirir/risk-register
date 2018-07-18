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

    // get users by parent ID
    function getUsers($params = array())
    {
        $this->db->select('*');
        $this->db->from('User');

        if(array_key_exists('user_id',$params))
        {
            $this->db->where('parent_user_id',$params['user_id']);
        }
       
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
         
         if($query->num_rows() == 1)
         {
            $first_name = $row->first_name;
            $last_name = $row->last_name;
            $full_name = $first_name." ".$last_name;
            return $full_name;
         }
         else
         {
             return false;
         }  
     }


    // get user's email address
    function getUserEmail($id)
    {
        $this->db->select('*');
        $this->db->from('User');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        $row = $query->row();
        return ($query->num_rows() == 1) ? $row->email : false;
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
        $this->deleteAssignedRegister($user_id);
        $this->db->delete('User',array('user_id'=>$user_id));
        return true;
    }


    function deleteGeneralUser($user_id)
    {
        $this->db->from("User");
        $this->db->join("Subproject_has_User", "Subproject_has_User.User_user_id = User.user_id");
        $this->db->where("Subproject_has_User.User_user_id", $user_id);
        $this->db->delete("User");
    }

    function deleteAssignedRegister($user_id)
    {
        $this->db->delete('Subproject_has_User',array('User_user_id'=>$user_id));
        return true;
    }

    // get a user based on assigned risk register via register ID
    function getRegisterUser($register_id)
    {
        $this->db->select("*");
        $this->db->from("User");
        $this->db->join("Subproject_has_User", "Subproject_has_User.User_user_id = User.user_id");
        $this->db->where("Subproject_has_User.Subproject_subproject_id", $register_id);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : false;
    }
}
?>