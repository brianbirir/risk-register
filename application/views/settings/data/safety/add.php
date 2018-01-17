<!-- add safety form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="safety-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "signupform", "name" => "signupform");
                echo form_open("safety/add_safety", $attributes);
            ?>

            <div class="form-group">
                <label for="safety_name">Safety Name</label>
                <input class="form-control" name="safety_name" placeholder="Safety Name" type="text" value="<?php echo set_value('safety_name'); ?>" />
                <?php echo form_error('safety_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="project_name">Select Project</label>
                <?php 
                    $select_project_attributes = 'class="form-control" required';
                    echo form_dropdown('project_name',$select_project,"1",$select_project_attributes);
                ?>
            </div>

            <input name="btn_update_safety" type="submit" class="btn btn-default btn-reg" value="Add Safety" />

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