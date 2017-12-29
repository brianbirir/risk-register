<!-- register project form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

        <?php 
            echo "Last Register Row: ".$last_reg_id. "<br />";

            foreach ($risk_ids as $key_field) 
            {
                echo $key_field->item_id . "<br />";
                // echo $key_field;
            }
        ?>

        <div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin"> 
            <p>To duplicate this risk register, change the name and description. By duplicating this register, you will be able to copy all the risks that belong to this register.</p> 
        </div>

        <div id="reg-subproject-form">

            <?php
                $attributes = array("class" => "ui form", "id" => "reg-subproject", "name" => "reg-subproject");
                echo form_open("project/duplicate_register", $attributes);
            ?>

            <input type="hidden" name="register_id" id="register_id" class="form-control" value="<?php echo $register_id;?>"/>
            <input type="hidden" name="Project_project_id" id="Project_project_id" class="form-control" value="<?php echo $Project_project_id;?>"/>

            <div class="form-group">
                <label for="subproject_name">Original Register Name</label>
                <div class="well well-sm"><?php echo $register_name; ?></div>
            </div>

            <div class="form-group">
                <label for="subproject_name">New Register Name</label>
                <input class="form-control" name="subproject_name" placeholder="Risk Register Name" type="text" value="<?php echo set_value('subproject_name'); ?>" />
                <?php echo form_error('subproject_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="subproject_description">Original Register Description</label>
                <div class="well well-sm"><?php echo $register_description; ?></div>
            </div>

            <div class="form-group">
                <label for="subproject_description">New Register Description</label>
                <textarea class="form-control" name="subproject_description" placeholder="Risk Register Description" rows="5"/>
                    <?php echo set_value('subproject_description'); ?>
                </textarea>
                <?php echo form_error('subproject_description','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_reg_subproject" type="submit" class="btn btn-default btn-reg" value="Copy Register" />

            <?php echo form_close(); ?>

            <?php if ($this->session->flashdata('negative_msg')){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div><?php echo $this->session->flashdata('msg'); ?></div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>