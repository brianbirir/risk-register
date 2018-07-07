<div class="view-projects">

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
        // check if device data exists
        if (!$project_data) {
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
        <div class="col-xs-6">
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
                            </tr>
                            <?php
                                $count  = 0 ;
                                foreach ($project_data as $project_row) {
                                    $count = $count + 1;
                                    echo "<tr>";
                                    echo "<td>".$count."</td>";
                                    echo "<td>".$project_row->project_name."</td>";
                                    echo "<td>".$project_row->project_description."</td>";
                                } 
                            } ?>
                        </tbody>
                    <table>
                </div>
            </div>
        </div>
    </div> <!-- end of decision statement -->
