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

<!-- edit subcategory form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="subcategory-edit-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "subcategory-edit-form", "name" => "subcategory-edit-form");
                echo form_open("subcategory/update_subcategory", $attributes);
            ?>        

            <input type="hidden" name="subcategory_id" id="subcategory_id" class="form-control" value="<?php echo $subcategory->subcategory_id; ?>"/>

            <div class="form-group">
                <label for="subcategory_name">Subcategory Name</label>
                <input class="form-control" name="subcategory_name" placeholder="Subcategory Name" type="text" value="<?php echo $subcategory->subcategory_name; ?>" />
                <?php echo form_error('subcategory_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input readonly class="form-control" name="category_name" type="text" value="<?php echo $category_name; ?>" />
            </div>

            <input name="btn_reg_subcategory" type="submit" class="btn btn-default btn-reg" value="Update Subsubcategory" />

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