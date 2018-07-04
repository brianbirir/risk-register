<?php

    class Response_model extends CI_Model {

        
        public function __construct()
        {
            parent::__construct();
        }

        // add risk response
        function insertResponse($data)
        {
            return $this->db->insert('RiskResponse', $data);
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

 
        // get responses by project ID
        function getResponseByProject($params = array())
        {
            $this->db->select('*');
            $this->db->from('RiskResponse');
            
            // check if project id exists
            if(array_key_exists("project_id",$params))
            {
                $this->db->join('Subproject','Subproject.subproject_id = RiskResponse.register_id');
                $this->db->where('Subproject.Project_project_id', $params['project_id']);
            }

            // limit for pagination
            if(array_key_exists("start",$params) && array_key_exists("limit",$params))
            {
                $this->db->limit($params['limit'],$params['start']);
            }
            elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params))
            {
                $this->db->limit($params['limit']);
            }

            // order by
            if(array_key_exists("order",$params) && array_key_exists("sortType",$params))
            {
            	if($params['order'] != null) 
            	{
	            	$this->db->order_by($params['order'], $params['sortType']);
	        	}
            }

            // user filter
            if(array_key_exists('user',$params))
            {
                if($params['user'] != 'none')
                {
                    $this->db->like('RiskResponse.user_id', $params['user']);
                }
            }

            // register filter
            if(array_key_exists('register',$params))
            {
                if($params['register'] != 'none')
                {
                    $this->db->where('RiskResponse.register_id',$params['register']);
                }
            }

            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get total number of responses by project ID
        function getTotalResponsesByProject($params = array())
        {
            $this->db->select("COUNT(*) as num");
            $this->db->from('RiskResponse');

            // check if project id exists
            if(array_key_exists("project_id",$params))
            {
                $this->db->join('Subproject','Subproject.subproject_id = RiskResponse.register_id');
                $this->db->where('Subproject.Project_project_id', $params['project_id']);
            }

            // user filter
            if(array_key_exists('user',$params))
            {
                if($params['user'] != 'none')
                {
                    $this->db->where('RiskResponse.user_id',$params['user']);
                }
            }

            // register filter
            if(array_key_exists('register',$params))
            {
                if($params['register'] != 'none')
                {
                    $this->db->where('RiskResponse.register_id',$params['register']);
                }
            }

            $query = $this->db->get();
            $result = $query->row();
            
            if(isset($result)) return $result->num;
            return 0;
        }

        // get risk response by user id
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


        // get risk response title from ResponseTitle table by project ID
        function getResponseTitle($project_id)
        {
            $this->db->select('*');
            $this->db->from('ResponseTitle');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // risks associated with response by response title
        function getResponseRisks($response_title_id)
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->join('RiskResponse','RiskResponse.risk_uuid = RiskRegistry.risk_uuid');
            $this->db->where('RiskResponse.ResponseTitle_id', $response_title_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get response name by title ID
        function getResponseName($title_id)
        {
            $this->db->select('name');
            $this->db->from('ResponseTitle');
            $this->db->where('id', $title_id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row->name : false;
        }
    }