<?php

    class Report_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }


        function filter()
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            // $this->db->where('User_user_id',$user_id);
            // $this->db->where('User_user_id',$user_id);
            // $this->db->where('User_user_id',$user_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
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



        // get filtered risk data
        function getFilteredRisk( $user_id, $category, $risk_level, $risk_register)
        {   
            if($category != "None" and $risk_level != "None" and $risk_register != "None")
            {
                // show both category, risk level and risk register filter
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $this->db->where('User_user_id',$user_id);
                $this->db->where('RiskCategories_category_id',$category);
                $this->db->where('Subproject_subproject_id',$risk_register);
                $this->db->where('risk_level',$risk_level);
                // $this->db->where('created_at <=',$date_to);
                // $this->db->where('created_at >=',$date_from);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            } 
            elseif($category != "None" and $risk_level == "None" and $risk_register == "None") 
            {
                // show only category filter
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $this->db->where('User_user_id',$user_id);
                $this->db->where('RiskCategories_category_id',$category);
                // $this->db->where('created_at <=',$date_to);
                // $this->db->where('created_at >=',$date_from);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            } 
            elseif($category == "None" and $risk_level != "None" and $risk_register == "None") 
            {
                // show only risk level filter
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $this->db->where('User_user_id',$user_id);
                $this->db->where('risk_level',$risk_level);
                // $this->db->where('created_at <=',$date_to);
                // $this->db->where('created_at >=',$date_from);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            }
            elseif($category == "None" and $risk_level == "None" and $risk_register != "None") 
            {
                // show only risk level filter
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $this->db->where('User_user_id',$user_id);
                $this->db->where('Subproject_subproject_id',$risk_register);
                // $this->db->where('created_at <=',$date_to);
                // $this->db->where('created_at >=',$date_from);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            }
            else
            {   
                // show all data if all filters are of None value
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $this->db->where('User_user_id',$user_id);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            }
        }

        // get filtered risk data
        function getManagerFilteredRisk( $category, $risk_level, $risk_register)
        {   
            if($category != "None" and $risk_level != "None" and $risk_register != "None")
            {
                // show both category, risk level and risk register filter
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $this->db->where('RiskCategories_category_id',$category);
                $this->db->where('Subproject_subproject_id',$risk_register);
                $this->db->where('risk_level',$risk_level);
                // $this->db->where('created_at <=',$date_to);
                // $this->db->where('created_at >=',$date_from);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            } 
            elseif($category != "None" and $risk_level == "None" and $risk_register == "None") 
            {
                // show only category filter
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $this->db->where('RiskCategories_category_id',$category);
                // $this->db->where('created_at <=',$date_to);
                // $this->db->where('created_at >=',$date_from);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            } 
            elseif($category == "None" and $risk_level != "None" and $risk_register == "None") 
            {
                // show only risk level filter
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $this->db->where('risk_level',$risk_level);
                // $this->db->where('created_at <=',$date_to);
                // $this->db->where('created_at >=',$date_from);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            }
            elseif($category == "None" and $risk_level == "None" and $risk_register != "None") 
            {
                // show only risk level filter
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $this->db->where('Subproject_subproject_id',$risk_register);
                // $this->db->where('created_at <=',$date_to);
                // $this->db->where('created_at >=',$date_from);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            }
            else
            {   
                // show all data if all filters are of None value
                $this->db->select('*');
                $this->db->from('RiskRegistry');
                $this->db->where('archived',false);
                $query = $this->db->get();
                return ($query->num_rows() > 0) ? $query->result() : false;
            }
        }

        // get risk strategies name
        function getRiskStrategiesName($id)
        {
            $this->db->select('*');
            $this->db->from('RiskStrategies');
            $this->db->where('strategy_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->strategy_name : false;
        }


        // get system safety name
        function getSystemSafetyName($id)
        {
            $this->db->select('*');
            $this->db->from('SystemSafety');
            $this->db->where('safety_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->safety_name : false;
        }


        // get status name
        function getStatusName($id)
        {
            $this->db->select('*');
            $this->db->from('Status');
            $this->db->where('status_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->status_name : false;
        }


        // get realization name
        function getRealizationName($id)
        {
            $this->db->select('*');
            $this->db->from('Realization');
            $this->db->where('realization_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->realization_name : false;
        }

        
        // get risk categories name
        function getRiskCategoriesName($id)
        {
            $this->db->select('*');
            $this->db->from('RiskCategories');
            $this->db->where('category_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->category_name : false;
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
            $this->db->where('cost_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }

        // get risk schedule number
        function getRiskScheduleNumber( $id )
        {
            $this->db->select('*');
            $this->db->from('ScheduleMetric');
            $this->db->where('schedule_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }

        // get risk entity
        function getRiskEntityName( $id )
        {
            $this->db->select('*');
            $this->db->from('Entity');
            $this->db->where('entity_id', $id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }

        // get risk entity
        function getRiskMaterializationName( $id )
        {
            $this->db->select('*');
            $this->db->from('MaterializationPhase');
            $this->db->where('materialization_id', $id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }
    }