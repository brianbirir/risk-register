<!-- change password -->
<div class="login-box">
<div class="login-logo">
  <a href="/">
    <img class="img-responsive" src="<?php echo base_url();?>assets/img/aldea_services_logo.jpg">
  </a>

</div>
<!-- /.login-logo -->
<div class="login-box-body">
  <h3 class="login-box-msg">Change Password</h3>
  <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span>Change your default before accessing the Risk Register dashboard.</span>
  </div>

  <!-- display login error message -->
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

  <?php 
    $attributes = array("class" => "form-change-password", "id" => "change-password", "name" => "change_password");
    echo form_open("login/change_password", $attributes);
  ?>
  <div class="form-group">
      <label for="new_password" class="control-label">New Password</label>
      <input class="form-control" id="new-password" name="new_password" placeholder="New Password" type="password" value="<?php echo set_value('new_password'); ?>" />
      <span class="text-danger"><?php echo form_error('new_password'); ?></span>
  </div>

  <div class="form-group">
      <label for="confirm_password" class="control-label">Confirm Password</label>
      <input class="form-control" id="confirm-password" name="confirm_password" placeholder="Confirm Password" type="password" value="<?php echo set_value('confirm_password'); ?>" />
      <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
  </div>

  <input name="btn_change_password" type="submit" class="btn btn-info btn-block btn-change-password" value="Update Password" />


  <?php echo form_close(); ?>

</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->