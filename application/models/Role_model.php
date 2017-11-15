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
            $this->db->from('Roles');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // update role
        function updateRole($data)
        {
            
        }


        // delete role
        function deleteRole($role_id)
        {
            
        }
    
    }