<?php

    $CI =& get_instance();
    $CI->load->model('response_model');

    // check if risk data exists
    if (!$risk_items) {
        $msg = 'There are no risk items for '. $CI->response_model->getResponseName($response_title_id);
        echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
    } else { ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $CI->response_model->getResponseName($response_title_id);?> Risks</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Risk ID</th>
                                <th>Risk Name</th>
                            </tr>
                            <?php
                                foreach ($risk_items as $risk_row) 
                                {
                                    echo "<tr>";
                                    echo "<td>".$risk_row->original_risk_id."</td>";
                                    echo "<td>".$risk_row->risk_title."</td>";
                                    echo "<td><a class='btn btn-success btn-xs btn-view' title='view' href='/dashboard/risk/".$risk_row->item_id."'>View Risk</a></td>";
                                } 
                            ?>
                        </tbody>
                    <table>
                </div>
            </div>
        </div>
    </div> <!-- end of decision statement -->

    <?php } ?>