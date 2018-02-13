<!-- assign user to register form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

        <div id="reg-subproject-form">

            <?php
                $attributes = array("class" => "ui form", "id" => "reg-subproject", "name" => "reg-subproject");
                echo form_open("project/assign_user", $attributes);
            ?>

            <input type="hidden" name="register_id" id="register_id" class="form-control" value="<?php echo $register_id;?>"/>

            <input type="hidden" name="Project_project_id" id="Project_project_id" class="form-control" value="<?php echo $Project_project_id;?>"/>

            <div class="form-group">
                <label for="subproject_name">Register Name</label>
                <div class="well well-sm"><?php echo $register_name; ?></div>
            </div>

            <div class="form-group"> 
                <label for="general_user">Assign User</label> 
                <?php  
                    $select_user_attributes = 'class="form-control" required';
                    $general_user['none'] = 'None';
                    echo form_dropdown('general_user',$general_user,'none',$select_user_attributes); 
                ?> 
            </div>
            
            <input name="btn_assign_user" type="submit" class="btn btn-default btn-reg" value="Assign User" />

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