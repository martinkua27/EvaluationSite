

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

  function getposition(){

include("../includes/indexDB.php");
include("../includes/session.php");
 
     $user = $_SESSION['login_user'];
     $value = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM emp_details where emp_num = '".  $user ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $value = $row['position'];

      }
       return $value;
  }
  else{
     $value = "None";
          
    
    }  return $value;
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
      $position = "";
       
    
   
      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM evaluation_average_per_prof";
      $result = $conn->query($sql);
       
     if ($result->num_rows > 0) {
    // output data of each r1ow
    
    
  
    while($row = $result->fetch_assoc()) {
          
        
        if($row["evaluator"] == $empid && $row["emp_name_evaluated"] == $prof){
            $verify = "match";
        }
    }
  }
    
      if ($verify == "match"){
        
            echo "Existing Evaluation Found";        
        
       }
    else {
        
         try {

        

                   $prof = $_SESSION['profnamesession'];
       
           
                

                  $finalValueA = $_POST["finalValueA1"];
                  $finalValueB = $_POST["finalValueB1"];
                  $finalValueC = $_POST["finalValueC1"];
                  $totalValue = $_POST["totalValue1"];


                  $comments = $_POST["comments1"];
                 
                  $dateNow = date("l") . " " . date("Y-m-d");

                  $studentid = $_SESSION['login_user'];
                  $pos = getposition();

                  $ay = getAY($prof);
                  $sem = getSem($prof);
              
                  if ($comments == ""){
                    $comments = "None";
                  }

                 



                  $conn = new mysqli($servername, $username, $password, $dbname);
         

        
                 $sql = "INSERT INTO evaluation_average_per_prof (evaluator,position ,emp_name_evaluated, a_average, b_average, c_average, semester, academic_year,comments, date_posted, totalValue) VALUES ('$empid', '$pos' ,'$prof','$finalValueA','$finalValueB','$finalValueC','$sem','$ay','$comments','$dateNow','$totalValue')";
      

          

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

