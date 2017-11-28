<!-- add owner form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="owner-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "signupform", "name" => "signupform");
                echo form_open("owner/add_owner", $attributes);
            ?>

            <div class="form-group">
                <label for="owner_name">Risk Owner Name</label>
                <input class="form-control" name="owner_name" placeholder="Owner Name" type="text" value="<?php echo set_value('risk_owner'); ?>" />
                <?php echo form_error('owner_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_update_owner" type="submit" class="btn btn-default btn-reg" value="Add Owner" />

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