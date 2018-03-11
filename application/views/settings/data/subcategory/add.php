<!-- add subcategory form -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="subcategory-form">

            <?php 
                $attributes = array("class" => "ui form", "id" => "subcategory-form", "name" => "subcategory-form");
                echo form_open("subcategory/add_subcategory", $attributes);
            ?>

            <input type="hidden" name="category_id" id="category_id" class="form-control" value="<?php echo $category_id; ?>"/>

            <div class="form-group">
                <label for="subcategory_name">Subcategory Name</label>
                <input class="form-control" name="subcategory_name" placeholder="Subcategory Name" type="text" value="<?php echo set_value('subcategory_name'); ?>" />
                <?php echo form_error('subcategory_name','<div class="alert alert-danger">','</div>'); ?>
            </div>

            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input readonly class="form-control" name="category_name" type="text" value="<?php echo $category_name; ?>" />
            </div>

            <input name="btn_update_subcategory" type="submit" class="btn btn-default btn-reg" value="Add Subcategory" />

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