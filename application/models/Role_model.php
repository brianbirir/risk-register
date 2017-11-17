<?php

    class Role_model extends CI_Model {

        
        public function __construct()
        {
            parent::__construct();
        }


        // add role
        function insertRole($data)
        {
            return $this->db->insert('Role', $data);
        }


        // get all roles
        function getRoles()
        {   
            $this->db->select('*');
            $this->db->from('Role');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        
        // get single role
        function getRole($role_id)
        {
            $this->db->select('*');
            $this->db->from('Role');
            $this->db->where('role_id',$role_id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }


        // get role name
        function getRoleName($role_id)
        {
            $this->db->select('*');
            $this->db->from('Role');
            $this->db->where('role_id',$role_id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->role_name : false;
        }


        // update role
        function updateRole($data,$id)
        {
            $this->db->set($data);
            $this->db->where('role_id',$id);
            $this->db->update('Role',$data);
            return true;
        }


        // delete role
        function deleteRole($role_id)
        {
            $this->db->delete('Role',array('role_id'=>$role_id));
            return true;
        }
    
    }