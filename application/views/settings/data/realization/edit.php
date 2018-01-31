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

<!-- edit realization form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="realization-edit-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "realization-edit-form", "name" => "realization-edit-form");
                echo form_open("realization/update_realization", $attributes);
            ?>        

            <input type="hidden" name="realization_id" id="realization_id" class="form-control" value="<?php echo $realization->realization_id; ?>"/>

            <div class="form-group">
                <label for="realization_name">Realization Name</label>
                <input class="form-control" name="realization_name" placeholder="Realization Name" type="text" value="<?php echo $realization->realization_name; ?>" />
                <?php echo form_error('realization_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="main_realization">Project</label>
                <?php 
                    $select_project_name_attributes = 'class="form-control" required disabled';
                    $project_id = $realization->Project_project_id;
                    echo form_dropdown( 'main_realization', $select_project, $project_id, $select_project_name_attributes );
                ?>
            </div>

            <input name="btn_reg_realization" type="submit" class="btn btn-default btn-reg" value="Update Realization" />

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