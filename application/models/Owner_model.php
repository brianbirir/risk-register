<?php

    class Owner_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert owner data
        function insertOwner($data)
        {
            return $this->db->insert('RiskOwner', $data);
        }


        // get owner
        function getOwner()
        {
            $this->db->select('*');
            $this->db->from('RiskOwner');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get owner
        function getSingleOwner($id)
        {
            $this->db->select('*');
            $this->db->from('RiskOwner');
            $this->db->where('owner_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update owner
        function updateOwner($data,$id)
        {
            $this->db->set($data);
            $this->db->where('owner_id',$id);
            $this->db->update('RiskOwner',$data);
            return true;
        }


        // delete owner
        function deleteOwner($owner_id)
        {
            $this->db->delete('RiskOwner',array('owner_id'=>$owner_id));
            return true;
        }
    }