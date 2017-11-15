<!-- view user roles -->

<div class="row">
    <div class="col-md-9">
        <div class="reg-btn">
            <a href="/dashboard/riskregister/add" class="btn btn-success btn-sm btn-add-device">Add User Role</a>
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
                            <th>Role Name</th>
                            <th>Role Description</th>
                        </tr>
                    
                        <?php
                            $count  = 0 ;
                            foreach ($role_data as $role_row) {
                                $count = $count + 1;
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$role_row->role_name."</td>";
                                echo "<td>.$role_row->role_description.</td>";
                                echo "</tr>";
                            } 
                        } ?>
                    </tbody>
                <table>
            </div>

        </div>
    </div>
</div>