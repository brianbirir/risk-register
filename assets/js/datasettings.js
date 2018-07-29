$(document).ready(function(){

    var projectSettings = ["Status","RiskCategories","RiskOwner","MaterializationPhase", "CostMetric", "ScheduleMetric", "ResponseTitle","RiskStrategies"];
    
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


    // on opening modal display project setting form
    $('#project-setting-modal').on('show.bs.modal', function (e) {

        $('#project-setting-modal-body').html(dataSettingsForm());

        $('#settings-type').on('change', function() {

            if (this.value == 'CostMetric' || this.value == 'ScheduleMetric') {
                $('#project-setting-modal-body').html(dataSettingsNumericForm());
            }
        })

    })


    // on closing modal hide some elements and set inputs to empty
    $('#project-setting-modal').on('hidden.bs.modal', function (e) {
        
        $('#settings-name').val(''); // set name value to empty

        // hide alert boxes
        $("#data-setting-alert-warning").hide(); 
        $("#data-setting-alert-success").hide();
        $("#data-setting-alert-danger").hide();
    })


    // build form for adding data settings
    function dataSettingsForm()
    {
        var projectSettings = ["Status","RiskCategories","RiskOwner","MaterializationPhase","CostMetric", "ScheduleMetric", "ResponseTitle","RiskStrategies"];
    
        // initialize counter
        let i;
        
        var formBuilder = '';

        formBuilder += '<form>';
        formBuilder += '<div class="form-group">';
        formBuilder += '<label for="settings-name">Name</label>';
        formBuilder += '<input id="settings-name" class="form-control" name="settings-name" type="text" value="" required />';
        formBuilder += '<label for="project_setting">Project Settings</label>';
        formBuilder += '<select id="settings-type" name="project_setting" class="form-control">';

        // generate options for select input
        for (i = 0; i < projectSettings.length; i++) 
        {
            formBuilder += '<option value="'+projectSettings[i]+'">' + projectSettings[i] + '</option>';
        }

        formBuilder += '</select>'
        formBuilder += '</div>';
        formBuilder += '</form>';

        return formBuilder;
    }


    // form for cost metric and schedule metric
    function dataSettingsNumericForm()
    {
        var projectSettings = [ "CostMetric", "ScheduleMetric"];
    
        // initialize counter
        let i;
        
        var formBuilder = '';

        formBuilder += '<form>';
        formBuilder += '<div class="form-group">';
        formBuilder += '<label for="settings-name">Rating</label>';
        formBuilder += '<input id="settings-name" class="form-control" name="settings-name" type="number" value="" required />';
        formBuilder += '<p class="text-warning">Only numeric values are allowed!</p>'
        formBuilder += '<label for="settings-name">Description</label>';
        formBuilder += '<textarea id="settings-description" class="form-control" name="description" placeholder="Description" type="text" value="" required></textarea>';
        formBuilder += '<label for="project_setting">Project Settings</label>';
        formBuilder += '<select id="settings-type" name="project_setting" class="form-control">';

        // generate options for select input
        for (i = 0; i < projectSettings.length; i++) 
        {
            formBuilder += '<option value="'+projectSettings[i]+'">' + projectSettings[i] + '</option>';
        }

        formBuilder += '</select>'
        formBuilder += '</div>';
        formBuilder += '</form>';

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


    // display project settings table on initial page load
    projectSettingsTable();


    // AJAX function to post form data
    function postFormData()
    {
        var settingName = $('#settings-name').val(); // get value for setting name
        var settingType = $('#settings-type').val(); // get value for setting type which correlates to database table name
        var projectID = $('#project_id').val(); // get value for project ID

        if(settingName == '') 
        { 
            $("#data-setting-alert-warning").show(); 
        }  
        else  
        {

            if (settingType == 'CostMetric' || settingType == 'ScheduleMetric') 
            {
                var settingDesc = $('#settings-description').val(); // get value for setting name

                $.ajax({
                    url:  "/riskdata/ajax_insert",
                    type: "POST",
                    data: {setting_name: settingName, project_id: projectID, setting_table: settingType, setting_description: settingDesc},
                    dataType: "JSON"
                })
                .done(function(response) {
        
                    // check if response is true
                    if (response.status) {
                        
                        // update number of settings on side bar
                        getNumberOfProjectSettings();
    
                        // update number of settings on side bar
                        $("#data-setting-alert-success").show();
    
                        // update table of updated setting
                        getSettings(response.setting, projectID);
    
                        $('.list-group-item').removeClass('active'); // remove active class if present from other list group item
    
                        $('#'+ response.setting + '-link').addClass('active'); // add active class
                    }
                })
                .fail(function(xhr) {
                    $("#data-setting-alert-danger").show();
                }); 
            }
            else
            {
                $.ajax({
                    url:  "/riskdata/ajax_insert",
                    type: "POST",
                    data: {setting_name: settingName, project_id: projectID, setting_table: settingType},
                    dataType: "JSON"
                })
                .done(function(response) {
        
                    // check if response is true
                    if (response.status) {
                        
                        // update number of settings on side bar
                        getNumberOfProjectSettings();
    
                        // update number of settings on side bar
                        $("#data-setting-alert-success").show();
    
                        // update table of updated setting
                        getSettings(response.setting, projectID);
    
                        $('.list-group-item').removeClass('active'); // remove active class if present from other list group item
    
                        $('#'+ response.setting + '-link').addClass('active'); // add active class
                    }
                })
                .fail(function(xhr) {
                    $("#data-setting-alert-danger").show();
                }); 
            }
        }
    }


     // post project setting form data
     $('#register-project-setting').click(function(){
        postFormData();
    });


    // show sub-category modal
    $('#register-subcategory').click(function(){
        
    });


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

    // show sub-category modal
    $('#register-subcategory').click(function(){
        $('#subcategory-modal').modal();
    });
});