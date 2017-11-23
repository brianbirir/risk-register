<?php

    class Team_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }


        // add team member
        function insertTeamMember($data)
        {
            // return $this->db->insert('Team', $data);
            return $this->db->insert('Subproject_has_User', $data);
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

        // check if team member has been assigned a risk register
        function is_assigned($user_id)
        {
            $this->db->select('*');
            // $this->db->from('Team');
            $this->db->from('Subproject_has_User');
            $this->db->where('User_user_id',$user_id);
            $query = $this->db->get();
            return ($query->num_rows() == 1) ? true : false;
        }
    }