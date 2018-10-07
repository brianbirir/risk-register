/** Risk Calculator
 * uses risk matrix to determine risk rating and level
 */

// risk for qualitative assessment
function calcQualitativeRisk() 
{
    // var risk_form = document.forms['edit-risk-form'];

    // array to store impact values
    var impactValues = [];

    var likelihoodValue = parseInt(document.getElementById('likelihood').value);

    // get impact values and push them into array
    impactValues.push(parseInt(document.getElementById('timeimpact').value));
    impactValues.push(parseInt(document.getElementById('costimpact').value));
    impactValues.push(parseInt(document.getElementById('reputationimpact').value));
    impactValues.push(parseInt(document.getElementById('hsimpact').value));
    impactValues.push(parseInt(document.getElementById('envimpact').value));
    impactValues.push(parseInt(document.getElementById('legalimpact').value));
    impactValues.push(parseInt(document.getElementById('qualityimpact').value));

    // get maximum value from impact values array
    var maxImpactValue = Math.max.apply(null, impactValues);

    // determine risk rating from likelihood value multiplied by maximum impact value
    var riskRating = likelihoodValue * maxImpactValue

    // determine risk level from risk rating integer value
    var riskLevel = riskMatrix(riskRating);

    // display elements
    showElement(document.getElementById('risk_rating'));
    showElement(document.getElementById('risk_level'));

    // append values to form input
    document.getElementById('risk_rating').value = riskRating;
    document.getElementById('risk_level').value = riskLevel.level;

    // set colour background for form input based on risk level
    var risk_level_input = document.querySelector("#risk_level");
    risk_level_input.style.backgroundColor = riskLevel.color;
    var risk_rating_input = document.querySelector("#risk_rating");
    risk_rating_input.style.backgroundColor = riskLevel.color;

}


// risk for current qualitative assessment
function calcCurrentQualitativeRisk() 
{
    // array to store impact values
    var impactValues = [];

    var likelihoodValue = document.getElementById('likelihood_current').value;
    
    impactValues.push(parseInt(document.getElementById('timeimpact_current').value));
    impactValues.push(parseInt(document.getElementById('costimpact_current').value));
    impactValues.push(parseInt(document.getElementById('reputationimpact_current').value));
    impactValues.push(parseInt(document.getElementById('hsimpact_current').value));
    impactValues.push(parseInt(document.getElementById('envimpact_current').value));
    impactValues.push(parseInt(document.getElementById('legalimpact_current').value));
    impactValues.push(parseInt(document.getElementById('qualityimpact_current').value));


    // get maximum value from impact values array
    var maxImpactValue = Math.max.apply(null, impactValues);

    // determine risk rating from likelihood value multiplied by maximum impact value
    var riskRating = likelihoodValue * maxImpactValue

    // determine risk level from risk rating integer value
    var riskLevel = riskMatrix(riskRating);

    // display elements
    showElement(document.getElementById('currentrisk_rating'));
    showElement(document.getElementById('currentrisk_level'));

    // append values to form input
    document.getElementById('currentrisk_rating').value = riskRating;
    document.getElementById('currentrisk_level').value = riskLevel.level;

    // set colour background for form input based in risk level
    var risk_level_input = document.querySelector("#currentrisk_level");
    risk_level_input.style.backgroundColor = riskLevel.color;
    
    var risk_rating_input = document.querySelector("#currentrisk_rating");
    risk_rating_input.style.backgroundColor = riskLevel.color;
}


// risk for qualitative assessment
function calcTargetQualitativeRisk() 
{
    // array to store impact values
    var impactValues = [];

    var likelihoodValue = document.getElementById('likelihood_target').value;

    impactValues.push(parseInt(document.getElementById('timeimpact_target').value));
    impactValues.push(parseInt(document.getElementById('costimpact_target').value));
    impactValues.push(parseInt(document.getElementById('reputationimpact_target').value));
    impactValues.push(parseInt(document.getElementById('hsimpact_target').value));
    impactValues.push(parseInt(document.getElementById('envimpact_target').value));
    impactValues.push(parseInt(document.getElementById('legalimpact_target').value));
    impactValues.push(parseInt(document.getElementById('qualityimpact_target').value));

    // get maximum value from impact values array
    var maxImpactValue = Math.max.apply(null, impactValues);

    // determine risk rating from likelihood value multiplied by maximum impact value
    var riskRating = likelihoodValue * maxImpactValue

    // determine risk level from risk rating integer value
    var riskLevel = riskMatrix(riskRating);

    // display elements
    showElement(document.getElementById('targetrisk_rating'));
    showElement(document.getElementById('targetrisk_level'));

    // append values to form input
    document.getElementById('targetrisk_rating').value = riskRating;
    document.getElementById('targetrisk_level').value = riskLevel.level;

    // set colour background for form input based in risk level
    var risk_level_input = document.querySelector("#targetrisk_level");
    risk_level_input.style.backgroundColor = riskLevel.color;
    
    var risk_rating_input = document.querySelector("#targetrisk_rating");
    risk_rating_input.style.backgroundColor = riskLevel.color;
}


// show hidden element
function showElement(elem)
{
    elem.classList.add('is-visible');
}

