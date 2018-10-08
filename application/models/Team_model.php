<?php

    class Team_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }


        // add team member
        function insertTeamMember($data)
        {
            return $this->db->insert('Subproject_has_User', $data);
        }


        // add team member
        function insertProjectMember($data)
        {
            return $this->db->insert('Project_has_User', $data);
        }


        // get all team members of a specific project/programme manager
        function getTeamMembers($user_id)
        {
            $this->db->select('*');
            $this->db->from('Team');
            $this->db->where('User_user_id',$user_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // check if user has been assigned to specific risk register
        function is_assigned($user_id, $register_id)
        {
            $this->db->select('*');
            $this->db->from('Subproject_has_User');
            $this->db->where('User_user_id', $user_id);
            $this->db->where('Subproject_subproject_id', $register_id);
            $query = $this->db->get();
            return ($query->num_rows() == 1) ? true : false;
        }

         // check if user has been assigned to specific project
         function is_assigned_project($user_id, $project_id)
         {
             $this->db->select('*');
             $this->db->from('Project_has_User');
             $this->db->where('User_user_id', $user_id);
             $this->db->where('Project_project_id', $project_id);
             $query = $this->db->get();
             return ($query->num_rows() == 1) ? true : false;
         }

        // check if register has any assigned users
        function checkForUsers($register_id)
        {
            $this->db->select('*');
            $this->db->from('Subproject_has_User');
            $this->db->where('Subproject_subproject_id', $register_id);
            $query = $this->db->get();
            return ($query->num_rows() > 1) ? true : false;
        }

        // get assigned register users
        function getRegisterUsers($register_id)
        {
            $this->db->select('*');
            $this->db->from('User');
            $this->db->join('Subproject_has_User','Subproject_has_User.User_user_id = User.user_id');
            $this->db->where('Subproject_has_User.Subproject_subproject_id', $register_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get assigned project users
        function getProjectUsers($project_id)
        {
            $this->db->select('*');
            $this->db->from('User');
            $this->db->join('Project_has_User','Project_has_User.User_user_id = User.user_id');
            $this->db->where('Project_has_User.Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }
 
        // unassign user from register AKA delete record in Subproject_has_User table
        function unassign_user($register_id, $user_id)
        {
            $this->db->delete('Subproject_has_User', array('Subproject_has_User.User_user_id' => $user_id, 'Subproject_has_User.Subproject_subproject_id' => $register_id));

            return true;
        }
    }   