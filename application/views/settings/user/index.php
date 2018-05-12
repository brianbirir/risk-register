<!-- display alert messages -->
<?php if ($this->session->flashdata('positive_msg')){ ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('positive-msg'); ?></span>
  </div>
<?php } else if ($this->session->flashdata('negative_msg')) { ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('negative-msg'); ?></span>
  </div>
<?php } ?>

<?php 
    $CI =& get_instance();
    $CI->load->model('role_model');
    $CI->load->model('project_model');
?>

<!-- view user based on role type i.e. super admin or manager-->
<?php 
    if ($role_id == 1) {
    ?>
    <div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin"> 
        <h4>Super Admin Managed Users</h4> 
        <p>These are users managed by the super administrator and includes the project manager and the programme manager.</p> 
    </div>
<?php
        $this->load->view('settings/user/admin_index');
    } else {
?>
    <div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin"> 
        <h4>Project/Programme Manager Users</h4> 
        <p>These are users managed by the project/ programme manager.</p> 
    </div>
<?php
        $this->load->view('settings/user/manager_index');
    }
?>