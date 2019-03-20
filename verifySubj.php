<?php

include("includes/indexDB.php");
include("includes/session.php");

 
  $q = $_GET['q'];
  $user = $_SESSION['login_user'];

  function getAY(){

 include("indexDB.php");
include('session.php');
 
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

function getSem(){

 include("indexDB.php");
include('session.php');
 
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

   
      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM evaluation_average_per_stduents where subject_code = '".$q."' and student_id = '" .  $user . "'";

      $result = $conn->query($sql);
       
     if ($result->num_rows > 0) {
    // output data of each r1ow
    
    
  
    while($row = $result->fetch_assoc()) {
      
        
        if($row["subject_code"] == $q && $row["student_id"] == $user && $row["semester"] == getSem() && $row["academic_year"] == getAY() ){
            $verify = "match";
        }
    }
  }
    
      if ($verify == "match"){
        
         echo "Existing Evaluation Found";
        
    }else{
         echo "No Evaluation Found";
    }

?>