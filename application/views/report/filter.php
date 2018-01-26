<div class="callout callout-info">
    <h4>Generate a risk report</h4>

    <p>The risk report will be generated based on the given filters and downloaded as a CSV file that is readable using Microsoft Excel.</p>
</div>

<!-- report generation form -->

<div id="report-generation-form">

    <?php
        $attributes = array("class" => "pure-form" ,"id" => "report-form", "name" => "report-form");
        echo form_open("report/export", $attributes);
    ?>

    <fieldset>

    <!-- date range -->
    <!-- <div class="form-group">
        <label>From:</label>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right datepicker" id="datepicker-from">
        </div>
    </div> -->

    <!-- date range -->
    <!-- <div class="form-group">
        <label>To:</label>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right datepicker" id="datepicker-to">
        </div>
    </div> -->

    <!-- <div class="form-group">
        <label for="sub_project">Risk Register</label>
        <?php 
            // $select_subproject_attributes = 'class="form-control"';
            // $select_subproject['None'] = "None";                    
            // echo form_dropdown('sub_project',$select_subproject,"None",$select_subproject_attributes);
        ?>
    </div> -->

    <label for="risk_register">Risk Register</label>
    <?php 
        $select_subproject_attributes = '';
        $select_subproject['None'] = "None";
        echo form_dropdown( 'risk_register', $select_subproject, $risk_register, $select_subproject_attributes );
    ?>

    <label for="system_safety">Main Category</label>
    <?php 
        $select_main_category_attributes = '';
        $select_category['None'] = "None";
        echo form_dropdown( 'main_category', $select_category, $main_category, $select_main_category_attributes );
    ?>

    <label for="risk_level">Risk Level</label>
    <?php 
        $select_risk_level = array(
            'None' => 'None',
            'Opportunity Low' => 'Opportunity Low',
            'Opportunity Medium' => 'Opportunity Medium',
            'Opportunity High' => 'Opportunity High',
            'Threat Low' => 'Threat Low',
            'Threat Medium' => 'Threat Medium',
            'Threat High' => 'Threat High',
            'Unknown Risk Level' => 'Unknown Risk Level',
        );
        $select_risk_level_attributes = '';
        echo form_dropdown('risk_level',$select_risk_level,$risk_level,$select_risk_level_attributes);
    ?>
    
    <input name="btn_filter" type="submit" class="pure-button pure-button-primary" value="Filter" />
    <input name="btn_report" type="submit" class="pure-button pure-button-primary" value="Generate Report" />
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

    // check if risk data exists
    if (!$risk_data) 
    {
        $msg = 'There are no risk fitting this criteria.';
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
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Main Category</th>
                                <th>Identified Hazard/ IdentifiedRisk</th>
                                <th>Cause/Trigger</th>
                                <th>Effect</th> 
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
                                <th>Comments</th> 
                                <th>Risk Rating</th> 
                                <th>Risk Level</th> 
                                <th>System Safety</th> 
                                <th>Residual Risk Realization</th> 
                                <th>Residual Risk Likelihood</th> 
                                <th>Residual Risk Impact</th> 
                                <th>Residual Risk Rating</th>
                                <th>Residual Risk Level</th>
                                <th>Action Owner</th>
                                <th>Milestone Target Date</th>
                                <th>Status</th>
                            </tr>
                            <?php
                                foreach ($risk_data as $risk_row) {
                                    echo "<tr>";
                                    echo "<td>".$risk_row->item_id."</td>";
                                    echo "<td>".$CI->risk_model->getRiskCategoryName($risk_row->RiskCategories_category_id)."</td>";
                                    echo "<td>".$risk_row->identified_hazard_risk."</td>";
                                    echo "<td>".$risk_row->cause_trigger."</td>";
                                    echo "<td>".$risk_row->effect."</td>";
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
                                    echo "<td>".$CI->trim->trim_text($risk_row->comments)."</td>";
                                    echo "<td>".$risk_row->risk_rating."</td>";
                                    echo "<td>".$risk_row->risk_level."</td>";
                                    echo "<td>".$CI->risk_model->getSystemSafetyName($risk_row->SystemSafety_safety_id)."</td>";
                                    echo "<td>".$CI->risk_model->getRealizationName($risk_row->Realization_realization_id)."</td>";
                                    echo "<td>".$risk_row->residual_risk_likelihood."</td>";
                                    echo "<td>".$risk_row->residual_risk_impact."</td>";
                                    echo "<td>".$risk_row->residual_risk_rating."</td>";
                                    echo "<td>".$risk_row->residual_risk_level."</td>";
                                    echo "<td>".$risk_row->action_owner."</td>";
                                    echo "<td>".$risk_row->milestone_target_date."</td>";
                                    echo "<td>".$CI->risk_model->getStatusName($risk_row->Status_status_id)."</td>";
                                    echo "<td>".$CI->risk_model->getRiskEntityName($risk_row->Entity_entity_id)."</td>";
                                } 
                            } ?>
                        </tbody>
                    <table>
                </div>
            </div>
        </div>
    </div> <!-- end of decision statement -->