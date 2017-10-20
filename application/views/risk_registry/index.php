<div class="view-risk-registry">


    <?php if ($this->session->flashdata('msg')){ ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
    <?php } ?>

    <!-- display project updating alert messages -->
    <?php if ($this->session->flashdata('positive_msg')){ ?>
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span><?php echo $this->session->flashdata('positive_msg'); ?></span>
      </div>
    <?php } else if ($this->session->flashdata('negative_msg')) { ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span><?php echo $this->session->flashdata('negative_msg'); ?></span>
      </div>
    <?php } ?>

    <div class="reg-btn">
        <a href="/dashboard/riskregistry/add" class="btn btn-success btn-sm btn-add-device">Add Risk</a>
    </div>

    <?php
        // check if risk data exists
        if (!$risk_data) {
            $msg = 'You have no registered risks!';
            echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
        } else { ?>
        <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Risk Registry</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Sub-Project</th>
                                <th>Main Category</th>
                                <th>Identified Hazard/ Risk</th>
                                <th>Cause/ Trigger</th>
                                <th>Effect</th>
                                <th>Risk Materilization Phase</th>
                                <th>Risk Owner</th>
                                <th>Likelihood</th>
                                <th>Time Impact</th>
                                <th>Cost Impact</th>
                                <th>Reputation Impact</th>
                                <th>H&S Impact</th>
                                <th>Environment Impact</th>
                                <th>Legal Impact</th>
                                <th>Quality Impact</th>
                                <th>Comments</th>
                                <th>Risk Rating</th>
                                <th>Risk Level</th>
                                <th>Strategy</th>
                                <th>Risk Control/ Mitigation</th>
                                <th>System Safety</th>
                                <th>Realization</th>
                                <th>Likelihood</th>
                                <th>Impact</th>
                                <th>Risk Rating</th>
                                <th>Risk Level</th>
                                <th>Action Owner</th>
                                <th>Milestone Target Date</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                            <?php
                                foreach ($risk_data as $risk_row) {
                                    echo "<tr>";
                                    echo "<td>".$risk_row->Subproject_subproject_id."</td>";
                                    echo "<td>".$risk_row->RiskCategories_category_id."</td>";
                                    echo "<td>".$risk_row->identified_hazard_risk."</td>";
                                    echo "<td>".$risk_row->cause_trigger."</td>";
                                    echo "<td>".$risk_row->effect."</td>";
                                    echo "<td>".$risk_row->materialization_phase."</td>";
                                    echo "<td>".$risk_row->risk_owner."</td>";
                                    echo "<td>".$risk_row->likelihood."</td>";
                                    echo "<td>".$risk_row->time_impact."</td>";
                                    echo "<td>".$risk_row->cost_impact."</td>";
                                    echo "<td>".$risk_row->reputation_impact."</td>";
                                    echo "<td>".$risk_row->hs_impact."</td>";
                                    echo "<td>".$risk_row->env_impact."</td>";
                                    echo "<td>".$risk_row->legal_impact."</td>";
                                    echo "<td>".$risk_row->quality_impact."</td>";
                                    echo "<td>".$risk_row->comments."</td>";
                                    echo "<td>".$risk_row->risk_rating."</td>";
                                    echo "<td>".$risk_row->risk_level."</td>";
                                    echo "<td>".$risk_row->RiskStrategies_strategy_id."</td>";
                                    echo "<td><div class='scrollable'>".$risk_row->control_mitigation."</div></td>";
                                    echo "<td>".$risk_row->SystemSafety_safety_id."</td>";
                                    echo "<td>".$risk_row->Realization_realization_id."</td>";
                                    echo "<td>".$risk_row->residual_risk_likelihood."</td>";
                                    echo "<td>".$risk_row->residual_risk_impact."</td>";
                                    echo "<td>".$risk_row->residual_risk_rating."</td>";
                                    echo "<td>".$risk_row->residual_risk_level."</td>";
                                    echo "<td>".$risk_row->action_owner."</td>";
                                    echo "<td>".$risk_row->milestone_target_date."</td>";
                                    echo "<td>".$risk_row->Status_status_id."</td>";
                                    echo "<td>".$risk_row->created_at."</td>";
                                    echo "<td>".$risk_row->updated_at."</td>";
                                    echo "</tr>";
                                } 
                            } ?>
                        </tbody>
                    <table>
                </div>
            </div>
        </div>
    </div> <!-- end of decision statement -->