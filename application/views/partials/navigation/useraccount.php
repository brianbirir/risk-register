<li class="dropdown user user-menu">
  <!-- Menu Toggle Button -->
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <!-- The user image in the navbar-->
    <!-- <img src="<?php echo base_url();?>/assets/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
    <!-- hidden-xs hides the username on small devices so only the image appears. -->
    <span class="hidden-xs" style="color:#000000;">
      <?php
        $currentUser = $first_name." ".$last_name;
        echo $currentUser;
      ?>
    </span>

    <p style="margin:0;">
      <span class="label label-default">
        <?php
          $CI =& get_instance();
          $CI->load->model('role_model');
          echo $CI->role_model->getRoleName($role_id);
        ?>
      </span>
    </p>
  </a>
  
  <ul class="dropdown-menu">
    <li><?php echo anchor('logout','Sign Out',array('title'=>'logout'))?></li>
  </ul>
</li>
