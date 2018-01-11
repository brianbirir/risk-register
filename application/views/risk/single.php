<?php 
    $CI =& get_instance();
    $CI->load->model('risk_model');

        echo "<div>";
        echo "<h2 style='display:inline-block;' class='page-header'>Risk ID <span class='label label-info'>".$risk_data->item_id."</span></h2>";

        echo "<div class='pull-right'>Latest Revision: <span class='label label-info'>".$risk_data->effective_date."</span></div>";

        echo "</div>";

?>

<div class="box box-success">
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
            echo "<td><label>Title:</label></td>";
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
            echo "<td><label>Description and Change:</label></td>";
            echo "<td><p>".$risk_data->description_change."</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><label>Risk Materialization Phase:</label></td>";
            echo "<td><p>".$risk_data->materialization_phase."</p></td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td><label>Risk Owner:</label></td>";
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

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Qualitative Analysis</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    <?php
        echo "<table class='table'>";
        echo "<tr>";
        echo "<td><label>Time Impact:</label>";
        echo "<td><p>".$risk_data->time_impact."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Cost Impact:</label>";
        echo "<td><p>".$risk_data->cost_impact."</p></td>";
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

<div class="box box-warning">
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
                    echo "</tr>";

                    foreach ($risk_response as $response_row) {
                        echo "<tr>";
                        echo "<td>".$response_row->response_uuid."</td>";
                        echo "<td>".$response_row->response_title."</td>";
                        echo "<td>".$CI->risk_model->getRiskStrategiesName($response_row->RiskStrategies_strategy_id)."</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                ?>
            </div>
        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Controlling Residual Risk</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    <?php
        echo "<table class='table'>";
        echo "<tr>";
        echo "<td><label>Likelihood:</label>";
        echo "<td><p>".$risk_data->residual_risk_likelihood."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Impact:</label>";
        echo "<td><p>".$risk_data->residual_risk_impact."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Risk Rating:</label></td>";
        echo "<td><p>".$risk_data->residual_risk_rating."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Risk Level:</label></td>";
        echo "<td><p>".$risk_data->residual_risk_level."</p></td>";
        echo "</tr>";

        echo "</table>";
    ?>
    </div>
</div>

<div class="box box-yellow">
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
        echo "<td><label>Action Owner:</label>";
        echo "<td><p>".$risk_data->action_owner."</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><label>Milestone Target Date:</label>";
        echo "<td><p>".$risk_data->milestone_target_date."</p></td>";
        echo "</tr>";

        echo "</table>";
    ?>
    </div>
</div>