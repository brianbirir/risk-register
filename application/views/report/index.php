<?php

    //  load risk model and trim library
    $CI =& get_instance();
    $CI->load->model('risk_model');
    $CI->load->library('trim');
    $CI->load->library('responses');

    // check if risk data exists
    if (!$risk_data) 
    {
        $msg = 'There are no risks fitting this criteria';
        echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
    } 
    else 
    { ?>
        
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <!-- date range -->
                    <label for="date_from">From:</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input data-date-orientation="bottom" data-date-format="yyyy-mm-dd" name="date_from" type="text" class="form-control datepicker" id="datepicker-from">
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <!-- date range -->
                    <label for="date_to">To:</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input data-date-orientation="bottom" data-date-format="yyyy-mm-dd" name="date_to" type="text" class="form-control datepicker" id="datepicker-to">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="risk_register">Risk Register</label>
                    <?php 
                        $select_register_attributes = 'id="select-register" class="form-control"';
                        if($selected_register != 'none')
                        {
                            $select_register['none'] = "Select Option";
                            echo form_dropdown('risk_register', $select_register, $selected_register, $select_register_attributes);
                        }
                        else 
                        {
                            $select_register['none'] = "Select Option";
                            echo form_dropdown('risk_register',$select_register,"none",$select_register_attributes);
                        }
                    ?>
                </div>
            </div>    
            <div class="col-md-3">
                <div class="form-group">
                    <label for="risk_category">Risk Category</label>
                    <?php 
                        $select_main_category_attributes = 'id="select-category" class="form-control"';
                        if($selected_category != 'none')
                        {
                            $select_category['none'] = "Select Option";
                            echo form_dropdown('risk_category', $select_category, $selected_category, $select_main_category_attributes);
                        }
                        else 
                        {
                            $select_category['none'] = "Select Option";
                            echo form_dropdown('risk_category',$select_category,"none",$select_main_category_attributes);
                        }
                    ?>
                </div>
            </div>
            <button id="filter-report-btn" name="btn_filter" class="btn btn-sm btn-filter" style="margin-top:27px;">Filter</button>
        </div>

        <a href="<?php echo base_url(); ?>dashboard/report/generate" class="btn btn-sm btn-report">Generate Report</a>
        
        <div class="row">
            <div class="col-xs-12">
                <div style="margin-top:20px;" class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $project_name ?> Risks</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="risk-report-table" class="table table-hover">
                            <thead>
                                <tr>
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
                                    <th>Action Owner</th>
                                    <th>Action Item</th>
                                    <th>Milestone Target Date</th>
                                    <th>Status</th>
                                    <th>Entity</th>
                                </tr>
                            </thead>
                            <tbody id="report-data">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <script>

    $(document).ready(function() {
        
        var riskCategory = $('#select-category option:checked').val();
        var riskRegister = $('#select-register option:checked').val();

        // generate table from AJAX request
        var reportTable = $('#risk-report-table').DataTable({
            "pageLength" : 10,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url(); ?>" + "report/ajax_report",
                "type": "POST",
                "data": function(d){
                    d.category = riskCategory;
                    d.register = riskRegister;
                }
            },
            "order": [[1, 'asc']],
            "columns": [
                    { "name": "risk_title"},
                    { "name": "RiskCategories_category_id" },
                    { "name": "cause_trigger",orderable: false },
                    { "name": "identified_hazard_risk",orderable: false },
                    { "name": "effect",orderable: false },
                    { "name": "project_location",orderable: false },
                    { "name": "description_change",orderable: false },
                    { "name": "materialization_phase_materialization_id",orderable: false },
                    { "name": "Subproject_subproject_id",orderable: false },
                    { "name": "likelihood",orderable: false },
                    { "name": "time_impact",orderable: false },
                    { "name": "cost_impact",orderable: false },
                    { "name": "reputation_impact",orderable: false },
                    { "name": "hs_impact",orderable: false },
                    { "name": "env_impact" ,orderable: false },
                    { "name": "legal_impact",orderable: false },
                    { "name": "quality_impact",orderable: false },
                    { "name": "risk_rating" },
                    { "name": "risk_level" },
                    { "name": "SystemSafety_safety_id",orderable: false },
                    { "name": "Realization_realization_id",orderable: false },
                    { "name": "action_owner"},
                    { "name": "action_item",orderable: false },
                    { "name": "milestone_target_date",orderable: false },
                    { "name": "Status_status_id",orderable: false },
                    { "name": "Entity_entity_id",orderable: false }
                ]
        });

        // filter button click
        $( "#filter-report-btn" ).click(function() {
            
            $('#risk-report-table').DataTable().destroy();

            // generate table from AJAX request
            var reportTable = $('#risk-report-table').DataTable({
                "pageLength" : 10,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo base_url(); ?>" + "report/ajax_report",
                    "type": "POST",
                    "data": function(d){
                        d.category = $('#select-category option:checked').val();
                        d.register = $('#select-register option:checked').val();
                        d.date_from = $('#datepicker-from').val();
                        d.date_to = $('#date_to').val();
                    }  
                },
                "order": [[1, 'asc']],
                "columns": [
                    { "name": "risk_title"},
                    { "name": "RiskCategories_category_id" },
                    { "name": "cause_trigger",orderable: false },
                    { "name": "identified_hazard_risk",orderable: false },
                    { "name": "effect",orderable: false },
                    { "name": "project_location",orderable: false },
                    { "name": "description_change",orderable: false },
                    { "name": "materialization_phase_materialization_id",orderable: false },
                    { "name": "Subproject_subproject_id",orderable: false },
                    { "name": "likelihood",orderable: false },
                    { "name": "time_impact",orderable: false },
                    { "name": "cost_impact",orderable: false },
                    { "name": "reputation_impact",orderable: false },
                    { "name": "hs_impact",orderable: false },
                    { "name": "env_impact" ,orderable: false },
                    { "name": "legal_impact",orderable: false },
                    { "name": "quality_impact",orderable: false },
                    { "name": "risk_rating" },
                    { "name": "risk_level" },
                    { "name": "SystemSafety_safety_id",orderable: false },
                    { "name": "Realization_realization_id",orderable: false },
                    { "name": "action_owner"},
                    { "name": "action_item",orderable: false },
                    { "name": "milestone_target_date",orderable: false },
                    { "name": "Status_status_id",orderable: false },
                    { "name": "Entity_entity_id",orderable: false }
                ]
            });
        });

    });

    </script>