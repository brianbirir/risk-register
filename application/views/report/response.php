<?php

    //  load risk model
    $CI =& get_instance();
    $CI->load->model('risk_model');
    $CI->load->model('user_model');
    $CI->load->model('response_model');

    // check if risk data exists
    if (!$response_data)
    {
        $msg = 'There are no responses for the selected project!';
        echo '<div style="margin-top:20px; margin-bottom:20px;" class="alert alert-warning" role="alert">'.$msg.'</div>';
    }
    else
    {
?>

<div id="response-report-form">
    <fieldset>
        <div class="row">
            <div class="col-md-2">
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
                        echo form_dropdown('risk_register',$select_register,'none',$select_register_attributes);
                    }
                ?>
            </div>

            <div class="col-md-2">

                <label for="general_user">Users</label>
                <?php
                    $select_user_attributes = 'id="select-user" class="form-control"';
                    if($selected_user != 'none')
                    {
                        $select_user['none'] = "Select Option";
                        echo form_dropdown('general_user', $select_user, $selected_user, $select_user_attributes);
                    }
                    else
                    {
                        $select_user['none'] = "Select Option";
                        echo form_dropdown('general_user',$select_user,'none',$select_user_attributes);
                    }
                ?>

            </div>

            <button id="filter-response-btn" name="btn_filter" class="btn btn-sm btn-filter" style="margin-top:27px;">Filter</button>

            <a href="/dashboard/report_response/generate" class="btn btn-sm btn-report" style="margin-top:27px;">Generate Report</a>
        </div>
    </fieldset>

    <?php if ($this->session->flashdata('msg')){ ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
    <?php } ?>
</div>
        <div class="row">
            <div class="col-xs-12">
                <div style="margin-top:20px;" class="box">
                    <div class="box-header">
                        <h3 class="box-title">Responses</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="response-report-table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Response ID</th>
                                    <th>Risk Name</th>
                                    <th>Response Title</th>
                                    <th>Risk Strategy</th>
                                    <th>Response Owner</th>
                                    <th>Register Name</th>
                                    <th>Due Date</th>
                                    <th>Associated Risk</th>
                                </tr>
                            </thead>
                            <tbody id="response-report-data">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?>

<script>

    $(document).ready(function() {

        var responseRegister = $('#select-register option:checked').val();
        var responseUser = $('#select-user option:checked').val();

        // generate table from AJAX request
        var reportTable = $('#response-report-table').DataTable({
            "pageLength" : 10,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url(); ?>" + "response/ajax_report",
                "type": "POST",
                "data": function(d){
                    d.register = responseRegister;
                    d.user = responseUser;
                }
            },
            "order": [[1, 'asc']],
            "columns": [
                { "name": "response_id"},
                { "name": "risk_uuid" },
                { "name": "ResponseTitle_id" },
                { "name": "RiskStrategies_strategy_id" },
                { "name": "user_id", orderable: false},
                { "name": "register_id" },
                { "name": "due_date" },
                { "name": "associated_risk", orderable: false }
            ]
        });

        // filter button click
        $( "#filter-response-btn" ).click(function() {

            // get current values
            var responseRegister = $('#select-register option:checked').val();
            var responseUser = $('#select-user option:checked').val();

            $('#response-report-table').DataTable().destroy();

            // generate table from AJAX request
            var reportTable = $('#response-report-table').DataTable({
                "pageLength" : 10,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo base_url(); ?>" + "response/ajax_report",
                    "type": "POST",
                    "data": function(d){
                        d.register = responseRegister;
                        d.user = responseUser;
                    }
                },
                "order": [[1, 'asc']],
                "columns": [
                    { "name": "response_id" },
                    { "name": "risk_uuid" },
                    { "name": "ResponseTitle_id" },
                    { "name": "RiskStrategies_strategy_id" },
                    { "name": "user_id", orderable: false },
                    { "name": "register_id" },
                    { "name": "due_date" },
                    { "name": "associated_risk", orderable: false }
                ]
            });
        });

    });

</script>