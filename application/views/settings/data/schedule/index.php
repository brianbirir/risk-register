<!-- display alert messages -->
<?php if ($this->session->flashdata('positive-msg')){ ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('positive-msg'); ?></span>
  </div>
<?php } else if ($this->session->flashdata('negative-msg')) { ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span><?php echo $this->session->flashdata('negative-msg'); ?></span>
  </div>
<?php } ?>

<div class="row">
    <div class="col-md-12">
        <div class="reg-btn">
            <a href="/settings/data/schedule/add" class="btn btn-success btn-sm btn-add">Add Risk Schedule</a>
        </div>

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Risk Schedule</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
            <?php 
                if (!$schedule_data) {
                    $msg = 'You have no risk schedule to display!';
                    echo '<div class="alert alert-warning alert-aldea" role="alert">'.$msg.'</div>';
                } 
                else 
                { ?>

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Schedule Rating</th>
                            <th>Action</th>
                        </tr>
                    
                        <?php
                            $count  = 0 ;
                            foreach ($schedule_data as $schedule_row) 
                            {
                                $count = $count + 1;
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$schedule_row->schedule_rating."</td>";
                                echo "<td>
                                        <a class='fa-icon' title='edit' href='/settings/data/schedule/edit/".$schedule_row->schedule_id."'><i class='fa fa-pencil' aria-hidden='true'></i>
                                        <a class='fa-icon' title='delete' href='/settings/data/schedule/delete/".$schedule_row->schedule_id."'><i class='fa fa-trash' aria-hidden='true'></i>
                                    </td>";
                                echo "</tr>";
                            } 
                        } ?>
                    </tbody>
                <table>
            </div>

        </div>
    </div>
</div>