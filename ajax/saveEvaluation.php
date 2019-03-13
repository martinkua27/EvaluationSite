

<?php

include("../includes/indexDB.php");
include("../includes/session.php");

function getAY($subjectcode){

include("../includes/indexDB.php");
include("../includes/session.php");
 
     $getAY = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM assigned_schedule where course_code = '".  $subjectcode ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getAY = $row['academic_year'];

      }
       return $getAY;
  }
  else{
     $getAY = "None";
          
    
    }  return $getAY;
  }

  function getSem($subjectcode){

include("../includes/indexDB.php");
include("../includes/session.php");
 
     $getsem = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM assigned_schedule where course_code = '".  $subjectcode ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getsem = $row['semester'];

      }
       return $getsem;
  }
  else{
     $getsem = "None";
          
      return $getsem;
  }
}

function getayNOW(){

 include("../indexDB.php");
include('../session.php');
 
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

 include("../indexDB.php");
include('../session.php');
 
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
   


    $verify = "";
  
      
      $studentid = $_SESSION['login_user'];
      $subjectcode = $_POST["subjectcode1"];
       $empid = $_POST["empid1"];
        $prof = $_POST["prof1"];

        $storeProfName = $prof;
        $storeProfid = $empid;
        $storeSubectCode = $subjectcode;
   
      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM evaluation_average_per_stduents where student_id = '".  $_SESSION['login_user'] ."' " ;
      $result = $conn->query($sql);
       
     if ($result->num_rows > 0) {
    // output data of each r1ow
    
    
  
    while($row = $result->fetch_assoc()) {
      
        

         if($row["subject_code"] == $subjectcode && $row["student_id"] == $studentid && $row["semester"] == getsemNOW() && $row["academic_year"] == getayNOW() ){
            $verify = "match";
        }

    }
  }
    
      if ($verify == "match"){
        
         echo "Existing Evaluation Found";
        
    }
    else {
        
    try {
       
                   $prof = $_POST["prof1"];
                   $subjectcode = $_POST["subjectcode1"];
                   $empid = $_POST["empid1"];
                   $section = $_POST["section1"];

                  $finalValueA = $_POST["finalValueA1"];
                  $finalValueB = $_POST["finalValueB1"];
                  $finalValueC = $_POST["finalValueC1"];
                  $finalValueD = $_POST["finalValueD1"];
                  $finalValueE = $_POST["finalValueE1"];
                  $totalValue =  $_POST["totalValue1"];

                  $ay = getAY($subjectcode);
                  $sem = getSem($subjectcode);

                  $comments = $_POST["comments1"];
                 
                  $dateNow = date("l") . " " . date("Y-m-d");

                  $studentid = $_SESSION['login_user'];
              
                  if ($comments == ""){
                    $comments = "None";
                  }


                  $conn = new mysqli($servername, $username, $password, $dbname);
         
        
                 $sql = "INSERT INTO evaluation_average_per_stduents (subject_code, emp_code, emp_name, a_average, b_average, c_average, d_average, e_average, comments, section, student_id, semester, academic_year, date_posted, totalValue) VALUES ('$storeSubectCode', '$storeProfid', '$storeProfName','$finalValueA','$finalValueB','$finalValueC','$finalValueD','$finalValueE','$comments','$section' ,'$studentid','$sem','$ay','$dateNow','$totalValue')";
      

          

                  if($conn->query($sql) === TRUE) {

                   // echo "Evaluation Submitted";
                      
                    echo "Evaluation Submitted";
                     
                  }

                  else{
                       
                    echo "Evaluation not Submitted";
                       
                      }



          }//catch exception
        catch(Exception $e) {
      
        echo 'Message: ' .$e->getMessage();
                  
        }

    
   
   }

   


  
?>

