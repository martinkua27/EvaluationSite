<?php

include("includes/indexDB.php");
include("includes/session.php");

 
  $q = $_GET['q'];
  $user = $_SESSION['login_user'];

   
      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM evaluation_average_per_stduents where subject_code = '".$q."' and student_id = '" .  $user ."'" ;

      $result = $conn->query($sql);
       
     if ($result->num_rows > 0) {
    // output data of each r1ow
    
    
  
    while($row = $result->fetch_assoc()) {
      
        
        if($row["subject_code"] == $q && $row["student_id"] == $user){
            $verify = "match";
        }
    }
  }
    
      if ($verify == "match"){
        
         echo "Existing Evaluation Found";
        
    }else{
         echo "No Evlautaion Found";
    }

?>