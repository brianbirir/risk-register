<div class="view-projects">

    <?php if ($this->session->flashdata('msg')){ ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
    <?php } ?>

    <!-- display project updating alert messages -->
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
        <a href="/dashboard/project/add" class="btn btn-success btn-sm btn-add-device">Add Project</a>
    </div>

    <?php
        // check if device data exists
        if (!$project_data) {
            $msg = 'You have no registered projects!';
            echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
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
                                <th>Project Name</th>
                                <th>Project Description</th>
                                <th>Created On</th>
                                <th>Updated On</th>
                            </tr>
                            <?php
                                foreach ($project_data as $project_row) {
                                    echo "<tr>";
                                    echo "<td>".$project_row->project_name."</td>";
                                    echo "<td>".$project_row->project_description."</td>";
                                    echo "<td>".$project_row->created_at."</td>";
                                    echo "<td>".$project_row->updated_at."</td>";
                                    echo "</tr>";
                                } 
                            } ?>
                        </tbody>
                    <table>
                </div>
            </div>
        </div>
    </div> <!-- end of decision statement -->
