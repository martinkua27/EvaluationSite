<?php
require('fpdf.php');
//A4 width
//default margin: 10mm each side
//writable horizontal: 219-(10*2) = 189mm
$name = $_GET['varr'];
$ay = $_GET['ay'];
$sem = $_GET['sem'];

////connect to database
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "evaluationdb";

//// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//get prof data
$query = mysqli_query($conn, "select * from assigned_schedule
                       where faculty = '".$name."'");
$info = mysqli_fetch_array($query);

//date
$today = date("m/d/y"); 

//$user = $_SESSION['username'];

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();
//Image(file name, x position, y position, width [optional], height [optional])
$pdf-> Image('watermarksbca2.png', 39, 85, 130);

//center, down, width, height
$pdf->Image('sbca-logo-red.png',70,20,60,20,0,0);
$pdf->Ln(43);

function getayNOW(){

 include("../../indexDB.php");
include('../../session.php');
 
     $ay = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM assigned_schedule";
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $ay = $row['academic_year'];

      }
       return $ay;
  }
  else{
     $ay = "None";
          
      return $ay;
  }
   

}

function getsemNOW(){

 include("../../indexDB.php");
include('../../session.php');
 
     $sem = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM assigned_schedule";
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $sem = $row['semester'];

      }
       return $sem;
  }
  else{
     $sem = "None";
          
      return $sem;
  }
   

}

//HEADER
//Cell(width, height, text, border 0(no border) 1(border), end line 0(continue) 1(new line), [align] (L/empty string (default value) C (center) R (right))
//queries 
//classroom observation
$query1 = mysqli_query($conn, "SELECT COUNT(id) as classroom_count, emp_name_evaluated,semester, academic_year, FORMAT(((SUM(a_average) + SUM(b_average) + SUM(c_average) + SUM(d_average)) / 21)/COUNT(id) ,3) as rating, FORMAT(((SUM(a_average) + SUM(b_average) + SUM(c_average) + SUM(d_average)) / 21 * 0.05)/COUNT(id),3) as totala FROM observation_sheet_per_prof WHERE position Like '%dean' AND emp_name_evaluated Like '".$name."' AND semester like '". $sem ."' AND academic_year like '". $ay ."' GROUP BY emp_name_evaluated, semester, academic_year");

$query2 = mysqli_query($conn, "SELECT COUNT(id) as classroom_count, emp_name_evaluated, semester, academic_year, FORMAT(((SUM(a_average) + SUM(b_average) + SUM(c_average) + SUM(d_average)) / 21)/COUNT(id) ,3) as rating, FORMAT(((SUM(a_average) + SUM(b_average) + SUM(c_average) + SUM(d_average)) / 21 * 0.30)/COUNT(id) ,3) as totalb FROM observation_sheet_per_prof WHERE position Like 'chairperson' AND emp_name_evaluated Like '".$name."' AND semester like '". $sem ."' AND academic_year like '". $ay ."' GROUP BY emp_name_evaluated, semester, academic_year");

//performance appraisal
$query3 = mysqli_query($conn,"SELECT COUNT(id) as performance_count,emp_name_evaluated, semester, academic_year, FORMAT(((SUM(a_average) + SUM(b_average) + SUM(c_average))/2),3) as rating, FORMAT(((SUM(a_average) + SUM(b_average) + SUM(c_average))/2)*.20,3) as totalc FROM evaluation_average_per_prof WHERE position Like '%dean' AND emp_name_evaluated Like '".$name."' AND semester like '". $sem ."' AND academic_year like '". $ay ."' GROUP BY emp_name_evaluated, semester, academic_year");

$query4 = mysqli_query($conn,"SELECT COUNT(id) as performance_count, emp_name_evaluated, semester, academic_year, FORMAT((SUM(a_average) + SUM(b_average) + SUM(c_average)),3) as rating, FORMAT((SUM(a_average) + SUM(b_average) + SUM(c_average)) * .20,3) as totald FROM evaluation_average_per_prof WHERE position Like 'chairperson' AND emp_name_evaluated Like '".$name."' AND semester like '". $sem ."' AND academic_year like '". $ay ."' GROUP BY emp_name_evaluated, semester, academic_year");

