<!-- view risk register -->
<?php 
    $CI =& get_instance();
    $CI->load->model('risk_model');
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
        </div>
    </div>

    <div class="col-md-9">
        
        <div class="reg-btn">
            <a href="/dashboard/risk/add" class="btn btn-success btn-sm btn-add-device">Add Risk Item</a>
        </div>

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Risk Item</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
            <?php 
                if (!$risk_data) {
                    $msg = 'You have no registered subprojects!';
                    echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
                } 
                else 
                { ?>

                <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Sub-Project</th>
                                <th>Main Category</th>
                                <th>Identified Hazard/ Risk</th>
                            </tr>
                            <?php
                                foreach ($risk_data as $risk_row) {
                                    echo "<tr>";
                                    echo "<td>".$risk_row->item_id."</td>";
                                    echo "<td>".$CI->risk_model->getSubProjectName($risk_row->Subproject_subproject_id)."</td>";
                                    echo "<td>".$CI->risk_model->getRiskCategoryName($risk_row->RiskCategories_category_id)."</td>";
                                    echo "<td>".$risk_row->identified_hazard_risk."</td>";
                                    echo "<td><a href='/dashboard/risk/".$risk_row->item_id."' class='btn btn-primary btn-xs'>View</td>";
                                    echo "</tr>";
                                } 
                            } ?>
                        </tbody>
                    <table>
            </div>

        </div>
    </div>

</div>