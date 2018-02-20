$(document).ready(function(){
    
    $("#generate-report").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/dashboard/reports/export',
            success:function(html){
                alertify.notify('Report Download Successful', 'success', 5, function(){  console.log('dismissed'); });
                // alertify.alert('Ready!');
                window.location = '/dashboard/reports/export';
            }
        });
    });
    
    
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