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
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            
            <ul id="data-settings-tabs" class="nav nav-tabs">
                
            </ul>
            <div id="data-settings-tab-content" class="tab-content">
                
                <input type="hidden" name="project_id" id="project_id" class="form-control" value="<?php echo $project_id; ?>"/>
                <!-- alerts -->
                <div style="display: none;" id="data-setting-alert-warning" class="alert alert-warning fade in alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> Please fill the data name field!
                </div>

                <div style="display: none;" id="data-setting-alert-success" class="alert alert-success fade in alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> The data setting has been registered successfully!
                </div>

                <div style="display: none;" id="data-setting-alert-danger" class="alert alert-danger fade in alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                

            </div>
        <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->

        <!-- link to users registration page -->
        <a class="btn btn-default pull-right" href="<?php echo base_url(); ?>projectsetup/user/add">Next</a>
    </div>
</div>

<script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/datasettings.js"></script>