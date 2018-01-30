<?php

    class Safety_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert safety data
        function insertSafety($data)
        {
            return $this->db->insert('SystemSafety', $data);
        }


        // get safety
        function getSafety($project_id)
        {
            $this->db->select('*');
            $this->db->from('SystemSafety');
            $this->db->where('Project_project_id',$project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get safety
        function getSingleSafety($id)
        {
            $this->db->select('*');
            $this->db->from('SystemSafety');
            $this->db->where('safety_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update safety
        function updateSafety($data,$id)
        {
            $this->db->set($data);
            $this->db->where('safety_id',$id);
            $this->db->update('SystemSafety',$data);
            return true;
        }


        // delete safety
        function deleteSafety($safety_id)
        {
            $this->db->delete('SystemSafety',array('safety_id'=>$safety_id));
            return true;
        }
    }