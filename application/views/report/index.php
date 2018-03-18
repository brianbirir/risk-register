<div class="bs-callout bs-callout-info">
    <h4>Generate a risk report</h4>
    <p>The risk report will be generated based on the given filters and downloaded as a CSV file that is readable using Microsoft Excel.</p>
</div>

<!-- report generation form -->


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
            <div class="col-md-3">
                <div class="form-group">
                    <label for="risk_register">Risk Register</label>
                    <?php 
                        $select_register_attributes = 'id="select-register" class="form-control"';
                        if($selected_register != "None")
                        {
                            $select_register['None'] = "Select Option";
                            echo form_dropdown('risk_register', $select_register, $selected_register, $select_register_attributes);
                        }
                        else 
                        {
                            $select_register['None'] = "Select Option";
                            echo form_dropdown('risk_register',$select_register,"None",$select_register_attributes);
                        }
                    ?>
                </div>
            </div>    
            <div class="col-md-3">
                <div class="form-group">
                    <label for="risk_category">Risk Category</label>
                    <?php 
                        $select_main_category_attributes = 'id="select-category" class="form-control"';
                        if($selected_category != "None")
                        {
                            $select_category['None'] = "Select Option";
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
            <button id="filter-report-btn" name="btn_filter" class="btn btn-sm btn-filter">Filter</button>
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <div style="margin-top:20px;" class="box">
                    <div class="box-header">
                        <h3 class="box-title">Risks</h3>
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

        console.log(riskCategory);

        // generate table from AJAX request
        var reportTable = $('#risk-report-table').DataTable({
            "pageLength" : 5,
            "dom" : 'lrtip',
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url(); ?>" + "report/ajax_report",
                "type": "POST",
                "data": function(d){
                    d.category = riskCategory;
                    d.register = riskRegister;
                }  
            }
        });
        
        $( "#filter-report-btn" ).click(function() {
            
            $('#risk-report-table').DataTable().destroy();

            // generate table from AJAX request
            var reportTable = $('#risk-report-table').DataTable({
                "pageLength" : 5,
                "dom" : 'lrtip',
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo base_url(); ?>" + "report/ajax_report",
                    "type": "POST",
                    "data": function(d){
                        d.category = $('#select-category option:checked').val();
                        d.register = $('#select-register option:checked').val();
                    }  
                }
            });
        });

    });

    </script>