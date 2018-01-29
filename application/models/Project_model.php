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


        // view all projects
        function getAllProjects()
        {
            $this->db->select('*');
            $this->db->from('Project');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
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

        // fetch all risk registers for a particular user i.e. project manager and super administrator
        function getRiskRegisters( $project_id, $user_id )
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->join('Project','Project.project_id = Subproject.Project_project_id');
            $this->db->where('Project.User_user_id', $user_id);
            $this->db->where('Project.project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        function getRiskRegistersByID( $user_id )
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->join('Project','Project.project_id = Subproject.Project_project_id');
            $this->db->where('Project.User_user_id', $user_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get all risk registers
        function getAllRiskRegisters()
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // fetch all risk registers for a particular user i.e. project manager and super administrator
        function getReportRiskRegisters( $user_id )
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->join('Project','Project.project_id = Subproject.Project_project_id');
            $this->db->where('Project.User_user_id', $user_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get single risk register
        function getRiskRegister( $user_id )
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->join('Project','Project.project_id = Subproject.Project_project_id');
            $this->db->where('Project.User_user_id',$user_id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }


        // function getRiskRegisters($user_id)
        // {
        //     $this->db->select('*');
        //     $this->db->from('Subproject');
        //     $this->db->join('Subproject_has_User','Subproject_has_User.Subproject_subproject_id = Subproject.subproject_id');
        //     $this->db->where('Subproject_has_User.User_user_id',$user_id);
        //     $query = $this->db->get();
        //     return ($query->num_rows() > 0) ? $query->result() : false;
        // }


        // fetch all risk registers assigned to a general user
        function getAssignedRiskRegisters( $user_id )
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->join('Subproject_has_User','Subproject_has_User.Subproject_subproject_id = Subproject.subproject_id');
            $this->db->where('Subproject_has_User.User_user_id',$user_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get risk register id and name that the general user is assigned to
        function getAssignedRiskRegisterName( $user_id )
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->join('Subproject_has_User','Subproject_has_User.Subproject_subproject_id = Subproject.subproject_id');
            $this->db->where('Subproject_has_User.User_user_id',$user_id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }


        // get risk register name for managers
        function getManagerRegisterName($register_id)
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            // $this->db->join('Project','Project.project_id = Subproject.Project_project_id');
            $this->db->where('subproject_id',$register_id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }

        function getAssignedProject($user_id)
        {
            $this->db->select('*');
            $this->db->from('Project');
            $this->db->join('Subproject','Subproject.Project_project_id = Project.project_id');
            $this->db->join('Subproject_has_User','Subproject_has_User.Subproject_subproject_id = Subproject.subproject_id');
            $this->db->where('Subproject_has_User.User_user_id',$user_id);
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

        // returns a single project name
        function getSingleProjectName( $project_id )
        {
            $this->db->select('project_name');
            $this->db->from('Project');
            $this->db->where('project_id',$project_id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row->project_name : false;
        }


        // get all subproject based only on user id
        function getUserSubProjects( $user_id )
        {
            $this->db->select('subproject_id, name');
            $this->db->from('Subproject');
            $this->db->join('Project','Project.project_id = Subproject.Project_project_id');
            $this->db->where('Project.User_user_id',$user_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get number of projects
        function getProjectNumbers( $user_id ){
            $this->db->select('*');
            $this->db->from( 'Project' );
            $this->db->where( 'User_user_id',$user_id );
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }

        // get all project numbers
        function getAllProjectNumbers(){
            $this->db->select('*');
            $this->db->from( 'Project' );
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }

        // get number of projects
        function getUserProjectNumbers( $user_id ){
            $this->db->select('*');
            $this->db->from( 'Project' );
            $this->db->join('Subproject','Subproject.Project_project_id = Project.project_id');
            $this->db->join('Subproject_has_User','Subproject_has_User.Subproject_subproject_id = Subproject.subproject_id');
            $this->db->where('Subproject_has_User.User_user_id',$user_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }


        // get number of subprojects
        function getRegisterNumbers( $user_id ){
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->join('Project','Project.project_id = Subproject.Project_project_id');
            $this->db->where('Project.User_user_id',$user_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }

        // get number of all subprojects
        function getAllRegisterNumbers(){
            $this->db->select('*');
            $this->db->from('Subproject');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }


        // get number of subprojects for general users
        function getUserRegisterNumbers( $user_id ){
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->join('Subproject_has_User','Subproject_has_User.Subproject_subproject_id = Subproject.subproject_id');
            $this->db->where('Subproject_has_User.User_user_id',$user_id);
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


        // get single risk registry
        function getSingleRiskRegister($register_id)
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->where('subproject_id',$register_id);
            $query = $this->db->get();
            return ($query->num_rows() == 1) ? $query->row() : 0;
        }


        // get single risk registry name
        function getRiskRegisterName($register_id)
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->where('subproject_id',$register_id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }

        // get last register id
        function lastRegisterID()
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $query = $this->db->get();
            $row = $query->last_row();
            return (isset($row)) ? $row->subproject_id : false;
        }

        // record register being copied
        function copyRegister($data)
        {
            return $this->db->insert('RegisterCopy', $data);
        }

    }
?>