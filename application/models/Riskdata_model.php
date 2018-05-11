<?php

    class Riskdata_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert risk data type
        function insert($table_name, $data)
        {
            return $this->db->insert($table_name, $data);
        }


        // get risk data by table name
        function getRiskData($project_id, $table_name)
        {
            $this->db->select('*');
            $this->db->from($table_name);
            $this->db->where('Project_project_id',$project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get info for risk data
        function getSingleRiskData($id, $table_name)
        {
            $this->db->select('*');
            $this->db->from($table_name);
            $this->db->where('id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update table
        function update($data, $id, $tbl_name)
        {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update($tbl_name, $data);
            return true;
        }


        // delete item
        function delete($id, $tbl_name)
        {
            $this->db->delete($tbl_name,array('id'=>$id));
            return true;
        }


        // get total rows of risk data by table name and project ID
        function getTotalRiskData($project_id, $table_name)
        {
            $this->db->select("COUNT(*) as num");
            $this->db->from($table_name);
            $this->db->where('Project_project_id',$project_id);
            $query = $this->db->get();
            $result = $query->row();
            if(isset($result)) return $result->num;
            return 0;
        }
        
    }