<!-- view all risk registers -->
<div class="row">
    <div class="col-md-9">
        <div class="reg-btn">
            <a href="/dashboard/riskregister/add" class="btn btn-success btn-sm btn-add-device">Add Risk Register</a>
        </div>

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Risk Register</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
            <?php 
                if (!$riskregister_data) {
                    $msg = 'You have no registered risk registers!';
                    echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
                } 
                else 
                { ?>

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>No.</th>
                            <th>Risk Register</th>
                        </tr>
                    
                        <?php
                            $count  = 0 ;
                            foreach ($riskregister_data as $riskregister_row) {
                                $count = $count + 1;
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$riskregister_row->name."</td>";
                                echo "<td><a href='/dashboard/riskregister/".$riskregister_row->subproject_id."' class='btn btn-xs btn-primary'>View Risk Register</a></td>";
                                echo "<td><span class='glyphicon glyphicon-align-left' aria-hidden='true'></span></td>";
                                echo "</tr>";
                            } 
                        } ?>
                    </tbody>
                <table>
            </div>

        </div>
    </div>
</div>