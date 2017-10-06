<nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- right menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <!-- Messages Menu -->
            <?php $this->load->view('partials/navigation/messages'); ?>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <?php $this->load->view('partials/navigation/notifications'); ?>

          <!-- Tasks Menu -->
          <?php $this->load->view('partials/navigation/task'); ?>

          <!-- User Account Menu -->
          <?php $this->load->view('partials/navigation/useraccount'); ?>

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
</nav>
