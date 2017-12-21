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
    
            <div class="box box-success">

                <div class="box-header with-border">
                    <h3 class="box-title">Identification</h3>
                </div>

                <div class="box-body">
                    <input type="hidden" name="risk_uuid" id="risk_uuid" class="form-control" value="<?php echo $risk->risk_uuid; ?>"/>
                    <input type="hidden" name="register_id" id="register_id" class="form-control" value="<?php echo $register_row->subproject_id;?>"/>

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
                                <div class="well well-sm"><?php echo $risk->updated_at; ?></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="entity">Entity</label>
                                <?php
                                    $select_entity_attributes = 'class="form-control"';
                                    $entity_name = $risk->entity;
                                    echo form_dropdown('entity',$entity_name,$entity_name,$select_entity_attributes);
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
                                <textarea class="form-control" name="description_change" placeholder="Description and Change" rows="5" required/><?php echo $risk->description_change; ?></textarea>
                                <?php echo form_error('description_change','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- <legend>Phase & Owner</legend> -->
                    
                    <div class="row">             
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="materialization_phase">Materialization Phase</label>
                                <input class="form-control" name="materialization_phase" placeholder="Materialization Phase" type="text" value="<?php echo $risk->materialization_phase; ?>" required/>
                                <?php echo form_error('materialization_phase','<div class="alert alert-danger">','</div>'); ?>
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

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title">Qualitative Analysis</h3>
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
                                $time_impact_id = $risk->time_impact; 
                                $select_time_impact = 'id="timeimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('timeimpact',$select_option,$time_impact_id,$select_time_impact);
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label for="costimpact">Cost Impact</label>
                            <?php 
                                $cost_impact_id = $risk->cost_impact;  
                                $select_cost_impact = 'id="costimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('costimpact',$select_option,$cost_impact_id,$select_cost_impact);
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <button id="btn-calc-risk" class="btn btn-primary btn-calc-risk pull-right btn-sm" type="button">Calculate Risk Rating & Level</button>
                            </div>
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

            <!-- risk responses -->
            <div class="box box-warning">

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

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Controlling Residual Risk</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="residual_likelihood">Likelihood</label>
                                <?php
                                    $select_residual_likelihood = 'id="residual-risk-select" class="form-control input-sm select-input"';
                                    echo form_dropdown('residual_likelihood',$select_option,"1",$select_residual_likelihood);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="residual_impact">Impact</label>
                                <?php 
                                    $select_residual_impact = 'id="residual-impact-select" class="form-control input-sm select-input"';
                                    echo form_dropdown('residual_impact',$select_option,"1",$select_residual_impact);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button id="btn-calc-res-risk" class="btn btn-primary pull-right btn-sm" type="button">Calculate Residual Risk Rating & Level</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="residual_risk_rating">Residual Risk Rating</label>
                                <input id="residual_risk_rating" class="form-control" name="residual_risk_rating" placeholder="Residual Risk Rating" type="text" value="<?php echo $risk->residual_risk_rating; ?>" required/>
                                <?php echo form_error('residual_risk_rating','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>         
                        <div class="col-md-6">   
                            <div class="form-group">
                                <label for="residual_risk_level">Residual Risk Level</label>
                                <input id="residual_risk_level" class="form-control" name="residual_risk_level" placeholder="Residual Risk Level" type="text" value="<?php echo $risk->residual_risk_level; ?>" required/>
                                <?php echo form_error('residual_risk_level','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="box box-yellow">

                <div class="box-header with-border">
                    <h3 class="box-title">Controlling</h3>
                </div>

                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="action_owner">Action Owner</label>
                            <input class="form-control" name="action_owner" placeholder="Action Owner" type="text" value="<?php echo $risk->action_owner; ?>" required/>
                            <?php echo form_error('action_owner','<div class="alert alert-danger">','</div>'); ?>
                        </div>
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