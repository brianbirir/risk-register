<?php

    class Entity_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert entity data
        function insertEntity($data)
        {
            return $this->db->insert('Entity', $data);
        }


        // get entity
        function getEntity( $project_id )
        {
            $this->db->select('*');
            $this->db->from('Entity');
            $this->db->where('Project_project_id',$project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get entity
        function getSingleEntity($id)
        {
            $this->db->select('*');
            $this->db->from('Entity');
            $this->db->where('entity_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update entity
        function updateEntity($data,$id)
        {
            $this->db->set($data);
            $this->db->where('entity_id',$id);
            $this->db->update('Entity',$data);
            return true;
        }


        // delete entity
        function deleteEntity($entity_id)
        {
            $this->db->delete('Entity',array('entity_id'=>$entity_id));
            return true;
        }
    }