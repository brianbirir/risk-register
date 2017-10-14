<?php

    class Registry_model extends CI_Model {

        
        public function __construct()
        {
            parent::__construct();
        }

        
        // add risk registry
        function insertRegistry($data)
        {
            return $this->db->insert('RiskRegistry', $data);
        }


        // get risk registry registered under the particular user and subproject
        function getRegistry($user_id)
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->join('Subproject','Subproject.subproject_id = RiskRegistry.Subproject_subproject_id');
            $this->db->join('Project','Project.project_id = Subproject.Project_project_id');
            $this->db->where('Project.User_user_id',$user_id);
            $query = $this->db->get();
            
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // update risk registry
        function updateRegistry($data)
        {
            
        }


        // delete risk registry
        function deleteRegistry($risk_id)
        {
            
        }

        // get risk strategies info
        function getRiskStrategies(){
            $this->db->select('*');
            $this->db->from('RiskStrategies');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get system safety info
        function getSystemSafety(){
            $this->db->select('*');
            $this->db->from('SystemSafety');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get status
        function getStatus(){
            $this->db->select('*');
            $this->db->from('Status');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get realization
        function getRealization(){
            $this->db->select('*');
            $this->db->from('Realization');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        
        // get risk categories
        function getRiskCategories(){
            $this->db->select('*');
            $this->db->from('RiskCategories');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }
    }