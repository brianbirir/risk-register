<!-- display updating alert messages -->
<?php if ($this->session->flashdata('positive-msg')){ ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('positive-msg'); ?></span>
  </div>
<?php } else if ($this->session->flashdata('negative-msg')) { ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('negative-msg'); ?></span>
  </div>
<?php } ?>

<!-- edit response form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="response-edit-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "response-edit-form", "name" => "response-edit-form");
                echo form_open("response/update_response", $attributes);
            ?>        

            <input type="hidden" name="response_id" id="response_id" class="form-control" value="<?php echo $response->response_id; ?>"/>

            <div class="form-group">
                <label for="response_name">Response Name</label>
                <input class="form-control" name="response_name" placeholder="Response Name" type="text" value="<?php echo $response->response_name; ?>" />
                <?php echo form_error('response_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="main_category">Project</label>
                <?php 
                    $select_project_name_attributes = 'class="form-control" required disabled';
                    $project_id = $response->Project_project_id;
                    echo form_dropdown( 'main_category', $select_project, $project_id, $select_project_name_attributes );
                ?>
            </div>

            <input name="btn_reg_response" type="submit" class="btn btn-default btn-reg" value="Update Response" />

            <?php echo form_close(); ?>

            <?php if ($this->session->flashdata('msg')){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div><?php echo $this->session->flashdata('msg'); ?></div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>