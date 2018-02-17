<?php

    class Response_model extends CI_Model {

        
        public function __construct()
        {
            parent::__construct();
        }

        // add risk response
        function insertResponse($data)
        {
            return $this->db->insert('RiskRegistry', $data);
        }

        // get all risk responses
        function getAllResponses()
        {
            $this->db->select('*');
            $this->db->from('RiskResponse');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get risk response for a specific risk item by risk UUID
        function getSingleRiskResponses($risk_uuid)
        {
            $this->db->select('*');
            $this->db->from('RiskResponse');
            $this->db->where('risk_uuid',$risk_uuid);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get risk response by register id
        function getResponseByRegister($register_id)
        {
            $this->db->select('*');
            $this->db->from('RiskResponse');
            $this->db->where('register_id',$register_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get risk responses by date
        function getResponseByDate($start_date, $end_date)
        {

        }

        // filter risk response by date and user
        function filterResponse($user_id, $start_date, $end_date)
        {
            
        }

    }