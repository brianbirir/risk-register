<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Userproject
{
    public function __construct()
    {
        $CI =& get_instance();

        // load database project module
        $CI->load->model('project_model');

        $this->ci = $CI;
    }

    // get project data
    function getProject( $user_id )
    {
        // get project that belong to user (manager)
        $project = $this->ci->project_model->getProjects( $user_id );
        
        if($project)
        {
            $options = array();

            foreach ($project as $row) 
            {
                $project_id = $row->project_id;
                $project_name = $row->project_name;
                $options[$project_id] = $project_name;  
            }

            return $options;
        }
        else 
        {
            return 'No Data!';
        }
    }
}