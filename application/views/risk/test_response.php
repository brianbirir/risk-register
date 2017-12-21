<?php
    // load uuid generator library
    $CI =& get_instance();
    $CI->load->library('uuid');

    $risk_uuid = $CI->uuid->generate_uuid();
?>

<?php if ($this->session->flashdata('msg')){ ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div><?php echo $this->session->flashdata('msg'); ?></div>
    </div>
<?php } ?>

<!-- risk registration form -->
<div class="row">
    <div class="col-md-12">
        <div id="reg-risk-form">

            <?php
                $attributes = array("class" => "ui form", "id" => "risk-reg-form", "name" => "reg-risk-form");
                echo form_open("risk/register_response", $attributes);
            ?>

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Risk Responses</h3>
                </div>

                <div class="box-body table-responsive no-padding">
                    <div class="col-md-12">
                        <div id="add-response-btn" class="btn btn-primary pull-right" onclick="new_row()">Add Response</div>
                    </div>
                    <table class="table table-hover">
                        <tbody id="response-table-body">
                            <tr>
                                <th>Risk Response ID</th>
                                <th>Risk Response Title</th>
                                <th>Response Type</th>
                            </tr>
                            <tr id="response-row">
                                <td>
                                    <div class="form-group">
                                        <input size="8" class="form-control" name="risk_response[id][]" placeholder="Risk Response ID" type="text" value="<?php echo set_value('risk_reponse[id][]'); ?>" required/>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" name="risk_response[title][]" placeholder="Risk Response Title" type="text" value="<?php echo set_value('risk_reponse[title][]'); ?>" required/>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select name="risk_response[strategy][]" class="form-control">
                                            <?php 
                                                foreach ($select_strategy as $key => $value) {
                                                    echo "<option value=".$key.">".$value."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <input name="btn_reg_risk" type="submit" class="btn btn-success btn-reg pull-right" value="Add Risk" />

            <?php echo form_close(); ?>

        </div>
    </div>
</div>   
        