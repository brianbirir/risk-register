<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <?php 
      $session_data = $this->session->userdata('logged_in');

    ?>

      
      <!-- Session Data -->
      <div class="session-data">
        <ul class="sidebar-menu">
          <li>
            <span>Current Project:</span>
            <?php if (isset($session_data['project_name'])){?>
              <span class="session-name"><small class="label bg-red"><?php echo $session_data['project_name']; ?></small></span>
            <?php } else { ?>
              <span class="session-name"><small class="label bg-red">No selected project!</small></span>
            <?php } ?>
          </li>
          <li>
            <span>Current Register:</span>
            <?php if (isset($session_data['register_name'])){?>
            <span class="session-name"><small class="label bg-red"><?php echo $session_data['register_name']; ?></small></span>
            <?php } else { ?>
              <span class="session-name"><small class="label bg-red">No selected register!</small></span>
            <?php } ?>
          </li>
        </ul>
      </div>

      <hr>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fas fa-chart-pie"></i> Dashboard</a></li>  
        <li><a href="<?php echo base_url(); ?>dashboard/project"><i class="fas fa-folder"></i> Projects</a></li>
        <li class="treeview">
          <a href="#">
            <i class="far fa-newspaper"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fas fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>dashboard/reports/risk_project"><i class="fas fa-folder"></i> Risks</a></li>
            <li><a href="<?php echo base_url(); ?>dashboard/report/response"><i class="fas fa-folder"></i> Risk Responses</a></li>
          </ul>
        </li>
        <?php if ($role_id != 8) { ?>
          <li><a href="<?php echo base_url(); ?>dashboard/settings"><i class="fas fa-cog"></i> Settings</a></li>
        <?php } ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>