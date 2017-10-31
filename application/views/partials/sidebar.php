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

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-line-chart"></i>Dashboard</a></li>  
        <li><a href="<?php echo base_url(); ?>dashboard/project"><i class="fa fa-folder"></i>Projects</a></li>
        <li><a href="<?php echo base_url(); ?>dashboard/settings"><i class="fa fa-cog"></i>Settings</a></li>
              
        <!-- <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Risk Registry</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo base_url(); ?>dashboard/riskregistry"><i class="fa fa-link"></i>View Risk Registry</a></li>
                <li><a href="<?php echo base_url(); ?>dashboard/riskregistry/add"><i class="fa fa-link"></i>Add Risk Registry</a></li>
              </ul>
            </a>
        </li>      -->
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
