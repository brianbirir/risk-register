<?php
    $CI =& get_instance();
    $CI->load->model('role_model');
?>
<div class="row">
    <div class="col-md-12">
        <div class="reg-btn">
            <a href="/settings/user/add" class="btn btn-success btn-sm btn-add">Add User</a>
        </div>

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Users</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
            <?php
                if (!$user_data) {
                    $msg = 'You have no registered users!';
                    echo '<div class="alert alert-warning" role="alert">'.$msg.'</div>';
                }
                else
                { ?>

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                            $count  = 0 ;
                            foreach ($user_data as $user_row) {
                                $count = $count + 1;
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$user_row->first_name."</td>";
                                echo "<td>".$user_row->last_name."</td>";;
                                echo "<td>".$CI->role_model->getRoleName($user_row->Role_role_id)."</td>";
                                echo "<td>".$user_row->email."</td>";
                                echo "<td>".$user_row->username."</td>";
                                echo "<td>
                                        <a class='fa-icon' title='change-password' href='/settings/user/change-password/".$user_row->user_id."'><i class='fa fa-lock' aria-hidden='true'></i>
                                        <a class='fa-icon' title='edit' href='/settings/user/".$user_row->user_id."'><i class='fa fa-pencil' aria-hidden='true'></i>
                                        <a class='fa-icon' class='delete-action' data-toggle='confirmation' data-title='Delete Manager?' href='/settings/user/delete/".$user_row->user_id."'><i class='fa fa-trash' aria-hidden='true'></i>
                                    </td>";
                                echo "</tr>";
                            }
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
