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
            <a href="/settings/data/add/<?php echo $data_type;?>" class="btn btn-success btn-sm btn-add">Add <?php echo $title; ?></a>
        </div>

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $title." Data for ".$project_name; ?> Project</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
            <?php 
                if (!$risk_data)
                {
                    $msg = 'You have no risk data to display for <strong>'.$project_name.'</strong> project!';
                    echo '<div class="alert alert-warning alert-aldea" role="alert">'.$msg.'</div>';
                } 
                else 
                { ?>

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th><?php $title?> Name</th>
                            <th>Action</th>
                        </tr>
                    
                        <?php
                            $count  = 0 ;
                            foreach ($risk_data as $risk_data_row) 
                            {
                                $count = $count + 1;
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$risk_data_row->name."</td>";
                                echo "<td>
                                        <a class='fa-icon' title='edit' href='/settings/data/edit/".$data_type."/".$risk_data_row->id."'><i class='fas fa-edit' aria-hidden='true'></i>
                                        <a class='fa-icon' title='delete' href='/settings/data/delete/".$data_type."/".$risk_data_row->id."'><i class='fas fa-trash' aria-hidden='true'></i>
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