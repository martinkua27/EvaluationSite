<!DOCTYPE html>
    <html>
    <head>
    
    </head>
<body>

<?php
include('session.php');
$q = $_GET['q'];
$getsection = $_GET['section'];
$dateToday = date("l") . " " . date("Y-m-d");

$con = mysqli_connect('localhost','root','','evaluationdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$academicYearEnd = date('Y', strtotime('+1 year'));
$academicYearStart = date('Y'); 

function pic($a){
	include('session.php');

	$con = mysqli_connect('localhost','root','','evaluationdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

	mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM emp_details WHERE emp_num = '".$a."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {

	if($result->num_rows == 0){

	
		echo "  
	
			
				<img src='images/blank.png' id='profpic' class='img-responsive center-block img-circle img-profile' style='margin-bottom:50px; margin-left:50px;'>
			<hr>
	     "; 
echo "<br><br><br>";
	}
	else{

	
		echo "  
	
			
				<img src='".$row['emp_image']."' id='profpic' class='img-responsive center-block img-circle img-profile' style='margin-bottom:50px; margin-left:50px;'>
			<hr>
	     "; 
echo "<br><br><br>";
	}

	

  
}
}




mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM assigned_schedule WHERE course_code = '".$q."' and class_section = '" . $getsection . "' GROUP BY course_code ";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
   
    echo " 
		
				<br><input class='input100' type='text' id='subjectcode' name='subjectcode' style='display: none;' value='". $q ."' readonly>
		
	     ";



	echo "  
				<br><input class='input100' type='text' id='emp_id' name='emp_id' style='display: none;' value='". $row['faculty_id'] ."' readonly>
			
	     ";     

	     pic($row['faculty_id']);

    echo "  <h5 class='professor'>PROFESSOR</h5>
			<h1 class='name'>". $row['faculty'] ."</h1>
				<input type='text' name='prof' id='prof' style='display: none;' value='". $row['faculty'] ."' readonly>
			<hr>
	     "; 

	     echo " <h5 class='department'>Subject</h5>
				<h1 class='name'>". $row['course_title'] ."</h1>
			<hr>
	
		 ";	 
      

	echo " <h3 class='boxed_item'>Class<br>Schedule</span></h3>
			<br>	
		
		 ";   

	echo " <h5 class='department'>DAY and Time</h5>
				<h1 class='name'>". $row['schedule'] ."</h1>
			<hr>
	
		 ";	   


	echo " <h5 class='department'>ROOM</h5>
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

	echo " <h5 class='department'>DATE TODAY</h5>
				<h1 class='name'>". $dateToday ."</h1>
			<hr>
	     ";	   

}

mysqli_close($con);


?>
</body>
</html>