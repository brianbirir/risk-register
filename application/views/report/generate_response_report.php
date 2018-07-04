<div class="bs-callout bs-callout-info">
    <p>Generate reponse report using the filter fields below. The report will be downloaded as a CSV file that is readable using Microsoft Excel.</p>
</div>

<div class="row">
    <div class="col-md-6">
        <div id="report-form">

            <?php
                $attributes = array("class" => "" ,"id" => "report-form", "name" => "report-form");
                echo form_open("response/export_report", $attributes);
            ?>

            <div class="form-group">
                <label for="risk_register">Risk Register</label>
                <?php
                    $select_register_attributes = 'id="select-register" class="form-control"';
                    if($selected_register != 'none')
                    {
                        $select_register['none'] = "Select Option";
                        echo form_dropdown('risk_register', $select_register, $selected_register, $select_register_attributes);
                    }
                    else
                    {
                        $select_register['none'] = "Select Option";
                        echo form_dropdown('risk_register',$select_register,'none',$select_register_attributes);
                    }
                ?>
            </div>

            <div class="form-group">

                <label for="general_user">Users</label>
                <?php
                    $select_user_attributes = 'id="select-user" class="form-control"';
                    if($selected_user != 'none')
                    {
                        $select_user['none'] = "Select Option";
                        echo form_dropdown('general_user', $select_user, $selected_user, $select_user_attributes);
                    }
                    else
                    {
                        $select_user['none'] = "Select Option";
                        echo form_dropdown('general_user',$select_user,'none',$select_user_attributes);
                    }
                ?>

            </div>

            <input name="btn_report_download" type="submit" class="btn btn-default btn-filter" value="Download Response Report" />

            <?php echo form_close(); ?>

            
            <!-- <button id="generate-report" class="btn btn-sm btn-report">Download Report</button> -->
        </div>
    </div>
</div>