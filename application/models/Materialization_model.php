<?php

    class Materialization_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert materialization data
        function insertMaterialization($data)
        {
            return $this->db->insert('MaterializationPhase', $data);
        }


        // get materialization
        function getMaterialization($project_id)
        {
            $this->db->select('*');
            $this->db->from('MaterializationPhase');
            $this->db->where('Project_project_id',$project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get materialization
        function getSingleMaterialization($id)
        {
            $this->db->select('*');
            $this->db->from('MaterializationPhase');
            $this->db->where('materialization_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update materialization
        function updateMaterialization($data,$id)
        {
            $this->db->set($data);
            $this->db->where('materialization_id',$id);
            $this->db->update('MaterializationPhase',$data);
            return true;
        }


        // delete materialization
        function deleteMaterialization($materialization_id)
        {
            $this->db->delete('MaterializationPhase',array('materialization_id'=>$materialization_id));
            return true;
        }
    }