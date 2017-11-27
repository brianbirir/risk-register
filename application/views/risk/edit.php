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

<!-- risk editing form -->
<div class="row">
    <div id="edit-risk-form">

        <?php
            $attributes = array("class" => "ui form", "id" => "edit-risk-form", "name" => "edit-risk-form");
            echo form_open("risk/update", $attributes);
        ?>

        <div class="col-md-6 col-sm-12">

            <input type="hidden" name="risk_id" id="risk_id" class="form-control" value="<?php echo $risk->item_id;?>"/>

            <div class="form-group">
                <label for="sub_project">Risk Register</label>
                <?php 
                    // get risk register id
                    $select_subproject_attributes = 'class="form-control" required';
                    $subproject_id = $risk->Subproject_subproject_id;
                    echo form_dropdown('sub_project',$select_subproject,$subproject_id,$select_subproject_attributes);
                ?>
            </div>

            <div class="form-group">
                <label for="main_category">Main Category</label>
                <?php 
                    $select_main_category_attributes = 'class="form-control" required';
                    $category_id = $risk->RiskCategories_category_id;
                    echo form_dropdown('main_category',$select_category,$category_id,$select_main_category_attributes);
                ?>
            </div>

            <fieldset>
                <legend>Definition/Description</legend>

                <div class="form-group">
                    <label for="identified_hazard_risk">Identified Hazard Risk</label>
                    <textarea class="form-control" name="identified_hazard_risk" placeholder="Identified Hazard Risk" rows="5" required/><?php echo $risk->identified_hazard_risk; ?></textarea>
                    <?php echo form_error('identified_hazard_risk','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="cause_trigger">Cause Trigger</label>
                    <textarea class="form-control" name="cause_trigger" placeholder="Cause Trigger" rows="5" required/><?php echo $risk->cause_trigger; ?></textarea>
                    <?php echo form_error('cause_trigger','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="effect">Effect</label>
                    <textarea class="form-control" name="effect" placeholder="Effect" rows="5" required/><?php echo $risk->effect; ?></textarea>
                    <?php echo form_error('effect','<div class="alert alert-danger">','</div>'); ?>
                </div>

            </fieldset>

            <fieldset>
                <legend>Phase & Owner</legend>

                <div class="form-group">
                    <label for="materialization_phase">Materialization Phase</label>
                    <input class="form-control" name="materialization_phase" placeholder="Materialization Phase" type="text" value="<?php echo $risk->materialization_phase; ?>" required/>
                    <?php echo form_error('materialization_phase','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <!-- <div class="form-group">
                    <label for="risk_owner">Risk Owner</label>
                    <input class="form-control" name="risk_owner" placeholder="Risk Owner" type="text" value="<?php echo $risk->risk_owner; ?>" required/>
                    <?php echo form_error('risk_owner','<div class="alert alert-danger">','</div>'); ?>
                </div> -->

                <div class="form-group">
                    <label for="risk_owner">Risk Owner</label>
                    <?php 
                        $select_risk_owner_attributes = 'class="form-control" required';
                        $risk_owner_id = $risk->RiskOwner_riskowner_id;
                        echo form_dropdown('main_category',$select_risk_owner,$risk_owner_id,$select_risk_owner_attributes);
                    ?>
                </div>

            </fieldset>

            <fieldset>
                <legend>Qualitative Assessment before Controls/Mitigation</legend>
                <div class="row">
                    <div class="form-group">  
                        <div class="col-xs-4">
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

                        <div class="col-xs-4">
                            <label for="timeimpact">Time Impact</label>
                            <?php
                                $time_impact_id = $risk->time_impact; 
                                $select_time_impact = 'id="timeimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('timeimpact',$select_option,$time_impact_id,$select_time_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="costimpact">Cost Impact</label>
                            <?php
                                $cost_impact_id = $risk->cost_impact;  
                                $select_cost_impact = 'id="costimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('costimpact',$select_option,$cost_impact_id,$select_cost_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="reputationimpact">Reputation Impact</label>
                            <?php
                                $reputation_impact_id = $risk->reputation_impact; 
                                $select_reputation_impact = 'id="reputationimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('reputationimpact',$select_option,$reputation_impact_id,$select_reputation_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="hsimpact">H & S Impact</label>
                            <?php
                                $hs_impact_id = $risk->hs_impact;  
                                $select_hs_impact = 'id="hsimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('hsimpact',$select_option,$hs_impact_id,$select_hs_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="environmentimpact">Environment Impact</label>
                            <?php
                                $env_impact_id = $risk->env_impact;
                                $select_env_impact = 'id="envimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('environmentimpact',$select_option,$env_impact_id,$select_env_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="legalimpact">Legal Impact</label>
                            <?php
                                $legal_impact_id = $risk->legal_impact; 
                                $select_legal_impact = 'id="legalimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('legalimpact',$select_option,$legal_impact_id,$select_legal_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="qualityimpact">Quality Impact</label>
                            <?php
                                $quality_impact_id = $risk->quality_impact;  
                                $select_quality_impact = 'id="qualityimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('qualityimpact',$select_option,$quality_impact_id,$select_quality_impact);
                            ?>
                        </div>
                        <div class="col-xs-12">
                            <div class="pull-right">
                                <button id="btn-calc-risk" class="btn btn-primary btn-calc-risk btn-sm" type="button">Calculate</button>
                                <!-- <button id="btn-risk-reset" class="btn btn-success btn-sm" type="button">Reset</button> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="risk_rating">Risk Rating</label>
                            <input id="risk_rating" class="form-control" name="risk_rating" placeholder="Risk Rating" type="text" value="<?php echo $risk->risk_rating; ?>" required/>
                            <?php echo form_error('risk_rating','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="risk_level">Risk Level</label>
                            <input id="risk_level" class="form-control" name="risk_level" placeholder="Risk Level" type="text" value="<?php echo $risk->risk_level; ?>" required/>
                            <?php echo form_error('risk_level','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" name="comments" placeholder="Comments" rows="5"/><?php echo $risk->comments; ?></textarea>
                    <?php echo form_error('comments','<div class="alert alert-danger">','</div>'); ?>
                </div>
            </fieldset>
        </div>

        <div class="col-md-6 col-sm-12">
            <fieldset>
                <legend>Risk Control/ Mitigation</legend>

                <div class="form-group">
                    <label for="strategy">Strategy</label>
                    <?php 
                        $select_strategy_attributes = 'class="form-control"';
                        $strategy_id = $risk->RiskStrategies_strategy_id;
                        echo form_dropdown('strategy',$select_strategy,$strategy_id,$select_strategy_attributes);
                    ?>
                </div>

                <div class="form-group">
                    <label for="control_mitigation">Risk Control/Mitigation</label>
                    <textarea class="form-control" name="control_mitigation" placeholder="Risk Control/Mitigation" rows="5" required/><?php echo $risk->control_mitigation; ?></textarea>
                    <?php echo form_error('control_mitigation','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="system_safety">System Safety</label>
                    <?php 
                        $select_system_attributes = 'class="form-control"';
                        $safety_id = $risk->SystemSafety_safety_id;
                        echo form_dropdown('system_safety',$select_safety,$safety_id,$select_system_attributes);
                    ?>
                </div>

                <div class="form-group">
                    <label for="realization">Realization</label>
                    <?php 
                        $select_realization_attributes = 'class="form-control"';
                        $realization_id = $risk->Realization_realization_id;
                        echo form_dropdown('realization',$select_realization,$realization_id,$select_realization_attributes);
                    ?>
                </div>
            </fieldset>

            <fieldset>
                <legend>Residual Risk</legend>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="residual_likelihood">Likelihood</label>
                            <?php
                                $residual_likelihood_id = $risk->residual_risk_likelihood;
                                $select_residual_likelihood = 'id="residual-risk-select" class="form-control input-sm select-input"';
                                echo form_dropdown('residual_likelihood',$select_option,$residual_likelihood_id,$select_residual_likelihood);
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="residual_impact">Impact</label>
                            <?php
                                $residual_impact_id = $risk->residual_risk_impact;
                                $select_residual_impact = 'id="residual-impact-select" class="form-control input-sm select-input"';
                                echo form_dropdown('residual_impact',$select_option,$residual_impact_id,$select_residual_impact);
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                    <div class="pull-right">
                        <button id="btn-calc-res-risk" class="btn btn-primary btn-sm" type="button">Calculate</button>
                        <!-- <button id="btn-residualrisk-reset" class="btn btn-success btn-sm" type="button">Reset</button> -->
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="residual_risk_rating">Residual Risk Rating</label>
                            <input id="residual_risk_rating" class="form-control" name="residual_risk_rating" placeholder="Residual Risk Rating" type="text" value="<?php echo $risk->residual_risk_rating; ?>" required/>
                            <?php echo form_error('residual_risk_rating','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>         
                    <div class="col-xs-6">   
                        <div class="form-group">
                            <label for="residual_risk_level">Residual Risk Level</label>
                            <input id="residual_risk_level" class="form-control" name="residual_risk_level" placeholder="Residual Risk Level" type="text" value="<?php echo $risk->residual_risk_level; ?>" required/>
                            <?php echo form_error('residual_risk_level','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Controlling</legend>

                <div class="form-group">
                    <label for="action_owner">Action Owner</label>
                    <input class="form-control" name="action_owner" placeholder="Action Owner" type="text" value="<?php echo $risk->action_owner; ?>" required/>
                    <?php echo form_error('action_owner','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="milestone_target_date">Milestone Target Date</label>
                    <input class="form-control" name="milestone_target_date" placeholder="Milestone Target Date" type="text" value="<?php echo $risk->milestone_target_date; ?>" required/>
                    <?php echo form_error('milestone_target_date','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <?php 
                        $select_status_attributes = 'class="form-control"';
                        $status_id = $risk->Status_status_id;
                        echo form_dropdown('status',$select_status,$status_id,$select_status_attributes);
                    ?>
                </div>
            </fieldset>

            <input name="btn_edit_risk" type="submit" class="btn btn-default btn-reg" value="Update Risk" />

        </div>

        <?php echo form_close(); ?>

        <?php if ($this->session->flashdata('msg')){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div><?php echo $this->session->flashdata('msg'); ?></div>
            </div>
        <?php } ?>

    </div>
</div>