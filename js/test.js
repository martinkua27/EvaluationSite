$(document).ready(function() {
$("#saveevaluation").click(function() {


var empid = $("#empideval").val();
var comments = $("#comments").val();

var question1a = parseFloat($('input[name="question1a"]:checked').val());
var question2a = parseFloat($('input[name="question2a"]:checked').val());
var question3a = parseFloat($('input[name="question3a"]:checked').val());
var question4a = parseFloat($('input[name="question4a"]:checked').val());
var question5a = parseFloat($('input[name="question5a"]:checked').val());
var question6a = parseFloat($('input[name="question6a"]:checked').val());
var question7a = parseFloat($('input[name="question7a"]:checked').val());
var question8a = parseFloat($('input[name="question8a"]:checked').val());
var question9a = parseFloat($('input[name="question9a"]:checked').val());
var question10a = parseFloat($('input[name="question10a"]:checked').val());
var question11a = parseFloat($('input[name="question11a"]:checked').val());
var question12a = parseFloat($('input[name="question12a"]:checked').val());
var question13a = parseFloat($('input[name="question13a"]:checked').val());

var question1b = parseFloat($('input[name="question1b"]:checked').val());
var question2b = parseFloat($('input[name="question2b"]:checked').val());
var question3b = parseFloat($('input[name="question3b"]:checked').val());
var question4b = parseFloat($('input[name="question4b"]:checked').val());

var question1c = parseFloat($('input[name="question1c"]:checked').val());
var question2c = parseFloat($('input[name="question2c"]:checked').val());
var question3c = parseFloat($('input[name="question3c"]:checked').val());
var question4c = parseFloat($('input[name="question4c"]:checked').val());
var question5c = parseFloat($('input[name="question5c"]:checked').val());
var question6c = parseFloat($('input[name="question6c"]:checked').val());
var question7c = parseFloat($('input[name="question7c"]:checked').val());
var question8c = parseFloat($('input[name="question8c"]:checked').val());
var question9c = parseFloat($('input[name="question9c"]:checked').val());

var totalA = question1a + question2a + question3a + question4a + question5a + question6a + question7a + question8a + question9a + question10a + question11a + question12a + question13a;
var averageA = totalA / 13;
var averagePercentA = averageA * 0.70;
var finalValueA = averagePercentA.toFixed(2);

var totalB = question1b + question2b + question3b + question4b;
var averageB = totalB / 4;
var averagePercentB = averageB * 0.20;
var finalValueB = averagePercentB.toFixed(2);

var totalC = question1c + question2c + question3c + question4c + question5c + question6c + question7c + question8c + question9c;
var averageC = totalC / 9;
var averagePercentC = averageC * 0.10;
var finalValueC = averagePercentC.toFixed(2);



if ($('input[name="question1a"]:checked').val() && $('input[name="question2a"]:checked').val() && $('input[name="question3a"]:checked').val() &&
	$('input[name="question4a"]:checked').val() && $('input[name="question5a"]:checked').val() && $('input[name="question6a"]:checked').val() && 
	$('input[name="question7a"]:checked').val() && $('input[name="question8a"]:checked').val() && $('input[name="question9a"]:checked').val() &&
	$('input[name="question10a"]:checked').val() && $('input[name="question11a"]:checked').val() && $('input[name="question12a"]:checked').val() &&
	$('input[name="question13a"]:checked').val() && $('input[name="question1b"]:checked').val() && $('input[name="question2b"]:checked').val() &&
	$('input[name="question3b"]:checked').val() && $('input[name="question4b"]:checked').val() && $('input[name="question1c"]:checked').val() && 
	$('input[name="question2c"]:checked').val() && $('input[name="question3c"]:checked').val() && $('input[name="question4c"]:checked').val() && 
	$('input[name="question5c"]:checked').val() && $('input[name="question6c"]:checked').val() && $('input[name="question7c"]:checked').val() && 
	$('input[name="question8c"]:checked').val() && $('input[name="question9c"]:checked').val()) {

$.post("ajax/saveEvaluationProf.php", {
finalValueA1: finalValueA,
finalValueB1: finalValueB,
finalValueC1: finalValueC,
empid1: empid,
comments1: comments
}, function(data) {


swal(data);

$('#myform')[0].reset(); // To reset form fields	
});
}
else{


swal(
  'Evaluation',
  'please answer all the question',
  'error'
);

}

});
});