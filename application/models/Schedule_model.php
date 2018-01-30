<?php

    class Schedule_model extends CI_Model 
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        
        // insert schedule data
        function insertSchedule($data)
        {
            return $this->db->insert('ScheduleMetric', $data);
        }


        // get schedule
        function getSchedule($project_id)
        {
            $this->db->select('*');
            $this->db->from('ScheduleMetric');
            $this->db->where('Project_project_id',$project_id);
            $query = $this->db->get();
            return ($query->num_rows() > 0) ? $query->result() : false;
        }

        // get schedule
        function getSingleSchedule($id)
        {
            $this->db->select('*');
            $this->db->from('ScheduleMetric');
            $this->db->where('schedule_id',$id);
            $query = $this->db->get();
            $row = $query->row();
            return ($query->num_rows() == 1) ? $row : false;
        }
        

        // update schedule
        function updateSchedule($data,$id)
        {
            $this->db->set($data);
            $this->db->where('schedule_id',$id);
            $this->db->update('ScheduleMetric',$data);
            return true;
        }


        // delete schedule
        function deleteSchedule($schedule_id)
        {
            $this->db->delete('ScheduleMetric',array('schedule_id'=>$schedule_id));
            return true;
        }
    }