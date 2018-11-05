<!DOCTYPE html>
    <html>
    <head>
    <link href="css/studenteval.css" rel="stylesheet">
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
include('../session.php');
$q = $_GET['q'];
$dateToday = date("l") . " " . date("Y-m-d");

$con = mysqli_connect('localhost','root','','evaluationdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM emp_details where emp_department like '". $q ."' GROUP BY emp_name ";
$result = mysqli_query($con,$sql);

echo "<h5>Professors</h5>";

echo "<select class= 'form-control subj-code' name='profdropdown' style='width: 270px;' id='profdropdown' onchange='showProf(this.value)'";
                         

                                  echo "<option value=''>Select</option>";
$ctr = 0;
while($row = mysqli_fetch_array($result)) {
   

										if($ctr == 0){
											 unset($option1);
                                    $option1 = $row['emp_name'];
                                    echo "<option value=''>Select</option>";
                                    $ctr = $ctr + 1;
										}
										

                                       unset($option1);
                                    $option1 = $row['emp_name'];
                                    echo "<option value='$option1'>$option1</option>";
										
                                  
                                
                                   

                                   }

                                    echo "</select>";

                                         if(isset($_POST['dropdownvalue'])){ //check if $_POST['examplePHP'] exists
          
                        echo '<script>alert('. $_POST['dropdownvalue'] .')</script>'; // echo the data
                          die(); // stop execution of the script.
                       

  

}

mysqli_close($con);


?>


</body>
</html>