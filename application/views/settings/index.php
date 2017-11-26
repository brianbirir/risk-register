<div id="settings-page">
    <div class="row">

		<!-- user roles link -->
		<?php if ($role_id == 1) {
		
		?>
		
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default panel-dash-settings">
			  <div class="panel-body">
			   <h3><a href="/settings/role">Roles</a></h3>
			   <p>Manage the user roles</p>
			  </div>
			</div>
		</div>

		<?php } ?>
		
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default panel-dash-settings">
			  <div class="panel-body">
			   <h3><a href="/settings/users">Users</a></h3>
			   <p>Manage the users that access the risk register</p>
			  </div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default panel-dash-settings">
			  <div class="panel-body">
			   <h3><a href="/settings/data">Risk Data</a></h3>
			   <p>Management of fixed risk related data</p>
			  </div>
			</div>
		</div>

    </div>
</div>