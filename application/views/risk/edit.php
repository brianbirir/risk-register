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
    $risk_register = $CI->project_model->getManagerRegisterName( $risk->Subproject_subproject_id );
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
                </div>

                <div class="box-body">
                    <input type="hidden" name="risk_uuid" id="risk_uuid" class="form-control" value="<?php echo $risk->risk_uuid; ?>"/>
                    <input type="hidden" name="register_id" id="register_id" class="form-control" value="<?php echo $risk->Subproject_subproject_id;?>"/>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="risk_title">Risk Title</label>
                                <input class="form-control" name="risk_title" placeholder="Risk Title" type="text" value="<?php echo $risk->risk_title; ?>" required/>
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sub_project">Risk Register</label>
                                <div class="well well-sm"><?php echo $risk_register->name; ?></div>
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
                                <label for="risk_owner">Risk Owner</label>
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

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <?php 
                                    $select_status_attributes = 'class="form-control"';
                                    $status_id = $risk->Status_status_id;
                                    echo form_dropdown('status',$select_status,$status_id,$select_status_attributes);
                                ?>
                            </div>    
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="latest_update">Latest Update</label>
                                <div class="well well-sm"><?php echo $risk->effective_date; ?></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="entity">Entity</label>
                                <?php
                                    $select_entity_attributes = 'class="form-control"';
                                    $entity_name = $risk->Entity_entity_id;
                                    echo form_dropdown('entity',$select_risk_entity,$entity_name,$select_entity_attributes);
                                ?>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="main_category">Risk Category</label>
                                <?php 
                                    $select_main_category_attributes = 'class="form-control" required';
                                    $category_id = $risk->RiskCategories_category_id;
                                    echo form_dropdown('main_category',$select_category,$category_id,$select_main_category_attributes);
                                ?>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description_change">Description and Change</label>
                                <textarea class="form-control" name="description_change" placeholder="Description and Change" rows="5" required><?php echo $risk->description_change; ?></textarea>
                                <?php echo form_error('description_change','<div class="alert alert-danger">','</div>'); ?>
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
                                <label for="risk_owner">Risk Owner</label>
                                <?php 
                                    $select_risk_owner_attributes = 'class="form-control" required';
                                    $risk_owner_id = $risk->RiskOwner_riskowner_id;
                                    echo form_dropdown('risk_owner',$select_risk_owner,$risk_owner_id,$select_risk_owner_attributes);  
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">             
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="identified_hazard_risk">Identified Hazard Risk</label>
                                <input class="form-control" name="identified_hazard_risk" placeholder="Identified Hazard Risk" value="<?php echo $risk->identified_hazard_risk; ?>" required/>
                                <?php echo form_error('identified_hazard_risk','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cause_trigger">Cause Trigger</label>
                                <input class="form-control" name="cause_trigger" placeholder="Cause Trigger" value="<?php echo $risk->cause_trigger; ?>" required/>
                                <?php echo form_error('cause_trigger','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="effect">Effect</label>
                                <input class="form-control" name="effect" placeholder="Effect" value="<?php echo $risk->effect; ?>" required/>
                                <?php echo form_error('effect','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="box box-info box-qualitative">

                <div class="box-header with-border">
                    <h3 class="box-title">Pre-Mitigation Risks</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">
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
                                $select_likelihood_impact = 'id="likelihoodimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('likelihood',$select_option,$likelihood_impact_id,$select_likelihood_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="timeimpact">Time Impact</label>
                            <?php
                                $time_impact_id = $risk->ScheduleMetric_schedule_id; 
                                $select_time_impact = 'id="timeimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('timeimpact',$select_risk_schedule,$time_impact_id,$select_time_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="costimpact">Cost Impact</label>
                            <?php 
                                $cost_impact_id = $risk->CostMetric_cost_id;  
                                $select_cost_impact = 'id="costimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('costimpact',$select_risk_cost,$cost_impact_id,$select_cost_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="reputationimpact">Reputation Impact</label>
                            <?php 
                                $reputation_impact_id = $risk->reputation_impact; 
                                $select_reputation_impact = 'id="reputationimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('reputationimpact',$select_option,$reputation_impact_id,$select_reputation_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="hsimpact">H & S Impact</label>
                            <?php 
                                $hs_impact_id = $risk->hs_impact;
                                $select_hs_impact = 'id="hsimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('hsimpact',$select_option,$hs_impact_id,$select_hs_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="environmentimpact">Environment Impact</label>
                            <?php 
                                $env_impact_id = $risk->env_impact;
                                $select_env_impact = 'id="envimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('environmentimpact',$select_option,$env_impact_id,$select_env_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="legalimpact">Legal Impact</label>
                            <?php 
                                $legal_impact_id = $risk->legal_impact; 
                                $select_legal_impact = 'id="legalimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('legalimpact',$select_option,$legal_impact_id,$select_legal_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
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
                    </div>
                </div>
            
            </div>

            <div class="box box-info box-qualitative">

                <div class="box-header">
                    <h3 class="box-title">Current Mitigated Risk</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">
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
                        <div class="col-md-2">
                            <label for="timeimpact_current">Time Impact</label>
                            <?php 
                                $select_current_time_impact = 'id="timeimpact_current" class="form-control input-sm select-input"';

                                $time_impact_current_id = $risk->time_impact_current;
                                // echo form_dropdown('timeimpact',$select_option,"1",$select_time_impact);
                                echo form_dropdown('timeimpact_current', $select_risk_schedule, $time_impact_current_id, $select_current_time_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="costimpact_current">Cost Impact</label>
                            <?php 
                                $select_current_cost_impact = 'id="costimpact_current" class="form-control input-sm select-input"';

                                $cost_impact_current_id = $risk->cost_impact_current; 
                                // echo form_dropdown('costimpact',$select_option,"1",$select_cost_impact);
                                echo form_dropdown('costimpact_current', $select_risk_cost, $cost_impact_current_id, $select_current_cost_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="reputationimpact_current">Reputation Impact</label>
                            <?php

                                $reputation_impact_current_id = $risk->reputation_impact_current; 
                                $select_current_reputation_impact = 'id="reputationimpact_current" class="form-control input-sm select-input"';
                                echo form_dropdown('reputationimpact_current',$select_option,$reputation_impact_current_id,$select_current_reputation_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="hsimpact_current">H & S Impact</label>
                            <?php 
                                $hs_impact_current_id = $risk->hs_impact_current;
                                $select_current_hs_impact = 'id="hsimpact_current" class="form-control input-sm select-input"';
                                echo form_dropdown('hsimpact_current',$select_option,$hs_impact_current_id,$select_current_hs_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="environmentimpact_current">Environment Impact</label>
                            <?php 
                                $env_impact_current_id = $risk->env_impact_current;
                                $select_current_env_impact = 'id="envimpact_current" class="form-control input-sm select-input"';
                                echo form_dropdown('environmentimpact_current',$select_option,$env_impact_current_id,$select_current_env_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="legalimpact_current">Legal Impact</label>
                            <?php
                                $legal_impact_current_id = $risk->legal_impact_current;
                                $select_current_legal_impact = 'id="legalimpact_current" class="form-control input-sm select-input"';
                                echo form_dropdown('legalimpact_current',$select_option,$legal_impact_current_id,$select_current_legal_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
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
                    </div>
                </div>
            
            </div>

            <div class="box box-info box-qualitative">

                <div class="box-header">
                    <h3 class="box-title">Targeted Risk</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">
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
                        <div class="col-md-2">
                            <label for="timeimpact_target">Time Impact</label>
                            <?php 
                                $select_target_time_impact = 'id="timeimpact_target" class="form-control input-sm select-input"';

                                $time_impact_target_id = $risk->time_impact_target;
                                // echo form_dropdown('timeimpact',$select_option,"1",$select_time_impact);
                                echo form_dropdown('timeimpact_target', $select_risk_schedule, $time_impact_target_id, $select_target_time_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="costimpact_target">Cost Impact</label>
                            <?php 
                                $select_target_cost_impact = 'id="costimpact_target" class="form-control input-sm select-input"';

                                $cost_impact_target_id = $risk->cost_impact_target; 
                                // echo form_dropdown('costimpact',$select_option,"1",$select_cost_impact);
                                echo form_dropdown('costimpact_target', $select_risk_cost, $cost_impact_target_id, $select_target_cost_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="reputationimpact_target">Reputation Impact</label>
                            <?php

                                $reputation_impact_target_id = $risk->reputation_impact_target; 
                                $select_target_reputation_impact = 'id="reputationimpact_target" class="form-control input-sm select-input"';
                                echo form_dropdown('reputationimpact_target',$select_option,$reputation_impact_target_id,$select_target_reputation_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="hsimpact_target">H & S Impact</label>
                            <?php 
                                $hs_impact_target_id = $risk->hs_impact_target;
                                $select_target_hs_impact = 'id="hsimpact_target" class="form-control input-sm select-input"';
                                echo form_dropdown('hsimpact_target',$select_option,$hs_impact_target_id,$select_target_hs_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="environmentimpact_target">Environment Impact</label>
                            <?php 
                                $env_impact_target_id = $risk->env_impact_target;
                                $select_target_env_impact = 'id="envimpact_target" class="form-control input-sm select-input"';
                                echo form_dropdown('environmentimpact_target',$select_option,$env_impact_target_id,$select_target_env_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="legalimpact_target">Legal Impact</label>
                            <?php
                                $legal_impact_target_id = $risk->legal_impact_target;
                                $select_target_legal_impact = 'id="legalimpact_target" class="form-control input-sm select-input"';
                                echo form_dropdown('legalimpact_target',$select_option,$legal_impact_target_id,$select_target_legal_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
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
                    </div>
                </div>
            
            </div>


            <!-- risk responses -->
            <div class="box box-warning box-responses">

                <div class="box-header with-border">
                    <h3 class="box-title">Risk Responses</h3>
                </div>

                <div class="box-body table-responsive no-padding">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="system_safety">System Safety</label>
                            <?php 
                                $select_system_attributes = 'class="form-control"';
                                $safety_id = $risk->SystemSafety_safety_id;
                                echo form_dropdown('system_safety',$select_safety,$safety_id,$select_system_attributes);
                            ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="realization">Realization</label>
                            <?php 
                                $select_realization_attributes = 'class="form-control"';
                                $realization_id = $risk->Realization_realization_id;
                                echo form_dropdown('realization',$select_realization,$realization_id,$select_realization_attributes);
                            ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Risk Response</h3>
                                <div id="add-response-btn" class="btn btn-sm btn-primary pull-right" onclick="new_row()">Add Response</div>
                            </div>

                            <!-- add more responses -->
                            <div class="box-body">
                                <table class="table table-hover">
                                    <tbody id="response-table-body">
                                        <tr>
                                            <!-- <th>Risk Response ID</th> -->
                                            <th>Risk Response Title</th>
                                            <th>Response Type</th>
                                            <th></th>
                                        </tr>
                                        <tr id="response-row">
                                            <td>
                                                <div class="form-group">
                                                    <input class="form-control" name="risk_response[title][]" placeholder="Risk Response Title" type="text" value="<?php echo set_value('risk_reponse[title][]'); ?>"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select name="risk_response[strategy][]" class="form-control">
                                                        <?php 
                                                            foreach ($select_strategy as $key => $value) 
                                                            {
                                                                echo "<option value=".$key.">".$value."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- existing responses -->
                            <div class="box-body">
                                <h4 class="box-title">Existing Responses</h4>
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
            </div>

            <div class="box box-yellow box-controlling">

                <div class="box-header with-border">
                    <h3 class="box-title">Controlling</h3>
                </div>

                <div class="box-body">
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Action Owner</legend>
                            <div class="form-group">
                                <label for="action_owner_fname">First Name</label>
                                <input class="form-control" name="action_owner_fname" placeholder="First Name" type="text" value="<?php echo $risk->action_owner_fname; ?>" required/>
                                <?php echo form_error('action_owner_fname','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="action_owner_lname">Last Name</label>
                                <input class="form-control" name="action_owner_lname" placeholder="Last Name" type="text" value="<?php echo $risk->action_owner_lname; ?>" required/>
                                <?php echo form_error('action_owner_lname','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="action_owner_email">Email</label>
                                <input class="form-control" name="action_owner_email" placeholder="Email" type="text" value="<?php echo $risk->action_owner_email; ?>" required/>
                                <?php echo form_error('action_owner_email','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </fieldset>
                    </div>

                    <div class="col-md-6">
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
    </div>
</div>