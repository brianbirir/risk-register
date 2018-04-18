$(document).ready(function() {

    // add description
    $("#add-description").click( function() {

        // collect values
        var harzardRisk = $("#harzard-risk").val();
        var trigger = $("#cause-trigger").val();
        var effect = $("#effect").val();

        // combine values
        var descriptionText = harzardRisk + " LEADS TO " + trigger + " DUE TO "+ effect

        // set text
        $( "#description-text" ).val( descriptionText );
    });

    // clear description, harzard risk, trigger and effect values
    $("#clear-description").click( function() {
        $("#harzard-risk").val("");
        $("#cause-trigger").val("");
        $("#effect").val("");
        $("#description-text").val("");
    });
});