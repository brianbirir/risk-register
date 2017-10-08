<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>/assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <?php
              $currentUser = $first_name." ".$last_name;
              echo $currentUser;
            ?>
          </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">        
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-link"></i> <span>Risk Registry</span></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/project"><i class="fa fa-link"></i> <span>Projects</span></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/settings"><i class="fa fa-link"></i> <span>Settings</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
