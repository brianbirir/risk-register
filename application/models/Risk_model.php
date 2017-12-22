<?php

    class Risk_model extends CI_Model {

        
        public function __construct()
        {
            parent::__construct();
        }

        
        // add risk registry
        function insertRegistry($data)
        {
            return $this->db->insert('RiskRegistry', $data);
        }


        // add risk response
        function insertResponse($data)
        {
            return $this->db->insert('RiskResponse', $data);
        }


        // get risk items registered by specific user
        function getUserRisk($user_id)
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('User_user_id',$user_id);
            $this->db->where('archived',false); // not archived
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get risks that belong to users under a manager
        function getManagerRisk($user_id)
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->join('User','User.user_id = RiskRegistry.User_user_id');
            $this->db->where('User.parent_user_id',$user_id); // equivalent to parent user id
            $this->db->where('RiskRegistry.archived',false); // not archived
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get archived risk items
        function getUserArchivedRisk($user_id)
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('User_user_id',$user_id);
            $this->db->where('archived',true);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }
        

        function getManagerArchivedRisk($user_id)
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->join('User','User.user_id = RiskRegistry.User_user_id');
            $this->db->where('User.parent_user_id',$user_id); // equivalent to parent user id
            $this->db->where('RiskRegistry.archived',true); // archived
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get single risk item based on risk ID
        function getRisk($risk_id)
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('item_id',$risk_id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }


        // update risk item
        function updateRisk($data,$id)
        {
            $this->db->set($data);
            $this->db->where('item_id',$id);
            $this->db->update('RiskRegistry',$data);
            return true;
        }

        // archive risk item
        function archiveRisk($data,$id)
        {
            // $this->db->set($data);
            $this->db->where('item_id',$id);
            $this->db->update('RiskRegistry',$data);
            return true;
        }


        // delete risk item
        function deleteRisk($user_id)
        {
            $this->db->delete('RiskRegistry',array('user_id'=>$user_id));
            return true;
        }


        // get risk strategies info
        function getRiskStrategies(){
            $this->db->select('*');
            $this->db->from('RiskStrategies');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get system safety info
        function getSystemSafety(){
            $this->db->select('*');
            $this->db->from('SystemSafety');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get status
        function getStatus(){
            $this->db->select('*');
            $this->db->from('Status');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get realization
        function getRealization(){
            $this->db->select('*');
            $this->db->from('Realization');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        
        // get risk categories
        function getRiskCategories(){
            $this->db->select('*');
            $this->db->from('RiskCategories');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get subproject
        function getSubProject(){
            $this->db->select('*');
            $this->db->from('Subproject');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get risk owner
        function getRiskOwner()
        {
            $this->db->select('*');
            $this->db->from('RiskOwner');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // Get name from each entity from database based on ID

        // get risk strategies info
        function getRiskStrategiesName($id){
            $this->db->select('*');
            $this->db->from('RiskStrategies');
            $this->db->where('strategy_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->strategy_name : false;
        }


        // get risk owner name
        function getRiskOwnerName($id)
        {
            $this->db->select('*');
            $this->db->from('RiskOwner');
            $this->db->where('riskowner_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->risk_owner : false;
        }

        // get Risk IDs
        function getRiskIDs($register_id)
        {
            $this->db->select('item_id');
            $this->db->from('RiskRegistry');
            $this->db->where('Subproject_subproject_id',$register_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get system safety info
        function getSystemSafetyName($id){
            $this->db->select('*');
            $this->db->from('SystemSafety');
            $this->db->where('safety_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->safety_name : false;
        }


        // get status
        function getStatusName($id){
            $this->db->select('*');
            $this->db->from('Status');
            $this->db->where('status_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->status_name : false;
        }


        // get realization
        function getRealizationName($id){
            $this->db->select('*');
            $this->db->from('Realization');
            $this->db->where('realization_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->realization_name : false;
        }

        
        // get risk categories
        function getRiskCategoryName($id){
            $this->db->select('*');
            $this->db->from('RiskCategories');
            $this->db->where('category_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->category_name : false;
        }


        // get subproject
        function getSubProjectName($id){
            $this->db->select('*');
            $this->db->from('Subproject');
            $this->db->where('subproject_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->name : false;
        }


        // get number of risks
        function getRiskNumbers()
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }


        // get risk responses
        function getRiskResponse($risk_uuid)
        {
            $this->db->select('*');
            $this->db->from('RiskResponse');
            $this->db->where('risk_uuid',$risk_uuid);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // function duplicateRiskRecord ($table, $primary_key_field, $primary_key_val, $register_id)
        function duplicateRiskRecord ($table, $risk_ids, $register_id)
        {   
            foreach ($risk_ids as $key_field) 
            {
                /* generate the select query */
                // $this->db->where($primary_key_field, $primary_key_val);
                $this->db->select('*');
                $this->db->from($table);
                // $this->db->where('risk_uuid',$risk_uuid);
                $this->db->where($key_field, $key_field->item_id); 
                $query = $this->db->get();
            
                foreach ($query->result() as $row)
                {   
                    foreach($row as $key=>$val)
                    {        
                        if($key != 'item_id')
                        { 
                            /* $this->db->set can be used instead of passing a data array directly to the insert or update functions */
                            $this->db->set($key, $val);               
                        }
                        
                        if($key == $register_id)
                        {
                            $this->db->set('Subproject_subproject_id', $register_id);
                        }//endif              
                    }//endforeach
                }//endforeach

                /* insert the new record into table*/
                return $this->db->insert($table);
                
            } 
        }

    }