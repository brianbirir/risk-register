<?php

    class Realization_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert realization data
        function insertRealization($data)
        {
            return $this->db->insert('Realization', $data);
        }


        // get realization
        function getRealization($project_id)
        {
            $this->db->select('*');
            $this->db->from('Realization');
            $this->db->where('Project_project_id',$project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get realization
        function getSingleRealization($id)
        {
            $this->db->select('*');
            $this->db->from('Realization');
            $this->db->where('realization_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update realization
        function updateRealization($data,$id)
        {
            $this->db->set($data);
            $this->db->where('realization_id',$id);
            $this->db->update('Realization',$data);
            return true;
        }


        // delete realization
        function deleteRealization($realization_id)
        {
            $this->db->delete('Realization',array('realization_id'=>$realization_id));
            return true;
        }
    }