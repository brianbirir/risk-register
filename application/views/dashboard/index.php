<?php if ($this->session->flashdata('positive-msg')){ ?>
	<div class="alert alert-success alert-dismissible" role="alert">
	 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  	<span><?php echo $this->session->flashdata('positive-msg'); ?></span>
	</div>
<?php }?>

<div class="dashboard-data">
	<section class="content">

	    <div class="row">
    		<div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-aqua"><i class="fa fa-tag"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Projects</span>
	              <span class="info-box-number"><?php echo $project_numbers?></span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>

	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Sub-Projects</span>
	              <span class="info-box-number"><?php echo $subproject_numbers?></span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>

	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-aqua"><i class="fa fa-flash"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Risks</span>
	              <span class="info-box-number"><?php echo $risk_numbers?></span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
		</div>

	</section>
</div>
