<!DOCTYPE html>
<html>
<head>
<style>
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

function getimage($var){
	$con = mysqli_connect('localhost','root','','evaluationdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM emp_details WHERE emp_id = '".$var."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {

			$myObj->name = $row['emp_image'];

			$myJSON = json_encode($myObj);

			echo $myJSON;
		
}

}

$con = mysqli_connect('localhost','root','','evaluationdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM assigned_schedule_table WHERE subject_code = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
   
    echo " 
		
				<br><input class='input100' type='text' id='subjectcode' name='subjectcode' style='display: none;' value='". $q ."' readonly>
		
	     ";


	      

	echo "  
				<br><input class='input100' type='text' id='emp_id' name='emp_id' style='display: none;' value='". $row['emp_id'] ."' readonly>
			
	     ";     

	     getimage($row['emp_id']);


    echo "  <li class='navigation_item' id='profile'>
				PROFESSOR <br>
			<h2><span class='glyphicon glyphicon-user' aria-hidden='true' ></span>". $row['emp_name'] ."</h2>
				<input type='text' name='prof' id='prof' style='display: none;' value='". $row['emp_name'] ."' readonly>
			
			</li>
	     ";

	echo "  <li class='navigation_item' id='work_experience'>
				DEPARTMENT
				<br><h2><span class='glyphicon glyphicon-user' aria-hidden='true'></span>". $row['emp_department'] ."</h2>
			</li>
	     ";

	echo "  <li class='navigation_item' id='skills'>
				SCHOOL YEAR <br>
				<h2><span class='glyphicon glyphicon-user' aria-hidden='true'></span>". $row['school_year'] ."</h2>
			</li>

	     "; 

	echo "  <li class='navigation_item' id='interests'>
				SEMESTER<br>
				<h2><span class='glyphicon glyphicon-user' aria-hidden='true'></span>". $row['sem'] ."</h2>
			</li>
	
	     ";        

	echo " <a href='#''><h1 class='boxed_item'><span class='logo_bold'>Class Schedule</span></h1>
			</a><!--<h2 class='logo_title'>Class Schedule</h2>-->
	
		 ";   

	echo " <li class='navigation_item' id='portfolio'>
				DAY
				<br><h2><span class='glyphicon glyphicon-user' aria-hidden='true'></span>". $row['day'] ."</h2>
			</li>
	
		 ";	   

	echo "  <li class='navigation_item' id='contact'>
				TIME
				<br><h3><span class='glyphicon glyphicon-user' aria-hidden='true'></span>". $row['time'] ."</h3>
			</li>
	     ";	 

	echo "  <li class='navigation_item' id='contact'>
				ROOM
				<br><h2><span class='glyphicon glyphicon-user' aria-hidden='true'></span>". $row['room'] ."</h2>
			</li>
		 ";   

	echo " <li class='navigation_item' id='contact'>
				DATE TODAY
				<h3><span class='glyphicon glyphicon-user' aria-hidden='true'></span>". $dateToday ."</h3>
			</li>
	     ";	   

}


mysqli_close($con);


?>
</body>
</html>