<?php

    class Strategy_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert strategy data
        function insertStrategy($data)
        {
            return $this->db->insert('RiskStrategies', $data);
        }


        // get strategy
        function getStrategy($project_id)
        {
            $this->db->select('*');
            $this->db->from('RiskStrategies');
            $this->db->where('Project_project_id',$project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get strategy
        function getSingleStrategy($id)
        {
            $this->db->select('*');
            $this->db->from('RiskStrategies');
            $this->db->where('strategy_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update strategy
        function updateStrategy($data,$id)
        {
            $this->db->set($data);
            $this->db->where('strategy_id',$id);
            $this->db->update('RiskStrategies',$data);
            return true;
        }


        // delete strategy
        function deleteStrategy($strategy_id)
        {
            $this->db->delete('RiskStrategies',array('strategy_id'=>$strategy_id));
            return true;
        }
    }