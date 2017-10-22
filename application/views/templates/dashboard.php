<!DOCTYPE html>
<html>

    <!-- Head -->
    <?php $this->load->view('partials/head'); ?>

    <!-- Body Section -->
    <body id="dasboard-body" class="sidebar-mini">

        <div class="wrapper">
            <!-- header -->
            <?php $this->load->view('partials/header'); ?>

              <!-- dashboard side bar -->
              <?php $this->load->view('partials/sidebar'); ?>

              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                	<h1><?php echo $title; ?><!-- <small>Control Panel</small> --></h1>
                	<ol class="breadcrumb">
                		<?php echo $breadcrumb; ?>
                	</ol>
                </section>
                <!-- Main content -->
                <section class="content">
                  <?php echo $body; ?>
                </section>
                <!-- /.content -->
              </div>
        </div>
        <!-- Custom js -->
	      <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/main.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/validate.js"></script>
    </body>