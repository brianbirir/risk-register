<!-- add realization form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="realization-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "realization-form", "name" => "realization-form");
                echo form_open("realization/add_realization", $attributes);
            ?>

            <div class="form-group">
                <label for="realization_name">Realization Name</label>
                <input class="form-control" name="realization_name" placeholder="Realization Name" type="text" value="<?php echo set_value('realization_name'); ?>" />
                <?php echo form_error('realization_name','<div class="alert alert-danger">','</div>'); ?>
            </div>


            <div class="form-group">
                <label for="project_name">Select Project</label>
                <?php 
                    $select_project_attributes = 'class="form-control" required';
                    echo form_dropdown('project_name',$select_project,"1",$select_project_attributes);
                ?>
            </div>

            <input name="btn_update_realization" type="submit" class="btn btn-default btn-reg" value="Add Realization" />

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