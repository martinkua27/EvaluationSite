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





$con = mysqli_connect('localhost','root','','evaluationdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


//mysqli_select_db($con,"ajax_demo");
$sql = "UPDATE login_table SET emp_pass='".$q."' WHERE emp_id='" .$_SESSION['login_user'] ."'";


                  if($conn->query($sql) === TRUE) {

                   // echo "Evaluation Submitted";
                      
                    echo "Success";
                     
                  }else{
                  	echo "change password failed";
                  }


mysqli_close($con);


?>
</body>
</html>