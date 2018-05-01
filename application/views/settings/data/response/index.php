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
    $project_name = $CI->project_model->getSingleProjectName( $project_id );
?>

<div class="row">
    <div class="col-md-12">
        <div class="reg-btn">
            <a href="/settings/data/response/add" class="btn btn-success btn-sm btn-add">Add Risk Response</a>
        </div>

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Risk Entity for <?php echo $project_name; ?> project</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
            <?php 
                if (!$response_data) {
                    $msg = 'You have no risk response to display for <strong>'.$project_name.'</strong> project!';
                    echo '<div class="alert alert-warning alert-aldea" role="alert">'.$msg.'</div>';
                } 
                else 
                { ?>

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Response Name</th>
                            <th>Action</th>
                        </tr>
                    
                        <?php
                            $count  = 0 ;
                            foreach ($response_data as $response_row) 
                            {
                                $count = $count + 1;
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$response_row->response_name."</td>";
                                echo "<td>
                                        <a class='fa-icon' title='edit' href='/settings/data/response/edit/".$response_row->response_id."'><i class='fa fa-pencil' aria-hidden='true'></i>
                                        <a class='fa-icon' title='delete' href='/settings/data/response/delete/".$response_row->response_id."'><i class='fa fa-trash' aria-hidden='true'></i>
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