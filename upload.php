<?php

$dateNow = date("l") . " " . date("Y-m-d");

function getImage(){

 include("indexDB.php");
include('session.php');
 
     $getimage = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM emp_details where emp_num = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getimage = $row['emp_image'];

      }
       return $getimage;
  }
  else{
     $getimage = "None";
          
      return $getimage;
  }
   

}




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.ico">

    <title>Upload | San Beda College Alabang</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 	<link href="css/upload.css" rel="stylesheet">

   <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
  </head>

  <body style="background-color: #212121;">

  <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#9f0000;">
      <div class="container navbar-upload">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--logo-->
            <a class="navbar-brand" href="#"><img src="images/bedalogocas.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
           
          </ul>
             <ul class="nav navbar-nav navbar-right">
             <li><a href="#" class="welcome-text">Welcome, <?php include('session.php'); echo $_SESSION['login_userStat']; ?>!</a></li>
             <li class="dropdown create">
                  <button id="dropdownMenu1" style="background-color: #9f0000;border-style: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img src="<?php echo getImage(); ?>" class="img-rounded img-responsive" style="width:36px; display:inline-block; margin-top: 5px;">         
                  <span class="caret" style="color:#fff;"></span></button>
                       
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
               <li><a type="button" data-toggle="modal" onclick="changePass()" data-target="#addPage">Change Password</a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
          </ul>
        </div>
      </div>
    </nav>
      
    <div class="container-fluid">

        <div style="color: white; font-size: 20px; margin-top: 150px; margin-left: 50px;">
         
         <h1>Upload</h1>

             <input type="text"  name="pass" id="pass" style="display: none; font-size: 50px; position: absolute; margin-top: 20px; color: black;"  value="<?php include('session.php'); echo $_SESSION['login_pass'];?>" >

<form method="POST" action="excelUpload.php" enctype="multipart/form-data">
<div class="form-group">
<label>Upload Excel File</label>
<input type="file" name="file" class="form-control">
</div>
<div class="form-group">
<button type="submit" name="Submit" class="btn btn-success">Upload</button>
</div>
</form>
        </div>
       
    </div>
    
      
	

    <footer id="footer" style="margin-top:50px;">
      <p class="footer-text">Copyright @ 2018 San Beda College Alabang. All rights reserved.</p>
    </footer>  
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>







	</body>

<script>
  
  function changePass(){
        swal.mixin({
  input: 'text',
  confirmButtonText: 'Next &rarr;',
  showCancelButton: true,
  progressSteps: ['1', '2', '3']
}).queue([
  {
    title: 'Old Password',
    text: 'Enter old password'
  },
  'Enter new password',
  'Enter new passoword again'
]).then((result) => {

var values =  result.value;
var verpass = document.getElementById("pass").value;

  if (result.value) {

      if (values[0] != verpass){
      swal({
      title: 'Error',
      html:
       'Incorrect old password',
      confirmButtonText: 'Lovely!'
      })
 }
  else if(values[1] != values[2]){
     swal({
      title: 'Error',
      html:
       'New Password does not match',
      confirmButtonText: 'Lovely!'
      })
  }

   else{

     if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

myFunction();
               
swal({
      title: 'All done!',
      html:
        'Change password successful',
      confirmButtonText: 'Continue!'
    })

document.getElementById("pass").value = value[1];
                   //document.getElementById("txtHint").innerHTML = this.responseText;
             
               
                }
            };
            xmlhttp.open("POST","changepass.php?q=" + values[1],true);
            xmlhttp.send();


      
      }

function myFunction() {
    document.getElementById("pass").value = values[1];
}
    
  }


})
      }

</script>

</html>