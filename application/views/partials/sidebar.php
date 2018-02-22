<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-line-chart"></i>Dashboard</a></li>  
        <li><a href="<?php echo base_url(); ?>dashboard/project"><i class="fa fa-folder"></i>Projects</a></li>
        <li class="treeview">
          <a href="#">
            <i class="far fa-newspaper"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>dashboard/reports/risk_project"><i class="fa fa-folder"></i>Risks</a></li>
            <li><a href="<?php echo base_url(); ?>dashboard/report/response"><i class="fa fa-folder"></i>Risk Responses</a></li>
          </ul>
        </li>
        <?php if ($role_id != 8) { ?>
          <li><a href="<?php echo base_url(); ?>dashboard/settings"><i class="fa fa-cog"></i>Settings</a></li>
        <?php } ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>