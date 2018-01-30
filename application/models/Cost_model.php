<?php

    class Cost_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert cost data
        function insertCost($data)
        {
            return $this->db->insert('CostMetric', $data);
        }


        // get cost
        function getCost($project_id)
        {
            $this->db->select('*');
            $this->db->from('CostMetric');
            $this->db->where('Project_project_id',$project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get cost
        function getSingleCost($id)
        {
            $this->db->select('*');
            $this->db->from('CostMetric');
            $this->db->where('cost_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update cost
        function updateCost($data,$id)
        {
            $this->db->set($data);
            $this->db->where('cost_id',$id);
            $this->db->update('CostMetric',$data);
            return true;
        }


        // delete cost
        function deleteCost($cost_id)
        {
            $this->db->delete('CostMetric',array('cost_id'=>$cost_id));
            return true;
        }
    }