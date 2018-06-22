<div class="bs-callout bs-callout-info">
    <p>Generate report using the filter fields below. The report will be downloaded as a CSV file that is readable using Microsoft Excel.</p>
</div>

<div class="row">
    <div class="col-md-6">
        <div id="report-form">

            <?php
                $attributes = array("class" => "" ,"id" => "report-form", "name" => "report-form");
                echo form_open("report/export_report", $attributes);
            ?>

            <div class="form-group">
                <!-- date -->
                <label for="date_from">From:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input data-date-orientation="bottom" data-date-format="yyyy-mm-dd" name="date_from" type="text" class="form-control datepicker" id="datepicker-from">
                </div>
            </div>

            <div class="form-group">
                <!-- date -->
                <label for="date_to">To:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input data-date-orientation="bottom" data-date-format="yyyy-mm-dd" name="date_to" type="text" class="form-control datepicker" id="datepicker-to">
                </div>
            </div>

            <div class="form-group">
                <label for="risk_register">Risk Register</label>
                <?php 
                    $select_register_attributes = 'id="risk-register", class="form-control"';
                    if($selected_register != "none")
                    {
                        $select_register['none'] = "Select Option";
                        echo form_dropdown('risk_register', $select_register, $selected_register, $select_register_attributes);
                    }
                    else 
                    {
                        $select_register['none'] = "Select Option";
                        echo form_dropdown('risk_register',$select_register,"none",$select_register_attributes);
                    }
                ?>
            </div>

            <div class="form-group">
                <label for="risk_category">Risk Category</label>
                <?php 
                    $select_main_category_attributes = 'id="risk-category", class="form-control"';
                    
                    if($selected_category != "none")
                    {
                        $select_category['none'] = "Select Option";
                        echo form_dropdown('risk_category', $select_category, $selected_category, $select_main_category_attributes);
                    }
                    else 
                    {
                        $select_category['none'] = "Select Option";
                        echo form_dropdown('risk_category',$select_category,"none",$select_main_category_attributes);
                    }
                ?>
            </div>

            <input name="btn_report_download" type="submit" class="pure-button pure-button-primary btn-filter" value="Download Report" />

            <?php echo form_close(); ?>

            
            <!-- <button id="generate-report" class="btn btn-sm btn-report">Download Report</button> -->
        </div>
    </div>
</div>