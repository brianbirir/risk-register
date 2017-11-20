<!-- add users form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="user-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "signupform", "name" => "signupform");
                echo form_open("user/register", $attributes);
            ?>        
            <div class="form-group">
                <label for="name">First Name</label>
                <input class="form-control" name="first_name" placeholder="First Name" type="text" value="<?php echo set_value('first_name'); ?>" />
                <?php echo form_error('first_name','<div class="alert alert-danger">','</div>'); ?>
            </div>
            
            <div class="form-group">
                <label for="name">Last Name</label>
                <input class="form-control" name="last_name" placeholder="Last Name" type="text" value="<?php echo set_value('last_name'); ?>" />
                <?php echo form_error('last_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="name">User Name</label>
                <input class="form-control" name="username" placeholder="User Name" type="text" value="<?php echo set_value('username'); ?>" />
                <?php echo form_error('username','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input class="form-control" name="email" placeholder="Email Address" type="text" value="<?php echo set_value('email'); ?>" />
                <?php echo form_error('email','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="roles">User's Role</label>
                <?php 
                    $select_attributes = 'class="form-control"';
                    echo form_dropdown('role',$select_option,"2",$select_attributes);
                ?>
            </div>

            <input name="btn_reg" type="submit" class="btn btn-default btn-reg" value="Register" />

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