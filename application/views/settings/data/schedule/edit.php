<!-- display updating alert messages -->
<?php if ($this->session->flashdata('positive-msg')){ ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('positive-msg'); ?></span>
  </div>
<?php } else if ($this->session->flashdata('negative-msg')) { ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('negative-msg'); ?></span>
  </div>
<?php } ?>

<!-- edit schedule form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="schedule-edit-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "schedule-edit-form", "name" => "schedule-edit-form");
                echo form_open("schedule/update_schedule", $attributes);
            ?>        

            <input type="hidden" name="schedule_id" id="schedule_id" class="form-control" value="<?php echo $schedule->schedule_id; ?>"/>

            <div class="form-group">
                <label for="schedule_name">Schedule Rating</label>
                <input class="form-control" name="schedule_name" placeholder="Schedule Name" type="text" value="<?php echo $schedule->schedule_rating; ?>" />
                <?php echo form_error('schedule_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_reg_schedule" type="submit" class="btn btn-default btn-reg" value="Update Schedule" />

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