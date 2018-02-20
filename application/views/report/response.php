<div class="bs-callout bs-callout-info">
    <h4>Create Response Report</h4>
    <p>On this page you can create a report of the risk responses for a given risk register.</p>
    <?php // echo "<p>". $risk_project_id; ."</p>" ?>
</div>

<div id="response-report-form">

    <?php
        $attributes = array("class" => "pure-form" ,"id" => "response=report-form", "name" => "response-report-form");
        echo form_open("report/getResponseFilterResults", $attributes);
    ?>
    
    <fieldset>
        <label for="risk_register">Risk Register</label>
        <?php 
            $select_register_attributes = '';
            if($selected_register != "None")
            {
                $select_register['None'] = "Select Option";
                echo form_dropdown('risk_register', $select_register, $selected_register, $select_register_attributes);
            }
            else 
            {
                $select_register['None'] = "Select Option";
                echo form_dropdown('risk_register',$select_register,"None",$select_register_attributes);
            }
        ?>

        <label for="general_user">Users</label>
        <?php 
            $select_user_attributes = '';
            if($selected_user != "None")
            {
                $select_user['None'] = "Select Option";
                echo form_dropdown('general_user', $select_user, $selected_user, $select_user_attributes);
            }
            else 
            {
                $select_user['None'] = "Select Option";
                echo form_dropdown('general_user',$select_user,"None",$select_user_attributes);
            }
        ?>
        <input name="btn_filter" type="submit" class="pure-button pure-button-primary btn-filter" value="Filter" />
    </fieldset>

    <?php echo form_close(); ?>

    <buttton id="generate-response-report" class="pure-button pure-button-primary btn-report">Generate Response Report</buttton>

    <?php if ($this->session->flashdata('msg')){ ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
    <?php } ?>
</div>
<?php 

    //  load risk model and trim library
    $CI =& get_instance();
    $CI->load->model('risk_model');
    $CI->load->model('user_model');
    
    // check if risk data exists
    if (!$response_data) 
    {
        $msg = 'There are no risk fitting this criteria';
        echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
    }
    else 
    { 
?>
        <div class="row">
            <div class="col-xs-12">
                <div style="margin-top:20px;" class="box">
                    <div class="box-header">
                        <h3 class="box-title">Responses</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Response ID</th>
                                    <th>Risk Name</th>
                                    <th>Response Title</th>
                                    <th>Risk Strategy</th>
                                    <th>Assigned User</th>
                                    <th>Register Name</th>
                                    <th>Date Created</th>    
                                </tr>
                            </thead>
                            <tbody id="response-report-data">
                                <?php
                                    foreach ($response_data as $response_row) 
                                    {
                                        echo "<tr>";
                                        echo "<td>".$response_row->response_id."</td>";
                                        echo "<td>".$CI->risk_model->getRiskNameByUUID($response_row->risk_uuid)."</td>";
                                        echo "<td>".$response_row->response_title."</td>";
                                        echo "<td>".$CI->risk_model->getRiskStrategiesName($response_row->RiskStrategies_strategy_id)."</td>";  
                                        echo "<td>".$CI->user_model->getUserNames($response_row->user_id)."</td>";
                                        echo "<td>".$CI->risk_model->getSubProjectName($response_row->register_id)."</td>";
                                        echo "<td>".$response_row->created_at."</td>";
                                    } 
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <?php 
                        if (isset($pagination_links)) { echo $pagination_links;}
                    ?>

                </div>
            </div>
        </div>
<?php 
    } 
?>