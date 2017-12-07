<?php
    // load uuid generator library
    $CI =& get_instance();
    $CI->load->library('uuid');

    // echo $CI->uuid->generate_uuid();
?>

<!-- risk registration form -->
<div class="row">
    <div id="reg-risk-form">

        <?php
            $attributes = array("class" => "ui form", "id" => "risk-reg-form", "name" => "reg-risk-form");
            echo form_open("risk/register", $attributes);
        ?>

        <div class="col-md-6 col-sm-12">

            <div class="form-group">
                <label for="sub_project">Risk Register</label>
                <?php 
                    $select_subproject_attributes = 'class="form-control" required';
                    echo form_dropdown('sub_project',$select_subproject,"1",$select_subproject_attributes);
                ?>
            </div>

            <div class="form-group">
                <label for="main_category">Main Category</label>
                <?php 
                    $select_main_category_attributes = 'class="form-control" required';
                    echo form_dropdown('main_category',$select_category,"1",$select_main_category_attributes);
                ?>
            </div>

            <fieldset>
                <legend>Definition/Description</legend>

                <div class="form-group">
                    <label for="identified_hazard_risk">Identified Hazard Risk</label>
                    <textarea class="form-control" name="identified_hazard_risk" placeholder="Identified Hazard Risk" rows="5" required/><?php echo set_value('identified_hazard_risk'); ?></textarea>
                    <?php echo form_error('identified_hazard_risk','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="cause_trigger">Cause Trigger</label>
                    <textarea class="form-control" name="cause_trigger" placeholder="Cause Trigger" rows="5" required/><?php echo set_value('cause_trigger'); ?></textarea>
                    <?php echo form_error('cause_trigger','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="effect">Effect</label>
                    <textarea class="form-control" name="effect" placeholder="Effect" rows="5" required/><?php echo set_value('effect'); ?></textarea>
                    <?php echo form_error('effect','<div class="alert alert-danger">','</div>'); ?>
                </div>

            </fieldset>

            <fieldset>
                <legend>Phase & Owner</legend>

                <div class="form-group">
                    <label for="materialization_phase">Materialization Phase</label>
                    <input class="form-control" name="materialization_phase" placeholder="Materialization Phase" type="text" value="<?php echo set_value('materialization_phase'); ?>" required/>
                    <?php echo form_error('materialization_phase','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="risk_owner">Risk Owner</label>
                    <?php 
                        $select_risk_owner_attributes = 'class="form-control" required';
                        echo form_dropdown('risk_owner',$select_risk_owner,"1",$select_risk_owner_attributes);
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
                                $select_likelihood_impact = 'id="likelihoodimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('likelihood',$select_option,"1",$select_likelihood_impact);
                            ?>
                        </div>

                        <div class="col-xs-4">
                            <label for="timeimpact">Time Impact</label>
                            <?php 
                                $select_time_impact = 'id="timeimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('timeimpact',$select_option,"1",$select_time_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="costimpact">Cost Impact</label>
                            <?php 
                                $select_cost_impact = 'id="costimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('costimpact',$select_option,"1",$select_cost_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="reputationimpact">Reputation Impact</label>
                            <?php 
                                $select_reputation_impact = 'id="reputationimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('reputationimpact',$select_option,"1",$select_reputation_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="hsimpact">H & S Impact</label>
                            <?php 
                                $select_hs_impact = 'id="hsimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('hsimpact',$select_option,"1",$select_hs_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="environmentimpact">Environment Impact</label>
                            <?php 
                                $select_env_impact = 'id="envimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('environmentimpact',$select_option,"1",$select_env_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="legalimpact">Legal Impact</label>
                            <?php 
                                $select_legal_impact = 'id="legalimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('legalimpact',$select_option,"1",$select_legal_impact);
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="qualityimpact">Quality Impact</label>
                            <?php 
                                $select_quality_impact = 'id="qualityimpact" class="form-control input-sm select-input"';
                                echo form_dropdown('qualityimpact',$select_option,"1",$select_quality_impact);
                            ?>
                        </div>
                        <div class="col-xs-12">
                            <button id="btn-calc-risk" class="btn btn-primary btn-calc-risk pull-right btn-sm" type="button">Calculate Risk Rating & Level</button>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="risk_rating">Risk Rating</label>
                            <input id="risk_rating" class="form-control" name="risk_rating" placeholder="Risk Rating" type="text" value="<?php echo set_value('risk_rating'); ?>" required/>
                            <?php echo form_error('risk_rating','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="risk_level">Risk Level</label>
                            <input id="risk_level" class="form-control" name="risk_level" placeholder="Risk Level" type="text" value="<?php echo set_value('risk_level'); ?>" required/>
                            <?php echo form_error('risk_level','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" name="comments" placeholder="Comments" rows="5"/><?php echo set_value('comments'); ?></textarea>
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
                        echo form_dropdown('strategy',$select_strategy,"1",$select_strategy_attributes);
                    ?>
                </div>

                <div class="form-group">
                    <label for="control_mitigation">Risk Control/Mitigation</label>
                    <textarea class="form-control" name="control_mitigation" placeholder="Risk Control/Mitigation" rows="5" required/><?php echo set_value('control_mitigation'); ?></textarea>
                    <?php echo form_error('control_mitigation','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="system_safety">System Safety</label>
                    <?php 
                        $select_system_attributes = 'class="form-control"';
                        echo form_dropdown('system_safety',$select_safety,"1",$select_system_attributes);
                    ?>
                </div>

                <div class="form-group">
                    <label for="realization">Realization</label>
                    <?php 
                        $select_realization_attributes = 'class="form-control"';
                        echo form_dropdown('realization',$select_realization,"1",$select_realization_attributes);
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
                                $select_residual_likelihood = 'id="residual-risk-select" class="form-control input-sm select-input"';
                                echo form_dropdown('residual_likelihood',$select_option,"1",$select_residual_likelihood);
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="residual_impact">Impact</label>
                            <?php 
                                $select_residual_impact = 'id="residual-impact-select" class="form-control input-sm select-input"';
                                echo form_dropdown('residual_impact',$select_option,"1",$select_residual_impact);
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <button id="btn-calc-res-risk" class="btn btn-primary pull-right btn-sm" type="button">Calculate Residual Risk Rating & Level</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="residual_risk_rating">Residual Risk Rating</label>
                            <input id="residual_risk_rating" class="form-control" name="residual_risk_rating" placeholder="Residual Risk Rating" type="text" value="<?php echo set_value('residual_risk_rating'); ?>" required/>
                            <?php echo form_error('residual_risk_rating','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>         
                    <div class="col-xs-6">   
                        <div class="form-group">
                            <label for="residual_risk_level">Residual Risk Level</label>
                            <input id="residual_risk_level" class="form-control" name="residual_risk_level" placeholder="Residual Risk Level" type="text" value="<?php echo set_value('residual_risk_level'); ?>" required/>
                            <?php echo form_error('residual_risk_level','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Controlling</legend>

                <div class="form-group">
                    <label for="action_owner">Action Owner</label>
                    <input class="form-control" name="action_owner" placeholder="Action Owner" type="text" value="<?php echo set_value('action_owner'); ?>" required/>
                    <?php echo form_error('action_owner','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="milestone_target_date">Milestone Target Date</label>
                    <input class="form-control" name="milestone_target_date" placeholder="Milestone Target Date" type="text" value="<?php echo set_value('milestone_target_date'); ?>" required/>
                    <?php echo form_error('milestone_target_date','<div class="alert alert-danger">','</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <?php 
                        $select_status_attributes = 'class="form-control"';
                        echo form_dropdown('status',$select_status,"1",$select_status_attributes);
                    ?>
                </div>
            </fieldset>

            <input name="btn_reg_risk" type="submit" class="btn btn-default btn-reg" value="Add Risk" />

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