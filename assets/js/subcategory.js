$(document).ready(function(){


    // on closing modal hide some elements and set inputs to empty
    $('#subcategory-modal').on('hidden.bs.modal', function (e) {
        
        $('#subcategory-name').val(''); // set name value to empty

        // hide alert boxes
        $("#data-setting-alert-warning").hide(); 
        $("#data-setting-alert-success").hide();
        $("#data-setting-alert-danger").hide();
    })

    // data table
    function projectSettingsTable()
    {
        $('#subcategory-tbl').DataTable({
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
        var subcategory = $('#subcategory-name').val();
        var category = $('#category-name').val();
        var projectID = $('#project_id').val();

        if(subcategory == '') 
        { 
            $("#data-setting-alert-warning").show(); 
        }  
        else  
        {
            $.ajax({
                url:  "/riskdata/ajax_subcategory_insert",
                type: "POST",
                data: {subcategory: subcategory, project_id: projectID, category: category},
                dataType: "JSON"
            })
            .done(function(response) {

                // // check if response is true
                if (response.status) {
                    
                    // update number of settings on side bar
                    $("#data-setting-alert-success").show();

                    getNumberOfProjectSettings();

                    // update table of updated setting
                    getSettings(category);

                    $('.list-group-item').removeClass('active'); // remove active class if present from other list group item

                    $('#'+ response.category).addClass('active'); // add active class
                }
            })
            .fail(function(xhr) {
                $("#data-setting-alert-danger").show();
            }); 
        }
    }


    // post subcategory form data
     $('#register-subcategory').click(function(){
        postFormData();
    });


    // get number of sub categories per category
    function getNumberOfProjectSettings()
    {
        var listChildren = document.getElementById('category-list').children;
        var categories = [];

        for(i=0; i < listChildren.length; i++)
        {  
            categories.push(listChildren[i].id);
        }

        $.ajax({
            url:  "/riskdata/getNumberofSubcategories",
            type: "POST",
            data: { categories_list : categories},
            dataType: "JSON"
        })
        .done(function(response) {
            for(j=0; j < response.length; j++)
            {
                $('#'+categories[j]+' .badge').text(response[j]);
            }
        })
        .fail(function(xhr) {
           console.log(xhr);
        });
    }


     getNumberOfProjectSettings();

    
    // get children 
    var projectSettingsChildren = document.getElementById('category-list').children;

    // get parent
    var projectSettingsParent = document.getElementById('category-list');

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
            getSettings(event.target.id);
        }
    });

    // generate settings data table
    function getSettings(category_id)
    {
        // destroy table first if it exists
        $('#subcategory-tbl').DataTable().destroy();

        // generate table from AJAX request for risk items
        var riskTable = $('#subcategory-tbl').DataTable({
            "pageLength" : 10,
            "processing": true,
            "serverSide": true,
            "aaSorting": [],
            "ajax": {
                "url": "/riskdata/getAjaxSubcategory",
                "type": "POST",
                "data": function(d){
                    d.category_id = category_id;
                }
            },
            "columns": [
                { "title": "ID", "name": "subcategory_id" },
                { "title": "Subcategory Title", "name": "subcategory_name" },
            ]
        });
    }
});