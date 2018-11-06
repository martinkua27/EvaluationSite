$(document).ready(function() {
$("#verify").click(function() {


var subject = $("#prof").val();



$.post("ajax/verifySubj.php", {
subject1: subject
}, function(data) {


swal(data);
$('#myform')[0].reset(); // To reset form fields	
});





});
});