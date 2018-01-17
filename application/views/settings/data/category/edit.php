<!-- display updating alert messages -->
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

<!-- edit category form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="category-edit-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "category-edit-form", "name" => "category-edit-form");
                echo form_open("category/update_category", $attributes);
            ?>        

            <input type="hidden" name="category_id" id="category_id" class="form-control" value="<?php echo $category->category_id; ?>"/>

            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input class="form-control" name="category_name" placeholder="Category Name" type="text" value="<?php echo $category->category_name; ?>" />
                <?php echo form_error('category_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="main_category">Project</label>
                <?php 
                    $select_project_name_attributes = 'class="form-control" required disabled';
                    $project_id = $category->Project_project_id;
                    echo form_dropdown( 'main_category', $select_project, $project_id, $select_project_name_attributes );
                ?>
            </div>

            <input name="btn_reg_category" type="submit" class="btn btn-default btn-reg" value="Update Category" />

            <?php echo form_close(); ?>

            <?php if ($this->session->flashdata('msg')){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div><?php echo $this->session->flashdata('msg'); ?></div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>