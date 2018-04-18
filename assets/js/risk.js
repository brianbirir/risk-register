$(document).ready(function() {
    $("#add-description").click( function() {
        var harzardRisk = $("#harzard-risk").val();
        var trigger = $("#cause-trigger").val();
        var effect = $("#effect").val();

        var descriptionText = harzardRisk + " LEADS TO " + trigger + " DUE TO "+ effect

        // set text
        $( "#description-text" ).val( descriptionText );
    });
});