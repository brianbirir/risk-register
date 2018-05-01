<?php

    class Subcategory_model extends CI_Model 
    {
        public function __construct()
        {
            parent::__construct();
        }


        // insert subcategory data
        function insertSubcategory($data)
        {
            return $this->db->insert('RiskSubCategories', $data);
        }


        // get subcategory using category ID
        function getSubcategory($category_id)
        {
            $this->db->select('*');
            $this->db->from('RiskSubCategories');
            $this->db->where('RiskCategories_category_id',$category_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get category
        function getCategory($project_id)
        {
             $this->db->select('*');
             $this->db->from('RiskCategories');
             $this->db->where('Project_project_id',$project_id);
             $query = $this->db->get();
             return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get project ID
        function getProjectID()
        {

        }



        // get subcategory
        function getSingleSubcategory($id)
        {
            $this->db->select('*');
            $this->db->from('RiskSubCategories');
            $this->db->where('subcategory_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }


        // update subcategory
        function updateSubcategory($data,$id)
        {
            $this->db->set($data);
            $this->db->where('subcategory_id',$id);
            $this->db->update('RiskSubCategories',$data);
            return true;
        }


        // delete subcategory
        function deleteSubcategory($subcategory_id)
        {
            $this->db->delete('RiskSubCategories',array('subcategory_id'=>$subcategory_id));
            return true;
        }
    }