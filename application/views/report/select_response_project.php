<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

        <?php if ($this->session->flashdata('negative_msg')){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div><?php echo $this->session->flashdata('negative_msg'); ?></div>
            </div>
        <?php } ?>

        <?php
            $attributes = array("class" => "pure-form" ,"id" => "risk-data-form", "name" => "risk-data-form");
            echo form_open("response/index", $attributes);
        ?>
        <div class="form-group">
            <label for="risk_project">Select Project First:</label>
            <?php
                $select_project_attributes = 'class="form-control"';
                $select_project['none'] = 'Select Project';
                echo form_dropdown('risk_project', $select_project, 'none', $select_project_attributes);
            ?>
        </div>

        <input name="btn_riskdata_next" type="submit" class="btn btn-default btn-reg" value="Next" />

        <?php echo form_close(); ?>
    </div>
</div>