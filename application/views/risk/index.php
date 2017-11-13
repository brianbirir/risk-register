<?php 
    $CI =& get_instance();

    $CI->load->model('registry_model');

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

    <div class="reg-btn">
        <a href="/dashboard/risk/add" class="btn btn-success btn-sm btn-add-device">Add Risk</a>
    </div>

    <?php
        // check if risk data exists
        if (!$risk_data) {
            $msg = 'You have no registered risks!';
            echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
        } else { ?>
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
                                <th>Sub-Project</th>
                                <th>Main Category</th>
                                <th>Identified Hazard/ Risk</th>
                            </tr>
                            <?php
                                foreach ($risk_data as $risk_row) {
                                    echo "<tr>";
                                    echo "<td>".$risk_row->item_id."</td>";
                                    echo "<td>".$CI->registry_model->getSubProjectName($risk_row->Subproject_subproject_id)."</td>";
                                    echo "<td>".$CI->registry_model->getRiskCategoryName($risk_row->RiskCategories_category_id)."</td>";
                                    echo "<td>".$risk_row->identified_hazard_risk."</td>";
                                    echo "<td><a href='risk/".$risk_row->item_id."' class='btn btn-primary'>View</td>";
                                    echo "</tr>";
                                } 
                            } ?>
                        </tbody>
                    <table>
                </div>
            </div>
        </div>
    </div> <!-- end of decision statement -->