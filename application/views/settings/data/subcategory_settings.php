<?php if ($this->session->flashdata('positive_msg')){ ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div><?php echo $this->session->flashdata('positive_msg'); ?></div>
    </div>
<?php } ?> 

<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>
    <p>Add subcategories per category for <strong><?php echo $project_name; ?></strong>.</p>
</div>

<?php
    $session_data = $this->session->userdata('logged_in');
?>

<div class="row">
    <div class="col-md-3">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Risk Categories</h3>
            </div>
            <div class="box-body">
                <div id="category-list" class="list-group">

                    <?php 
                        foreach ($category_result as $category) 
                        {
                           echo '<a id="'.$category->id.'" class="list-group-item">'.$category->name.'<span class="badge">0</span></a>';
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Subcategory Data</h3>
                <div class ="pull-right">
                    <button type="button" class="btn btn-default btn-reg btn-xs" data-toggle="modal" data-target="#subcategory-modal">Add Sub-Category</button>
                </div>
            </div>
            <div class="box-body">

                <!-- data table -->
                <table id="subcategory-tbl" class="table table-responsive table-bordered table-hover dataTable">
                    <tbody>
                         
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- next button -->
        <a style='margin-right: 10px;' href='/dashboard/project/<?php echo $project_id; ?>' class='btn btn-default btn-view pull-right'>Next</a>
    </div>
</div>


<form>
    <input type="hidden" name="project_id" id="project_id" class="form-control" value="<?php echo $project_id; ?>"/> 
</form>


<!-- Small modal: sub-category form -->

<div id="subcategory-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="subcategoryModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="subcategoryModalLabel">Add Subcategory</h4>
      </div>
      <div class="modal-body">

            <!-- alerts --> 
            <div style="display: none;" id="data-setting-alert-warning" class="alert alert-warning fade in alert-dismissible" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                <strong>Warning!</strong> Please fill the name field! 
            </div>

            <div style="display: none;" id="data-setting-alert-success" class="alert alert-success fade in alert-dismissible" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                <strong>Success!</strong> The subcategory has been registered successfully! 
            </div>

            <div style="display: none;" id="data-setting-alert-danger" class="alert alert-danger fade in alert-dismissible" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                <strong>Error!</strong> Unable to save! 
            </div>

            <div id="subcategory-modal-body">
                <form>
                    <div class="form-group">
                        
                        <label for="subcategory_name">Name</label>
                        <input id="subcategory-name" class="form-control" name="subcategory_name" type="text" value="" required />
                        
                        <label for="category_name">Category</label>
                        <select id="category-name" name="category_name" class="form-control">
                            <?php 
                                foreach ($category_result as $cat) {
                                    echo "<option value='".$cat->id."'>".$cat->name."</option>";
                                }
                            ?>
                        </select>

                    </div>
                </form>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="register-subcategory" type="button" class="btn btn-primary">Register Subcategory</button>
      </div>
    </div>
  </div>
</div>

<script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/subcategory.js"></script>