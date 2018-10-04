<!-- display updating alert messages -->
<?php if ($this->session->flashdata('positive-msg')){ ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('positive-msg'); ?></span>
  </div>
<?php } else if ($this->session->flashdata('negative-msg')) { ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('negative-msg'); ?></span>
  </div>
<?php } ?>


<?php 
    $CI =& get_instance();
    $CI->load->model('risk_model');
    $CI->load->model('project_model');
    $register_row = $CI->project_model->getManagerRegisterName( $risk->Subproject_subproject_id );
?>

<!-- risk editing form -->
<div class="row">
    <div id="edit-risk-form">
        <div class="col-md-12">
            
            <?php
                $attributes = array("class" => "ui form", "id" => "risk-reg-form", "name" => "reg-risk-form");
                echo form_open("risk/update", $attributes);
            ?>

            <input type="hidden" name="risk_id" id="risk_id" class="form-control" value="<?php echo $risk->item_id;?>"/>
        
            <div class="box box-success box-identification">

                <div class="box-header with-border">
                    <h3 class="box-title">Identification</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <input type="hidden" name="risk_uuid" id="risk_uuid" class="form-control" value="<?php echo $risk->risk_uuid; ?>"/>
                    <input type="hidden" name="register_id" id="register_id" class="form-control" value="<?php echo $risk->Subproject_subproject_id;?>"/>

                    <div class="row">             
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="identified_hazard_risk">Identified Hazard Risk</label>
                                <input id="harzard-risk" class="form-control" name="identified_hazard_risk" placeholder="Identified Hazard Risk" value="<?php echo $risk->identified_hazard_risk; ?>"/>
                                <?php echo form_error('identified_hazard_risk','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cause_trigger">Cause Trigger</label>
                                <input id="cause-trigger" class="form-control" name="cause_trigger" placeholder="Cause Trigger" value="<?php echo $risk->cause_trigger; ?>"/>
                                <?php echo form_error('cause_trigger','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="effect">Effect</label>
                                <input id="effect" class="form-control" name="effect" placeholder="Effect" value="<?php echo $risk->effect; ?>"/>
                                <?php echo form_error('effect','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <a id="add-description" class="btn btn-default btn-sm">Update Description</a>
                            <a id="clear-description" class="btn btn-default btn-sm">Clear Description</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description_change">Risk Item Description</label>
                                <textarea id="description-text" class="form-control" name="description_change" rows="5" readonly><?php echo $risk->description_change; ?></textarea>
                                <?php echo form_error('description_change','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="risk_title">Notes (Risk Item Title)</label>
                                <input class="form-control" name="risk_title" type="text" value="<?php echo $risk->risk_title; ?>" required/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project_location">Assign Project Location</label>
                                <input class="form-control" name="project_location" placeholder="Assign Project Location" type="text" value="<?php echo $risk->project_location; ?>" required/>
                                <?php echo form_error('project_location','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="reference_number">Reference Number</label>
                                <input class="form-control" name="reference_number" type="text" value="<?php echo $risk->reference_number; ?>" required/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <?php 
                                    $select_status_attributes = 'class="form-control"';
                                    $status_id = $risk->Status_status_id;
                                    echo form_dropdown('status',$select_status,$status_id,$select_status_attributes);
                                ?>
                            </div>    
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="latest_update">Latest Update</label>
                                <div class="well well-sm"><?php echo $risk->effective_date; ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="main_category">Risk Category</label>
                                <?php 
                                    $select_main_category_attributes = 'class="form-control" readonly';
                                    $category_id = $risk->RiskCategories_category_id;
                                    echo form_dropdown('main_category',$select_category,$category_id,$select_main_category_attributes);
                                ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_category">Risk Subcategory</label>
                                <?php 
                                    $select_subcategory_attributes = 'class="form-control"';
                                    $subcategory_id = $risk->RiskSubCategories_subcategory_id;
                                    echo form_dropdown('sub_category',$select_subcategory,$subcategory_id,$select_subcategory_attributes);
                                ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description_change">Description and Change</label>
                                <textarea class="form-control" name="description_change" placeholder="Description and Change" rows="5" required/>   <?php echo $risk->description_change; ?>
                                </textarea>
                                <?php echo form_error('description_change','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>
                    </div> -->

                    <!-- <legend>Phase & Owner</legend> -->
                    
                    <div class="row">             
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="materialization_phase">Materialization Phase</label>
                                <?php 
                                    $select_materialization_attributes = 'class="form-control" required';
                                    $materialization_id = $risk->materialization_phase_materialization_id;
                                    echo form_dropdown('materialization_phase',$select_materialization_phase,$materialization_id,$select_materialization_attributes);
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="risk_owner">Risk Item Owner</label>
                                <?php 
                                    $select_risk_owner_attributes = 'class="form-control" required';
                                    $risk_owner_id = $risk->RiskOwner_riskowner_id;
                                    echo form_dropdown('risk_owner',$select_risk_owner,$risk_owner_id,$select_risk_owner_attributes);  
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- prepopulated fields -->

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sub_project">Risk Register</label>
                                <div class="well well-sm"><?php echo $register_row->name; ?></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dor">Date of Recording</label>
                                <div class="well well-sm"><?php echo $risk->created_at; ?></div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="risk_owner">Risk Item Author</label>
                                <div class="well well-sm"><?php echo $first_name." ".$last_name ; ?></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="risk_id">Risk ID</label>
                                <div class="well well-sm" style="overflow:scroll;"><?php echo $risk->risk_uuid; ?></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-info box-pre-mitigated">

                        <div class="box-header with-border">
                            <h3 class="box-title">Pre-Mitigation Risk Assessment</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="likelihood">Likelihood</label>
                                    <?php
                                        $select_option = array(
                                            '1' => '1',
                                            '2' => '2',
                                            '3' => '3',
                                            '4' => '4',
                                            '5' => '5',
                                        );
                                        $likelihood_impact_id = $risk->likelihood;
                                        $select_likelihood_impact = 'id="likelihood" class="form-control input-sm select-input"';
                                        echo form_dropdown('likelihood',$select_option,$likelihood_impact_id,$select_likelihood_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="timeimpact">Time Impact</label>
                                    <?php
                                        $time_impact_id = $risk->ScheduleMetric_schedule_id; 
                                        $select_time_impact = 'id="timeimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('timeimpact',$select_risk_schedule,$time_impact_id,$select_time_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="costimpact">Cost Impact</label>
                                    <?php 
                                        $cost_impact_id = $risk->CostMetric_cost_id;  
                                        $select_cost_impact = 'id="costimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('costimpact',$select_risk_cost,$cost_impact_id,$select_cost_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="reputationimpact">Reputation Impact</label>
                                    <?php 
                                        $reputation_impact_id = $risk->reputation_impact; 
                                        $select_reputation_impact = 'id="reputationimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('reputationimpact',$select_option,$reputation_impact_id,$select_reputation_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="hsimpact">H & S Impact</label>
                                    <?php 
                                        $hs_impact_id = $risk->hs_impact;
                                        $select_hs_impact = 'id="hsimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('hsimpact',$select_option,$hs_impact_id,$select_hs_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="environmentimpact">Environment Impact</label>
                                    <?php 
                                        $env_impact_id = $risk->env_impact;
                                        $select_env_impact = 'id="envimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('environmentimpact',$select_option,$env_impact_id,$select_env_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="legalimpact">Legal Impact</label>
                                    <?php 
                                        $legal_impact_id = $risk->legal_impact; 
                                        $select_legal_impact = 'id="legalimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('legalimpact',$select_option,$legal_impact_id,$select_legal_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="qualityimpact">Quality Impact</label>
                                    <?php 
                                        $quality_impact_id = $risk->quality_impact;  
                                        $select_quality_impact = 'id="qualityimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('qualityimpact',$select_option,$quality_impact_id,$select_quality_impact);
                                    ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="risk_rating">Risk Rating</label>
                                        <input id="risk_rating" class="form-control" name="risk_rating" placeholder="Risk Rating" type="text" value="<?php echo $risk->risk_rating; ?>" required/>
                                        <?php echo form_error('risk_rating','<div class="alert alert-danger">','</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="risk_level">Risk Level</label>
                                        <input id="risk_level" class="form-control" name="risk_level" placeholder="Risk Level" type="text" value="<?php echo $risk->risk_level; ?>" required/>
                                        <?php echo form_error('risk_level','<div class="alert alert-danger">','</div>'); ?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <a class="btn btn-default btn-reg" onclick="calcQualitativeRisk()">Calculate</a>
                                </div>

                            </div>
                        </div>
                    
                    </div>
                </div>

                <div class="col-md-4">                
                    <div class="box box-info box-current-risks">

                        <div class="box-header">
                            <h3 class="box-title">Current Risk Assessment</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="likelihood_current">Likelihood</label>
                                    <?php
                                        $select_option = array(
                                            '1' => '1',
                                            '2' => '2',
                                            '3' => '3',
                                            '4' => '4',
                                            '5' => '5'
                                        );
                                        $select_current_likelihood_impact = 'id="likelihood_current" class="form-control input-sm select-input"';
                                        $likelihood_current_id = $risk->likelihood_current;
                                        echo form_dropdown('likelihood_current',$select_option,$likelihood_current_id,$select_current_likelihood_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="timeimpact_current">Time Impact</label>
                                    <?php 
                                        $select_current_time_impact = 'id="timeimpact_current" class="form-control input-sm select-input"';

                                        $time_impact_current_id = $risk->time_impact_current;
                                        // echo form_dropdown('timeimpact',$select_option,"1",$select_time_impact);
                                        echo form_dropdown('timeimpact_current', $select_risk_schedule, $time_impact_current_id, $select_current_time_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="costimpact_current">Cost Impact</label>
                                    <?php 
                                        $select_current_cost_impact = 'id="costimpact_current" class="form-control input-sm select-input"';

                                        $cost_impact_current_id = $risk->cost_impact_current; 
                                        // echo form_dropdown('costimpact',$select_option,"1",$select_cost_impact);
                                        echo form_dropdown('costimpact_current', $select_risk_cost, $cost_impact_current_id, $select_current_cost_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="reputationimpact_current">Reputation Impact</label>
                                    <?php

                                        $reputation_impact_current_id = $risk->reputation_impact_current; 
                                        $select_current_reputation_impact = 'id="reputationimpact_current" class="form-control input-sm select-input"';
                                        echo form_dropdown('reputationimpact_current',$select_option,$reputation_impact_current_id,$select_current_reputation_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="hsimpact_current">H & S Impact</label>
                                    <?php 
                                        $hs_impact_current_id = $risk->hs_impact_current;
                                        $select_current_hs_impact = 'id="hsimpact_current" class="form-control input-sm select-input"';
                                        echo form_dropdown('hsimpact_current',$select_option,$hs_impact_current_id,$select_current_hs_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="environmentimpact_current">Environment Impact</label>
                                    <?php 
                                        $env_impact_current_id = $risk->env_impact_current;
                                        $select_current_env_impact = 'id="envimpact_current" class="form-control input-sm select-input"';
                                        echo form_dropdown('environmentimpact_current',$select_option,$env_impact_current_id,$select_current_env_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="legalimpact_current">Legal Impact</label>
                                    <?php
                                        $legal_impact_current_id = $risk->legal_impact_current;
                                        $select_current_legal_impact = 'id="legalimpact_current" class="form-control input-sm select-input"';
                                        echo form_dropdown('legalimpact_current',$select_option,$legal_impact_current_id,$select_current_legal_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="qualityimpact_current">Quality Impact</label>
                                    <?php 
                                        $quality_impact_current_id = $risk->quality_impact_current;
                                        $select_current_quality_impact = 'id="qualityimpact_current" class="form-control input-sm select-input"';
                                        echo form_dropdown('qualityimpact_current',$select_option,$quality_impact_current_id,$select_current_quality_impact);
                                    ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currentrisk_rating">Risk Rating</label>
                                        <input id="currentrisk_rating" class="form-control" name="currentrisk_rating" placeholder="Risk Rating" type="text" value="<?php echo $risk->risk_rating_current; ?>" required/>
                                        <?php echo form_error('currentrisk_rating','<div class="alert alert-danger">','</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currentrisk_level">Risk Level</label>
                                        <input id="currentrisk_level" class="form-control" name="currentrisk_level" placeholder="Risk Level" type="text" value="<?php echo $risk->risk_level_current; ?>" required/>
                                        <?php echo form_error('currentrisk_level','<div class="alert alert-danger">','</div>'); ?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <a class="btn btn-default btn-reg" onclick="calcCurrentQualitativeRisk()">Calculate</a>
                                </div>

                            </div>
                        </div>
                    
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box box-info box-targeted-risks">

                        <div class="box-header">
                            <h3 class="box-title">Predicted Post Mitigation Assessment</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="likelihood_target">Likelihood</label>
                                    <?php
                                        $select_option = array(
                                            '1' => '1',
                                            '2' => '2',
                                            '3' => '3',
                                            '4' => '4',
                                            '5' => '5'
                                        );
                                        $select_target_likelihood_impact = 'id="likelihood_target" class="form-control input-sm select-input"';
                                        $likelihood_target_id = $risk->likelihood_target;
                                        echo form_dropdown('likelihood_target',$select_option,$likelihood_target_id,$select_target_likelihood_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="timeimpact_target">Time Impact</label>
                                    <?php 
                                        $select_target_time_impact = 'id="timeimpact_target" class="form-control input-sm select-input"';

                                        $time_impact_target_id = $risk->time_impact_target;
                                        // echo form_dropdown('timeimpact',$select_option,"1",$select_time_impact);
                                        echo form_dropdown('timeimpact_target', $select_risk_schedule, $time_impact_target_id, $select_target_time_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="costimpact_target">Cost Impact</label>
                                    <?php 
                                        $select_target_cost_impact = 'id="costimpact_target" class="form-control input-sm select-input"';

                                        $cost_impact_target_id = $risk->cost_impact_target; 
                                        // echo form_dropdown('costimpact',$select_option,"1",$select_cost_impact);
                                        echo form_dropdown('costimpact_target', $select_risk_cost, $cost_impact_target_id, $select_target_cost_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="reputationimpact_target">Reputation Impact</label>
                                    <?php

                                        $reputation_impact_target_id = $risk->reputation_impact_target; 
                                        $select_target_reputation_impact = 'id="reputationimpact_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('reputationimpact_target',$select_option,$reputation_impact_target_id,$select_target_reputation_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="hsimpact_target">H & S Impact</label>
                                    <?php 
                                        $hs_impact_target_id = $risk->hs_impact_target;
                                        $select_target_hs_impact = 'id="hsimpact_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('hsimpact_target',$select_option,$hs_impact_target_id,$select_target_hs_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="environmentimpact_target">Environment Impact</label>
                                    <?php 
                                        $env_impact_target_id = $risk->env_impact_target;
                                        $select_target_env_impact = 'id="envimpact_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('environmentimpact_target',$select_option,$env_impact_target_id,$select_target_env_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="legalimpact_target">Legal Impact</label>
                                    <?php
                                        $legal_impact_target_id = $risk->legal_impact_target;
                                        $select_target_legal_impact = 'id="legalimpact_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('legalimpact_target',$select_option,$legal_impact_target_id,$select_target_legal_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="qualityimpact_target">Quality Impact</label>
                                    <?php 
                                        $quality_impact_target_id = $risk->quality_impact_target;
                                        $select_target_quality_impact = 'id="qualityimpact_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('qualityimpact_target',$select_option,$quality_impact_target_id,$select_target_quality_impact);
                                    ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="targetrisk_rating">Risk Rating</label>
                                        <input id="targetrisk_rating" class="form-control" name="targetrisk_rating" placeholder="Risk Rating" type="text" value="<?php echo $risk->risk_rating_target; ?>" required/>
                                        <?php echo form_error('targetrisk_rating','<div class="alert alert-danger">','</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="targetrisk_level">Risk Level</label>
                                        <input id="targetrisk_level" class="form-control" name="targetrisk_level" placeholder="Risk Level" type="text" value="<?php echo $risk->risk_level_target; ?>" required/>
                                        <?php echo form_error('targetrisk_level','<div class="alert alert-danger">','</div>'); ?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <a class="btn btn-default btn-reg" onclick="calcTargetQualitativeRisk()">Calculate</a>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>


            <!-- risk responses -->
            <div class="box box-warning box-responses">

                <div class="box-header with-border">
                    <h3 class="box-title">Risk Responses</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Risk Response</h3>
                                <button type="button" class="btn btn-default btn-xs btn-reg pull-right" data-toggle="modal" data-target="#response-modal">Add New Response Row</button>
                            </div>

                            <!-- existing responses -->
                            <div class="box-body">
                                <div id="response-table-body">
                                    <h4 class="box-title">Existing Responses</h4>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <strong>Response Title</strong>
                                        </div>
                                        <div class="col-md-1">
                                            
                                        </div>
                                        <div class="col-md-2">
                                            <strong>Response Strategy</strong>
                                        </div>        
                                        <div class="col-md-2">
                                            <strong>Response Users</strong>
                                        </div>
                                        <div class="col-md-1">
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <strong>Response Date</strong>
                                        </div>
                                    </div>

                                    <?php foreach ($risk_response as $response_row) {?>

                                    <div class='row response-item'>
                                        <input type="hidden" name="risk_response[id][]" class="form-control" value="<?php echo $response_row->response_id;?>"/>

                                        <div class="col-md-2">
                                            <div class="form-group form-response-title">
                                                <?php
                                                    $select_responsetitle_attr = 'class="form-control response response-title"';
                                                    $response_title_id = $response_row->ResponseTitle_id;
                                                    echo form_dropdown('risk_response[title][]',$select_response_name,$response_title_id,$select_responsetitle_attr);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-1">
                                            <!-- button for adding response title to drop down -->
                                            <button type="button" class="btn btn-default btn-xs btn-reg" data-toggle="modal" data-target="#response-title-modal">Add Response</button>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <?php
                                                    $select_responsestrategy_attr = 'class="form-control response response-strategy"';
                                                    $response_strategy_id = $response_row->RiskStrategies_strategy_id;
                                                    echo form_dropdown('risk_response[strategy][]',$select_strategy,$response_strategy_id,$select_responsestrategy_attr);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <?php
                                                    $select_response_user_attr = 'class="form-control response response-user"';
                                                    $response_users = unserialize($response_row->user_id);
                                                    echo form_multiselect('risk_response[users][]', $select_user,$response_users, $select_response_user_attr);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-1">
                                            <!-- button for adding response user to drop down -->
                                            <button type="button" class="btn btn-default btn-xs btn-reg" data-toggle="modal" data-target="#response-user-modal">Add User</button>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="risk_response[date][]" placeholder="Risk Response Date" type="text" value="<?php echo $response_row->due_date; ?>" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box box-yellow box-controlling">

                <div class="box-header with-border">
                    <h3 class="box-title">Risk Overseer</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="action_owner">Action Owner</label>
                            <?php 
                                $select_action_owner_attributes = 'class="form-control"';
                                $action_owner_id = $risk->action_owner;
                                echo form_dropdown('action_owner',$select_user,$action_owner_id,$select_action_owner_attributes);
                            ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="action_item">Action Item for Risk Mitigation</label>
                            <textarea class="form-control" name="action_item" placeholder="Action Item" rows="5" required><?php echo $risk->action_item;?></textarea>
                            <?php echo form_error('action_item','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="milestone_target_date">Milestone Target Date</label>
                            <input class="form-control" name="milestone_target_date" placeholder="Milestone Target Date" type="text" value="<?php echo $risk->milestone_target_date; ?>" required/>
                            <?php echo form_error('milestone_target_date','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>
                </div>

            </div>

            <input name="btn_update_risk" type="submit" class="btn btn-success btn-reg pull-right" value="Update Risk" />

            <?php echo form_close(); ?>
        </div>


        <!-- modal for displaying form to add response title -->
        <div class="modal fade" id="response-title-modal" tabindex="-1" role="dialog" aria-labelledby="ResponseModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Response Title</h4>
              </div>
              <div class="modal-body">

                <div style="display: none;" id="response-modal-alert-warning" class="alert alert-warning fade in" role="alert">
                    <strong>Warning!</strong> Please fill the response title field!
                </div>

                <div style="display: none;" id="response-modal-alert-success" class="alert alert-success fade in" role="alert">
                    <strong>Success!</strong> The response title has been registered successfully!
                </div>

                <div style="display: none;" id="response-modal-alert-danger" class="alert alert-danger fade in" role="alert">
                </div>

                <?php
                    $attributes = array("class" => "ui form", "id" => "response-title-form", "name" => "response-title-form");
                    echo form_open("", $attributes);
                ?>

                    <div class="form-group">
                        <label for="response_title_modal">Response Title</label>
                        <input id="response-modal-title" class="form-control" name="response_title_modal" type="text" value="<?php echo set_value('response_title_modal'); ?>" required/>
                    </div>

                    <div class="form-group">
                        <label for="project_name">Select Project</label>
                        <?php
                            $select_project_attributes = 'class="form-control" disabled';
                            echo form_dropdown('project_name',$select_project,$user_project_id,$select_project_attributes);
                        ?>
                    </div>

                    <input type="hidden" name="project" id="response-modal-project-id" class="form-control" value="<?php echo $user_project_id; ?>"/>

                <?php echo form_close(); ?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="add-response-title" type="button" class="btn btn-primary btn-reg">Add Title</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- response modal -->
        <?php $this->load->view('partials/response_modal'); ?>

        <!-- modal for displaying form to add response user -->
        <?php $this->load->view('partials/response_user_modal'); ?>

    </div>
</div>


<!-- JS code to register the response title asynchronously -->
<script type="text/javascript">
    $(document).ready(function(){

        // register the response title asynchronously
        $('#add-response-title').click(function(event) {

            event.preventDefault();

            var response_title = $('#response-modal-title').val();
            var response_project_id = $('#response-modal-project-id').val();

            if(response_title == '')
            {
                $("#response-modal-alert-warning").show();
            } 
            else 
            {
                $.ajax({
                    url:  "<?php echo base_url(); ?>" + "response/ajax_response",
                    type: "POST",
                    data: {response_name: response_title, project_name: response_project_id},
                    dataType: "JSON"
                })
                .done(function(response) {
                    $("#response-modal-alert-success").show(); // display success alert

                    // create select field for response title
                    var titleSelect = '<select name="risk_response[title][]" class="form-control response response-title"></select>';

                    // remove options from response title select drop down
                    // $('.response-title option').remove();

                    // remove response title select field
                    $('.form-response-title .response-title').remove();

                    $('.form-response-title .response-title').remove();

                    // recreate response title select field
                    $('.form-response-title').html(titleSelect);

                    // add new options from data
                    $.each( response, function( key, value ) {
                        $('.response-title').append('<option value="' + key + '">' + value + '</option>');
                    });

                    // initialize chosen library on response drop down to display newly added option
                    $('.response-title').chosen();
                })
                .fail(function(xhr) {
                    $('#response-modal-alert-danger').html('<p>An error has occurred</p>').show();
                });
            }
        });

        // on showing responses modal
        $('#response-modal').on('shown.bs.modal', function (e) {

            // initialize chosen select library
            $(".response-title-edit").chosen();
            $(".response-user-edit").chosen();
            $(".response-strategy-edit").chosen();
        })

        // on hiding response modal
        $("#response-modal").on('hidden.bs.modal', function () {
            $("#response-user-edit").val("");
            $("#response-date-edit").val("");
            $("#response-modal-alert-warning").hide();
            $("#response-modal-alert-success").hide();
        });


        // register the response asynchronously
        $('#add-response').click(function(event) {

            event.preventDefault();

            var response_title = $('#response-title-edit').val();
            var response_strategy = $('#response-strategy-edit').val();
            var response_user = $('#response-user-edit').val();
            var response_date = $('#response-date-edit').val();
            var risk_uuid = $('#risk_uuid').val();
            var register_id = $('#register_id').val();

            if(response_title == '')
            {
                $("#response-alert-warning").show();
            } 
            else 
            {
                $.ajax({
                    url:  "<?php echo base_url(); ?>" + "risk/new_response",
                    type: "POST",
                    data: {response_title: response_title, response_strategy: response_strategy, response_user: response_user, response_date: response_date, risk_uuid: risk_uuid, register_id: register_id},
                    dataType: "JSON"
                })
                .done(function(response) {

                    if(response.status)
                    {
                        $("#response-alert-success").show(); // display success alert

                        // delay by 2 seconds and reload current web page
                        setTimeout(location.reload(), 2000);
                    } 
                    else
                    {
                        $('#response-alert-danger').html('<p>Unable to save data!</p>').show();
                    }
                    
                })
                .fail(function(xhr) {
                    $('#response-alert-danger').html('<p>A server error has occurred</p>').show();
                });
            }
        });

        // register a response user asynchronously
        $('#add-response-user').click(function(event) {

            event.preventDefault();

            $("#response-user-alert-warning").hide();
            $("#response-user-alert-success").hide();
            $("#response-user-alert-danger").hide();

            var first_name = $('#first-name').val();
            var last_name = $('#last-name').val();
            var email_address = $('#email-address').val();
            var user_name = $('#user-name').val();
            var register_id = $('#register_id').val();

            if(first_name == '' || last_name == '' || email_address == '' || user_name == '' || register_id == '')
            {
                $("#response-user-alert-warning").show();
            } 
            else 
            {
                $.ajax({
                    url:  "<?php echo base_url(); ?>" + "user/new_user",
                    type: "POST",
                    data: {first_name: first_name, last_name: last_name, email_address: email_address, user_name: user_name, register_id: register_id},
                    dataType: "JSON"
                })
                .done(function(response) {

                    if(response.status)
                    {
                        $("#response-user-alert-success").show(); // display success alert

                        // delay by 2 seconds and reload current web page
                        setTimeout(location.reload(), 4000);
                    } 
                    else
                    {
                        $('#response-user-alert-danger').html('<p>Unable to save data!</p>').show();
                    }
                    
                })
                .fail(function(xhr) {
                    $('#response-user-alert-danger').html('<p>A server error has occurred</p>').show();
                });
            }
        });
    });
</script>