//studentsevaluation
$query5 = mysqli_query($conn,"SELECT COUNT(id) as students_count,emp_name, semester, academic_year,  FORMAT(SUM(a_average + b_average + c_average + d_average + e_average) / COUNT(student_id), 3) as rating, FORMAT(SUM(a_average + b_average + c_average + d_average + e_average) / COUNT(student_id) * 0.20, 3) as totale FROM evaluation_average_per_stduents WHERE emp_name Like '".$name."' AND semester like '". $sem ."' AND academic_year like '". $ay ."' GROUP BY emp_name, semester, academic_year");

//self-evaluation
$query6 = mysqli_query($conn,"SELECT COUNT(id) as selfeval_count, evaluator, emp_name_evaluated, semester, academic_year, FORMAT(SUM(evaluation_average_per_prof.a_average) + SUM(evaluation_average_per_prof.b_average) + SUM(evaluation_average_per_prof.c_average), 3) as rating, FORMAT(SUM(evaluation_average_per_prof.a_average) + SUM(evaluation_average_per_prof.b_average) + SUM(evaluation_average_per_prof.c_average), 3) * 0.05 as totalf FROM evaluation_average_per_prof INNER JOIN emp_details ON evaluation_average_per_prof.position = emp_details.position WHERE evaluation_average_per_prof.evaluator = emp_details.emp_num AND emp_name_evaluated LIKE '".$name."' AND semester like '". $sem ."' AND academic_year like '". $ay ."' AND evaluation_average_per_prof.evaluator != 'dean' AND evaluation_average_per_prof.position != 'vicedean' AND evaluation_average_per_prof.position != 'chairperson' GROUP BY evaluation_average_per_prof.evaluator, evaluation_average_per_prof.semester, evaluation_average_per_prof.academic_year");


