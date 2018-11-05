$(document).ready(function() {
$("#saveevaluation").click(function() {


var prof = $("#prof").val();
var subjectcode = $("#scode").val();
var empid = $("#emp_id").val();
var section = $("#section").val();
var comments = $("#comments").val();

var question1a = parseFloat($('input[name="question1a"]:checked').val());
var question2a = parseFloat($('input[name="question2a"]:checked').val());
var question3a = parseFloat($('input[name="question3a"]:checked').val());
var question4a = parseFloat($('input[name="question4a"]:checked').val());
var question5a = parseFloat($('input[name="question5a"]:checked').val());
var question6a = parseFloat($('input[name="question6a"]:checked').val());
var question7a = parseFloat($('input[name="question7a"]:checked').val());
var question8a = parseFloat($('input[name="question8a"]:checked').val());

var question1b = parseFloat($('input[name="question1b"]:checked').val());
var question2b = parseFloat($('input[name="question2b"]:checked').val());
var question3b = parseFloat($('input[name="question3b"]:checked').val());
var question4b = parseFloat($('input[name="question4b"]:checked').val());
var question5b = parseFloat($('input[name="question5b"]:checked').val());
var question6b = parseFloat($('input[name="question6b"]:checked').val());
var question7b = parseFloat($('input[name="question7b"]:checked').val());

var question1c = parseFloat($('input[name="question1c"]:checked').val());
var question2c = parseFloat($('input[name="question2c"]:checked').val());

var question1d = parseFloat($('input[name="question1d"]:checked').val());
var question2d = parseFloat($('input[name="question2d"]:checked').val());
var question3d = parseFloat($('input[name="question3d"]:checked').val());
var question4d = parseFloat($('input[name="question4d"]:checked').val());




var totalA = (question1a + question2a + question3a + question4a + question5a + question6a + question7a + question8a);

var finalValueA = totalA.toFixed(2);

var totalB = (question1b + question2b + question3b + question4b + question5b + question6b + question7b);

var finalValueB = totalB.toFixed(2);

var totalC = (question1c + question2c);

var finalValueC = totalC.toFixed(2);

var totalD = (question1d + question2d + question3d + question4d);

var finalValueD = totalD.toFixed(2);


if (isNaN(totalA) && isNaN(totalB) && isNaN(totalC) && isNaN(totalD)) {

swal(
  'Evaluation',
  'please answer all the question',
  'error'
);


}
else{

$.post("ajax/saveObservationSheet.php", {
finalValueA1: finalValueA,
finalValueB1: finalValueB,
finalValueC1: finalValueC,
finalValueD1: finalValueD,
prof1: prof,
subjectcode1: subjectcode,
empid1: empid,
section1: section,
comments1: comments
}, function(data) {


swal(data);
$('#myform')[0].reset(); // To reset form fields	
});



}

});
});