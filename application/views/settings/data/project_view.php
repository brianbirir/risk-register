<?php if ($this->session->flashdata('positive_msg')){ ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div><?php echo $this->session->flashdata('positive_msg'); ?></div>
    </div>
<?php } ?>

<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>
    Add data settings for the newly added project <strong><?php echo $project_name; ?></strong>
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