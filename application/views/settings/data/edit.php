<!-- display updating alert messages -->
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

<!-- edit status form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="riskdata-edit-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "riskdata-edit-form", "name" => "riskdata-edit-form");
                echo form_open("riskdata/update", $attributes);
            ?>        

            <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $riskdata->id; ?>"/>
            <input type="hidden" name="data_type" id="data-type" class="form-control" value="<?php echo $data_type; ?>"/>

            <div class="form-group">
                <label for="status_name"><?php echo $title;?> Name</label>
                <input class="form-control" name="name" placeholder="<?php echo $title;?> Name" type="text" value="<?php echo $riskdata->name; ?>" required/>
                <?php echo form_error('name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="main_category">Project</label>
                <?php 
                    $select_project_name_attributes = 'class="form-control" required disabled';
                    $project_id = $riskdata->Project_project_id;
                    echo form_dropdown( 'main_category', $select_project, $project_id, $select_project_name_attributes );
                ?>
            </div>

            <input name="btn_update_<?php echo $data_type; ?>" type="submit" class="btn btn-default btn-reg" value="Update" />

            <?php echo form_close(); ?>
        </div>
    </div>
</div>