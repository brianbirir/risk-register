<!DOCTYPE html>

<html>
    <!-- Head -->
    <?php
        $this->load->view('partials/head');
    ?>

    <body>

        <div class="ui container">
            <!-- Navigation -->
            <?php $this->load->view('partials/front_nav'); ?>

            <?php echo $body; ?>

            <!-- login modal -->
            <?php $this->load->view('partials/login_modal'); ?>

            <div class="row">
      	    	<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
      	     		<!-- Footer -->
      	    		<?php $this->load->view('partials/footer'); ?>
      	    	</div>
            </div>

        </div>
    </body>
</html>
