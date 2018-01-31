<?php

    class Data_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }


        // insert status data
        function insertStatus($data)
        {
            return $this->db->insert('Status', $data);
        }


        // get status
        function getStatus($project_id)
        {
            $this->db->select('*');
            $this->db->from('Status');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get status
        function getSingleStatus($id)
        {
            $this->db->select('*');
            $this->db->from('Status');
            $this->db->where('status_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update status
        function updateStatus($data,$id)
        {
            $this->db->set($data);
            $this->db->where('status_id',$id);
            $this->db->update('Status',$data);
            return true;
        }


        // delete status
        function deleteStatus($status_id)
        {
            $this->db->delete('Status',array('status_id'=>$status_id));
            return true;
        }
    }