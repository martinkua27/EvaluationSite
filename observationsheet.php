<?php


if(getDepartment() == "Dean" || getDepartment() == "Vice Dean"){

if(getDepartment() == "Dean"){
  $welcome = "Dean";
}
else{
  $welcome = "Vice Dean";
}
 
include('session.php');


$var = $_GET['varr'];
$profileBanner = "";
$profname = "";
$empid = "";

if($var == "srmusni"){
   $profileBanner = "performanceappraisal/images/profile7.jpg";
   $profname = "Aristotle F. Musni";
    $empid = $_SESSION['login_user'];
}
else if($var == "sredgar"){
 $profileBanner = "performanceappraisal/images/sredgar.png";
 $profname = "Edgar Torres";
 $empid = $_SESSION['login_user'];
}
else if($var == "srmark"){
  $profileBanner = "performanceappraisal/images/srmark.png";
  $profname = "Dr. Mark Cherwin Alejandria";
  $empid = $_SESSION['login_user'];
}
else if($var == "msponce"){
$profileBanner = "performanceappraisal/images/msponce.png";
  $profname = "Connie Ponce";
 $empid = $_SESSION['login_user'];
}
}

else{
include('session.php');
$welcome = $_SESSION['login_user'];

  if(getName() == "Aristotle F. Musni"){
$profileBanner = "performanceappraisal/images/profile7.jpg";
   $profname = "Aristotle F. Musni";
   $empid = $_SESSION['login_user'];
  }
  else if(getName() == "Edgar Torres"){
 $profileBanner = "performanceappraisal/images/sredgar.png";
 $profname = "Edgar Torres";
 $empid = $_SESSION['login_user'];
  }
  else if(getName() == "Dr. Mark Cherwin Alejandria"){
     $profileBanner = "performanceappraisal/images/srmark.png";
  $profname = "Dr. Mark Cherwin Alejandria";
  $empid = $_SESSION['login_user'];
  }
  else if(getName() == "Consuelo Ponce"){
    $profileBanner = "performanceappraisal/images/msponce.png";
  $profname = "Connie Ponce";
  $empid = $_SESSION['login_user'];
  }
}


function getName(){

 include("indexDB.php");
include('session.php');
 
     $getname = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM emp_details where emp_num = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getname = $row['emp_name'];

      }
       return $getname;
  }
  else{
     $getname = "None";
          
      return $getname;
  }
   

}

function getDepartment(){

 include("indexDB.php");
include('session.php');
 
     $getdepartment = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM emp_details where emp_num = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getdepartment = $row['emp_department'];

      }
       return $getdepartment;
  }
  else{
     $getdepartment = "None";
          
      return $getdepartment;
  }
   

}

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

