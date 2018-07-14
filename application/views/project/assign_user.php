<!-- assign user to register form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

        <div id="reg-subproject-form">

            <?php
                $attributes = array("class" => "ui form", "id" => "reg-subproject", "name" => "reg-subproject");
                echo form_open("project/assign_user", $attributes);
            ?>

            <input type="hidden" name="project_id" id="project_id" class="form-control" value="<?php echo $project_id;?>"/>

            <div class="form-group">
                <label for="project_name">Project Name</label>
                <div class="well well-sm"><?php echo $project_name; ?></div>
            </div>

                <fieldset>
                    <legend>Select users to be assigned to project</legend>
                    <?php 
                        foreach ($select_user as $key => $value) {
                            echo '<div>';
                            echo form_checkbox('assigned_users', $key, FALSE);
                            echo form_label($value,'assigned_users');
                            echo '</div>';
                        }
                    ?>
                </fieldset>
            
            <input name="btn_assign_user" type="submit" class="btn btn-default btn-reg" value="Assign Users" />

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