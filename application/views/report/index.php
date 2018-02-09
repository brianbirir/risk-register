<div class="bs-callout bs-callout-info">
    <h4>Generate a risk report</h4>
    <p>The risk report will be generated based on the given filters and downloaded as a CSV file that is readable using Microsoft Excel.</p>
    <?php // echo "<p>". $risk_project_id; ."</p>" ?>
</div>

<!-- report generation form -->

<div id="report-form">

    <?php
        $attributes = array("class" => "pure-form" ,"id" => "report-form", "name" => "report-form");
        echo form_open("report/getFilterResults", $attributes);
    ?>

    <fieldset>
        <label for="risk_register">Risk Register</label>
        <?php 
            $select_register_attributes = '';
            if($selected_register != "None")
            {
                echo form_dropdown('risk_register', $select_register, $selected_register, $select_register_attributes);
            }
            else 
            {
                $select_register['None'] = "Select Option";
                echo form_dropdown('risk_register',$select_register,"None",$select_register_attributes);
            }
        ?>

        <label for="risk_category">Risk Category</label>
        <?php 
            $select_main_category_attributes = '';
            if($selected_category != "None")
            {
                echo form_dropdown('risk_category', $select_category, $selected_category, $select_main_category_attributes);
            }
            else 
            {
                $select_category['None'] = "Select Option";
                echo form_dropdown('risk_category',$select_category,"None",$select_main_category_attributes);
            }
        ?>
        <input name="btn_filter" type="submit" class="pure-button pure-button-primary btn-filter" value="Filter" />
    </fieldset>

    <?php echo form_close(); ?>

    <?php if ($this->session->flashdata('msg')){ ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
    <?php } ?>

</div>


<?php

    //  load risk model and trim library
    $CI =& get_instance();
    $CI->load->model('risk_model');
    $CI->load->library('trim');
    $CI->load->library('responses');

    // check if risk data exists
    if (!$risk_data) {
        $msg = 'There are no risk fitting this criteria';
        echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
    } 
    else 
    { ?>
        <div class="row">
            <div class="col-xs-12">
                <div style="margin-top:20px;" class="box">
                    <div class="box-header">
                        <h3 class="box-title">Risks</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Unique ID</th>
                                    <th>Title</th>
                                    <th>Main Category</th>
                                    <th>Identified Hazard/ IdentifiedRisk</th>
                                    <th>Cause/Trigger</th>
                                    <th>Effect</th>
                                    <th>Project Location</th>
                                    <th>Description & Change</th>    
                                    <th>Risk Materialization Phase</th>
                                    <th>Risk Register</th>
                                    <th>Likelihood</th> 
                                    <th>Time Impact</th> 
                                    <th>Cost Impact</th> 
                                    <th>Reputation Impact</th> 
                                    <th>H&S Impact</th> 
                                    <th>Environment Impact</th>
                                    <th>Legal Impact</th> 
                                    <th>Quality Impact</th> 
                                    <th>Risk Rating</th> 
                                    <th>Risk Level</th>
                                    <th>Risk Responses</th>
                                    <th>System Safety</th> 
                                    <th>Residual Risk Realization</th> 
                                    <th>Residual Risk Likelihood</th> 
                                    <th>Residual Risk Impact</th> 
                                    <th>Residual Risk Rating</th>
                                    <th>Residual Risk Level</th>
                                    <th>A.O. First Name</th>
                                    <th>A.O. Last Name</th>
                                    <th>A.O. Email</th>
                                    <th>Milestone Target Date</th>
                                    <th>Status</th>
                                    <th>Entity</th>
                                </tr>
                            </thead>
                            <tbody id="report-data">
                                <?php
                                    foreach ($risk_data as $risk_row) {
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
                                } ?>
                            </tbody>
                        </table>
                    </div>
                                    
                    <?php if (isset($pagination_links)) { ?>
                        <?php echo $pagination_links; ?>
                    <?php } ?>
                </div>
            </div>
        </div> <!-- end of decision statement -->