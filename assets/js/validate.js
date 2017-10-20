$(document).ready(function() {
    
  // initiate parsley
    $("form[name=reg-risk-form]").parsley();

    // styling of parsley validation return messages
    $(".parsley-errors-list").addClass("alert alert-success alert-dismissible");


  });