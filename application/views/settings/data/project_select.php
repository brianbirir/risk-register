<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

        <?php
            $attributes = array("class" => "pure-form" ,"id" => "risk-data-form", "name" => "risk-data-form");
            echo form_open("settings/set_project", $attributes);
        ?>
        <div class="form-group">
            <label for="risk_project">Select Project First:</label>
            <?php
                $select_project_attributes = '';
                $select_project['None'] = 'None';
                echo form_dropdown('risk_project', $select_project, 'None', $select_project_attributes);
            ?>
        </div>

        <input name="btn_riskdata_next" type="submit" class="btn btn-default btn-reg" value="Next" />

        <?php echo form_close(); ?>

        <?php if ($this->session->flashdata('msg')){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div><?php echo $this->session->flashdata('msg'); ?></div>
            </div>
        <?php } ?>
    </div>
</div>