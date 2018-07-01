<?php if ($this->session->flashdata('positive_msg')){ ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div><?php echo $this->session->flashdata('positive_msg'); ?></div>
    </div>
<?php } ?> 

<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>
    <p>Add data settings for <strong><?php echo $project_name; ?></strong>.</p>
</div>

<?php 
    $session_data = $this->session->userdata('logged_in');
?>

<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Missing Project Settings</h3>
    </div>

    <div class="box-body">
        <p>This project is missing the following settings. Please complete them in order to proceed to view the project's details.</p>
        <?php
            foreach ($session_data as $key => $value) {
                foreach ($session_data['tbl_no_project_settings'] as $project_settings_tbl)
                {
                    echo "<span class='label label-warning project-settings-label'>".$project_settings_tbl."</span>";
                }
                break;
            }
        ?>
    </div>
</div>

<div style="display: none;" id="response-modal-alert-warning" class="alert alert-warning fade in" role="alert">
    <strong>Warning!</strong> Please fill the response title field!
</div>

<div class="row">
    <div class="col-md-3">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Project Settings</h3>
            </div>
            <div class="box-body">
                <div id="project-settings-list" class="list-group">

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Settings Data</h3>
                <div class ="pull-right">
                    <button type="button" class="btn btn-default btn-reg btn-xs" data-toggle="modal" data-target="#project-setting-modal">Add Project Setting</button>
                </div>
            </div>
            <div class="box-body">

                <!-- data table -->
                <table id="project-settings-tbl" class="table table-responsive table-bordered table-hover dataTable">
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<form>
    <input type="hidden" name="project_id" id="project_id" class="form-control" value="<?php echo $project_id; ?>"/> 
</form>


<!-- Small modal: project setting form -->

<div id="project-setting-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Project Setting</h4>
      </div>
      <div class="modal-body">

            <!-- alerts --> 
            <div style="display: none;" id="data-setting-alert-warning" class="alert alert-warning fade in alert-dismissible" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                <strong>Warning!</strong> Please fill the name field! 
            </div>

            <div style="display: none;" id="data-setting-alert-success" class="alert alert-success fade in alert-dismissible" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                <strong>Success!</strong> The data setting has been registered successfully! 
            </div>

            <div style="display: none;" id="data-setting-alert-danger" class="alert alert-success fade in alert-dismissible" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                <strong>Error!</strong> Unable to save! 
            </div>

            <div id="project-setting-modal-body"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="register-project-setting" type="button" class="btn btn-primary">Register Setting</button>
      </div>
    </div>
  </div>
</div>

<script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/datasettings.js"></script>