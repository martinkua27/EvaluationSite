<!DOCTYPE html>
    <html>
    <head>
    
    </head>
<body>

<?php
include('session.php');
$sem = $_GET['sem'];
$profname = $_GET['prof'];
$ay = $_GET['ay'];



$con = mysqli_connect('localhost','root','','evaluationdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$aTotalStudent = 0;
$totalStudent = 0;

 $aTotalDeanPa = 0;
 $aTotalViceDeanPa = 0;
 $totalPaDeanViceDean = 0;

 $aTotalDeanCo = 0;
 $TotalDeanCo = 0;
 $aTotalViceDeanCo = 0;
 $TotalViceDeanCo = 0;
 $totalCoDeanViceDean = 0;

  $aTotalChairpersonPa = 0;

   $aTotalChairCo  = 0;
   $totalChairCo = 0;

   $aTotalSelf = 0;



mysqli_select_db($con,"ajax_demo");
$sql="SELECT COUNT(id) as id, SUM(totalValue) as total  FROM evaluation_average_per_stduents where emp_name like '". $profname ."'and academic_year like '". $ay ."' and semester like '".$sem."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
   
 $aTotalStudent = $row['total'];

  $id = 0;
 $id = $row['id'];
 if($id == 0){
    $id = 1;
 }

 $totalStudent = $aTotalStudent /$id;
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator, SUM(totalValue) as total FROM evaluation_average_per_prof where evaluator like 'dean' and emp_name_evaluated like '". $profname ."'and academic_year like '". $ay ."' and semester like '".$sem."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalDeanPa = $row['total'];

}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator, SUM(totalValue) as total FROM evaluation_average_per_prof where evaluator like 'vicedean' and emp_name_evaluated like '". $profname ."'and academic_year like '". $ay ."' and semester like '".$sem."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalViceDeanPa = $row['total'];

}

$totalPaDeanViceDean = ($aTotalDeanPa + $aTotalViceDeanPa)/2;

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator,COUNT(id) as id,SUM(totalValue) as total FROM observation_sheet_per_prof where evaluator like 'dean' and emp_name_evaluated like '". $profname ."'and academic_year like '". $ay ."' and semester like '".$sem."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalDeanCo = $row['total'];

 $id = 0;
 $id = $row['id'];

  if($id == 0){
    $id = 1;
 }

$TotalDeanCo = ($aTotalDeanCo/21)/$id;

}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator,COUNT(id) as id, SUM(totalValue) as total FROM observation_sheet_per_prof where evaluator like 'vicedean' and emp_name_evaluated like '". $profname ."'and academic_year like '". $ay ."' and semester like '".$sem."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalViceDeanCo = $row['total'];


 $id = 0;
 $id = $row['id'];
 if($id == 0){
    $id = 1;
 }

$TotalViceDeanCo = ($aTotalViceDeanCo/21)/$id;

}

$totalCoDeanViceDean = ($TotalDeanCo + $TotalViceDeanCo)/2;

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator, SUM(totalValue) as total FROM evaluation_average_per_prof where evaluator like 'chairperson' and emp_name_evaluated like '". $profname ."'and academic_year like '". $ay ."' and semester like '".$sem."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalChairpersonPa = $row['total'];


}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator,COUNT(id) as id, SUM(totalValue) as total FROM observation_sheet_per_prof where evaluator like 'chairperson' and emp_name_evaluated like '". $profname ."'and academic_year like '". $ay ."' and semester like '".$sem."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalChairCo = $row['total'];

$id = 0;
 $id = $row['id'];
 if($id == 0){
    $id = 1;
 }


$totalChairCo = ($aTotalChairCo/21)/$id;

}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator, SUM(totalValue) as total FROM evaluation_average_per_prof where evaluator != 'dean' and evaluator != 'vicedean' and evaluator != 'chairperson' and emp_name_evaluated like '". $profname ."'and academic_year like '". $ay ."' and semester like '".$sem."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalSelf = $row['total'];



}

$finalDeanViceDeanPa = $totalPaDeanViceDean * 0.20;
$finalDeanViceDeanCo = $totalCoDeanViceDean * 0.05;
$finalChairPa = $aTotalChairpersonPa * 0.20;
$finalChairCo = $totalChairCo * 0.30;
$finalStudents = $totalStudent * 0.20;
$finalSelf = $aTotalSelf * 0.05;
$finalGrade = $finalDeanViceDeanPa + $finalDeanViceDeanCo + $finalChairPa + $finalChairCo + $finalStudents + $finalSelf; 


echo "<div class='panel panel-default'>
              <div class='panel-heading main-color-bg'>
                  <h3 class='panel-title'><b></b></h3>
              </div>
              <div class='panel-body'>
                <div class='col-md-3'>
                  <div class='well dash-box bg-color'>
                    <h2 style='text-align:center;'> ". $finalDeanViceDeanPa ." </h2>
                    <h6 style='text-align: center;'>Dean/VDAA Performance Appraisal (20%)</h6>
                  </div>
                </div>
                <div class='col-md-3'>
                  <div class='well dash-box bg-color1'>
                    <h2 style='text-align: center;'> ".$finalDeanViceDeanCo." </h2>
                     <h6 style='text-align: center;'>Dean/VDAA Classroom Observation (5%)</h6>
                  </div>
                </div>
                <div class='col-md-3'>
                  <div class='well dash-box bg-color2'>
                    <h2 style='text-align: center;'>". $finalChairPa ."</h2>
                     <h6 style='text-align: center;'>Chairperson Performance Appraisal (20%)</h6>
                  </div>
                </div>
                <div class='col-md-3'>
                  <div class='well dash-box bg-color3'>
                    <h2 style='text-align: center;'> ".$finalChairCo."</h2>
                    <h6 style='text-align: center;'>Chairperson Classroom Observation (30%)</h6>
                  </div>
                </div>

                <div class='col-md-3'>
                  <div class='well dash-box bg-color3'>
                    <h2 style='text-align: center;'> ".$finalStudents." </h2>
                    <h6 style='text-align: center;'>Student Evaluation (20%)</h6>
                  </div>
                </div>

                <div class='col-md-3'>
                  <div class='well dash-box bg-color3'>
                    <h2 style='text-align: center;'> ".$finalSelf."</h2>
                    <h6 style='text-align: center;'>Self Evaluation (5%)</h6>
                  </div>
                </div>

                <div class='col-md-3'>
                  <div class='well dash-box bg-color3'>
                    <h2 style='text-align: center;'> ". $finalGrade ." </h2>
                    <h6 style='text-align: center;'><br>Final <br> Grade </h6>
                  </div>
                </div>

              </div>
            </div>

            ";

mysqli_close($con);


?>
</body>
</html>