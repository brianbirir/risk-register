<!-- modal for displaying form to add new responses to editing page -->
<div class="modal fade" id="response-modal" tabindex="-1" role="dialog" aria-labelledby="ResponseLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Response</h4>
              </div>
              <div class="modal-body">

                <div style="display: none;" id="response-alert-warning" class="alert alert-warning fade in" role="alert">
                    <strong>Warning!</strong> Please fill the response field!
                </div>

                <div style="display: none;" id="response-alert-success" class="alert alert-success fade in" role="alert">
                    <strong>Success!</strong> The response has been registered successfully!
                </div>

                <div style="display: none;" id="response-alert-danger" class="alert alert-danger fade in" role="alert">
                </div>

                <?php
                    $attributes = array("class" => "ui form", "id" => "response-title-form", "name" => "response-title-form");
                    echo form_open("", $attributes);
                ?>

                    <?php
                        /** check if response titles exist for this given risk register
                         * if not display input text field
                         * if they do exist display select drop down of those response titles
                         */
                        if(!$select_response_name)
                        {
                    ?>
                    
                        <div class="form-group form-response-title">
                            <input class="form-control" name="risk_response_title" placeholder="Risk Response Title" type="text" value="<?php echo set_value('risk_reponse_title'); ?>" required/>
                        </div>
                    
                    <?php } else { ?>
                    
                        <div class="form-group form-response-title">
                            <select id="response-title-edit" name="risk_response_title" class="form-control response-edit response-title-edit">
                                <?php
                                    foreach ($select_response_name as $key => $value)
                                    {
                                        echo "<option value=".$key.">".$value."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    
                    
                        <!-- button for adding response title to drop down -->
                        <!-- <button type="button" class="btn btn-default btn-xs btn-reg" data-toggle="modal" data-target="#response-title-modal">Add Response</button> -->
                
                    <?php } ?>
                    
                        <div class="form-group">
                            <select id="response-strategy-edit" name="risk_response_strategy" class="form-control response-edit response-strategy-edit">
                                <?php
                                    foreach ($select_strategy as $key => $value)
                                    {
                                        echo "<option value=".$key.">".$value."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <select id="response-user-edit" name="risk_response_user" class="form-control response-edit response-user-edit">
                                <?php
                                    foreach ($select_user as $key => $value)
                                    {
                                        echo "<option value=".$key.">".$value."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input id="response-date-edit" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control risk-date" name="risk_response_date" placeholder="Risk Response Date" type="text" value="<?php echo set_value('risk_reponse_date'); ?>" required/>
                            </div>
                        </div>
                <?php echo form_close(); ?>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="add-response" type="button" class="btn btn-primary btn-reg">Add Response</button>
              </div>
              
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->