//end
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(114,  5, 'San Beda College Alabang', 0, 0); 
$pdf->Cell(74,  5, 'Performance Summary', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(114,  5, '[Alabang Hills]', 0, 0); 
$pdf->Cell(74,  5, '', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(114,  5, '[Muntinlupa City, Philippines, 1709]', 0, 0); 
$pdf->Cell(35,  5, 'Date', 0, 0);
$pdf->Cell(39,  5, $today, 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(114,  5, 'Phone: [975-4432; 500-6183]', 0, 0); 
$pdf->Cell(35,  5, 'Faculty Name:', 0, 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(39,  5, $name , 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(26,  5, 'Department:', 0, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(88,  5, $info['program'], 0, 0); 
$pdf->Cell(74,  5, '', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(26,  5, 'School Year:', 0, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(88,  5, $ay, 0, 0); 
$pdf->Cell(74,  5, '', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(26,  5, 'Semester:', 0, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(88,  5, $sem, 0, 0); 
$pdf->Cell(74,  5, '', 0, 1); //end of line

$pdf->Ln(15);
//start
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(75,  5, 'Elements', 1, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(37.6,  5, 'Rating', 1, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(37.6,  5, 'Score %', 1, 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(37.6,  5, 'Total', 1, 1);//end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Classroom Observation', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '35%', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 1);//end of line

//1
while($item = mysqli_fetch_array($query1)){
if ($item['classroom_count'] == 0) {
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '1. VDAA', 'R,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(5%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 1, 'R');//end of line
} else {
$rating = $item['rating'];
$totala = $item['totala'];
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '1. VDAA', 'R,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($rating,2), 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(5%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($totala,2), 1, 1, 'R');//end of line
    
}
}

//2
while($item = mysqli_fetch_array($query2)){
if ($item['classroom_count'] == 0) {
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '2. Chair/Coordinator', 'R', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(30%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 1, 'R');//end of line
} else {
$rating = $item['rating'];
$totalb = $item['totalb'];
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '2. Chair/Coordinator', 'R', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($rating,2), 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(30%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($totalb,2), 1, 1, 'R');//end of line
}
}
//space
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 1);//end of line

//performace appraisal
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Performance Appraisal', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '40%', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 1);//end of line

//1
while($item = mysqli_fetch_array($query3)){
if ($item['performance_count'] == 0) {
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '1. Dean/VDAA', 'R,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(20%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 1, 'R');//end of line 
} else {
$rating = $item['rating'];
$totalc = $item['totalc'];
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '1. Dean/VDAA', 'R,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($rating,2), 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(20%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($totalc,2), 1, 1, 'R');//end of line   
}    
}
//2
while($item = mysqli_fetch_array($query4)){
if ($item['performance_count'] == 0) {
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '2. Chair/Coordinator', 'R', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(20%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 1, 'R');//end of line
} else {
$rating = $item['rating'];
$totald = $item['totald'];
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '2. Chair/Coordinator', 'R', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($rating,2), 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(20%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($totald,2), 1, 1, 'R');//end of line    
}
}
//space
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 1);//end of line

//studentsevaluation 
while($item = mysqli_fetch_array($query5)){
if ($item['students_count'] == 0) {
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Students Evaluation', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '20%', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 1, 'R');//end of line
} else {
$rating = $item['rating'];
$totale = $item['totale'];
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Students Evaluation', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($rating,2), 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '20%', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($totale,2), 1, 1, 'R');//end of line   
}
}
//space
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 1);//end of line

//selfevaluation 
while($item = mysqli_fetch_array($query6)){
if ($item['selfeval_count'] == 0) {
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Self Evaluation', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '5%', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0', 1, 1, 'R');//end of line
} else {
$rating = $item['rating'];
$totalf = $item['totalf'];
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Self Evaluation', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($rating,2), 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '5%', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, number_format($totalf,2), 1, 1, 'R');//end of line

//total
$finaltotal = $totala + $totalb + $totalc + $totald + $totale + $totalf;
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(75,  5, 'Total:', 1, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(37.6,  5, '(100%)', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(37.6,  5, number_format($finaltotal,2), 1, 1, 'R');//end of line
    
$pdf->Ln(15);  
//prepared by

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Prepared by:', 0, 1); 
$pdf->Ln(10); 
$pdf->Image('signatureOne.png',10,183,50,25,0,0);
$pdf->SetFont('Arial', '',12);
$pdf->Cell(50,  5, '', 'C,B', 1, 1); 
$pdf->SetFont('Arial', '',10);
$pdf->Cell(50,  5, 'Department Chair/Coordinator',0, 1); //end of line
    

$pdf->Ln(10);  
//prepared by

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Endorsed by:', 0, 0); 
$pdf->SetFont('Arial', '',12);
$pdf->Cell(45,  5, '',0, 0);
$pdf->SetFont('Arial', '',12);
$pdf->Cell(45,  5, 'Approved by:',0, 1);  
$pdf->Ln(10); 
  
$pdf->Image('signatureTwo.png',10,223,50,18,0,0);
$pdf->SetFont('Arial', '',12);
$pdf->Cell(50,  5, '', 'C,B', 0, 0); 
$pdf->SetFont('Arial', '',12);
$pdf->Cell(70,  5, '', '',0, 0);
    
$pdf->Image('signatureThree.png',127,225,50,17,0,0);   
$pdf->SetFont('Arial', '',12);
$pdf->Cell(45,  5, '', 'C,B', 1, 1); 

$pdf->SetFont('Arial', '',10);
$pdf->Cell(60,  5, 'Vice Dean for Academic Affairs',0, 0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(60,  5, '',0, 0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(45,  5, 'Dean',0, 1);

$pdf->Ln(5); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(120,  5, '',0, 0);     
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(45,  5, 'Copy Received by:',0, 1);
$pdf->Ln(7); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(120,  5, '',0, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(45,  5, '','B',0, 1);


    


    

    
}
}

$pdf->Output();

?>