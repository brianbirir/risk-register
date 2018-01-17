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

<?php 
    $CI =& get_instance();
    $CI->load->model('project_model');
?>

<div class="row">
    <div class="col-md-12">
        <div class="reg-btn">
            <a href="/settings/data/materialization/add" class="btn btn-success btn-sm">Add Risk Materialization</a>
        </div>

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Risk Materialization</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
            <?php 
                if (!$materialization_data) {
                    $msg = 'You have no risk materialization to display!';
                    echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
                } 
                else 
                { ?>

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Materialization Name</th>
                            <th>Project</th>
                            <th>Action</th>
                        </tr>
                    
                        <?php
                            $count  = 0 ;
                            foreach ($materialization_data as $materialization_row) 
                            {
                                $count = $count + 1;
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$materialization_row->materialization_name."</td>";
                                echo "<td>".$CI->project_model->getSingleProjectName( $materialization_row->Project_project_id )."</td>";
                                echo "<td>
                                        <a title='edit' href='/settings/data/materialization/edit/".$materialization_row->materialization_id."'><i class='fa fa-pencil' aria-hidden='true'></i>
                                        <a title='delete' href='/settings/data/materialization/delete/".$materialization_row->materialization_id."'><i class='fa fa-trash' aria-hidden='true'></i>
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