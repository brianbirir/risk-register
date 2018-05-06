<?php

    if(!$project_data) {
        echo '<div class="alert alert-warning" role="alert">There are no registered projects. You need to add a project before registering a subproject!</div>';
    }
    else {
?>

<!-- register project form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="reg-subproject-form">

            <?php
                $attributes = array("class" => "ui form", "id" => "reg-subproject", "name" => "reg-subproject");
                echo form_open("project/reg_subproject", $attributes);
            ?>

            <div class="form-group">
                <label for="subproject_name">Risk Register Name</label>
                <input class="form-control" name="subproject_name" placeholder="Risk Register Name" type="text" value="<?php echo set_value('subproject_name'); ?>" />
                <?php echo form_error('subproject_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="subproject_description">Risk Registry Description</label>
                <textarea class="form-control" name="subproject_description" placeholder="Risk Register Description" rows="5"/><?php echo set_value('subproject_description'); ?></textarea>
                <?php echo form_error('subproject_description','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="roles">Select Project</label>
                <?php
                    $select_attributes = 'class="form-control"';
                    echo form_dropdown('project',$select_project_option,$project_id,$select_attributes);
                ?>
            </div>

            <input name="btn_reg_subproject" type="submit" class="btn btn-default btn-reg" value="Add Risk Register" />

            <?php echo form_close(); ?>

            <?php if ($this->session->flashdata('msg')){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div><?php echo $this->session->flashdata('msg'); ?></div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<?php } ?>