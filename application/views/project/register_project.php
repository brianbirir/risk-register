<!-- register project form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="reg-project-form">

            <?php
                $attributes = array("class" => "ui form", "id" => "reg-project", "name" => "reg-project");
                echo form_open("project/reg_project", $attributes);
            ?>

            <div class="form-group">
                <label for="project_name">Project Name</label>
                <input class="form-control" name="project_name" placeholder="Project Name" type="text" value="<?php echo set_value('project_name'); ?>" />
                <?php echo form_error('project_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="project_description">Project Description</label>
                <textarea class="form-control" name="project_description" placeholder="Project Description" rows="5"/><?php echo set_value('project_description'); ?></textarea>
                <?php echo form_error('project_description','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_reg_project" type="submit" class="btn btn-default btn-reg" value="Add Project" />

            <?php echo form_close(); ?>

            <?php if ($this->session->flashdata('negative_msg')){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div><?php echo $this->session->flashdata('negative_msg'); ?></div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>