$(document).ready(function() {
$("#confirmBtn").click(function() {


var empid = $("#emp").val();


$.post("resetPass.php", {
empid1: empid
}, function(data) {


swal(data);

$('#empTbl').reset(); // To reset form fields	
});



});
});