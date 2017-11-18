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


<!-- view user roles -->
<div class="row">
    <div class="col-md-9">
        <div class="reg-btn">
            <a href="/settings/role/add" class="btn btn-success btn-sm">Add User Role</a>
        </div>

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">User Roles</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
        </div>

            <div class="box-body table-responsive no-padding">
            <?php 
                if (!$role_data) {
                    $msg = 'You have no registered user roles!';
                    echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
                } 
                else 
                { ?>

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Role Name</th>
                            <th>Role Description</th>
                            <th>Actions</th>
                        </tr>
                    
                        <?php
                            $count  = 0 ;
                            foreach ($role_data as $role_row) {
                                $count = $count + 1;
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$role_row->role_name."</td>";
                                echo "<td>".$role_row->role_description."</td>";
                                echo "<td>
                                        <a title='edit role' href='/settings/role/".$role_row->role_id."'><i class='fa fa-pencil' aria-hidden='true'></i>
                                        <a title='edit role' href='/settings/role/delete/".$role_row->role_id."'><i class='fa fa-trash' aria-hidden='true'></i>
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