<!-- user rile form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="reg-role-form">

            <?php
                $attributes = array("class" => "ui form", "id" => "role_form", "name" => "role_form");
                echo form_open("role/register", $attributes);
            ?>

            <div class="form-group">
                <label for="role_name">Role Name</label>
                <input class="form-control" name="role_name" placeholder="Role Name" type="text" value="<?php echo set_value('role_name'); ?>" />
                <?php echo form_error('role_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="role_description">Role Description</label>
                <textarea class="form-control" name="role_description" placeholder="Role Description" rows="5"/><?php echo set_value('role_description'); ?></textarea>
                <?php echo form_error('role_description','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_reg_role" type="submit" class="btn btn-default btn-reg" value="Add User Role" />

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