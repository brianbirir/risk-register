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
        function getAllResponses($params = array())
        {
            $this->db->select('*');
            $this->db->from('RiskResponse');

            if(array_key_exists('user_id',$params))
            {
                $this->db->where('user_id',$params['user_id']);
            }

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

        // get risk response by register id
        function getResponseByUser($params = array())
        {
            $this->db->select('*');
            $this->db->from('RiskResponse');
            $this->db->where('user_id',$params['user_id']);
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
        
        // get reponses based on given parameters
        function getResponses($params = array())
        {
            $this->db->select('*');
            $this->db->from('RiskResponse');
            $this->db->order_by('response_id','asc'); // ascending order

            if(array_key_exists('user_id',$params))
            {
                if($params['user_id'] != 'None')
                {
                    $this->db->where('user_id',$params['user_id']);
                }
                
            }

            if(array_key_exists('register_id',$params))
            {
                if($params['register_id'] != 'None')
                {
                    $this->db->where('register_id',$params['register_id']);
                }
            }

            if(array_key_exists("start",$params) && array_key_exists("limit",$params))
            {
                $this->db->limit($params['limit'],$params['start']);
            }
            elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
            {
                $this->db->limit($params['limit']);
            }

            $query = $this->db->get();

            return ($query->num_rows() > 0) ?  $query->result() : false;
        }
        
        
        // get response data for CSV generator
        function getResponseData($params = array())
        {
            $this->db->select('*');
            $this->db->from('RiskResponse');
            $this->db->order_by('response_id','asc');

            if(array_key_exists('user_id',$params))
            {
                if($params['user_id'] != 'None')
                {
                    $this->db->where('user_id',$params['user_id']);
                }
            }

            if(array_key_exists('register_id',$params))
            {
                if($params['register_id'] != 'None')
                {
                    $this->db->where('register_id',$params['register_id']);
                }
            }
            $query = $this->db->get();
            return ($query->num_rows() > 0) ?  $query->result() : false;
        }


        // get risk response title from ResponseTitle table
        function getResponseTitle($project_id)
        {
            $this->db->select('*');
            $this->db->from('ResponseTitle');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }
    }