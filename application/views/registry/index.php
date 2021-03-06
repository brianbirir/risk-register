<!-- display alert messages -->
<?php if ($this->session->flashdata('positive_msg')){ ?>
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('positive_msg'); ?></span>
    </div>
<?php } else if ($this->session->flashdata('negative_msg')) { ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('negative_msg'); ?></span>
    </div>
<?php } ?>

<!-- view all risk registers -->
<div class="row">
    <div class="col-md-12">

        <!-- ensures general user does not view the Add button for adding a register -->
        <?php 
            if($role_id != 8)
            {
        ?>
                <div class="reg-btn">
                    <a href="/dashboard/riskregister/add" class="btn btn-success btn-sm btn-add">Add Risk Register</a>
                </div>
        <?php 
            }
        ?>

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Risk Register</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
            <?php 
                if (!$riskregister_data)
                {
                    if($role_id != 8)
                    {
                        $msg = 'You have no registered risk registers!';
                        echo '<div style="margin: 10px;"><div class="alert alert-warning" role="alert">'.$msg.'</div></div>';
                    }
                    else 
                    {
                        $msg = 'You have not been assigned a risk register! Please contact administrator.';
                        echo '<div style="margin: 10px;"><div class="alert alert-warning" role="alert">'.$msg.'</div></div>';
                    }
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