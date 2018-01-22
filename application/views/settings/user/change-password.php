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

<!-- edit user form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="edit-user-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "edit-user-form", "name" => "edituser");
                echo form_open("user/change_password", $attributes);
            ?>

            <input type="hidden" name="user_id" id="user_id" class="form-control" value="<?php echo $user->user_id;?>"/>

            <div class="form-group">
                <label for="name">User Name</label>
                <input disabled class="form-control" name="username" placeholder="User Name" type="text" value="<?php echo $user->username;?>" />
                <?php echo form_error('username','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input disabled class="form-control" name="email" placeholder="Email Address" type="text" value="<?php echo $user->email;?>" />
                <?php echo form_error('email','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="subject">Password</label>
                <input class="form-control" name="password" placeholder="Password" type="password" />
                <?php echo form_error('password','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="subject">Confirm Password</label>
                <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
                <?php echo form_error('cpassword','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <input name="btn_update" type="submit" class="btn btn-default btn-reg" value="Update" />

            <?php echo form_close(); ?>
        </div>
    </div>
</div>