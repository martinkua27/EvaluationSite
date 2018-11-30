

<?php


        
         try {

      include("indexDB.php");
      include("session.php");

                  

                  $empid = $_POST["empid1"];
                 

                  $conn = new mysqli($servername, $username, $password, $dbname);
         
      
                 $sql = "UPDATE login_table SET emp_pass='$empid' WHERE emp_id='$empid'"; 
          

                  if($conn->query($sql) === TRUE) {

                   // echo "Evaluation Submitted";
                    
                    echo "Password reset successful";
                     
                  }

                  else{
                       
                    echo "Password reset failed";
                       
                      }



          }//catch exception
        catch(Exception $e) {
      
        echo 'Message: ' .$e->getMessage();
                  
        }
   

  

  
?>

