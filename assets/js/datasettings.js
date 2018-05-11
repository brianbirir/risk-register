$(document).ready(function(){

    // data settings array store
    var dataSettings = ["Status","Risk Category","Risk Owner","Entity","Materialization Phase", "Realization", "Cost Rating", "Schedule Rating", "Response Title"];
    
    // initialize counter
    let i;
    
    // generate tabs and tab panes
    for (i = 0; i < dataSettings.length; i++) {
        
        const elementTab = dataSettings[i];

        var tabsList = '';
        var tabsPane = '';
        
        if (i == 0) 
        {
            tabsList = '<li class="active"><a href="#' + replaceWithDash(elementTab) + '-pane" data-toggle="tab">' + elementTab + '<span id="'+replaceWithDash(elementTab)+'-badge" class="label label-primary pull-right"></span></a></li>';
        }
        else {
            tabsList = '<li><a href="#' + replaceWithDash(elementTab) + '-pane" data-toggle="tab">' + elementTab + '<span id="'+replaceWithDash(elementTab)+'-badge" class="label label-primary pull-right"></span></a></li>';
        }

        // append list items to tabs container
        $("#data-settings-tabs").append(tabsList);

        tabsPane = dataSettingsForm(i, elementTab);

        // append tab panes to panes container
        $("#data-settings-tab-content").append(tabsPane);

        // set badge labels to zero
        $('#'+replaceWithDash(elementTab)+'-badge').html('0');
    }

    // clicking button functions
    $('#add-status-setting').click(function(event){
        event.preventDefault();
        // console.log("I have been clicked "+ dataSettings[0]);
        postFormData(dataSettings[0]);
    });

    $('#add-risk-category-setting').click(function(event){
        event.preventDefault();
        postFormData(dataSettings[1]);
    });

    $('#add-risk-owner-setting').click(function(event){
        event.preventDefault();
        postFormData(dataSettings[2]);
    });

    $('#add-entity-setting').click(function(event){
        event.preventDefault();
        postFormData(dataSettings[3]);
    });

    $('#add-materialization-phase-setting').click(function(event){
        event.preventDefault();
        postFormData(dataSettings[4]);
    });

    $('#add-realization-setting').click(function(event){
        event.preventDefault();
        postFormData(dataSettings[5]);
    });

    $('#add-cost-rating-setting').click(function(event){
        event.preventDefault();
        postFormData(dataSettings[6]);
    });

    $('#add-schedule-rating-setting').click(function(event){
        event.preventDefault();
        postFormData(dataSettings[7]);
    });

    $('#add-response-title-setting').click(function(event){
        event.preventDefault();
        postFormData(dataSettings[8]);
    });


    // function for replacing space character with dashes. This is for element class names or id name
    function replaceWithDash(stringValue)
    {
        // in addition return value as lower case
        return stringValue.replace(/\s+/g, '-').toLowerCase();
    }

    // function for replacing space character withb dashes. This is for element class names or id name
    function replaceWithUnderscore(stringValue)
    {
        // in addition return value as lower case
        return stringValue.replace(/\s+/g, '_').toLowerCase();
    }

    // build form for adding data settings
    function dataSettingsForm(index, elementName)
    {
        var formBuilder = '';

        if(index == 0)
        {
            formBuilder += '<div class="tab-pane active" id="'+replaceWithDash(elementName)+'-pane">';
        } else
        {
            formBuilder += '<div class="tab-pane" id="'+replaceWithDash(elementName)+'-pane">';
        }

        formBuilder += '<div class="row">';
        formBuilder += '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
        formBuilder += '<form>';
        formBuilder += '<div class="form-group">';
        formBuilder += '<label for="'+replaceWithUnderscore(elementName)+'">'+elementName+' Name</label>';
        formBuilder += '<input id="'+replaceWithUnderscore(elementName)+'" class="form-control" name="'+replaceWithUnderscore(elementName)+'" type="text" value="" required />';

        // check if element is schedule rating or cost rating
        if(elementName == 'Cost Rating' || elementName == "Schedule Rating")
        {
            formBuilder += '<label for="'+replaceWithUnderscore(elementName)+'_desc">Description</label>';
            formBuilder += '<textarea id="'+replaceWithUnderscore(elementName)+'_desc" class="form-control" name="'+replaceWithUnderscore(elementName)+'" rows="3" required></textarea>';
        }
        
        formBuilder += '</div>';
        formBuilder += '</form>';
        formBuilder += '<button id="add-'+replaceWithDash(elementName)+'-setting" name="btn_data_setting" class="btn btn-default btn-reg btn-datasetting">Add '+ elementName +'</button>';
        formBuilder += '</div>';
        formBuilder += '</div>';
        formBuilder += '</div>';

        return formBuilder;
    }


    // AJAX function to post form data
    function postFormData(elementName)
    {
        var nameField = '#' + replaceWithUnderscore(elementName);
        var dataName = $(nameField.toString()).val(); // get value for data name
        var projectID = $('#project_id').val(); // get value for project ID
        var dataType = replaceWithUnderscore(elementName);

    
        if(dataName == '')
        {
            $("#data-setting-alert-warning").show();
        } 
        else 
        {
            // check if element is schedule rating or cost rating
            if(elementName == 'Cost Rating' || elementName == "Schedule Rating")
            {
                var descField = '#' + replaceWithUnderscore(elementName) + '_desc';
                var dataDesc = $(descField.toString()).val(); // get value for data name

                $.ajax({
                    url:  "/riskdata/ajax_insert",
                    type: "POST",
                    data: {data_name: dataName, project_id: projectID, data_type: dataType, data_desc: dataDesc},
                    dataType: "JSON"
                })
                .done(function(response) {

                    // check if response is true
                    if (response)
                    {
                        $("#data-setting-alert-success").show(); // display success alert
                        
                        // set badge labels to value of table row count
                        $('#'+replaceWithDash(elementName)+'-badge').html(response.data_count);
                    }
                })
                .fail(function(xhr) {
                    $('#data-setting-alert-danger').html('<p>An error has occurred</p>').show();
                }); 
            }
            else
            {
                $.ajax({
                    url:  "/riskdata/ajax_insert",
                    type: "POST",
                    data: {data_name: dataName, project_id: projectID, data_type: dataType},
                    dataType: "JSON"
                })
                .done(function(response) {

                    // check if response is true
                    if (response)
                    {
                        $("#data-setting-alert-success").show(); // display success alert

                        // set badge labels to value of table row count
                        $('#'+replaceWithDash(elementName)+'-badge').html(response.data_count);
                    }
                })
                .fail(function(xhr) {
                    $('#data-setting-alert-danger').html('<p>An error has occurred</p>').show();
                }); 
            }
        }
    }

});