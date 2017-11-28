<?php

    class Category_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert category data
        function insertCategory($data)
        {
            return $this->db->insert('RiskCategories', $data);
        }


        // get category
        function getCategory()
        {
            $this->db->select('*');
            $this->db->from('RiskCategories');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get category
        function getSingleCategory($id)
        {
            $this->db->select('*');
            $this->db->from('RiskCategories');
            $this->db->where('category_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update category
        function updateCategory($data,$id)
        {
            $this->db->set($data);
            $this->db->where('category_id',$id);
            $this->db->update('RiskCategories',$data);
            return true;
        }


        // delete category
        function deleteCategory($category_id)
        {
            $this->db->delete('RiskCategories',array('category_id'=>$category_id));
            return true;
        }
    }