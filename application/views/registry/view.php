<!-- view risk register -->
<?php 
    $CI =& get_instance();
    $CI->load->model('risk_model');
    $CI->load->model('user_model');
?>

<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">About Risk Register</h3>
            </div>

            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Risk Register Name</strong>
                <p class="text-muted"><?php echo $register_name; ?></p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Risk Register Description</strong>
                <p class="text-muted"><?php echo $register_description; ?></p>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="reg-btn">
        <a href="/dashboard/risk/add" class="btn btn-success btn-sm btn-add-device">Add Risk Item</a>
        <a href="/dashboard/risks/archived" class="btn btn-warning btn-sm btn-add-device">View Archived Risks</a>
    </div>

    <?php 
        if($role_id != 8)
        {
    ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" role="tablist" id="register-tabs">
            <li class="active">
                <a href="#tab_1" data-toggle="tab" aria-expanded="true">My Risks</a>
            </li>
            <li>
                <a href="#tab_2" data-toggle="tab" aria-expanded="true">Users' Risks</a>
            </li>
        </ul>

        <div class="tab-content">
            <?php 
                if (!$risk_data)
                {
                    echo '<div role="tabpanel" class="tab-pane active" id="tab_1">';
                    $msg = 'You have no risks for this register!';
                    echo '<div style="margin: 10px;"><div class="alert alert-warning" role="alert">'.$msg.'</div></div>';
                    echo '</div>'; // close tab pane
                } 
                else 
                { ?>
                    <div role="tabpanel" class="tab-pane active" id="tab_1">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>UUID</th>
                                    <th>Title</th>
                                    <th>Main Category</th>
                                    <!-- <th>Identified Hazard/ Risk</th> -->
                                    <th>Actions</th>
                                </tr>
                                <?php
                                    foreach ($risk_data as $risk_row) 
                                    {
                                        echo "<tr>";
                                        echo "<td width=300>".$risk_row->risk_uuid."</td>";
                                        echo "<td width=300>".$risk_row->risk_title."</td>";
                                        //echo "<td>".$CI->risk_model->getSubProjectName($risk_row->Subproject_subproject_id)."</td>";
                                        echo "<td width=400>".$CI->risk_model->getRiskCategoryName($risk_row->RiskCategories_category_id)."</td>";
                                        // echo "<td>".$risk_row->identified_hazard_risk."</td>";
                                        // echo "<td><a href='/dashboard/risk/".$risk_row->item_id."' class='btn btn-primary btn-xs'>View</td>";
                                        echo "<td>
                                            <span><a title='view' href='/dashboard/risk/".$risk_row->item_id."'><i class='fa fa-eye' aria-hidden='true'></i></a></span>
                                            <span><a title='edit' href='/dashboard/risk/edit/".$risk_row->item_id."'><i class='fa fa-pencil' aria-hidden='true'></i></a></span>
                                            <span><a title='archive' href='/dashboard/risk/archive/".$risk_row->item_id."'><i class='fa fa-trash' aria-hidden='true'></i></a></span>
                                                </td>";
                                        echo "</tr>";
                                    } 
                            ?>
                            </tbody>
                        <table>
                    </div>
                <?php } ?>       
            <?php 
            if (!$user_risk_data)
            {
                echo '<div role="tabpanel" class="tab-pane" id="tab_2">';
                $msg = 'Your users have no risks for this register!';
                echo '<div style="margin: 10px;"><div class="alert alert-warning" role="alert">'.$msg.'</div></div>';
                echo '</div>'; // close tab pane
            } 
            else 
            { ?>
            <div role="tabpanel" class="tab-pane" id="tab_2">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>UUID</th>
                            <th>Title</th>
                            <th>Main Category</th>
                            <th>Owner</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                            foreach ($user_risk_data as $users_risk_row) 
                            {
                                echo "<tr>";
                                echo "<td width=300>".$users_risk_row->risk_uuid."</td>";
                                echo "<td width=300>".$users_risk_row->risk_title."</td>";
                                echo "<td width=400>".$CI->risk_model->getRiskCategoryName($users_risk_row->RiskCategories_category_id)."</td>";
                                echo "<td>".$CI->user_model->getUserNames($users_risk_row->User_user_id)."</td>";
                                echo "<td><span><a title='view' href='/dashboard/risk/".$users_risk_row->item_id."'><i class='fa fa-eye' aria-hidden='true'></i></a></span></td>";
                                echo "</tr>";
                            } 
                        ?>
                    </tbody>
                <table>
            </div> 
            <?php }?>
        </div>
    </div>
    
    <?php } else { ?>                           
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" role="tablist" id="register-tabs">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab" aria-expanded="true">My Risks</a>
                </li>
            </ul>

            <div class="tab-content">
                <?php 
                    if (!$risk_data)
                    {
                        echo '<div role="tabpanel" class="tab-pane active" id="tab_1">';
                        $msg = 'You have no risks for this register!';
                        echo '<div style="margin: 10px;"><div class="alert alert-warning" role="alert">'.$msg.'</div></div>';
                        echo '</div>'; // close tab pane
                    } 
                    else 
                    { ?>
                        <div role="tabpanel" class="tab-pane active" id="tab_1">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>UUID</th>
                                        <th>Title</th>
                                        <th>Main Category</th>
                                        <!-- <th>Identified Hazard/ Risk</th> -->
                                        <th>Actions</th>
                                    </tr>
                                    <?php
                                        foreach ($risk_data as $risk_row) 
                                        {
                                            echo "<tr>";
                                            echo "<td width=300>".$risk_row->risk_uuid."</td>";
                                            echo "<td width=300>".$risk_row->risk_title."</td>";
                                            //echo "<td>".$CI->risk_model->getSubProjectName($risk_row->Subproject_subproject_id)."</td>";
                                            echo "<td width=400>".$CI->risk_model->getRiskCategoryName($risk_row->RiskCategories_category_id)."</td>";
                                            // echo "<td>".$risk_row->identified_hazard_risk."</td>";
                                            // echo "<td><a href='/dashboard/risk/".$risk_row->item_id."' class='btn btn-primary btn-xs'>View</td>";
                                            echo "<td>
                                                <span><a title='view' href='/dashboard/risk/".$risk_row->item_id."'><i class='fa fa-eye' aria-hidden='true'></i></a></span>
                                                <span><a title='edit' href='/dashboard/risk/edit/".$risk_row->item_id."'><i class='fa fa-pencil' aria-hidden='true'></i></a></span>
                                                <span><a title='archive' href='/dashboard/risk/archive/".$risk_row->item_id."'><i class='fa fa-trash' aria-hidden='true'></i></a></span>
                                                    </td>";
                                            echo "</tr>";
                                        } 
                                ?>
                                </tbody>
                            <table>
                        </div>
                <?php } ?>       
            </div>
        </div>
    <?php } ?>
    </div>
</div>