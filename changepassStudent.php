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





$con = mysqli_connect('localhost','root','','evaluationdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


//mysqli_select_db($con,"ajax_demo");
$sql = "UPDATE student_list SET student_pass='".$q."' WHERE student_id ='" .$_SESSION['login_user'] ."'";


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