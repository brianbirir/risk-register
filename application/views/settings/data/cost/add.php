<!-- add cost form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="cost-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "signupform", "name" => "signupform");
                echo form_open("cost/add_cost", $attributes);
            ?>

            <div class="form-group">
                <label for="cost_name">Cost Name</label>
                <input class="form-control" name="cost_name" placeholder="Cost Name" type="text" value="<?php echo set_value('cost_name'); ?>" />
                <?php echo form_error('cost_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="cost_description">Cost Description</label>
                <textarea class="form-control" name="cost_description" placeholder="Cost Description" rows="5"/><?php echo set_value('cost_description'); ?></textarea>
                <?php echo form_error('cost_description','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_update_cost" type="submit" class="btn btn-default btn-reg" value="Add Cost" />

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