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

<?php 
    $CI =& get_instance();
    $CI->load->model('project_model');
    $project_name = $CI->project_model->getSingleProjectName( $project_id );
?>

<div class="row">
    <div class="col-md-12">
        <div class="reg-btn">
            <a href="/settings/data/cost/add" class="btn btn-success btn-sm btn-add">Add Risk Cost</a>
        </div>

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Risk Cost for <?php echo $project_name; ?> project</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
            <?php 
                if (!$cost_data) {
                    $msg = 'You have no risk cost to display for <strong>'.$project_name.'</strong> project!';
                    echo '<div class="alert alert-warning alert-aldea" role="alert">'.$msg.'</div>';
                } 
                else 
                { ?>

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Cost Rating</th>
                            <th>Cost Description</th>
                            <th>Action</th>
                        </tr>
                    
                        <?php
                            foreach ($cost_data as $cost_row) 
                            {
                                echo "<tr>";
                                echo "<td>".$cost_row->cost_rating."</td>";
                                echo "<td>".$cost_row->cost_description."</td>";
                                echo "<td>
                                        <a class='fa-icon' title='edit' href='/settings/data/cost/edit/".$cost_row->cost_id."'><i class='fa fa-pencil' aria-hidden='true'></i>
                                        <a class='fa-icon' title='delete' href='/settings/data/cost/delete/".$cost_row->cost_id."'><i class='fa fa-trash' aria-hidden='true'></i>
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