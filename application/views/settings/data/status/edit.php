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

<!-- edit status form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="status-edit-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "status-edit-form", "name" => "status-edit-form");
                echo form_open("status/update_status", $attributes);
            ?>        

            <input type="hidden" name="status_id" id="status_id" class="form-control" value="<?php echo $status->status_id; ?>"/>

            <div class="form-group">
                <label for="status_name">Status Name</label>
                <input class="form-control" name="status_name" placeholder="Status Name" type="text" value="<?php echo $status->status_name; ?>" />
                <?php echo form_error('status_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_reg_status" type="submit" class="btn btn-default btn-reg" value="Update Status" />

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