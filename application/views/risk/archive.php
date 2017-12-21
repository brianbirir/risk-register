<?php 
    $CI =& get_instance();

    $CI->load->model('risk_model');

?>
<div class="view-risk-registry">


    <?php if ($this->session->flashdata('msg')){ ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
    <?php } ?>

    <!-- display project updating alert messages -->
    <?php if ($this->session->flashdata('positive_msg')){ ?>
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span><?php echo $this->session->flashdata('positive_msg'); ?></span>
      </div>
    <?php } else if ($this->session->flashdata('negative_msg')) { ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span><?php echo $this->session->flashdata('negative_msg'); ?></span>
      </div>
    <?php } ?>

    <?php 
        if($role_id != 8)
        {
    ?>
        <?php
            // check if risk data exists
            if (!$manager_risk_data) 
            {
                $msg = 'Your users have no archived risks!';
                echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
            } 
            else 
            { ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Risk Registry</h3>
                            </div>
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Risk Register</th>
                                            <th>Main Category</th>
                                            <th>Identified Hazard/ Risk</th>
                                            <th></th>
                                        </tr>
                                        <?php
                                            foreach ($manager_risk_data as $manager_risk_row) 
                                            {
                                                echo "<tr>";
                                                echo "<td>".$manager_risk_row->item_id."</td>";
                                                echo "<td>".$CI->risk_model->getSubProjectName($manager_risk_row->Subproject_subproject_id)."</td>";
                                                echo "<td>".$CI->risk_model->getRiskCategoryName($manager_risk_row->RiskCategories_category_id)."</td>";
                                                echo "<td>".$manager_risk_row->identified_hazard_risk."</td>";
                                                echo "<td><a href='risk/".$manager_risk_row->item_id."' class='btn btn-primary btn-xs'>View</td>";
                                                echo "</tr>";
                                                echo "</tr>";
                                            } 
                                        ?>
                                    </tbody>
                                <table>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php 
            }

        } else {
                // check if risk data exists
                if (!$risk_data) 
                {
                    $msg = 'There are no archived risks!';
                    echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
                } 
                else 
                { ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Risk Registry</h3>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <th>ID</th>
                                                <th>Risk Register</th>
                                                <th>Main Category</th>
                                                <th>Identified Hazard/ Risk</th>
                                                <th></th>
                                            </tr>
                                            <?php
                                                foreach ($risk_data as $risk_row) 
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$risk_row->item_id."</td>";
                                                    echo "<td>".$CI->risk_model->getSubProjectName($risk_row->Subproject_subproject_id)."</td>";
                                                    echo "<td>".$CI->risk_model->getRiskCategoryName($risk_row->RiskCategories_category_id)."</td>";
                                                    echo "<td>".$risk_row->identified_hazard_risk."</td>";
                                                    echo "<td><a href='risk/".$risk_row->item_id."' class='btn btn-primary btn-xs'>View</td>";
                                                    echo "</tr>";
                                                    echo "</tr>";
                                                } 
                                            ?>
                                        </tbody>
                                    <table>
                                </div>
                            </div>
                        </div>
                    </div> 
            <?php } ?> <!-- end of decision statement -->

        <?php } ?>