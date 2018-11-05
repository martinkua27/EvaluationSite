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

$aTotalStudent = 0;
$bTotalStudent = 0;
$cTotalStudent = 0;
$dTotalStudent = 0;
$eTotalStudent = 0;

$aTotalSelf = 0;
$bTotalSelf = 0;
$cTotalSelf = 0;

//dean performance appraisal variables
$aTotalDeanPa = 0;
$bTotalDeanPa = 0;
$cTotalDeanPa = 0;

//vice dean performance appraisal variables
$aTotalViceDeanPa = 0;
$bTotalViceDeanPa = 0;
$cTotalViceDeanPa = 0;

//chairperson performance appraisal variables
$aTotalChairpersonPa = 0;
$bTotalChairpersonPa = 0;
$cTotalChairpersonPa = 0;

//dean classroom observation variables
$aTotalDeanCo = 0;
$bTotalDeanCo = 0;
$cTotalDeanCo = 0;
$dTotalDeanCo = 0;

//vice dean classroom observation variables
$aTotalViceDeanCo = 0;
$bTotalViceDeanCo = 0;
$cTotalViceDeanCo = 0;
$dTotalViceDeanCo = 0;

//chairperson classroom observation variables
$aTotalChairCo = 0;
$bTotalChairCo = 0;
$cTotalChairCo = 0;
$dTotalChairCo = 0;


$totalStudent = 0;
$totalSelf = 0;
$totalDeanPa = 0;
$totalViceDeanPa = 0;
$totalChairpersonPa = 0;
$totalDeanCo = 0;
$totalViceDeanCo = 0;
$totalChairCo = 0;

$totalPaDeanViceDean = 0;
$totalCoDeanViceDean = 0;

mysqli_select_db($con,"ajax_demo");
$sql="SELECT COUNT(id) as id, SUM(a_average) as a, SUM(b_average) as b, SUM(c_average) as c, SUM(d_average) as d, SUM(e_average) as e  FROM evaluation_average_per_stduents where emp_name like '". $q ."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {
   
 $aTotalStudent = $row['a'];
 $bTotalStudent = $row['b'];
 $cTotalStudent = $row['c'];
 $dTotalStudent = $row['d'];
 $eTotalStudent = $row['e'];

  $id = 0;
 $id = $row['id'];
 if($id == 0){
    $id = 1;
 }

 $totalStudent = ($aTotalStudent + $bTotalStudent + $cTotalStudent + $dTotalStudent + $eTotalStudent)/$id;


}

echo "<p id='studentTotal'>".$totalStudent."</p>";

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator, SUM(a_average) as a, SUM(b_average) as b, SUM(c_average) as c FROM evaluation_average_per_prof where evaluator != 'dean' and evaluator != 'vicedean' and evaluator != 'chairperson' and emp_name_evaluated like '". $q ."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalSelf = $row['a'];
 $bTotalSelf = $row['b'];
 $cTotalSelf = $row['c'];


$totalSelf = $aTotalSelf + $bTotalSelf + $cTotalSelf;

}


echo "<p id='selfTotal'>".$totalSelf."</p>";

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator, SUM(a_average) as a, SUM(b_average) as b, SUM(c_average) as c FROM evaluation_average_per_prof where evaluator like 'dean' and emp_name_evaluated like '". $q ."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalDeanPa = $row['a'];
 $bTotalDeanPa = $row['b'];
 $cTotalDeanPa = $row['c'];

$totalDeanPa = $aTotalDeanPa + $bTotalDeanPa + $cTotalDeanPa;

}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator, SUM(a_average) as a, SUM(b_average) as b, SUM(c_average) as c FROM evaluation_average_per_prof where evaluator like 'vicedean' and emp_name_evaluated like '". $q ."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalViceDeanPa = $row['a'];
 $bTotalViceDeanPa = $row['b'];
 $cTotalViceDeanPa = $row['c'];

$totalViceDeanPa = $aTotalViceDeanPa + $bTotalViceDeanPa + $cTotalViceDeanPa;

}

$totalPaDeanViceDean = ($totalDeanPa + $totalViceDeanPa)/2;


echo "<p id='deanvicedeanPa'>".$totalPaDeanViceDean."</p>";

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator,COUNT(id) as id,SUM(a_average) as a, SUM(b_average) as b, SUM(c_average) as c, SUM(d_average) as d FROM observation_sheet_per_prof where evaluator like 'dean' and emp_name_evaluated like '". $q ."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalDeanCo = $row['a'];
 $bTotalDeanCo = $row['b'];
 $cTotalDeanCo = $row['c'];
 $dTotalDeanCo = $row['d'];

 $id = 0;
 $id = $row['id'];

  if($id == 0){
    $id = 1;
 }

$TotalDeanCo = (($aTotalDeanCo + $bTotalDeanCo + $cTotalDeanCo + $dTotalDeanCo)/21)/$id;

}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator,COUNT(id) as id, SUM(a_average) as a, SUM(b_average) as b, SUM(c_average) as c, SUM(d_average) as d FROM observation_sheet_per_prof where evaluator like 'vicedean' and emp_name_evaluated like '". $q ."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalViceDeanCo = $row['a'];
 $bTotalViceDeanCo = $row['b'];
 $cTotalViceDeanCo = $row['c'];
 $dTotalViceDeanCo = $row['d'];


 $id = 0;
 $id = $row['id'];
 if($id == 0){
    $id = 1;
 }

$TotalViceDeanCo = (($aTotalViceDeanCo + $bTotalViceDeanCo + $cTotalViceDeanCo + $dTotalViceDeanCo)/21)/$id;

}

$totalCoDeanViceDean = ($TotalDeanCo + $TotalViceDeanCo)/2;

echo "<p id='deanvicedeanCo'>".$totalCoDeanViceDean."</p>";

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator,COUNT(id) as id, SUM(a_average) as a, SUM(b_average) as b, SUM(c_average) as c, SUM(d_average) as d FROM observation_sheet_per_prof where evaluator like 'chairperson' and emp_name_evaluated like '". $q ."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalChairCo = $row['a'];
 $bTotalChairCo = $row['b'];
 $cTotalChairCo = $row['c'];
 $dTotalChairCo = $row['d'];

$id = 0;
 $id = $row['id'];
 if($id == 0){
    $id = 1;
 }


$totalChairCo = (($aTotalChairCo + $bTotalChairCo + $cTotalChairCo + $dTotalChairCo)/21)/$id;

}


echo "<p id='chairpersonCo'>".$totalChairCo."</p>";

mysqli_select_db($con,"ajax_demo");
$sql="SELECT evaluator, SUM(a_average) as a, SUM(b_average) as b, SUM(c_average) as c FROM evaluation_average_per_prof where evaluator like 'chairperson' and emp_name_evaluated like '". $q ."'";
$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result)) {


 $aTotalChairpersonPa = $row['a'];
 $bTotalChairpersonPa = $row['b'];
 $cTotalChairpersonPa = $row['c'];



$totalChairpersonPa = $aTotalChairpersonPa + $bTotalChairpersonPa + $cTotalChairpersonPa;

}

echo "<p id='chairpersonPa'>".$totalChairpersonPa."</p>";

mysqli_close($con);


?>


</body>
</html>