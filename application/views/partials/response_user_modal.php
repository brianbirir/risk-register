<?php 
    $CI =& get_instance();
    $CI->load->model('project_model');
    $register_row = $CI->project_model->getManagerRegisterName( $risk->Subproject_subproject_id );
?>


<!-- modal for displaying form to add new responses to editing page -->
<div class="modal fade" id="response-user-modal" tabindex="-1" role="dialog" aria-labelledby="ResponseUserLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Response User</h4>
              </div>
              <div class="modal-body">

                <div style="display: none;" id="response-user-alert-warning" class="alert alert-warning fade in" role="alert">
                    <strong>Warning!</strong> Please fill all the fields!
                </div>

                <div style="display: none;" id="response-user-alert-success" class="alert alert-success fade in" role="alert">
                    <strong>Success!</strong> The response user has been registered successfully! The page will reload in 5 seconds.
                </div>

                <div style="display: none;" id="response-user-alert-danger" class="alert alert-danger fade in" role="alert">
                </div>

                <?php 
                $attributes = array("class" => "ui form", "id" => "signupform", "name" => "signupform");
                echo form_open("user/register", $attributes);
                ?>
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input id="first-name" class="form-control" name="first_name" placeholder="First Name" type="text" value="<?php echo set_value('first_name'); ?>" />
                        <?php echo form_error('first_name','<div class="alert alert-danger">','</div>'); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input id="last-name" class="form-control" name="last_name" placeholder="Last Name" type="text" value="<?php echo set_value('last_name'); ?>" />
                        <?php echo form_error('last_name','<div class="alert alert-danger">','</div>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input id="user-name" class="form-control" name="username" placeholder="User Name" type="text" value="<?php echo set_value('username'); ?>" />
                        <?php echo form_error('username','<div class="alert alert-danger">','</div>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email-address" class="form-control" name="email" placeholder="Email Address" type="text" value="<?php echo set_value('email'); ?>" />
                        <?php echo form_error('email','<div class="alert alert-danger">','</div>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="sub_project">Risk Register</label>
                        <div class="well well-sm"><?php echo $register_row->name; ?></div>
                    </div>
                <?php echo form_close(); ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="add-response-user" type="button" class="btn btn-primary btn-reg">Add Response User</button>
              </div>
              
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->