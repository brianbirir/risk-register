<?php
    // load uuid generator library
    $CI =& get_instance();
    $CI->load->library('uuid');

    $risk_uuid = $CI->uuid->generate_uuid();
?>

<?php if ($this->session->flashdata('msg')){ ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div><?php echo $this->session->flashdata('msg'); ?></div>
    </div>
<?php } ?>

<!-- risk registration form -->
<div class="row">
    <div id="reg-risk-form">
        <div class="col-md-12">

            <?php
                $attributes = array("class" => "ui form", "id" => "risk-reg-form", "name" => "reg-risk-form");
                echo form_open("risk/register", $attributes);
            ?>

            <div class="box box-success box-identification">

                <div class="box-header">
                    <h3 class="box-title">Identification</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <input type="hidden" name="risk_uuid" id="risk_uuid" class="form-control" value="<?php echo $risk_uuid; ?>"/>
                    <input type="hidden" name="register_id" id="register_id" class="form-control" value="<?php echo $register_id; ?>"/>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="identified_hazard_risk">Identified Hazard Risk</label>
                                <input id="harzard-risk" class="form-control" name="identified_hazard_risk" placeholder="Identified Hazard Risk" value="<?php echo set_value('identified_hazard_risk'); ?>" required/>
                                <?php echo form_error('identified_hazard_risk','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cause_trigger">Cause Trigger</label>
                                <input id="cause-trigger" class="form-control" name="cause_trigger" placeholder="Cause Trigger" value="<?php echo set_value('cause_trigger'); ?>" required/>
                                <?php echo form_error('cause_trigger','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="effect">Effect</label>
                                <input id="effect" class="form-control" name="effect" placeholder="Effect" value="<?php echo set_value('effect'); ?>" required/>
                                <?php echo form_error('effect','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <a id="add-description" class="btn btn-default btn-sm">Add Description</a>
                            <a id="clear-description" class="btn btn-default btn-sm">Clear Description</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description_change">Risk Item Description</label>
                                <textarea id="description-text" class="form-control" name="description_change" rows="5" required readonly><?php echo set_value('description_change');?></textarea>
                                <?php echo form_error('description_change','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="risk_title">Notes</label>
                                <input class="form-control" name="risk_title" type="text" value="<?php echo set_value('risk_title'); ?>" required/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project_location">Assign Project Location</label>
                                <input class="form-control" name="project_location" placeholder="Assign Project Location" type="text" value="<?php echo set_value('project_location'); ?>" required/>
                                <?php echo form_error('project_location','<div class="alert alert-danger">','</div>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <?php
                                    $select_status_attributes = 'class="form-control"';
                                    echo form_dropdown('status',$select_status,"1",$select_status_attributes);
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="latest_update">Latest Update</label>
                                <input class="form-control" name="latest_update" placeholder="Latest Update" type="text" value=""/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="main_category">Risk Category</label>
                                <?php
                                    $select_main_category_attributes = 'class="form-control" required';
                                    $select_category['select_option'] = 'Select Option';
                                    echo form_dropdown('main_category',$select_category,"select_option",$select_main_category_attributes);
                                ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_category">Risk Subcategory</label>
                                <?php
                                    $select_subcategory_attributes = 'id="subcategory-select" class="form-control" required';
                                    $subcategory_options = array('none' => 'None');
                                    echo form_dropdown('sub_category',$subcategory_options,'none',$select_subcategory_attributes);
                                ?>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="materialization_phase">Materialization Phase</label>
                                <?php
                                    $select_materialization_attributes = 'class="form-control" required';
                                    echo form_dropdown('materialization_phase',$select_materialization_phase,"1",$select_materialization_attributes);
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="risk_owner">Risk Item Owner</label>
                                <?php
                                    $select_risk_owner_attributes = 'class="form-control" required';
                                    echo form_dropdown('risk_owner',$select_risk_owner,"1",$select_risk_owner_attributes);
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
                                <div id="risk_current_date" class="well well-sm" onload="appendCurrentDate()"></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="owner">Risk Item Author</label>
                                <div class="well well-sm"><?php echo $first_name." ".$last_name ; ?></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="risk_id">Risk ID</label>
                                <div class="well well-sm" style="overflow:scroll;"><?php echo $risk_uuid; ?></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="box box-info box-pre-mitigated">
                        <div class="box-header">
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
                                            '0' => '0',
                                            '1' => '1',
                                            '2' => '2',
                                            '3' => '3',
                                            '4' => '4',
                                            '5' => '5'
                                        );
                                        $select_likelihood_impact = 'id="likelihood" class="form-control input-sm select-input"';
                                        echo form_dropdown('likelihood',$select_option,"1",$select_likelihood_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="timeimpact">Time Impact</label>
                                    <?php
                                        $select_time_impact = 'id="timeimpact" class="form-control input-sm select-input"';
                                        // echo form_dropdown('timeimpact',$select_option,"1",$select_time_impact);
                                        echo form_dropdown('timeimpact', $select_risk_schedule, "1", $select_time_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="costimpact">Cost Impact</label>
                                    <?php
                                        $select_cost_impact = 'id="costimpact" class="form-control input-sm select-input"';
                                        // echo form_dropdown('costimpact',$select_option,"1",$select_cost_impact);
                                        echo form_dropdown('costimpact', $select_risk_cost, "1", $select_cost_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="reputationimpact">Reputation Impact</label>
                                    <?php
                                        $select_reputation_impact = 'id="reputationimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('reputationimpact',$select_option,"1",$select_reputation_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="hsimpact">H & S Impact</label>
                                    <?php
                                        $select_hs_impact = 'id="hsimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('hsimpact',$select_option,"1",$select_hs_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="environmentimpact">Environment Impact</label>
                                    <?php
                                        $select_env_impact = 'id="envimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('environmentimpact',$select_option,"1",$select_env_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="legalimpact">Legal Impact</label>
                                    <?php
                                        $select_legal_impact = 'id="legalimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('legalimpact',$select_option,"1",$select_legal_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="qualityimpact">Quality Impact</label>
                                    <?php
                                        $select_quality_impact = 'id="qualityimpact" class="form-control input-sm select-input"';
                                        echo form_dropdown('qualityimpact',$select_option,"1",$select_quality_impact);
                                    ?>
                                </div>
                            </div>

                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly="readonly" id="risk_rating" class="form-control toggle-content" name="risk_rating" placeholder="Risk Rating" type="text" value="<?php echo set_value('risk_rating'); ?>" required/>
                                        <?php echo form_error('risk_rating','<div class="alert alert-danger">','</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly="readonly" id="risk_level" class="form-control toggle-content" name="risk_level" placeholder="Risk Level" type="text" value="<?php echo set_value('risk_level'); ?>" required/>
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
                                        echo form_dropdown('likelihood_current',$select_option,"1",$select_current_likelihood_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="timeimpact_current">Time Impact</label>
                                    <?php
                                        $select_current_time_impact = 'id="timeimpact_current" class="form-control input-sm select-input"';
                                        // echo form_dropdown('timeimpact',$select_option,"1",$select_time_impact);
                                        echo form_dropdown('timeimpact_current', $select_risk_schedule, "1", $select_current_time_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="costimpact_current">Cost Impact</label>
                                    <?php
                                        $select_current_cost_impact = 'id="costimpact_current" class="form-control input-sm select-input"';
                                        // echo form_dropdown('costimpact',$select_option,"1",$select_cost_impact);
                                        echo form_dropdown('costimpact_current', $select_risk_cost, "1", $select_current_cost_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="reputationimpact_current">Reputation Impact</label>
                                    <?php
                                        $select_current_reputation_impact = 'id="reputationimpact_current" class="form-control input-sm select-input"';
                                        echo form_dropdown('reputationimpact_current',$select_option,"1",$select_current_reputation_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="hsimpact_current">H & S Impact</label>
                                    <?php
                                        $select_current_hs_impact = 'id="hsimpact_current" class="form-control input-sm select-input"';
                                        echo form_dropdown('hsimpact_current',$select_option,"1",$select_current_hs_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="environmentimpact_current">Environment Impact</label>
                                    <?php
                                        $select_current_env_impact = 'id="envimpact_current" class="form-control input-sm select-input"';
                                        echo form_dropdown('environmentimpact_current',$select_option,"1",$select_current_env_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="legalimpact_current">Legal Impact</label>
                                    <?php
                                        $select_current_legal_impact = 'id="legalimpact_current" class="form-control input-sm select-input"';
                                        echo form_dropdown('legalimpact_current',$select_option,"1",$select_current_legal_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="qualityimpact_current">Quality Impact</label>
                                    <?php
                                        $select_current_quality_impact = 'id="qualityimpact_current" class="form-control input-sm select-input"';
                                        echo form_dropdown('qualityimpact_current',$select_option,"1",$select_current_quality_impact);
                                    ?>
                                </div>
                            </div>

                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly="readonly" id="currentrisk_rating" class="form-control toggle-content" name="currentrisk_rating" placeholder="Risk Rating" type="text" value="<?php echo set_value('currentrisk_rating'); ?>" required/>
                                        <?php echo form_error('currentrisk_rating','<div class="alert alert-danger">','</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly="readonly" id="currentrisk_level" class="form-control toggle-content" name="currentrisk_level" placeholder="Risk Level" type="text" value="<?php echo set_value('currentrisk_level'); ?>" required/>
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
                                        $select_current_likelihood_target = 'id="likelihood_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('likelihood_target',$select_option,"1",$select_current_likelihood_target);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="timeimpact_target">Time Impact</label>
                                    <?php
                                        $select_target_time_impact = 'id="timeimpact_target" class="form-control input-sm select-input"';
                                        // echo form_dropdown('timeimpact',$select_option,"1",$select_time_impact);
                                        echo form_dropdown('timeimpact_target', $select_risk_schedule, "1", $select_target_time_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="costimpact_target">Cost Impact</label>
                                    <?php
                                        $select_target_cost_impact = 'id="costimpact_target" class="form-control input-sm select-input"';
                                        // echo form_dropdown('costimpact',$select_option,"1",$select_cost_impact);
                                        echo form_dropdown('costimpact_target', $select_risk_cost, "1", $select_target_cost_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="reputationimpact_target">Reputation Impact</label>
                                    <?php
                                        $select_target_reputation_impact = 'id="reputationimpact_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('reputationimpact_target',$select_option,"1",$select_target_reputation_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="hsimpact_target">H & S Impact</label>
                                    <?php
                                        $select_target_hs_impact = 'id="hsimpact_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('hsimpact_target',$select_option,"1",$select_target_hs_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="environmentimpact_target">Environment Impact</label>
                                    <?php
                                        $select_target_env_impact = 'id="envimpact_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('environmentimpact_target',$select_option,"1",$select_target_env_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="legalimpact_target">Legal Impact</label>
                                    <?php
                                        $select_target_legal_impact = 'id="legalimpact_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('legalimpact_target',$select_option,"1",$select_target_legal_impact);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="qualityimpact_target">Quality Impact</label>
                                    <?php
                                        $select_target_quality_impact = 'id="qualityimpact_target" class="form-control input-sm select-input"';
                                        echo form_dropdown('qualityimpact_target',$select_option,"1",$select_target_quality_impact);
                                    ?>
                                </div>
                            </div>

                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly="readonly" id="targetrisk_rating" class="form-control toggle-content" name="targetrisk_rating" placeholder="Risk Rating" type="text" value="<?php echo set_value('targetrisk_rating'); ?>" required/>
                                        <?php echo form_error('targetrisk_rating','<div class="alert alert-danger">','</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input readonly="readonly" id="targetrisk_level" class="form-control toggle-content" name="targetrisk_level" placeholder="Risk Level" type="text" value="<?php echo set_value('targetrisk_level'); ?>" required/>
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

            <div class="box box-warning box-responses">

                <div class="box-header">
                    <h3 class="box-title">Risk Responses</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Risk Response</h3>
                                    <div id="add-response-btn" class="btn btn-sm btn-primary btn-add pull-right">Add Response</div>
                                </div>
                                <div class="box-body">
                                    <div id="response-table-body">

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
                                            <div class="col-md-3">
                                                <strong>Response Date</strong>
                                            </div>
                                        </div>

                                        <div id="response-row" class="row response-item">

                                            <?php
                                                /** check if response titles exist for this given risk register
                                                 * if not display input text field
                                                 * if they do exist display select drop down of those response titles
                                                 */
                                                if(!$select_response_name)
                                                {
                                            ?>
                                            <div class="col-md-2">
                                                <div class="form-group form-response-title">
                                                    <input class="form-control" name="risk_response[title][]" placeholder="Risk Response Title" type="text" value="<?php echo set_value('risk_reponse[title][]'); ?>" required/>
                                                </div>
                                            </div>
                                            <?php } else { ?>
                                            <div class="col-md-2">
                                                <div class="form-group form-response-title">
                                                    <select name="risk_response[title][]" class="form-control response response-title">
                                                        <?php
                                                            foreach ($select_response_name as $key => $value)
                                                            {
                                                                echo "<option value=".$key.">".$value."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <!-- button for adding response title to drop down -->
                                                <button type="button" class="btn btn-default btn-xs btn-reg" data-toggle="modal" data-target="#response-title-modal">Add Title</button>
                                            </div>
                                            <?php } ?>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="risk_response[strategy][]" class="form-control response response-strategy">
                                                        <?php
                                                            foreach ($select_strategy as $key => $value)
                                                            {
                                                                echo "<option value=".$key.">".$value."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select multiple="multiple" name="risk_response[user][]" class="form-control response response-user">
                                                        <?php
                                                            foreach ($select_user as $key => $value)
                                                            {
                                                                echo "<option value=".$key.">".$value."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="risk_response[date][]" placeholder="Risk Response Date" type="text" value="<?php echo set_value('risk_reponse[date][]'); ?>" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box box-yellow box-controlling">

                <div class="box-header">
                    <h3 class="box-title">Risk Overseer</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="action_owner">Action Owner</label>
                                <div class="form-group">
                                    <select name="action_owner" class="form-control select2 action-owner">
                                        <?php
                                            foreach ($select_user as $key => $value)
                                            {
                                                echo "<option value=".$key.">".$value."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="action_item">Action Item for Risk Mitigation</label>
                            <textarea class="form-control" name="action_item" placeholder="Action Item" rows="5" required><?php echo set_value('action_item');?></textarea>
                            <?php echo form_error('action_item','<div class="alert alert-danger">','</div>'); ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="milestone_target_date">Milestone Target Date</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="milestone_target_date" type="text" value="<?php echo set_value('milestone_target_date'); ?>" required/>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <input name="btn_reg_risk" type="submit" class="btn btn-success btn-reg pull-right" value="Add Risk" />

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

        <!-- JS code to register the response title asynchronously -->
        <script type="text/javascript">
            $(document).ready(function(){

                // register the response title asynchronously
                $('#add-response-title').click(function(event){

                    event.preventDefault();

                    var response_title = $('#response-modal-title').val();
                    var response_project_id = $('#response-modal-project-id').val();

                    if(response_title == '')
                    {
                        $("#response-modal-alert-warning").show();
                    } else {
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

                // get risk subcategory dropdown based on selected risk category
                $('select[name="main_category"]').change(function(){

                    // get value from selected option
                    var category_value = $(this).val();

                    // use ajax call to get subcategories
                    $.ajax({
                        url:  "<?php echo base_url(); ?>" + "subcategory/get_subcategory_list",
                        type: "POST",
                        data: {category_id: category_value},
                        dataType: "JSON"
                    })
                    .done(function(response) {
                        // remove options from subcategory drop down
                        $('#subcategory-select option').remove();

                        // add new options from response
                        $.each( response, function( key, value ) {
                            $('#subcategory-select').append('<option value="' + key + '">' + value + '</option>');
                        });
                    })
                    .fail(function(xhr) {
                        alert("Unable to retrieve subcategory data");
                    });
                })
            });
        </script>

    </div>
</div>
