<?php

    class Project_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }
        

        // add project
        function insertProject($data)
        {
            return $this->db->insert('Project', $data);
        }


        // add subproject
        function insertSubProject($data)
        {
            return $this->db->insert('Subproject', $data);
        }


        // fetch all projects for a particular user
        function getProjects($user_id)
        {
            $this->db->select('*');
            $this->db->from('Project');
            $this->db->where('Project.User_user_id',$user_id);
            $query = $this->db->get();
            
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // fetch all subprojects for a particular user
        function getSubProjects($user_id, $uri_id)
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->join('Project','Project.project_id = Subproject.Project_project_id');
            $this->db->where('Project.User_user_id',$user_id);
            $this->db->where('Project.project_id',$uri_id);
            //$this->db->where('Subproject.Project_project_id',$uri_id);
            $query = $this->db->get();
            
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get project name
        function getProjectName($user_id)
        {
            $this->db->select('project_id, project_name');
            $this->db->from('Project');
            $this->db->where('Project.User_user_id',$user_id);
            $query = $this->db->get();
            
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get number of projects
        function getProjectNumbers(){
            $this->db->select('*');
            $this->db->from('Project');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }

        // get number of subprojects
        function getSubProjectNumbers(){
            $this->db->select('*');
            $this->db->from('Subproject');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }

        // get single project
        function getSingleProject($project_id)
        {
            $this->db->select('*');
            $this->db->from('Project');
            $this->db->where('project_id',$project_id);
            $query = $this->db->get();
            return ($query->num_rows() == 1) ? $query->row() : 0;
        }

    }