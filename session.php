<?php
   
   session_start();
   include('indexDB.php');
   error_reporting(E_ALL ^ E_NOTICE);
   
   $user_check = $_SESSION['login_user'];
   $userStat = $_SESSION['login_userStat'];
   $user_pass_check = $_SESSION['login_pass'];



   
 
      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM login_table where emp_id = '$user_check' ";
      $result = $conn->query($sql);
       
     if ($result->num_rows > 0) {
         
          
                 $login_session = $row['emp_id'];

        
    }
    
    
    // output data of each r1ow
    
    
   
   if(!isset($_SESSION['login_user'])){
    
        echo "<script>alert('Please Login');document.location='index.php'</script>";
   }
         
?>