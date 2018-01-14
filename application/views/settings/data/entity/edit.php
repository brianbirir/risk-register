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

<!-- edit entity form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="entity-edit-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "entity-edit-form", "name" => "entity-edit-form");
                echo form_open("entity/update_entity", $attributes);
            ?>        

            <input type="hidden" name="entity_id" id="entity_id" class="form-control" value="<?php echo $entity->entity_id; ?>"/>

            <div class="form-group">
                <label for="entity_name">Entity Name</label>
                <input class="form-control" name="entity_name" placeholder="Entity Name" type="text" value="<?php echo $entity->entity_name; ?>" />
                <?php echo form_error('entity_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_reg_entity" type="submit" class="btn btn-default btn-reg" value="Update Entity" />

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