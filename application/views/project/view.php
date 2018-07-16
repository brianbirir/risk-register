<!-- view project -->

<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">About Project</h3>
                <a href="/dashboard/project/edit/<?php echo $project_id; ?>" class="btn btn-default btn-reg btn-xs pull-right">Edit Project</a>
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

        <div class="reg-btn">
            <a href="/dashboard/riskregister/add" class="btn btn-success btn-sm btn-add">Add Risk Register</a>
            <a href="/dashboard/riskregister/archived/<?php echo $project_id; ?>" class="btn btn-success btn-sm btn-add">Archived Registers</a>
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
                if (!$subproject_data) {
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
                            <th>Action</th>
                        </tr>
                    
                        <?php
                            $count  = 0 ;
                            foreach ($subproject_data as $subproject_row) {
                                $count = $count + 1;
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$subproject_row->name."</td>";
                                echo "<td>
                                <a href='/dashboard/riskregister/".$subproject_row->subproject_id."' class='btn btn-xs btn-primary btn-view'>View</a>
                                <a href='/dashboard/riskregister/edit/".$subproject_row->subproject_id."' class='btn btn-xs btn-primary btn-view'>Edit</a>
                                <a data-toggle='confirmation' data-title='Archive Register?'  href='/dashboard/riskregister/delete/".$subproject_row->subproject_id."' class='btn btn-xs btn-primary btn-view'>Delete</a>
                                <a href='/dashboard/riskregister/duplicate/".$subproject_row->subproject_id."' class='btn btn-success btn-xs btn-view'>Duplicate</a>
                                <a href='/dashboard/riskregister/assign_user/".$subproject_row->subproject_id."' class='btn btn-success btn-xs btn-view'><i class='fas fa-user fa-xs'></i> Assign User</a></td>";
                                echo "</tr>";
                            } 
                        } ?>
                    </tbody>
                <table>
            </div>

        </div>
    </div>

</div>