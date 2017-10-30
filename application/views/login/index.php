<!-- login box -->
<div class="login-box">
  <div class="login-logo">
    <a href="/">
      <!-- <b>Admin</b>LTE -->
      <img class="img-responsive" src="<?php echo base_url();?>assets/img/aldea_services_logo.jpg">
    </a>

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>

    <?php 
      $attributes = array("class" => "form-login", "id" => "loginform", "name" => "loginform");
      echo form_open("login/login", $attributes);
    ?>
    <div class="form-group">
        <label for="txt_username" class="control-label">Username</label>
        <input class="form-control" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>" />
        <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
    </div>

    <div class="form-group">
        <label for="txt_password" class="control-label">Password</label>
        <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
        <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
    </div>


    <div class="row">
      <div class="col-xs-8">
        <!-- <div class="checkbox icheck">
          <label>
            <input type="checkbox"> Remember Me
          </label>
        </div> -->
      </div>
      <!-- /.col -->
      <div class="col-xs-4">
        <input name="btn_login" type="submit" class="btn btn-default btn-block btn-login" value="Login" />
      </div>
      <!-- /.col -->
    </div>

    <?php echo form_close(); ?>

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

    <!-- <a href="#">I forgot my password</a><br> -->
    
    <div class="signup-msg">
      <p style="text-align:center;">Not yet registered? You can sign up <?php echo anchor('signup','here','title="sign up"')?></p>
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>