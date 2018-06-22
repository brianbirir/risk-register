<?php

    class Report_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }


        // get row count of risk data
        function getRisks($params = array())
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->order_by('item_id','asc'); // order by item ID
            $this->db->where('archived',false); // do not export archived data
            $this->db->where('User_user_id', $params['user_id']); // get by user ID

            if(array_key_exists('category_id',$params))
            {
                if($params['category_id'] != 'None')
                {
                    $this->db->where('RiskCategories_category_id',$params['category_id']);
                }
                
            }

            if(array_key_exists('register_id',$params))
            {   
                if($params['register_id'] != 'None')
                {
                    $this->db->where('Subproject_subproject_id',$params['register_id']);
                }
            }

            // date from and date to
            if(array_key_exists('date_from',$params))
            {
                $post_at = "";
                $post_at_to_date = "";
                
                if(!empty($params['date_from']))
                {
                    $post_at = $params['date_from'];
                    // list($fiy,$fim,$fid) = explode("-",$post_at);
                    // $post_at = '$fiy-$fim-$fid';
                    $post_at_to_date = date('Y-m-d');

                    if(array_key_exists('date_to',$params)) 
                    {
                        if(!empty($params['date_to']))
                        {
                            $post_at_to_date = $params['date_to'];
                            // list($tiy,$tim,$tid) = explode("-",$post_at_to_date);
                            // $post_at_to_date = '$tiy-$tim-$tid';
                        }
                    }
                    
                    $this->db->where('effective_date >=', $post_at);
                    $this->db->where('effective_date <=', $post_at_to_date);
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


        // get risk data for AJAX request
        function getAjaxRisks($params = array())
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('RiskRegistry.archived',false); // do not export archived data
            
            // check if project ID exists
            if(array_key_exists("project_id",$params))
            {
                $this->db->join('Subproject','Subproject.subproject_id = RiskRegistry.Subproject_subproject_id');
                $this->db->where('Subproject.Project_project_id', $params['project_id']);
            }

            if(array_key_exists('user_id',$params))
            {
                $this->db->where('RiskRegistry.User_user_id', $params['user_id']); // get by user ID
            }

            // category filter
            if(array_key_exists('category_id',$params))
            {
                if($params['category_id'] != 'none')
                {
                    $this->db->where('RiskRegistry.RiskCategories_category_id',$params['category_id']);
                }
            }

            // register filter
            if(array_key_exists('register_id',$params))
            {
                if($params['register_id'] != 'none')
                {
                    $this->db->where('RiskRegistry.Subproject_subproject_id',$params['register_id']);
                }
            }

            // date from and date to
            if(array_key_exists('date_from',$params))
            {
                $post_at = "";
                $post_at_to_date = "";
                
                if(!empty($params['date_from']))
                {
                    $post_at = $params['date_from'];
                    $post_at_to_date = date('Y-m-d');

                    if(array_key_exists('date_to',$params)) 
                    {
                        if(!empty($params['date_to'])) { $post_at_to_date = $params['date_to']; }
                    }
                    
                    $this->db->where('RiskRegistry.effective_date >=', $post_at);
                    $this->db->where('RiskRegistry.effective_date <=', $post_at_to_date);
                }
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

            $query = $this->db->get();
            
            return ($query->num_rows() > 0) ?  $query->result() : false;
        }

        // get total number of rows based in user id and filter conditions
        function getTotalRisks($params = array())
        {
            $this->db->select("COUNT(*) as num");
            $this->db->from('RiskRegistry');
            $this->db->where('RiskRegistry.archived',false);

            // // check if project ID exists
            if(array_key_exists("project_id",$params))
            {
                $this->db->join('Subproject','Subproject.subproject_id = RiskRegistry.Subproject_subproject_id');
                $this->db->where('Project_project_id', $params['project_id']);
            }

            if(array_key_exists('user_id',$params))
            {
                $this->db->where('RiskRegistry.User_user_id', $params['user_id']); // get by user ID

            }
            
            // category filter
            if(array_key_exists('category_id',$params))
            {
                if($params['category_id'] != 'none')
                {
                    $this->db->where('RiskRegistry.RiskCategories_category_id',$params['category_id']);
                }
            }

            // register filter
            if(array_key_exists('register_id',$params))
            {
                if($params['register_id'] != 'none')
                {
                    $this->db->where('RiskRegistry.Subproject_subproject_id',$params['register_id']);
                }
            }

            // date from and date to
            if(array_key_exists('date_from',$params))
            {
                $post_at = "";
                $post_at_to_date = "";
                
                if(!empty($params['date_from']))
                {
                    $post_at = $params['date_from'];
                    $post_at_to_date = date('Y-m-d');

                    if(array_key_exists('date_to',$params)) 
                    {
                        if(!empty($params['date_to'])) { $post_at_to_date = $params['date_to']; }
                    }
                    
                    $this->db->where('RiskRegistry.effective_date >=', $post_at);
                    $this->db->where('RiskRegistry.effective_date <=', $post_at_to_date);
                }
            }

            $query = $this->db->get();
            
            $result = $query->row();
            
            if(isset($result)) return $result->num;
            
            return 0;
        }
        

        function getManagerData($params = array())
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->order_by('item_id','asc'); // order by item ID
            $this->db->where('archived',false); // do not export archived data
            $this->db->where('User_user_id', $params['user_id']); // get by user ID

            // check if project ID exists
            if(array_key_exists("project_id",$params))
            {
                $this->db->join('Subproject','Subproject.subproject_id = RiskRegistry.Subproject_subproject_id');
                $this->db->where('Subproject.Project_project_id', $params['project_id']);
            }

            if(array_key_exists('category_id',$params))
            {
                if($params['category_id'] != 'none')
                {
                    $this->db->where('RiskCategories_category_id',$params['category_id']);
                }
                
            }

            if(array_key_exists('register_id',$params))
            {
                if($params['register_id'] != 'none')
                {
                    $this->db->where('Subproject_subproject_id',$params['register_id']);
                }
            }

            // date from and date to
            if(array_key_exists('date_from',$params))
            {
                $post_at = "";
                $post_at_to_date = "";
                
                if(!empty($params['date_from']))
                {
                    $post_at = $params['date_from'];
                    $post_at_to_date = date('Y-m-d');

                    if(array_key_exists('date_to',$params)) 
                    {
                        if(!empty($params['date_to']))
                        {
                            $post_at_to_date = $params['date_to'];
                        }
                    }
                    
                    $this->db->where('effective_date >=', $post_at);
                    $this->db->where('effective_date <=', $post_at_to_date);
                }
            }
            
            $query = $this->db->get();
            return ($query->num_rows() > 0) ?  $query->result() : false;
        }
        

        function getData()
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('archived',false); // do not export archived data
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get reponses for each risk based on the risk's uuid
        function getResponses($risk_uuid)
        {
            if(!empty($risk_uuid))
            {
                $this->db->select('*');
                $this->db->from('RiskResponse');
                $this->db->where('risk_uuid',$risk_uuid); // do not export archived data
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            }
        }
        

        // get risk strategies name
        function getRiskStrategiesName($id)
        {
            $this->db->select('*');
            $this->db->from('RiskStrategies');
            $this->db->where('id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }


        // get system safety name
        function getSystemSafetyName($id)
        {
            $this->db->select('*');
            $this->db->from('SystemSafety');
            $this->db->where('id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }


        // get status name
        function getStatusName($id)
        {
            $this->db->select('*');
            $this->db->from('Status');
            $this->db->where('id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }


        // get realization name
        function getRealizationName($id)
        {
            $this->db->select('*');
            $this->db->from('Realization');
            $this->db->where('id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }

        
        // get risk categories name
        function getRiskCategoriesName($id)
        {
            $this->db->select('*');
            $this->db->from('RiskCategories');
            $this->db->where('id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }

        // get subproject name
        function getSubProjectName($id)
        {
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->where('subproject_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }

        // get risk cost number
        function getRiskCostNumber( $id )
        {
            $this->db->select('*');
            $this->db->from('CostMetric');
            $this->db->where('id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->rating : false;
        }

        // get risk schedule number
        function getRiskScheduleNumber( $id )
        {
            $this->db->select('*');
            $this->db->from('ScheduleMetric');
            $this->db->where('id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->rating : false;
        }

        // get risk entity
        function getRiskEntityName( $id )
        {
            $this->db->select('*');
            $this->db->from('Entity');
            $this->db->where('id', $id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }

        // get risk entity
        function getRiskMaterializationName( $id )
        {
            $this->db->select('*');
            $this->db->from('MaterializationPhase');
            $this->db->where('id', $id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }
    }