// jQuery
$(document).ready(function() {
    // initiate date picker
    // $('.datepicker').datepicker({
    //     format: 'yyyy/mm/dd',
    // });

    $( function() {
        $( ".datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    } );
});