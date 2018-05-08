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

    <!-- display risk adding alert messages -->
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

     <?php // var_dump($this->session->userdata('logged_in')); ?>

    <?php
        // check if risk data exists
        if (!$risk_data) 
        {
            $msg = 'You have no registered risks! Go to the <a href="/dashboard/riskregisters">risk register page</a> to add a new risk item.';
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
                                    <th>Risk Register</th>
                                    <th>Risk Category</th>
                                    <th>Identified Hazard/ Risk</th>
                                    <th>Actions</th>
                                    <!-- <th>Actions</th> -->
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
                                        /*echo "<td>
                                        <a title='edit' href='/dashboard/risk/edit/".$risk_row->item_id."'><i class='fa fa-pencil' aria-hidden='true'></i>
                                        <a title='archive' href='/dashboard/risk/archive/".$risk_row->item_id."'><i class='fa fa-trash' aria-hidden='true'></i>
                                            </td>";*/
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

        <?php } ?>
</div> <!-- end of decision statement -->