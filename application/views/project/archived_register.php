<!-- view project -->

<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">About Project</h3>
            </div>

            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Project Name</strong>
                <p class="text-muted"><?php echo $project_name; ?></p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Project Description</strong>
                <p class="text-muted"><?php echo $project_description; ?></p>

            </div>
        </div>
    </div>

    <div class="col-md-9">

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

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Archived Risk Register</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
            <?php
                if (!$subproject_data) {
                    $msg = 'You have no archived risk registers!';
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
                            foreach ($subproject_data as $subproject_row) {
                                $count = $count + 1;
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$subproject_row->name."</td>";
                            }
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
