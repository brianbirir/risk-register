$(document).ready(function(){

    var projectSettings = ["Status","RiskCategories","RiskOwner","Entity","MaterializationPhase", "Realization", "CostMetric", "ScheduleMetric", "ResponseTitle","RiskStrategies","SystemSafety"];
    
    // initialize counter
    let i;

    var listGroup = '#project-settings-list';

    // generate side bar list
    for (i = 0; i < projectSettings.length; i++) 
    {
        var listGroupItem = '<a id="' + replaceWithDash(projectSettings[i]) + '-link" class="list-group-item"><span class="badge">0</span>'+ projectSettings[i]+'</a>';

        $(listGroup).append(listGroupItem);
    }
    

    // function for replacing space character with dashes. This is for element class names or id name
    function replaceWithDash(stringValue)
    {
        // in addition return value as lower case
        return stringValue.replace(/\s+/g, '-');
    }

    // function for replacing space character with underscore. This is for element class names or id name
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


    // data table
    function projectSettingsTable()
    {
        $('#project-settings-tbl').DataTable({
            "columns": [
                { "title": "ID" },
                { "title": "Title" }
            ]
        });
    }

    projectSettingsTable();


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


    // get number of project settings per setting
    function getNumberOfProjectSettings()
    {
        var projectID = $('#project_id').val(); // get value for project ID
        var listChildren = document.getElementById('project-settings-list').children;

        var projectSettings = [];

        for(i=0; i < listChildren.length; i++)
        {  
            projectSettings.push(listChildren[i].id);
        }

        $.ajax({
            url:  "/riskdata/getNumberofProjectSettings",
            type: "POST",
            data: { project_settings_list : projectSettings, project_id : projectID },
            dataType: "JSON"
        })
        .done(function(response){
            
            for(j=0; j < response.length; j++)
            {
                $('#'+projectSettings[j]+' .badge').text(response[j]);
            }
        })
        .fail(function(xhr) {
           console.log(xhr);
        });
    }

    getNumberOfProjectSettings();

    var projectSettingsChildren = document.getElementById('project-settings-list').children;

    // get parent
    var projectSettingsParent = document.getElementById('project-settings-list');

    // event handler
    function handler( event ) {
        
        var target = $( event.target );
        
        if ( target.is( "li" ) ) 
        {
          target.children().toggle();
        }
    }

    // get value for project ID
    var projectID = $('#project_id').val();

    // click project sidebar links and display table of the settings details
    $(projectSettingsChildren).bind('click',function(event)
    {   
        $('.list-group-item').removeClass('active');

        if(event.target.tagName == 'A')
        {
            console.log(event.target.id); // debug
            $('#'+ event.target.id).addClass('active'); // add active class
            getSettings(event.target.id, projectID);
        }
    });

    // generate settings data table
    function getSettings(setting, project)
    {
        // destroy table first if it exists
        $('#project-settings-tbl').DataTable().destroy();

        if(setting == 'CostMetric-link' || setting == 'ScheduleMetric-link')
        {
            // generate table from AJAX request for risk items
            var riskTable = $('#project-settings-tbl').DataTable({
                "pageLength" : 10,
                "processing": true,
                "serverSide": true,
                "aaSorting": [],
                "ajax": {
                    "url": "/riskdata/getAjaxProjectSettings",
                    "type": "POST",
                    "data": function(d){
                        d.project_setting = setting;
                        d.project_id = project;
                    }
                },
                "columns": [
                    { "title": "ID", "name": "id" },
                    { "title": "Rating", "name": "name" }
                ]
            });
        }
        else
        {
            // generate table from AJAX request for risk items
            var riskTable = $('#project-settings-tbl').DataTable({
                "pageLength" : 10,
                "processing": true,
                "serverSide": true,
                "aaSorting": [],
                "ajax": {
                    "url": "/riskdata/getAjaxProjectSettings",
                    "type": "POST",
                    "data": function(d){
                        d.project_setting = setting;
                        d.project_id = project;
                    }
                },
                "columns": [
                    { "title": "ID", "name": "id" },
                    { "title": "Title", "name": "name" }
                ]
            });
        }
    }
});