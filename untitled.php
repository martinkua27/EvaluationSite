<?php
include('session.php');
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','evaluationdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM emp_details WHERE emp_id = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {

	echo " 
		
				<br><img src='".$row['emp_image']."' id='profpic' class='img-responsive center-block img-circle img-profile'>
		
	     ";   

}


?>