<?php

    class Risk_model extends CI_Model {

        
        public function __construct()
        {
            parent::__construct();
        }

        
        // add risk registry
        function insertRegistry($data)
        {
            return $this->db->insert('RiskRegistry', $data);
        }


        // get risks registered by specific user
        function getRisk($user_id)
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('User_user_id',$user_id);
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

        // get subproject
        function getSubProject(){
            $this->db->select('*');
            $this->db->from('Subproject');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // Get name from each entity from database based on ID

        // get risk strategies info
        function getRiskStrategiesName($id){
            $this->db->select('*');
            $this->db->from('RiskStrategies');
            $this->db->where('strategy_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->strategy_name : false;
        }


        // get system safety info
        function getSystemSafetyName($id){
            $this->db->select('*');
            $this->db->from('SystemSafety');
            $this->db->where('safety_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->safety_name : false;
        }


        // get status
        function getStatusName($id){
            $this->db->select('*');
            $this->db->from('Status');
            $this->db->where('status_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->status_name : false;
        }


        // get realization
        function getRealizationName($id){
            $this->db->select('*');
            $this->db->from('Realization');
            $this->db->where('realization_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->realization_name : false;
        }

        
        // get risk categories
        function getRiskCategoryName($id){
            $this->db->select('*');
            $this->db->from('RiskCategories');
            $this->db->where('category_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->category_name : false;
        }


        // get subproject
        function getSubProjectName($id){
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->where('subproject_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }

        // get number of risks
        function getRiskNumbers()
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }

    }