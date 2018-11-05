<!DOCTYPE html>
<html>
<head>
<style>

 <link href="classroomobservation/css/bootstrap.min.css" rel="stylesheet">
    <link href="classroomobservation/css/classroomobserve.css" rel="stylesheet">

     <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">

     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script src="js/saveObservationSheet.js"></script>

      <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>

table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>


</head>
<body>

<?php
include('session.php');
$q = $_GET['q'];
$dateToday = date("l") . " " . date("Y-m-d");
$academicYearEnd = date('Y', strtotime('+1 year'));
$academicYearStart = date('Y'); 

$con = mysqli_connect('localhost','root','','evaluationdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM assigned_schedule WHERE course_code = '".$q."' GROUP BY course_code " ;
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
       
	echo " <h3 class='boxed_item'>Class<br>Schedule</span></h3>
			<br>	
		
		 ";  

		 echo " <h5 class='department'>Subject</h5>
				<h1 class='name'>". $row['course_title'] ."</h1>
			<hr>
	
		 ";	

		  echo " <h5 class='department'>Day and Time</h5>
				<h1 class='name'>". $row['schedule'] ."</h1>
			<hr>
	
		 ";

		 echo " <h5 class='department'>Room</h5>
				<h1 class='name'>". $row['room'] ."</h1>
			<hr>
	
		 ";

		 echo " <h5 class='department'>Semester</h5>
				<h1 class='name'>". $row['semester'] ."</h1>
			<hr>
	
		 ";

		  echo " <h5 class='department'>School Year</h5>
				<h1 class='name'>". $row['academic_year'] ."</h1>
			<hr>
	
		 ";


		 echo " <h5 class='department'>Date Today</h5>
				<h1 class='name'>". $dateToday ."</h1>
			
	
		 ";
 

}


mysqli_close($con);


?>
</body>
</html>