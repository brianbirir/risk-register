<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-line-chart"></i>Dashboard</a></li>  
        <li><a href="<?php echo base_url(); ?>dashboard/project"><i class="fa fa-folder"></i>Projects</a></li>
        <li><a href="<?php echo base_url(); ?>dashboard/reports"><i class="fa fa-folder"></i>Reports</a></li>
        <?php if ($role_id != 8) { ?>
          <li><a href="<?php echo base_url(); ?>dashboard/settings"><i class="fa fa-cog"></i>Settings</a></li>
        <?php } ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>