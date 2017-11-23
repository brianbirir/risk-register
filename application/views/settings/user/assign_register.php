<!-- assign risk register form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="user-risk-register-form">

            <?php
                $fname = $general_user->first_name;
                $lname = $general_user->last_name;
            ?>

            <?php 
                $attributes = array("class" => "ui form", "id" => "signupform", "name" => "signupform");
                echo form_open("user/assign_register", $attributes);
            ?>

            <input type="hidden" name="user_id" id="user_id" class="form-control" value="<?php echo $general_user_id; ?>"/>

            <div class="form-group">
                <label for="user_name">User's Name</label>
                <input disabled class="form-control" name="user_name" placeholder="User's Name" type="text" value="<?php echo $fname." ".$lname;?>" />
            </div>

            <div class="form-group">
                <label for="riskregister">Risk Register</label>
                <?php 
                    $select_attributes = 'class="form-control"';
                    echo form_dropdown('riskregister',$select_option,"2",$select_attributes);
                ?>
            </div>


            <input name="btn_assign_register" type="submit" class="btn btn-default btn-reg" value="Assign" />

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