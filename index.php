<?php
session_start();
//kc testing
//jm santi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    
    if ($_POST['action'] == 'Login') {
        
       
           loginCheck();
        
    
    }
    
}

 function loginCheck(){
  $verify = "";
    include("indexDB.php");
      
      $id = $_POST["username"];
      $pass = $_POST["pass"];
       
      $empID = stripslashes($id);
      $empPass = stripslashes($pass);
   
      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM login_table";
      $result = $conn->query($sql);
       
     if ($result->num_rows > 0) {
    // output data of each r1ow
    
    
  
    while($row = $result->fetch_assoc()) {
      
        
        if($row["emp_id"] == $empID && $row["emp_pass"] == $empPass){
            $verify = "match";
            $role = $row["emp_type"]; 
            $position = $row["postion"];
        }
    }
    
      if ($verify == "match"){
        
                     if($role == "Employee"){
                  

                       $_SESSION['login_user'] = $empID;
                       $_SESSION['login_userStat'] = $role;
                       $_SESSION['login_pass'] = $empPass;
                       $_SESSION['postion'] = $postion;
                       
                       header("location: performanceappraisal.php");
           
                    }else if ($role == "User"){
               
                       $_SESSION['login_user'] = $empID;
                       $_SESSION['login_userStat'] = $role;
                       $_SESSION['login_pass'] = $empPass;
                       
                       header("location: studentsevaluation.php");
          
             
                    }else{
                    	     
                       $_SESSION['login_user'] = $empID;
                       $_SESSION['login_userStat'] = $role;
                       $_SESSION['login_pass'] = $empPass;
                       
                       header("location: performanceappraisal/home.php");
                    }
        
    }
    else {
        
      $conn = new mysqli($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM student_list";
      $result = $conn->query($sql);
       
     if ($result->num_rows > 0) {
    // output data of each r1ow
    
    
  
    while($row = $result->fetch_assoc()) {
      
        
        if($row["student_id"] == $empID && $row["student_id"] == $empPass){
            $verify = "match";
            $role = $row["emp_type"]; 
            $position = $row["postion"];
        }
    }

    if ($verify == "match"){
        
                 
               
                       $_SESSION['login_user'] = $empID;
                       $_SESSION['login_userStat'] = "User";
                       $_SESSION['login_pass'] = $empPass;
                       
                       header("location: studentsevaluation.php");
          
        
    }else{
    	echo "<script>alert('Incorrect Username / Password')</script>";
    }
     

   // 

    }
                        
}
}
}
   
                
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | San Beda College Alabang</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" href="images/logo.ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
<style>
.login100-form-btn {
  background: darkred;
}
</style>
<script src="sweetalert2/dist/sweetalert2.min.js"></script>
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				 <form class="login100-form validate-form" method="post" class="well">
					<span class="login100-form-title p-b-43">
						<img src="images/sbcaEmblem.png" alt="SBCA" width="104.5px;">
						 <br>
						<img src="images/Faculty Performance Appraisal.png" alt="FPA" width="300px;">
					</span>
					
					
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" id="username" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" id="pass" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							
						</div>

						<div>
							
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						   <button class="btn" type="submit" name="action" id="but" value="Login" >
							Login
						</button>
					</div>
					
					<!--
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>
					-->
					
				</form>

				<div class="login100-more" style="background-image: url('images/Evaluation.jpg'); max-width: 100%; z-index:100;">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>