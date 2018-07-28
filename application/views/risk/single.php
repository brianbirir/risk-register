<?php 
    $CI =& get_instance();
    $CI->load->model('risk_model');
    $CI->load->model('user_model');

    echo "<div class='well'>".$risk_data->risk_title."</div>";
    echo "<div >Latest Revision: <span class='label label-info'>".$risk_data->effective_date."</span></div>";
?>

<!-- risk revisions table -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Revision Versions</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?php if (!$revision_data) { ?>

            <div style="margin: 10px;">
                <div class="alert alert-warning" role="alert">This risk has no revision versions!</div>
            </div>

        <?php } else { ?>
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Revision ID</th>
                        <th>Date of Update</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        foreach ($revision_data as $revision_row) 
                        {
                            echo "<tr>";
                            echo "<td width=300>".$revision_row->revision_id."</td>";
                            echo "<td width=300>".$revision_row->effective_date."</td>";
                            echo "<td>
                                <span><a title='view' href='/dashboard/risk/revision/".$revision_row->revision_id."'><i class='fa fa-eye' aria-hidden='true'></i></a></span>
                                    </td>";
                            echo "</tr>";
                        } 
                ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>

<div class="box box-success box-identification">
    <div class="box-header with-border">
        <h3 class="box-title">Identification</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
  <div class="box-body">
        <?php
            echo "<table class='table'>";

            echo "<tr>";
            echo "<td><label>Unique ID:</label></td>";
            echo "<td><p>".$risk_data->risk_uuid."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Risk Description:</label></td>";
            echo "<td><p>".$risk_data->risk_title."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Project Location:</label></td>";
            echo "<td><p>".$risk_data->project_location."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Registry:</label>";
            echo "<td><p>".$CI->risk_model->getSubProjectName($risk_data->Subproject_subproject_id)."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Main Category:</label>";
            echo "<td><p>".$CI->risk_model->getRiskCategoryName($risk_data->RiskCategories_category_id)."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Status:</label></td>";
            echo "<td><p>".$CI->risk_model->getStatusName($risk_data->Status_status_id)."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Latest Update:</label></td>";
            echo "<td><p>".$risk_data->effective_date."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Description and Notes:</label></td>";
            echo "<td><p>".$risk_data->description_change."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Risk Materialization Phase:</label></td>";
            echo "<td><p>".$risk_data->materialization_phase_materialization_id."</p></td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td><label>Risk Item Author:</label></td>";
            echo "<td><p>".$CI->risk_model->getRiskOwnerName($risk_data->RiskOwner_riskowner_id)."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Identified Hazard/Identified Risk:</label></td>";
            echo "<td><p>".$risk_data->identified_hazard_risk."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Cause/Trigger:</label></td>";
            echo "<td><p>".$risk_data->cause_trigger."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Effect:</label></td>";
            echo "<td><p>".$risk_data->effect."</p></td>";
            echo "</tr>";

            echo "</table>";
    	?>
  </div>
</div>

<div class="box box-info box-pre-mitigated">
    <div class="box-header with-border">
        <h3 class="box-title">Pre-Mitigated Risk Assessment</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    <?php
        echo "<table class='table'>";

        echo "<tr>";
        echo "<td><label>Likelihood:</label></td>";
        echo "<td><p>".$risk_data->likelihood."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Time Impact:</label>";
        echo "<td><p>".$risk_data->ScheduleMetric_schedule_id."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Cost Impact:</label>";
        echo "<td><p>".$risk_data->CostMetric_cost_id."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Reputation Impact:</label></td>";
        echo "<td><p>".$risk_data->reputation_impact."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>H & S Impact:</label></td>";
        echo "<td><p>".$risk_data->hs_impact."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Environment Impact:</label></td>";
        echo "<td><p>".$risk_data->env_impact."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Legal Impact:</label></td>";
        echo "<td><p>".$risk_data->legal_impact."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Quality Impact:</label></td>";
        echo "<td><p>".$risk_data->quality_impact."</p></td>";
        echo "</tr>";

        // echo "<tr>";
        // echo "<td><label>Comments:</label></td>";
        // echo "<td><p>".$risk_data->comments."</p></td>";
        // echo "</tr>";

        echo "<tr>";
        echo "<td><label>Risk Rating:</label></td>";
        echo "<td><p>".$risk_data->risk_rating."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Risk Level:</label></td>";
        echo "<td><p>".$risk_data->risk_level."</p></td>";
        echo "</tr>";

        echo "</table>";
    ?>
    </div>
</div>

<div class="box box-info box-current-risks">
    <div class="box-header with-border">
        <h3 class="box-title">Current Risk Assessment</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    <?php

        echo "<table class='table'>";

        echo "<tr>";
        echo "<td><label>Likelihood:</label></td>";
        echo "<td><p>".$risk_data->likelihood_current."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Time Impact:</label>";
        echo "<td><p>".$risk_data->time_impact_current."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Cost Impact:</label>";
        echo "<td><p>".$risk_data->cost_impact_current."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Reputation Impact:</label></td>";
        echo "<td><p>".$risk_data->reputation_impact_current."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>H & S Impact:</label></td>";
        echo "<td><p>".$risk_data->hs_impact_current."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Environment Impact:</label></td>";
        echo "<td><p>".$risk_data->env_impact_current."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Legal Impact:</label></td>";
        echo "<td><p>".$risk_data->legal_impact_current."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Quality Impact:</label></td>";
        echo "<td><p>".$risk_data->quality_impact_current."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Risk Rating:</label></td>";
        echo "<td><p>".$risk_data->risk_rating_current."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Risk Level:</label></td>";
        echo "<td><p>".$risk_data->risk_level_current."</p></td>";
        echo "</tr>";

        echo "</table>";
    ?>
    </div>
</div>

<div class="box box-info box-targeted-risks">
    <div class="box-header with-border">
        <h3 class="box-title">Predicted Post Mitigation Assessment</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    <?php
        echo "<table class='table'>";

        echo "<tr>";
        echo "<td><label>Likelihood:</label></td>";
        echo "<td><p>".$risk_data->likelihood_target."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Time Impact:</label>";
        echo "<td><p>".$risk_data->time_impact_target."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Cost Impact:</label>";
        echo "<td><p>".$risk_data->cost_impact_target."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Reputation Impact:</label></td>";
        echo "<td><p>".$risk_data->reputation_impact_target."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>H & S Impact:</label></td>";
        echo "<td><p>".$risk_data->hs_impact_target."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Environment Impact:</label></td>";
        echo "<td><p>".$risk_data->env_impact_target."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Legal Impact:</label></td>";
        echo "<td><p>".$risk_data->legal_impact_target."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Quality Impact:</label></td>";
        echo "<td><p>".$risk_data->quality_impact_target."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Risk Rating:</label></td>";
        echo "<td><p>".$risk_data->risk_rating_target."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Risk Level:</label></td>";
        echo "<td><p>".$risk_data->risk_level_target."</p></td>";
        echo "</tr>";

        echo "</table>";
    ?>
    </div>
</div>

<div class="box box-warning box-responses">
    <div class="box-header with-border">
        <h3 class="box-title">Risk Responses</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="callout callout-info">
            <p>Apply a Safety System (e.g. by "STOP") to achieve System Safety</p>
            <p>STOP:</p>
            <ul>
                <li>S = Strategy / System / Substitution</li>
                <li>T = Technology</li>
                <li>O = Organization</li>
                <li>P = Personnel/Staff</li>
            </ul>
        </div>
        
        <?php
            echo "<table class='table table-bordered'>";;

            echo "<tr>";
            echo "<td><label>System Safety:</label></td>";
            echo "<td><p>".$CI->risk_model->getSystemSafetyName($risk_data->SystemSafety_safety_id)."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Realization:</label></td>";
            echo "<td><p>".$CI->risk_model->getRealizationName($risk_data->Realization_realization_id)."</p></td>";
            echo "</tr>";

            echo "</table>";
        ?>
        <br />
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Responses</h3>
            </div>
            <div class="box-body">
                <?php 
                    // risk responses
                    echo "<table class='table table-bordered'>";;

                    echo "<tr>";
                    echo "<th>Response ID</th>";
                    echo "<th>Response Title</th>";
                    echo "<th>Response Strategy</th>";
                    echo "<th>Response Users</th>";
                    echo "</tr>";

                    foreach ($risk_response as $response_row)
                    {
                        echo "<tr>";
                        echo "<td>".$response_row->response_id."</td>";
                        echo "<td>".$CI->response_model->getResponseName($response_row->ResponseTitle_id)."</td>";
                        echo "<td>".$CI->risk_model->getRiskStrategiesName($response_row->RiskStrategies_strategy_id)."</td>";
                        
                        $users = unserialize($response_row->user_id);
                                        
                        echo "<td>";
                        foreach ($users as $value)
                        {
                            echo "<li>".$CI->user_model->getUserNames($value)."</li>";
                        }
                        echo '</td>';
                        echo "</tr>";
                    }

                    echo "</table>";
                ?>
            </div>
        </div>
    </div>
</div>

<div class="box box-yellow box-controlling">
    <div class="box-header with-border">
        <h3 class="box-title">Controlling</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    <?php
        echo "<table class='table'>";
        echo "<tr>";
        echo "<td><label>Action Owner First Name:</label>";
        echo "<td><p>".$CI->user_model->getUserNames($risk_data->action_owner)."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Action Item:</label>";
        echo "<td><p>".$risk_data->action_item."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Milestone Target Date:</label>";
        echo "<td><p>".$risk_data->milestone_target_date."</p></td>";
        echo "</tr>";

        echo "</table>";
    ?>
    </div>
</div>