function getempid(){

 include("indexDB.php");
include('session.php');
 
     $getid = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM emp_details where emp_name = '".  $profname ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getid = $row['emp_id'];

      }
       return $getid;
  }
  else{
     $getid = "None";
          
      return $getid;
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

    <title>Classroom Observation Sheet | San Beda College Alabang</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">

     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/saveObservationSheet.js"></script>

      <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>

   
  </head>

  <body style="background-color: #e0e0e0;">

  <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #9f0000;border-color:#9f0000;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--logo-->
            <a class="navbar-brand" href="#"><img src="images/bedalogo.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="performanceappraisal/home.php" style="color:#ecf0f1;" onMouseOver="this.style.color='#777'" onMouseOut="this.style.color='#ecf0f1'">Home</a></li>
			<li><a href="performanceappraisal/reports.php" style="color:#ecf0f1;" onMouseOver="this.style.color='#777'" onMouseOut="this.style.color='#ecf0f1'">Reports</a></li>
          </ul>
             <ul class="nav navbar-nav navbar-right">
             <li><a href="#" class="welcome-text" style="color:#ecf0f1;">Welcome, <?php echo $welcome;?></a></li>
             <li class="dropdown create">
                  <button id="dropdownMenu1" style="background-color: #9f0000;border-style: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img src="<?php echo getImage(); ?>" class="img-rounded img-responsive" style="width:46px; display:inline-block; margin-top: 5px;">         
                  <span class="caret" style="color:#fff;"></span></button>
                       
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Settings</a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
          </ul>
        </div>
      </div>
	 
		<br>
	  
    </nav>     
   
      <div class="container" style="margin-top:80px;">
	  
	  <div class="container bg-2" style="margin-top:20px; width:515px; background-color: #fff;
    color: #728091 !important;
    z-index: 100px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-repeat: repeat-y;">
	  <h1><center>Classroom Observation Sheet</center></h1>
	  </div>
	  
	  <br>
	  
	  <div style="margin-left:115px;">
			   
			   <img src="images/score2.jpg" class="img-score">
			   
			   </div>
	  
	  <div class="container bg-2" style="margin-top:20px; background-color: #fff;
    color: #000;
    z-index: 100px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-repeat: repeat-y;">
	
         <div class="row" style="margin-left:250px;">
               
               <!--<h3><center>1st Semester, School Year 2018</center></h3>--> <br>
			   
			   <br><br><br>
			   
               <h4>A. <b>Teacher</b></h4>
		  
		  <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
		 <h4 class="title" class="radio-inline"><b>
                  5&nbsp&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
                </b></h4>
               </div>
			   
               <h4>1. Teaching personality</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               <form id="myform" name="myform" onsubmit="return false">

                  <input type="text"  name="emp_id" id="emp_id" style="display: none;" value="<?php include('session.php'); echo $_SESSION['login_user'];  ?>"  form="myform" >

                  <input type="text"  name="prof" id="prof" style="display: none;" value="<?php include('session.php'); echo $profname; $_SESSION['profnamesession'] = $profname;?>"  form="myform" >

                <label class="radio-inline">
                  <input type="radio" name="question1a" id="question1a" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1a" id="question1a" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1a" id="question1a" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question1a" id="question1a" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1a" id="question1a" value="1"  form="myform" >
                </label>
                
              
              </div>
             
               <h4>2. Composure</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question2a" id="question2a" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2a" id="question2a" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2a" id="question2a" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question2a" id="question2a" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2a" id="question2a" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>3. Articulation</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question3a" id="question3a" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3a" id="question3a" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3a" id="question3a" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question3a" id="question3a" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3a" id="question3a" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>4. Modulation of voice</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question4a" id="question4a" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4a" id="question4a" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4a" id="question4a" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question4a" id="question4a" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4a" id="question4a" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>5. Mastery of the medium of instruction</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question5a" id="question5a" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5a" id="question5a" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5a" id="question5a" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question5a" id="question5a" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5a" id="question5a" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>6. Mastery of the subject matter</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question6a" id="question6a" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6a" id="question6a" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6a" id="question6a" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question6a" id="question6a" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6a" id="question6a" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>7. Ability to answer questions</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question7a" id="question7a" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7a" id="question7a" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7a" id="question7a" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question7a" id="question7a" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7a" id="question7a" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>8. Openness to students' opinions</h4> 
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question8a" id="question8a" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question8a" id="question8a" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question8a" id="question8a" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question8a" id="question8a" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question8a" id="question8a" value="1"  form="myform" >
                </label>
                
              
              </div>
              <br> 

               <h4>B. <b>Teaching Procedure</b></h4>
			   
			   <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
		 <h4 class="title" class="radio-inline"><b>
                  5&nbsp&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
                </b></h4>
               </div>
			   
               <h4>1. Organization of subject matter</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question1b" id="question1b" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1b" id="question1b" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1b" id="question1b" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question1b" id="question1b" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1b" id="question1b" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>2. Ability to relate subject to previous topics</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question2b" id="question2b" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2b" id="question2b" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2b" id="question2b" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question2b" id="question2b" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2b" id="question2b" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>3. Ability to provoke critical thinking</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question3b" id="question3b" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3b" id="question3b" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3b" id="question3b" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question3b" id="question3b" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3b" id="question3b" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>4. Ability to motivate</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question4b" id="question4b" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4b" id="question4b" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4b" id="question4b" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question4b" id="question4b" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4b" id="question4b" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>5. Ability to manage class</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question5b" id="question5b" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5b" id="question5b" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5b" id="question5b" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question5b" id="question5b" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5b" id="question5b" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>6. Questioning techniques</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question6b" id="question6b" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6b" id="question6b" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6b" id="question6b" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question6b" id="question6b" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6b" id="question6b" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>7. Use of teaching aids</h4> 
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question7b" id="question7b" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7b" id="question7b" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7b" id="question7b" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question7b" id="question7b" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7b" id="question7b" value="1"  form="myform" >
                </label>
                
              
              </div>
               <br>

               <h4>C. <b>Students</b></h4>
			   
			   <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
		 <h4 class="title" class="radio-inline"><b>
                  5&nbsp&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
                </b></h4>
               </div>
			   
               <h4>1. Class attention</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question1c" id="question1c" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1c" id="question1c" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1c" id="question1c" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question1c" id="question1c" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1c" id="question1c" value="1"  form="myform" >
                </label>
                
              
              </div>

               <h4>2. Class participation</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question2c" id="question2c" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2c" id="question2c" value="4"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2c" id="question2c" value="3"  form="myform" >
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question2c" id="question2c" value="2"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2c" id="question2c" value="1"  form="myform" >
                </label>
                
              
              </div>
              <br>

               <h4>D. <b>General Observations</b></h4>
			   
			   <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
		 <h4 class="title" class="radio-inline"><b>
                  5&nbsp&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
                </b></h4>
               </div>
			   
               <h4>1. Report between teacher and students</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question1d" id="question1d" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1d" id="question1d" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1d" id="question1d" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question1d" id="question1d" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1d" id="question1d" value="1" form="myform">
                </label>
                
              
              </div>

               <h4>2. Class atmosphere</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question2d" id="question2d" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2d" id="question2d" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2d" id="question2d" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question2d" id="question2d" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2d" id="question2d" value="1" form="myform">
                </label>
                
              
              </div>

               <h4>3. Overall teacher impact</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               
                <label class="radio-inline">
                  <input type="radio" name="question3d" id="question3d" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3d" id="question3d" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3d" id="question3d" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question3d" id="question3d" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3d" id="question3d" value="1" form="myform">
                </label>
                
              
              </div>

               <h4>4. General classroom condition</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
              
                <label class="radio-inline">
                  <input type="radio" name="question4d" id="question4d" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4d" id="question4d" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4d" id="question4d" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question4d" id="question4d" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4d" id="question4d" value="1" form="myform">
                </label>
               

              </div>
              <br>
                  <button class="btn btn-primary" style="margin-bottom: 20px;" type="submit" name="action" id="saveevaluation" >Submit</button>
              </form>
         </div>
      </div>
	  
	  </div>
 
       <div class="container-fluid">
        <div class="row">
       

        
        </div>
    </div>
    <!--end-->

</div>
<!------>
         
     
    <footer id="footer" style="color:#434242;text-align: center; margin-top:50px;">
      <p class="footer-text">Copyright @ 2018 San Beda College Alabang. All rights reserved.</p>
    </footer>  
      
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   

   
     


  </body>
</html>