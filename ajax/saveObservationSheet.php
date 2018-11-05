

<?php

include("../includes/indexDB.php");
include("../includes/session.php");

function getAY($prof){

include("../includes/indexDB.php");
include("../includes/session.php");
 
     $getAY = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM assigned_schedule where faculty = '".  $prof ."' " ;
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

  function getSem($prof){

include("../includes/indexDB.php");
include("../includes/session.php");
 
     $getsem = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM assigned_schedule where faculty = '".  $prof ."' " ;
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


 $verify = "";

      
        $prof = $_SESSION['profnamesession'];
        $empid = $_POST["empid1"];
         $subjectcode = $_POST["subjectcode1"];
         $subjectcodeStore = $subjectcode;
       
    
   
      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM observation_sheet_per_prof";
      $result = $conn->query($sql);
       
     if ($result->num_rows > 0) {
    // output data of each r1ow
    
    
  
    while($row = $result->fetch_assoc()) {
      
        
        if($row["evaluator"] == $empid && $row["emp_name_evaluated"] == $prof && $row["subject_code"] == $subjectcode){
            $verify = "match";
            
        }
    }
  }
    
      if ($verify == "match"){
        
            echo "Existing Evaluation Found";        
        
       }
    else {

      $subjectName = "";

      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM assigned_schedule where course_code like '". $subjectcodeStore ."'";
      $result = $conn->query($sql);
       
     if ($result->num_rows > 0) {
    // output data of each r1ow
    
    
  
    while($row = $result->fetch_assoc()) {
      
      $subjectName = $row["course_title"];
        
    }}
        
         try {

      

                   $prof = $_SESSION['profnamesession'];
                  

                  $finalValueA = $_POST["finalValueA1"];
                  $finalValueB = $_POST["finalValueB1"];
                  $finalValueC = $_POST["finalValueC1"];
                  $finalValueD = $_POST["finalValueD1"];
                  

                  $comments = $_POST["comments1"];
                 
                  $dateNow = date("l") . " " . date("Y-m-d");

                  $studentid = $_SESSION['login_user'];
              
                  if ($comments == ""){
                    $comments = "None";
                  }

                  $ay = getAY($prof);
                  $sem = getSem($prof);


                  $conn = new mysqli($servername, $username, $password, $dbname);
         
        
                 $sql = "INSERT INTO observation_sheet_per_prof (evaluator, emp_name_evaluated, a_average, b_average, c_average, d_average, subject_code,subject_name, semester, academic_year,comments, date_posted) VALUES ('$empid', '$prof','$finalValueA','$finalValueB','$finalValueC' ,'$finalValueD','$subjectcodeStore','$subjectName','$sem','$ay','$comments','$dateNow')";
      

          

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

