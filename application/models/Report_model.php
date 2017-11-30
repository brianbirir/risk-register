<?php

    class Report_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

        function filter()
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            // $this->db->where('User_user_id',$user_id);
            // $this->db->where('User_user_id',$user_id);
            // $this->db->where('User_user_id',$user_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        function getData()
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('archived',false); // do not export archived data
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get filtered risk data
        function getFilteredRisk($category)
        {   
            if($category != "None")
            {
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $this->db->where('RiskCategories_category_id',$category);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            }
            else
            {   
                // show all filters
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            }
        }

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
        function getRiskCategoriesName($id){
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
    }