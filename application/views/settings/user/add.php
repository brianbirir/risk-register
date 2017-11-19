<?php 
    if($role_id == 1){
?>
    <div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin"> 
        <h4>Super Admin Managed Users</h4> 
        <p>Register users managed by the super administrator</p> 
    </div>
    
    <!-- Load form for super admin that will be used to register project/programme managers -->
    <?php $this->load->view('settings/user/admin_form'); ?>

<?php } else { ?>
    <div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin"> 
        <h4>Project/Programme Manager Users</h4> 
        <p>Register users managed by the project/programme manager.</p> 
    </div>

    <!-- Load form for manager that will be used to register generic users -->
    <?php $this->load->view('settings/user/manager_form'); ?>

<?php }?>