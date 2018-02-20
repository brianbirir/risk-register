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

        // insert risk revision
        function insertRiskRevision( $data, $item_id )
        {
            foreach( $data as $key=>$val )
            {
                if ( $key != 'item_id' )
                { 
                    $this->db->set( 'item_id', $item_id );               
                }
            }
            return $this->db->insert('RiskRevisions', $data);
        }

        // get the number of times a risk has been revised
        function getNumberOfRiskRevisions( $risk_id )
        {
            $this->db->select( '*' );
            $this->db->from( 'RiskRevisions' );
            $this->db->where( 'item_id', $risk_id );
            $query = $this->db->get();
            return ( $query->num_rows() > 0 ) ? $query->num_rows() : 0;
        }

        // get risk revisions for specific risk
        function getRiskRevisions( $risk_id )
        {
            $this->db->select( '*' );
            $this->db->from( 'RiskRevisions' );
            $this->db->where( 'item_id', $risk_id );
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        function getSingleRevision( $revision_id )
        {
            $this->db->select( '*' );
            $this->db->from( 'RiskRevisions' );
            $this->db->where( 'revision_id', $revision_id );
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        
        // get revised risks that have not been approved
        // function getUnapprovedRevisions( $user_id, $register_id )
        // {
        //     $this->db->select( '*' );
        //     $this->db->from( 'RiskRegistry' );
        //     $this->db->join( 'User', 'User.user_id = RiskRegistry.User_user_id' );
        //     $this->db->where('User.parent_user_id',$user_id); // equivalent to parent user id
        //     $this->db->where('RiskRegistry.archived',false); // not archived
        //     $this->db->where('RiskRegistry.approved',false); // not approved
        //     $this->db->where('RiskRegistry.Subproject_subproject_id', $register_id);
        //     $query = $this->db->get();
        //     return ($query->num_rows() > 0) ? $query->result() : false;
        // }


        // add risk response
        function insertResponse($data)
        {
            return $this->db->insert('RiskResponse', $data);
        }

        // get all risks
        function getAllRisks()
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('archived',false); // not archived
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get risk items registered by specific user
        function getRisks($user_id)
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('User_user_id', $user_id);
            $this->db->where('archived',false); // not archived
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get risk items registered by specific user and belongs to specific register
        function getUserRisk($user_id, $register_id)
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('User_user_id', $user_id);
            $this->db->where('Subproject_subproject_id',$register_id);
            $this->db->where('archived', false); // not archived
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        function getAllUserRisk( $user_id )
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->join('User','User.user_id = RiskRegistry.User_user_id');
            $this->db->where('User.parent_user_id',$user_id); // equivalent to parent user id
            $this->db->where('RiskRegistry.archived',false); // not archived
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        function getReportRisks($user_id, $register_id)
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('User_user_id',$user_id);
            $this->db->where('Subproject_subproject_id',$register_id);
            $this->db->where('archived',false); // not archived
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get risks that belong to users under a manager, not archived and belong to specific risk register
        function getManagerRisk($user_id, $register_id)
        {
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->join('User','User.user_id = RiskRegistry.User_user_id');
            $this->db->where('User.parent_user_id',$user_id); // equivalent to parent user id
            $this->db->where('RiskRegistry.archived',false); // not archived
            $this->db->where('RiskRegistry.Subproject_subproject_id', $register_id);
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
        

        function getManagerArchivedRisk( $user_id )
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
        
        // get risk name by uuid
        function getRiskNameByUUID($risk_uuid)
        {
            $this->db->select('risk_title');
            $this->db->from('RiskRegistry');
            $this->db->where('risk_uuid', $risk_uuid);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row->risk_title : false;
        }


        // update risk item
        // function updateRisk($data,$id)
        // {
        //     $this->db->set($data);
        //     $this->db->where('item_id',$id);
        //     $this->db->update('RiskRegistry',$data);
        //     return true;
        // }

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
        function getRiskStrategies($project_id){
            $this->db->select('*');
            $this->db->from('RiskStrategies');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get system safety info
        function getSystemSafety($project_id){
            $this->db->select('*');
            $this->db->from('SystemSafety');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get status
        function getStatus($project_id){
            $this->db->select('*');
            $this->db->from('Status');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get realization
        function getRealization($project_id){
            $this->db->select('*');
            $this->db->from('Realization');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        
        // get risk categories
        function getRiskCategories($project_id){
            $this->db->select('*');
            $this->db->from('RiskCategories');
            $this->db->where('Project_project_id', $project_id);
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
        function getRiskOwner($project_id)
        {
            $this->db->select('*');
            $this->db->from('RiskOwner');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }


        // get risk entity
        function getRiskEntity($project_id)
        {
            $this->db->select('*');
            $this->db->from('Entity');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get risk materialization
        function getRiskMaterialization($project_id)
        {
            $this->db->select('*');
            $this->db->from('MaterializationPhase');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get risk cost
        function getRiskCost($project_id)
        {
            $this->db->select('*');
            $this->db->from('CostMetric');
            $this->db->where('Project_project_id', $project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get risk schedule
        function getRiskSchedule($project_id)
        {
            $this->db->select('*');
            $this->db->from('ScheduleMetric');
            $this->db->where('Project_project_id', $project_id);
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


        // get subproject name
        function getSubProjectName($id){
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
            return (isset($row)) ? $row->entity_name : false;
        }

        // get risk entity
        function getRiskMaterializationName( $id )
        {
            $this->db->select('*');
            $this->db->from('MaterializationPhase');
            $this->db->where('materialization_id', $id);
            $query = $this->db->get();
            $row = $query->row();
            return (isset($row)) ? $row->materialization_name : false;
        }


        // get number of risks
        function getRiskNumbers( $user_id )
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('User_user_id', $user_id);
            $this->db->where('RiskRegistry.archived',false); // not archived
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }

        // get number of risks
        function getAllRiskNumbers()
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('RiskRegistry.archived',false); // not archived
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->num_rows() : 0;
        }

        function getUsersRiskNumbers( $user_id, $assigned_register_id )
        {   
            $this->db->select('*');
            $this->db->from('RiskRegistry');
            $this->db->where('User_user_id', $user_id); // equivalent to parent user id
            $this->db->where('Subproject_subproject_id', $assigned_register_id);
            $this->db->where('RiskRegistry.archived',false); // not archived
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

        // update risk item
        function updateRisk($data, $id)
        {
            $this->db->set($data);
            $this->db->where('item_id',$id);
            $this->db->update('RiskRegistry',$data);
            return true;
        }


        // duplicate risk record
        function duplicateRiskRecord ($table, $key_field, $register_id, $last_register_id, $new_risk_uuid)
        {       
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where('item_id', $key_field->item_id); 
            $query = $this->db->get();
        
            foreach ($query->result() as $row)
            {   
                foreach($row as $key=>$val)
                {        
                    if($key != 'item_id')
                    { 
                        /* $this->db->set can be used instead of passing 
                            * a data array directly to the insert or update functions 
                        */
                        $this->db->set($key, $val);               
                    } // endif   
                    
                    if($key == 'Subproject_subproject_id')
                    {
                        $this->db->set('Subproject_subproject_id', $last_register_id);
                    } // end if

                    // set duplicated to true
                    if ($key == 'duplicated') {
                        $this->db->set('duplicated', TRUE);
                    }
                } // endforeach
            } // endforeach 

            return $this->db->insert($table);
        }
    }