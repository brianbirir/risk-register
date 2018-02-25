<!DOCTYPE html>
<html>

    <!-- Head -->
    <?php $this->load->view('partials/head'); ?>

    <!-- Body Section -->
    <body id="dasboard-body" class="hold-transition sidebar-mini">

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
        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/adminlte.min.js"></script>
        
        <!-- Vendor JS -->
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/bower_components/moment/moment.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/bower_components/chart.js/Chart.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/bower_components/iCheck/icheck.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/bootstrap-confirmation.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
        
        <!-- Custom js -->
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/main.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/filter.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/date.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/validate.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/register-tabs.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/confirmation.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/select.js"></script>
    </body>