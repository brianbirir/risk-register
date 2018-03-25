$(document).ready(function(){
    
    // // export of risk report
    // $("#generate-report").click(function(e) {

    //     var category = $('#select-category option:checked').val();
    //     var register = $('#select-register option:checked').val();
    //     var date_from = $('#datepicker-from').val();
    //     var date_to = $('#datepicker-to').val();

    //     e.preventDefault();

    //     var export_url = "/report/ajax_report_export";

    //     $.ajax({
    //         url: export_url,
    //         type: "POST",
    //         data: {category: category, register: register, date_from: date_from, date_to: date_to},
    //         dataType: "text"
    //     })
    //     .done(function(response) {
    //         alertify.notify('Report Download Successful', 'success', 5, function(){  console.log('dismissed'); });
    //         // console.log(response);
    //     })
    //     .fail(function(xhr) {
    //         console.log(xhr);
    //     }); 
    // });


    // $("#generate-report").click(function(e) {

    //     var category = $('#modal-select-category option:checked').val();
    //     var register = $('#modal-select-register option:checked').val();
    //     var date_from = $('#modal-datepicker-from').val();
    //     var date_to = $('#modal-datepicker-to').val();

    //     e.preventDefault();

    //     var export_url = "/dashboard/reports/export";

    //     $.ajax({
    //         url: export_url,
    //         type: "POST",
    //         data: {category: category, register: register, date_from: date_from, date_to: date_to},
    //         // dataType: "text"
    //     })
    //     .done(function(response) {
    //         alertify.notify('Report Download Successful', 'success', 5, function(){ console.log('dismissed'); });
    //         console.log(response);
    //         window.location = '/dashboard/reports/export'; 
    //     })
    //     .fail(function(xhr) {
    //         console.log(xhr);
    //     }); 
    // });


    $("#generate-report").click(function(e) {

        e.preventDefault();
        var export_url = "/dashboard/reports/export";

        $.ajax({
            url: export_url,
            type: "POST"
        })
        .done(function(response) {
            alertify.notify('Report Download Successful', 'success', 5, function(){ console.log('dismissed'); });
            console.log(response);
            window.location = '/dashboard/reports/export'; 
        })
        .fail(function(xhr) {
            console.log(xhr);
        }); 
    });

    
    // export of response report
    $("#generate-response-report").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/dashboard/reports/response_export',
            success:function(html){
                alertify.notify('Report Download Successful', 'success', 5, function(){  console.log('dismissed'); });
                window.location = '/dashboard/reports/response_export';
            }
        });
    });


    function download_notification()
    {
        if(!alertify.myAlert){
            //define a new dialog
            alertify.dialog('downloadAlert',function(){
              return{
                main:function(message){
                  this.message = message;
                },
                setup:function(){
                    return { 
                      buttons:[{text: "cool!", key:27/*Esc*/}],
                      focus: { element:0 }
                    };
                },
                prepare:function(){
                  this.setContent(this.message);
                }
            }});
          }
          //launch it.
          alertify.myAlert("Browser dialogs made easy!");
    }

});