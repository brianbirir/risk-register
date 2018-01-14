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

<!-- edit cost form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="cost-edit-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "cost-edit-form", "name" => "cost-edit-form");
                echo form_open("cost/update_cost", $attributes);
            ?>        

            <input type="hidden" name="cost_id" id="cost_id" class="form-control" value="<?php echo $cost->cost_id; ?>"/>

            <div class="form-group">
                <label for="cost_name">Cost Rating</label>
                <input class="form-control" name="cost_name" placeholder="Cost Name" type="text" value="<?php echo $cost->cost_rating; ?>" />
                <?php echo form_error('cost_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_reg_cost" type="submit" class="btn btn-default btn-reg" value="Update Cost" />

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