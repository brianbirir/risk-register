<!-- register project form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="reg-project-form">

            <?php
                $attributes = array("class" => "ui form", "id" => "edit-register", "name" => "edit-register");
                echo form_open("project/update_register", $attributes);
            ?>

            <input type="hidden" name="register_id" id="register_id" class="form-control" value="<?php echo $register->subproject_id;?>"/>

            <div class="form-group">
                <label for="register_name">Register Name</label>
                <input class="form-control" name="register_name" placeholder="Register Name" type="text" value="<?php echo $register->name ?>" />
                <?php echo form_error('register_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="register_description">Register Description</label>
                <textarea class="form-control" name="register_description" placeholder="Register Description" rows="5"/><?php echo $register->description; ?></textarea>
                <?php echo form_error('register_description','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_edit_register" type="submit" class="btn btn-default btn-reg" value="Update Register" />

            <?php echo form_close(); ?>

            <?php if ($this->session->flashdata('negative_msg')){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div><?php echo $this->session->flashdata('msg'); ?></div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>