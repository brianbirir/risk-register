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
                <a href="/dashboard/riskregister/edit/<?php echo $register_id; ?>" class="btn btn-default btn-reg btn-xs pull-right">Edit Register</a>
            </div>

            <div class="box-body">
                <strong><i class="fas fa-book margin-r-5"></i> Risk Register Name</strong>
                <p class="text-muted"><?php echo $register_name; ?></p>

                <hr>

                <strong><i class="fas fa-map-marker margin-r-5"></i> Risk Register Description</strong>
                <p class="text-muted"><?php echo $register_description; ?></p>

                <hr>

                <strong><i class="fas fa-users margin-r-5"></i> Users of this Register</strong>
                
                <a class="btn btn-default btn-reg btn-xs pull-right" href="/settings/user/riskregister/<?php echo $register_id; ?>">Assign User</a>
                
                <?php 

                    if($register_users)
                    {
                        echo "<ul class='list-group' style='margin-top:20px;'>";
                        foreach ($register_users as $user)
                        {
                            
                            echo "<li class='list-group-item'>".$user->first_name." ".$user->last_name."</li>";
                        }
                        echo "</ul>";
                    }
                    else
                    {
                        echo "<div style='margin-top:20px;' class='alert alert-warning' role='alert'>There are no users assigned to this register!</div>";
                    }
                ?>

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

        <?php if ($this->session->flashdata('negative_msg')){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div><?php echo $this->session->flashdata('negative_msg'); ?></div>
            </div>
        <?php } ?>
        
        <div class="reg-btn">
            <!-- <a href="/dashboard/risk/add" class="btn btn-success btn-xs btn-add">Add Risk Item</a> -->
            <?php echo "<a href='/dashboard/risk/add/".$register_id."' class='btn btn-success btn-xs btn-add'>Add Risk Item</a>"; ?>
            <a href="/dashboard/risks/archived" class="btn btn-warning btn-xs btn-view">View Archived Risks</a>
        </div>

        <?php if($role_name != "General User") { ?>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs" role="tablist" id="register-tabs">
                
                <?php if($role_name == "Super Administrator") { ?>
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Register Risks</a></li>
                    <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Register Users' Risks</a></li>
                <?php } else { ?>
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">My Risks</a></li>
                    <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Users' Risks</a></li>
                <?php } ?>
                    
                </ul>

                <div class="tab-content">
                    <!-- tab one -->
                    <div role="tabpanel" class="tab-pane active" id="tab_1">
                        <table id="risk-table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Risk Harzard ID</th>
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
        
        <?php } else { ?> <!-- load general user tab -->

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs" role="tablist" id="register-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab" aria-expanded="true">My Risks</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab_1">    
                        <table id="risk-table" class="table table-hover">
                            <thead>
                                <th>Risk ID</th>
                                <th>Risk Description</th>
                                <th>Risk Category</th>
                                <th>Risk Rating</th>
                                <th>Actions</th>    
                            <thead>
                            <tbody></tbody>
                        </table>
                    </div>   
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<script>

$(document).ready(function() {

    // get value from hidden field holding register ID
    var registerID = $('#register_id').val();

    // generate table from AJAX request for risk items
    var riskTable = $('#risk-table').DataTable({
        "pageLength" : 10,
        "processing": true,
        "serverSide": true,
        "aaSorting": [],
        "ajax": {
            "url": "<?php echo base_url(); ?>" + "project/single_register_risks",
            "type": "POST",
            "data": function(d){
                d.registerID = registerID;
            }
        },
        "order": [[1, 'asc']],
        "columns": [
                { "name": "original_risk_id"},
                { "name": "risk_title", orderable:false},
                { "name": "RiskCategories_category_id"},
                { "name": "risk_rating" },
                { "name": "actions", orderable:false }
            ]
    });

});

</script>