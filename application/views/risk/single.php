<?php 
    $CI =& get_instance();
    $CI->load->model('risk_model');

    foreach ($risk_data as $risk_row) {
        echo "<div>";
        echo "<h2 style='display:inline-block;' class='page-header'>Risk ID <span class='label label-info'>".$risk_row->item_id."</span></h2>";

        echo "<div class='pull-right'>Created on <span class='label label-info'>".$risk_row->created_at."</span></div>";

        echo "</div>";
    }
?>

<div class="nav-tabs-custom">

  <!-- Nav tabs -->
  <ul id="risk-tabs" class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
    <li role="presentation"><a href="#assessment" aria-controls="profile" role="tab" data-toggle="tab">Qualitative Assessment</a></li>
    <li role="presentation"><a href="#mitigation" aria-controls="messages" role="tab" data-toggle="tab">Risk Control/Mitigation</a></li>
    <li role="presentation"><a href="#residualrisk" aria-controls="settings" role="tab" data-toggle="tab">Residual Risk</a></li>
    <li role="presentation"><a href="#control" aria-controls="settings" role="tab" data-toggle="tab">Controlling</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="description">
    	<?php
            foreach ($risk_data as $risk_row) {
            	echo "<table class='table'>";

            	echo "<tr>";
    			echo "<td><label>Sub-Project Name:</label>";
    			echo "<td><p>".$CI->risk_model->getSubProjectName($risk_row->Subproject_subproject_id)."</p></td>";
    			echo "</tr>";

    			echo "<tr>";
    			echo "<td><label>Main Catergory:</label>";
    			echo "<td><p>".$CI->risk_model->getRiskCategoryName($risk_row->RiskCategories_category_id)."</p></td>";
    			echo "</tr>";

    			echo "<tr>";
    			echo "<td><label>Identified Hazard/Identified Risk:</label></td>";
                echo "<td><p>".$risk_row->identified_hazard_risk."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Cause/Trigger:</label></td>";
                echo "<td><p>".$risk_row->cause_trigger."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Effect:</label></td>";
                echo "<td><p>".$risk_row->effect."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Risk Materialization Phase:</label></td>";
                echo "<td><p>".$risk_row->materialization_phase."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Risk Owner:</label></td>";
                echo "<td><p>".$risk_row->risk_owner."</p></td>";
                echo "</tr>";

                echo "</table>";
    		}
    	?>
    </div>
    <div role="tabpanel" class="tab-pane" id="assessment">
    	<div class="callout callout-info">
	        <p>Qualitative Assessment before Controls/Mitigation</p>
      	</div>
    	<?php
            foreach ($risk_data as $risk_row) {
            	echo "<table class='table'>";
            	echo "<tr>";
    			echo "<td><label>Time Impact:</label>";
    			echo "<td><p>".$risk_row->time_impact."</p></td>";
    			echo "</tr>";

    			echo "<tr>";
    			echo "<td><label>Cost Impact:</label>";
    			echo "<td><p>".$risk_row->cost_impact."</p></td>";
    			echo "</tr>";

    			echo "<tr>";
    			echo "<td><label>Reputation Impact:</label></td>";
                echo "<td><p>".$risk_row->reputation_impact."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>H & S Impact:</label></td>";
                echo "<td><p>".$risk_row->hs_impact."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Environment Impact:</label></td>";
                echo "<td><p>".$risk_row->env_impact."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Legal Impact:</label></td>";
                echo "<td><p>".$risk_row->legal_impact."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Quality Impact:</label></td>";
                echo "<td><p>".$risk_row->quality_impact."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Comments:</label></td>";
                echo "<td><p>".$risk_row->comments."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Risk Rating:</label></td>";
                echo "<td><p>".$risk_row->risk_rating."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Risk Level:</label></td>";
                echo "<td><p>".$risk_row->risk_level."</p></td>";
                echo "</tr>";

                echo "</table>";
    		}
    	?>
    </div>
    <div role="tabpanel" class="tab-pane" id="mitigation">
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
            foreach ($risk_data as $risk_row) {
            	echo "<table class='table'>";

            	echo "<tr>";
    			echo "<td><label>Strategy:</label>";
    			echo "<td><p>".$CI->risk_model->getRiskStrategiesName($risk_row->RiskStrategies_strategy_id)."</p></td>";
    			echo "</tr>";

    			echo "<tr>";
    			echo "<td><label>(Combinations of) Measures/Controls:</label>";
    			echo "<td><p>".$risk_row->control_mitigation."</p></td>";
    			echo "</tr>";

    			echo "<tr>";
    			echo "<td><label>System Safety:</label></td>";
                echo "<td><p>".$CI->risk_model->getSystemSafetyName($risk_row->SystemSafety_safety_id)."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Realization:</label></td>";
                echo "<td><p>".$CI->risk_model->getRealizationName($risk_row->Realization_realization_id)."</p></td>";
                echo "</tr>";

                echo "</table>";
    		}
    	?>
    </div>
    <div role="tabpanel" class="tab-pane" id="residualrisk">
        <?php
            foreach ($risk_data as $risk_row) {
                echo "<table class='table'>";
                echo "<tr>";
                echo "<td><label>Likelihood:</label>";
                echo "<td><p>".$risk_row->residual_risk_likelihood."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Impact:</label>";
                echo "<td><p>".$risk_row->residual_risk_impact."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Risk Rating:</label></td>";
                echo "<td><p>".$risk_row->residual_risk_rating."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Risk Level:</label></td>";
                echo "<td><p>".$risk_row->residual_risk_level."</p></td>";
                echo "</tr>";

                echo "</table>";
            }
        ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="control">
        <?php
            foreach ($risk_data as $risk_row) {
                echo "<table class='table'>";
                echo "<tr>";
                echo "<td><label>Action Owner:</label>";
                echo "<td><p>".$risk_row->action_owner."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Milestone Target Date:</label>";
                echo "<td><p>".$risk_row->milestone_target_date."</p></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><label>Status:</label></td>";
                echo "<td><p>".$CI->risk_model->getStatusName($risk_row->Status_status_id)."</p></td>";
                echo "</tr>";

                echo "</table>";
            }
        ?>
    </div>
  </div>

</div>