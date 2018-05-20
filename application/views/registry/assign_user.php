<!-- assign risk register form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="user-risk-register-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "signupform", "name" => "signupform");
                echo form_open("user/assign_register", $attributes);
            ?>

            <input type="hidden" name="register_id" id="register_id" class="form-control" value="<?php echo $register_id; ?>"/>

            <div class="form-group">
                <label for="register_name">Regiser Name</label>
                <input disabled class="form-control" name="register_name" placeholder="Register Name" type="text" value="<?php echo $register_name;?>" />
            </div>

            <div class="form-group">
                <label for="register_user">Select User</label>
                <?php 
                    $select_attributes = 'class="form-control"';
                    echo form_dropdown('register_user',$select_user,"1",$select_attributes);
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