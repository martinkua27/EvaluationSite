$(document).ready(function() {
$("#saveevaluation").click(function() {

var prof = $("#prof").val();
var subjectcode = $("#subjectcode").val();
var empid = $("#emp_id").val();
var section = $("#block").val();
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
var question14a = parseFloat($('input[name="question14a"]:checked').val());
var question15a = parseFloat($('input[name="question15a"]:checked').val());
var question16a = parseFloat($('input[name="question16a"]:checked').val());

var question1b = parseFloat($('input[name="question1b"]:checked').val());
var question2b = parseFloat($('input[name="question2b"]:checked').val());
var question3b = parseFloat($('input[name="question3b"]:checked').val());

var question1c = parseFloat($('input[name="question1c"]:checked').val());
var question2c = parseFloat($('input[name="question2c"]:checked').val());

var question1d = parseFloat($('input[name="question1d"]:checked').val());
var question2d = parseFloat($('input[name="question2d"]:checked').val());
var question3d = parseFloat($('input[name="question3d"]:checked').val());
var question4d = parseFloat($('input[name="question4d"]:checked').val());
var question5d = parseFloat($('input[name="question5d"]:checked').val());
var question6d = parseFloat($('input[name="question6d"]:checked').val());

var question1e = parseFloat($('input[name="question1e"]:checked').val());
var question2e = parseFloat($('input[name="question2e"]:checked').val());
var question3e = parseFloat($('input[name="question3e"]:checked').val());
var question4e = parseFloat($('input[name="question4e"]:checked').val());
var question5e = parseFloat($('input[name="question5e"]:checked').val());
var question6e = parseFloat($('input[name="question6e"]:checked').val());
var question7e = parseFloat($('input[name="question7e"]:checked').val());
var question8e = parseFloat($('input[name="question8e"]:checked').val());
var question9e = parseFloat($('input[name="question9e"]:checked').val());



var totalA = question1a + question2a + question3a + question4a + question5a + question6a + question7a + question8a + question9a + question10a + question11a + question12a + question13a + question14a + question15a + question16a;
var averageA = totalA / 16;
var averagePercentA = averageA * 0.40;
var finalValueA = averagePercentA.toFixed(2);

var totalB = question1b + question2b + question3b;
var averageB = totalB / 3;
var averagePercentB = averageB * 0.20;
var finalValueB = averagePercentB.toFixed(2);

var totalC = question1c + question2c;
var averageC = totalC / 2;
var averagePercentC = averageC * 0.15;
var finalValueC = averagePercentC.toFixed(2);

var totalD = question1d + question2d + question3d + question4d + question5d + question6d;
var averageD = totalD / 6;
var averagePercentD = averageD * 0.15;
var finalValueD = averagePercentD.toFixed(2);

var totalE = question1e + question2e + question3e + question4e + question5e + question6e + question7e + question8e + question9e;
var averageE = totalE / 9;
var averagePercentE = averageE * 0.10;
var finalValueE = averagePercentE.toFixed(2);

var totalValue = parseFloat(finalValueA) + parseFloat(finalValueB) + parseFloat(finalValueC) + parseFloat(finalValueD) + parseFloat(finalValueE);



if ($('input[name="question1a"]:checked').val() && $('input[name="question2a"]:checked').val() && $('input[name="question3a"]:checked').val() &&
	$('input[name="question4a"]:checked').val() && $('input[name="question5a"]:checked').val() && $('input[name="question6a"]:checked').val() && 
	$('input[name="question7a"]:checked').val() && $('input[name="question8a"]:checked').val() && $('input[name="question9a"]:checked').val() &&
	$('input[name="question10a"]:checked').val() && $('input[name="question11a"]:checked').val() && $('input[name="question12a"]:checked').val() &&
	$('input[name="question13a"]:checked').val() && $('input[name="question14a"]:checked').val() && $('input[name="question15a"]:checked').val() &&
	$('input[name="question16a"]:checked').val() && $('input[name="question1b"]:checked').val() && $('input[name="question2b"]:checked').val() &&
	$('input[name="question3b"]:checked').val() && $('input[name="question1c"]:checked').val() && $('input[name="question2c"]:checked').val() &&
	$('input[name="question1d"]:checked').val() && $('input[name="question2d"]:checked').val() && $('input[name="question3d"]:checked').val() &&
	$('input[name="question4d"]:checked').val() && $('input[name="question5d"]:checked').val() && $('input[name="question6d"]:checked').val() &&
	$('input[name="question1e"]:checked').val() && $('input[name="question2e"]:checked').val() && $('input[name="question3e"]:checked').val() &&
	$('input[name="question4e"]:checked').val() && $('input[name="question5e"]:checked').val() && $('input[name="question6e"]:checked').val() &&
	$('input[name="question7e"]:checked').val() && $('input[name="question8e"]:checked').val() && $('input[name="question9e"]:checked').val()) {

$.post("ajax/saveEvaluation.php", {
finalValueA1: finalValueA,
finalValueB1: finalValueB,
finalValueC1: finalValueC,
finalValueD1: finalValueD,
finalValueE1: finalValueE,
prof1: prof,
subjectcode1: subjectcode,
empid1: empid,
section1: section,
comments1: comments,
totalValue1: totalValue
}, function(data) {

$("input[type=radio]").attr('disabled', true);


 $("#verify").removeAttr('disabled');

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