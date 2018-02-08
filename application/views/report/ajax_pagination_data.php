<?php

    //  load risk model and trim library
    $CI =& get_instance();
    $CI->load->model('risk_model');
    $CI->load->library('trim');
    $CI->load->library('responses');

    // check if risk data exists
    if (!$risk_data) 
    {
        $msg = 'There are no risk fitting this criteria';
        echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
    } 
    else 
    {
        foreach ($risk_data as $risk_row) 
        {
            echo "<tr>";
            echo "<td>".$risk_row->item_id."</td>";
            echo "<td>".$risk_row->risk_uuid."</td>";
            echo "<td>".$risk_row->risk_title."</td>";
            echo "<td>".$CI->risk_model->getRiskCategoryName($risk_row->RiskCategories_category_id)."</td>";
            echo "<td>".$risk_row->identified_hazard_risk."</td>";
            echo "<td>".$risk_row->cause_trigger."</td>";
            echo "<td>".$risk_row->effect."</td>";  
            echo "<td>".$risk_row->project_location."</td>";
            echo "<td>".$risk_row->description_change."</td>";
            // echo "<td>".$risk_row->materialization_phase."</td>";
            echo "<td>".$CI->risk_model->getRiskMaterializationName($risk_row->materialization_phase_materialization_id)."</td>";
            echo "<td>".$CI->risk_model->getSubProjectName($risk_row->Subproject_subproject_id)."</td>";
            echo "<td>".$risk_row->likelihood."</td>";
            echo "<td>".$risk_row->time_impact."</td>";
            echo "<td>".$risk_row->cost_impact."</td>";
            echo "<td>".$risk_row->reputation_impact."</td>";
            echo "<td>".$risk_row->hs_impact."</td>";
            echo "<td>".$risk_row->env_impact."</td>";
            echo "<td>".$risk_row->legal_impact."</td>";
            echo "<td>".$risk_row->quality_impact."</td>";
            echo "<td>".$risk_row->risk_rating."</td>";
            echo "<td>".$risk_row->risk_level."</td>";
            echo "<td>";
            $risk_responses = $CI->responses->collectResponses($risk_row->risk_uuid);

            foreach ($risk_responses as $value) {
                echo $value;
            }
            echo "</td>";
            // echo "<td>".$CI->responses->collectResponses($risk_row->risk_uuid)."</td>";
            echo "<td>".$CI->risk_model->getSystemSafetyName($risk_row->SystemSafety_safety_id)."</td>";
            echo "<td>".$CI->risk_model->getRealizationName($risk_row->Realization_realization_id)."</td>";
            echo "<td>".$risk_row->residual_risk_likelihood."</td>";
            echo "<td>".$risk_row->residual_risk_impact."</td>";
            echo "<td>".$risk_row->residual_risk_rating."</td>";
            echo "<td>".$risk_row->residual_risk_level."</td>";
            echo "<td>".$risk_row->action_owner_fname."</td>";
            echo "<td>".$risk_row->action_owner_lname."</td>";
            echo "<td>".$risk_row->action_owner_email."</td>";
            echo "<td>".$risk_row->milestone_target_date."</td>";
            echo "<td>".$CI->risk_model->getStatusName($risk_row->Status_status_id)."</td>";
            echo "<td>".$CI->risk_model->getRiskEntityName($risk_row->Entity_entity_id)."</td>";
        } 
    }
?>