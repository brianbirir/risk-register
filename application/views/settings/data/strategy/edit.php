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

<!-- edit strategy form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="strategy-edit-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "strategy-edit-form", "name" => "strategy-edit-form");
                echo form_open("strategy/update_strategy", $attributes);
            ?>        

            <input type="hidden" name="strategy_id" id="strategy_id" class="form-control" value="<?php echo $strategy->strategy_id; ?>"/>

            <div class="form-group">
                <label for="strategy_name">Strategy Name</label>
                <input class="form-control" name="strategy_name" placeholder="Strategy Name" type="text" value="<?php echo $strategy->strategy_name; ?>" />
                <?php echo form_error('strategy_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_reg_strategy" type="submit" class="btn btn-default btn-reg" value="Update Strategy" />

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