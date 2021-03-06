<div class="view-projects">

    <?php if ($this->session->flashdata('msg')){ ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
    <?php } ?>

    <!-- display project updating/ archiving alert messages -->
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

    <?php
        $session_data = $this->session->userdata('logged_in');

        if(empty($session_data['project_name'])) {
    ?>

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fas fa-exclamation-triangle"></i> Alert!</h4>
        In order to add risk items, please select a project first.
    </div>

    <?php } ?>

    <!-- ensures general user does not view the Add button -->
    <?php
        if($role_id != 8)
        {
    ?>

    <div class="reg-btn">
        <a href="/dashboard/project/add" class="btn btn-success btn-sm btn-add">Add Project</a>
        <a href="/dashboard/project/archived" class="btn btn-success btn-sm btn-add">View Deleted Projects</a>
    </div>

    <?php
        }
    ?>

        <?php
        // check if device data exists
        if (!$project_data) 
        {
            if($role_id != 8)
            {
                $msg = 'You have no registered projects!';
                echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
            }
            else
            {
                $msg = 'You have not been assigned a project! Please contact administrator.';
                echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
            }
        } else { ?>

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Project</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>No.</th>
                                        <th>Project Name</th>
                                        <th>Project Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php
                                        $count  = 0 ;
                                        foreach ($project_data as $project) {
                                            foreach ($project as $project_row ) {
                                                $count = $count + 1;
                                                echo "<tr>";
                                                echo "<td>".$count."</td>";
                                                echo "<td>".$project_row->project_name."</td>";
                                                echo "<td>".$project_row->project_description."</td>";

                                                if ($role_name != "General User") 
                                                {
                                                    echo "<td>
                                                    <a href='/dashboard/project/".$project_row->project_id."' class='btn btn-xs btn-primary btn-view'>View</a>
                                                    <a href='/dashboard/project/edit/".$project_row->project_id."' class='btn btn-xs btn-primary btn-view'>Edit</a>
                                                    <a data-toggle='confirmation' data-title='Delete Project?'  href='/dashboard/project/delete/".$project_row->project_id."' class='btn btn-xs btn-primary btn-view'>Delete</a></td>";
                                                } else 
                                                {
                                                    echo "<td>
                                                    <a href='/dashboard/project/".$project_row->project_id."' class='btn btn-xs btn-primary btn-view'>View</a></td>";
                                                }
                                                echo "</tr>";
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
</div>
