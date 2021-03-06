<!-- add status form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="<?php echo $title;?>-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "<?php echo $title;?>-form", "name" => "<?php echo $title;?>-form");
                echo form_open("riskdata/insert", $attributes);
            ?>

            <input type="hidden" name="data_type" id="data-type" class="form-control" value="<?php echo $data_type; ?>"/>
            
            <?php if($data_type == 'cost_rating' || $data_type == 'schedule_rating') { ?>
            <div class="form-group">
                <label for="name"><?php echo $title;?> Rating</label> 
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Must be a number">            
                    <i class="fas fa-question-circle"></i>
                </button>
                <input class="form-control" name="name" placeholder="<?php echo $title;?> Rating" type="number" value="<?php echo set_value('name'); ?>" required />
                <?php echo form_error('name','<div class="alert alert-danger">','</div>'); ?>
                <p class="text-warning">Only numeric values are allowed!</p>
            </div>
            <?php } else { ?>
            <div class="form-group">
                <label for="name"><?php echo $title;?> Name</label>
                <input class="form-control" name="name" placeholder="<?php echo $title;?> Name" type="text" value="<?php echo set_value('name'); ?>" required />
                <?php echo form_error('name','<div class="alert alert-danger">','</div>'); ?>
            </div>
            <?php } ?> 

            <div class="form-group">
                <label for="project_name">Select Project</label>
                <?php 
                    $select_project_attributes = 'class="form-control" required';
                    echo form_dropdown('project', $select_project, $project_id, $select_project_attributes);
                ?>
            </div>
            
            <?php if($data_type == 'cost_rating' || $data_type == 'schedule_rating') { ?>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" placeholder="<?php echo $title;?> Description" type="text" value="<?php echo set_value('name'); ?>" required></textarea>
                    <?php echo form_error('name','<div class="alert alert-danger">','</div>'); ?>
                </div>
            <?php } ?>

            <input name="btn_update_status" type="submit" class="btn btn-default btn-reg" value="Add Status" />

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