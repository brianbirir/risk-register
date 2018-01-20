// Add Options to the integer dropdown fields

/** Risk Calculator
 * uses risk matrix to determine risk rating and level
 */

 // residual risk
 function calcResidualRisk()
{
    var likelihood_value = document.getElementById('residual-risk-select').value;
    
    var impact_value = document.getElementById('residual-impact-select').value;

    var residual_risk_rating = parseInt(likelihood_value) * parseInt(impact_value);   

    var residual_risk_level = riskMatrix(residual_risk_rating);

    // append values to form input
    document.getElementById('residual_risk_rating').value = residual_risk_rating;
    
    document.getElementById('residual_risk_level').value = residual_risk_level.level;

    // set colour background for form input based in risk level
    var risk_level_input = document.querySelector("#residual_risk_level");
    
    risk_level_input.style.backgroundColor = residual_risk_level.color;
}

 var residual_likelihood = document.getElementById('residual-risk-select');
 var impact_likelihood = document.getElementById('residual-impact-select');
 residual_likelihood.onchange  = function(){calcResidualRisk()};
 impact_likelihood.onchange  = function(){calcResidualRisk()};


// risk for qualitative assessment
function calcQualitativeRisk() 
{
    var risk_form = document.forms['edit-risk-form'];

    var likelihood_value = document.getElementById('likelihoodimpact').value;
    var time_value = document.getElementById('timeimpact').value;
    var cost_value = document.getElementById('costimpact').value;
    var reputation_value = document.getElementById('reputationimpact').value;
    var hs_value = document.getElementById('hsimpact').value;
    var env_value = document.getElementById('envimpact').value;
    var legal_value = document.getElementById('legalimpact').value;
    var quality_value = document.getElementById('qualityimpact').value;

    var risk_rating = parseInt(likelihood_value) * parseInt(time_value) * parseInt(cost_value) * parseInt(reputation_value) * parseInt(hs_value) * parseInt(env_value) * parseInt(legal_value) * parseInt(quality_value);

    var risk_level = riskMatrix(risk_rating);

    // append values to form input
    document.getElementById('risk_rating').value = risk_rating;
    document.getElementById('risk_level').value = risk_level.level;

    // risk_form.elements["risk_rating"].value = risk_rating;
    // risk_form.elements["risk_rating"].setAttribute("value",risk_rating);

    // risk_form.elements["risk_level"].value = risk_level.level;
    // risk_form.elements["risk_level"].setAttribute("value",risk_level.level);

    // set colour background for form input based in risk level
    var risk_level_input = document.querySelector("#risk_level");
    risk_level_input.style.backgroundColor = risk_level.color;

}

var likelihoodimpact = document.getElementById('likelihoodimpact');
var timeimpact = document.getElementById('timeimpact');
var costimpact = document.getElementById('costimpact');
var reputationimpact = document.getElementById('reputationimpact');
var hsimpact = document.getElementById('hsimpact');
var envimpact = document.getElementById('envimpact');
var legalimpact = document.getElementById('legalimpact');
var qualityimpact = document.getElementById('qualityimpact');


likelihoodimpact.onchange  = function(){calcQualitativeRisk()};
timeimpact.onchange  = function(){calcQualitativeRisk()};
costimpact.onchange  = function(){calcQualitativeRisk()};
reputationimpact.onchange  = function(){calcQualitativeRisk()};
hsimpact.onchange  = function(){calcQualitativeRisk()};
envimpact.onchange  = function(){calcQualitativeRisk()};
legalimpact.onchange  = function(){calcQualitativeRisk()};
qualityimpact.onchange  = function(){calcQualitativeRisk()};


 // reset values in form input field with reset button
 //var reset_risk_btn = document.getElementById('btn-risk-reset');
 //reset_risk_btn.onclick = reset;

function reset()
{
    var risk_form = document.forms['edit-risk-form'];

    var likelihood = document.getElementById('likelihoodimpact');
    var time = document.getElementById('timeimpact');
    var cost = document.getElementById('costimpact');
    var reputation = document.getElementById('reputationimpact');
    var hs = document.getElementById('hsimpact');
    var env = document.getElementById('envimpact');
    var legal = document.getElementById('legalimpact');
    var quality = document.getElementById('qualityimpact');

    likelihood.value = 1;
    time.value = 1;
    cost.value = 1;
    reputation.value = 1;
    hs.value = 1;
    env.value = 1;
    legal.value = 1;
    quality.value = 1;
    risk_form.elements["risk_rating"].value = "";
    risk_form.elements["risk_level"].value = "";

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
function appendCurrentDate () {
    var currentDate = moment().format("MMMM Do YYYY, h:mm:ss a");
    // var today = new Date();
    var date_element = document.getElementById("risk_current_date");
    date_element.innerHTML= currentDate;
}

window.onload = appendCurrentDate;

// add rows of risk responses dynamically
// initialize counter
var counter = 0;

// add new row function	
function new_row()
{
	var parent_element = "response-table-body";

	counter++;
	
	// create a new row
	var new_row = document.createElement('tr');

	// set id for the new row
	new_row.id = "response-row-" + counter; 

	// add innerhtml elements from existing first row
	new_row.innerHTML = document.getElementById("response-row").innerHTML;

	// create new table cell to hold link that will remove one of the added rows
	var new_cell = document.createElement('td');

	// assign ID to new table cell
	new_cell.id = "remove-row-" + counter;

	// add content to new cell
	// var row_counter  = "response-row-" + counter
	new_cell.innerHTML = "<i onclick='delete_row(&quot;"+new_row.id+"&quot;)' class='fa fa-times' aria-hidden='true'></i>";

	// new_cell.innerHTML = "<a href='' onclick=''><i class='fa fa-times' aria-hidden='true'></i></a>";

	// append new cell to new row
	new_row.appendChild(new_cell);

	// append new row to parent element
	document.getElementById(parent_element).appendChild(new_row);
}


// delete row
function delete_row(elementId)
{
	// Removes an element from the document
    var element = document.getElementById(elementId);
    //element.parentNode.removeChild(element);
    element.remove();
}
