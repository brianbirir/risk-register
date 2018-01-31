<!-- add schedule form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="schedule-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "signupform", "name" => "signupform");
                echo form_open("schedule/add_schedule", $attributes);
            ?>

            <div class="form-group">
                <label for="schedule_name">Schedule Name</label>
                <input class="form-control" name="schedule_name" placeholder="Schedule Name" type="text" value="<?php echo set_value('schedule_name'); ?>" />
                <?php echo form_error('schedule_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="schedule_description">Schedule Description</label>
                <textarea class="form-control" name="schedule_description" placeholder="Schedule Description" rows="5"/><?php echo set_value('schedule_description'); ?></textarea>
                <?php echo form_error('schedule_description','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="project_name">Select Project</label>
                <?php 
                    $select_project_attributes = 'class="form-control" required';
                    echo form_dropdown('project_name',$select_project,"1",$select_project_attributes);
                ?>
            </div>

            <input name="btn_update_schedule" type="submit" class="btn btn-default btn-reg" value="Add Schedule" />

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