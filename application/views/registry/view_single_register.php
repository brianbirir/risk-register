<!-- view risk register -->
<?php 
    $CI =& get_instance();
    $CI->load->model('risk_model');
    $CI->load->model('user_model');
?>

<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">About Risk Register</h3>
            </div>

            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Risk Register Name</strong>
                <p class="text-muted"><?php echo $register_name; ?></p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Risk Register Description</strong>
                <p class="text-muted"><?php echo $register_description; ?></p>
            </div>

            <input type="hidden" name="register_id" id="register_id" class="form-control" value="<?php echo $register_id; ?>"/>
        </div>
    </div>

    <div class="col-md-9">

        <?php if ($this->session->flashdata('positive_msg')){ ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div><?php echo $this->session->flashdata('positive_msg'); ?></div>
            </div>
        <?php } ?>
        
        <div class="reg-btn">
            <!-- <a href="/dashboard/risk/add" class="btn btn-success btn-xs btn-add">Add Risk Item</a> -->
            <?php echo "<a href='/dashboard/risk/add/".$register_id."' class='btn btn-success btn-xs btn-add'>Add Risk Item</a>"; ?>
            <a href="/dashboard/risks/archived" class="btn btn-warning btn-xs btn-view">View Archived Risks</a>
        </div>

        <?php if($role_id != 8) { ?>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs" role="tablist" id="register-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">My Risks</a></li>
                    <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Users' Risks</a></li>
                </ul>

                <div class="tab-content">
                    <!-- tab one -->
                    <div role="tabpanel" class="tab-pane active" id="tab_1">
                        <table id="risk-table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Risk ID</th>
                                    <th>Risk Description</th>
                                    <th>Risk Category</th>
                                    <th>Risk Rating</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody> <!-- where table data will be placed after AJAX request-->
                        </table>
                    </div>

                    <!-- tab two -->
                    <div role="tabpanel" class="tab-pane" id="tab_2">
                        <?php if (!$user_risk_data) { ?>

                            <div style="margin: 10px;">
                                <div class="alert alert-warning alert-aldea" role="alert">Your users have no risks for this register!</div>
                            </div>

                        <?php } else { ?>

                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Title</th>
                                        <th>Main Category</th>
                                        <th>Owner</th>
                                        <th>Revisions</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php
                                        foreach ($user_risk_data as $users_risk_row) 
                                        {
                                            echo "<tr>";
                                            //echo "<td width=300>".$users_risk_row->risk_uuid."</td>";
                                            echo "<td width=300>".$users_risk_row->risk_title."</td>";
                                            echo "<td width=400>".$CI->risk_model->getRiskCategoryName($users_risk_row->RiskCategories_category_id)."</td>";
                                            echo "<td>".$CI->user_model->getUserNames($users_risk_row->User_user_id)."</td>";
                                            echo "<td width=150><span class='badge bg-yellow'>".$CI->risk_model->getNumberOfRiskRevisions($users_risk_row->item_id)."</span></td>";
                                            echo "<td><span><a title='view' href='/dashboard/risk/".$users_risk_row->item_id."'><i class='fa fa-eye' aria-hidden='true'></i></a></span></td>";
                                            echo "</tr>";
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        
                        <?php } ?>
                    </div>

                </div>
            </div>
        
        <?php } else { ?>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs" role="tablist" id="register-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab" aria-expanded="true">My Risks</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="tab_1">
                        <?php if (!$risk_data) { ?>

                            <div style="margin: 10px;">
                                <div class="alert alert-warning alert-aldea" role="alert">You have no risks for this register!</div>
                            </div>

                        <?php } else { ?>
                            
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <!-- <th>UUID</th> -->
                                        <th>Title</th>
                                        <th>Main Category</th>
                                        <th>Revisions</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php
                                        foreach ($risk_data as $risk_row) 
                                        {
                                            echo "<tr>";
                                            // echo "<td width=300>".$risk_row->risk_uuid."</td>";
                                            echo "<td width=300>".$risk_row->risk_title."</td>";
                                            echo "<td width=400>".$CI->risk_model->getRiskCategoryName($risk_row->RiskCategories_category_id)."</td>";
                                            echo "<td width=150><span class='badge bg-yellow'>".$CI->risk_model->getNumberOfRiskRevisions($risk_row->item_id)."</span></td>";
                                            echo "<td>
                                                <span><a title='view' href='/dashboard/risk/".$risk_row->item_id."'><i class='fa fa-eye' aria-hidden='true'></i></a></span>
                                                <span><a title='edit' href='/dashboard/risk/edit/".$risk_row->item_id."'><i class='fa fa-pencil' aria-hidden='true'></i></a></span>
                                                <span><a title='archive' href='/dashboard/risk/archive/".$risk_row->item_id."'><i class='fa fa-trash' aria-hidden='true'></i></a></span>
                                                    </td>";
                                            echo "</tr>";
                                        } 
                                ?>
                                </tbody>
                            </table>
                            
                        <?php } ?>
                    </div>   

                </div>
            </div>
        <?php } ?>
    </div>
</div>


<script>

$(document).ready(function() {

    var registerID = $('#register_id').val();

    // generate table from AJAX request for risk items
    var riskTable = $('#risk-table').DataTable({
        "pageLength" : 10,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo base_url(); ?>" + "project/single_register_risks",
            "type": "POST",
            "data": function(d){
                d.registerID = registerID;
            }
        },
        // "order": [[1, 'asc']],
        "columns": [
                { "name": "original_risk_id"},
                { "name": "risk_title"},
                { "name": "RiskCategories_category_id" },
                { "name": "risk_rating" },
                { "name": "actions" }
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