<li class="dropdown user user-menu">
  <!-- Menu Toggle Button -->
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <!-- The user image in the navbar-->
    <img src="<?php echo base_url();?>/adminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
    <!-- hidden-xs hides the username on small devices so only the image appears. -->
    <span class="hidden-xs">
      <?php
        $currentUser = $first_name." ".$last_name;
        echo $currentUser;
      ?>
    </span>
  </a>
  
  <ul class="dropdown-menu">
    <!-- The user image in the menu -->
    <li class="user-header">
      <img src="<?php echo base_url();?>/adminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

      <p>
        <?php  echo $currentUser; ?>
        <!--<small>Member since Nov. 2012</small>-->
      </p>
    </li>
    <!-- Menu Body -->
    <li class="user-body">
      <div class="row">
        <div class="col-xs-4 text-center">
          <a href="#">Followers</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Sales</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Friends</a>
        </div>
      </div>
      <!-- /.row -->
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
        <?php echo anchor('profile/'.$user_id,'Profile',array('title'=>'profile','class'=>'btn btn-default btn-flat'))?>
      </div>
      <div class="pull-right">
        <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->
        <?php echo anchor('logout','Sign Out',array('title'=>'logut','class'=>'btn btn-default btn-flat'))?>
      </div>
    </li>
  </ul>
</li>