// risk matrix
function riskMatrix(rating) 
{

    var matrix = new Object();

    if (rating >= 11 && rating <= 25) {
        
        matrix.level = 'Threat High';
        matrix.color = 'Red';

    } else if(rating >= 4 && rating <= 10) {
        
        matrix.level = 'Threat Medium';
        matrix.color = 'Gold';

    } else if (rating >= 1 && rating <= 3) {

        matrix.level = 'Threat Low';
        matrix.color = 'LimeGreen';

    } else if (rating >= -3 && rating <= -1) {

        matrix.level = 'Opportunity Low';
        matrix.color = 'LightSkyBlue';

    } else if (rating >= -10 && rating <= -4) {

        matrix.level = 'Opportunity Medium';
        matrix.color = 'DodgerBlue';

    } else if (rating >= -25 && rating <= -11) {

        matrix.level = 'Opportunity High';
        matrix.color = 'RoyalBlue';
    } else if (rating == 0) {

        matrix.level = 'No Opportunity';
        matrix.color = 'PapayaWhip'; 
    } else {
        matrix.level = 'Unknown Risk Level';
        matrix.color = 'LightGrey';
    }

    return matrix;
}

// tabs
$('#risk-tabs li:eq(0) a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

$('#risk-tabs li:eq(1) a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

$('#risk-tabs li:eq(2) a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

$('#risk-tabs li:eq(3) a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

$('#risk-tabs li:eq(4) a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});


// set current date on risk registration form
// function appendCurrentDate () {
//     var currentDate = moment().format("MMMM Do YYYY, h:mm:ss a");
//     // var today = new Date();
//     var date_element = document.getElementById("risk_current_date");
//     date_element.innerHTML= currentDate;
// }

// window.onload = appendCurrentDate;

// add rows of risk responses dynamically
// initialize counter
var counter = 0;


// delete row
function delete_row()
{
	// Removes an element from the document
    var element = document.getElementById(elementId);
    //element.parentNode.removeChild(element);
    element.remove();
}

// delete confirmation when deleting or archiving elements
function archive_confirmation()
{
    // alertify js dialog box
    alertify.confirm("Are you sure you want to archive this risk item?",
    function(){
        alertify.success('Yes');
    },
    function(){
        alertify.error('Cancel');
    });
}


// jQuery
$(document).ready(function() {

    var counter = 0;

    // initialize chosen select library
    $(".response-title").chosen();
    $(".response-user").chosen();
    $(".response-strategy").chosen();
    $(".action-owner").chosen();
    
    $("#response-table-body").on('click', '.remove-row', function () {
        $(this).closest('.response-item').remove();
    });

    // duplicate response row
    $('#add-response-btn').click( function() {
        // parent element
        var parent_element = "response-table-body";

        // append new row to parent element
        document.getElementById(parent_element).appendChild(buildRow());

        // clone options of the first row select fields
        var $optionsTitle = $(".response-title > option").clone();
        var $optionsStrategy = $(".response-strategy > option").clone();
        var $optionsUser = $(".response-user > option").clone();

        $('.response-title-copy').append($optionsTitle);
        $('.response-title-strategy').append($optionsStrategy);
        $('.response-user-copy').append($optionsUser);

        // initialize chosen select library
        $('.response').chosen();
    });


    // add response rows
    function buildRow()
    {
        counter++;
        
        // create row
        var createRow = document.createElement('div');
      
        // set id to new row
        createRow.id = "response-row-" + counter;

        // set class to new row
        createRow.className = "row response-item";
        var createSelectOne = '<div class="col-md-2"><div class="form-group form-response-title"><select name="risk_response[title][]" class="form-control response response-title response-title-copy"></select></div></div>';
        var createTitleButtonCell = '<div class="col-md-1"><button type="button" class="btn btn-default btn-xs btn-reg" data-toggle="modal" data-target="#response-title-modal">Add Response</button></div></div>';
        var createSelectTwo = '<div class="col-md-2"><div class="form-group"><select name="risk_response[strategy][]" class="form-control response response-title-strategy"></select></div></div>';
        // var createSelectThree = '<div class="col-md-2"><div class="form-group"><select multiple="multiple" name="risk_response[user][]" class="form-control response response-user-copy"></select></div></div>';
        var createSelectThree = '<div class="col-md-2"><div class="form-group"><select name="risk_response[user][]" class="form-control response response-user-copy"></select></div></div>';
         var createUserButtonCell = '<div class="col-md-1"><button type="button" class="btn btn-default btn-xs btn-reg" data-toggle="modal" data-target="#response-user-modal">Add User</button></div></div>';
        var createSelectFour = '<div class="col-md-3"><div class="form-group"><div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="risk_response[date][]" placeholder="Risk Response Date" type="text" required/></div></div>';
        
        var responseRow = createSelectOne + createTitleButtonCell + createSelectTwo + createSelectThree + createUserButtonCell + createSelectFour;
        
        // add cells to new row
        createRow.innerHTML = responseRow;
        
        // create new table cell to hold link that will remove one of the added rows
        var createCell = document.createElement('a');

        // assign ID to new table cell
        createCell.id = "remove-row-" + counter;
        createCell.className = "remove-row btn btn-default btn-xs";

        // add content to new cell
        createCell.innerHTML = "Delete";

        // append new cell to new row
        createRow.appendChild(createCell);
        return createRow;
    }

    // clear input fields and alerts when response title dialog is closed
    $('#response-title-modal').on('hidden.bs.modal', function () {
        $("#response-modal-title").val("");
        $("#response-modal-alert-warning").hide();
        $("#response-modal-alert-success").hide();
    });
});