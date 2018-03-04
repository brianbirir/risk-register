<?php

    class Responsetitle_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert response data
        function insertResponse($data)
        {
            return $this->db->insert('ResponseTitle', $data);
        }


        // get response
        function getResponse($project_id)
        {
            $this->db->select('*');
            $this->db->from('ResponseTitle');
            $this->db->where('Project_project_id',$project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }
        

        // get response
        function getSingleResponse($id)
        {
            $this->db->select('*');
            $this->db->from('ResponseTitle');
            $this->db->where('response_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update response
        function updateResponse($data,$id)
        {
            $this->db->set($data);
            $this->db->where('response_id',$id);
            $this->db->update('ResponseTitle',$data);
            return true;
        }


        // delete response
        function deleteResponse($response_id)
        {
            $this->db->delete('ResponseTitle',array('response_id'=>$response_id));
            return true;
        }
    }