<li class="dropdown user user-menu">
  <!-- Menu Toggle Button -->
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <!-- The user image in the navbar-->
    <!-- <img src="<?php echo base_url();?>/assets/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
    <!-- hidden-xs hides the username on small devices so only the image appears. -->
    <span class="hidden-xs">
      <?php
        $currentUser = $first_name." ".$last_name;
        echo $currentUser;
      ?>
    </span>
  </a>
  
  <ul class="dropdown-menu">
    <li><?php echo anchor('logout','Sign Out',array('title'=>'logout'))?></li>
  </ul>
</li>
