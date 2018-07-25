<!-- assign project form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="user-project-form">

            <div>
                <?php if ($this->session->flashdata('negative_msg')){ ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div><?php echo $this->session->flashdata('negative_msg'); ?></div>
                    </div>
                <?php } ?>
            </div>

            <?php 
                $attributes = array("class" => "ui form", "id" => "signupform", "name" => "signupform");
                echo form_open("user/assign_project", $attributes);
            ?>

            <input type="hidden" name="project_id" id="project_id" class="form-control" value="<?php echo $project_id; ?>"/>

            <div class="form-group">
                <label for="project_name">Project Name</label>
                <input disabled class="form-control" name="project_name" placeholder="Project Name" type="text" value="<?php echo $project_name;?>" />
            </div>

            <div class="form-group">
                <label for="project_user">Select Manager</label>
                <?php 
                    $select_attributes = 'class="form-control"';
                    echo form_dropdown('project_user',$select_user,"1",$select_attributes);
                ?>
            </div>

            <input name="btn_assign_register" type="submit" class="btn btn-default btn-reg" value="Assign" />

            <?php echo form_close(); ?>
        </div>
    </div>
</div>