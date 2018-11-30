$(document).ready(function() {
$("#confirmBtnStudent").click(function() {


var empid = $("#emp").val();


$.post("resetPassStudent.php", {
empid1: empid
}, function(data) {


swal(data);

$('#studentTbl').reset(); // To reset form fields	
});



});
});