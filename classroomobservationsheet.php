<?php
//sample
$var = $_GET['varr'];
$profname = $var;
$emptype = "";

echo str_replace("%20"," ",$var);




if(getDepartment() == "Dean"){
  $welcome = "Dean";
}
else if(getDepartment() == "Vice Dean"){
  $welcome = "Vice Dean";
}
else{
  $welcome = "Chairperson";
  $emptype = "chairperson";
}
 
include('session.php');


$var = $_GET['varr'];
$profileBanner = "";
$empid = "";
$imageProf = getEmployeeImage($profname);



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

function getEmpType(){

 include("indexDB.php");
include('session.php');
 
     $getemptype = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM login_table where emp_id = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getemptype = $row['emp_type'];

      }
       return $getemptype;
  }
  else{
     $getemptype = "None";
          
      return $getemptype;
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

function getEmployeeImage($profname){

include("indexDB.php");
include('session.php');
 
     $getimage = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM emp_details where emp_name = '".  $profname ."' " ;
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


    <title>Classroom Observation Sheet | San Beda College Alabang</title>

    <!-- Bootstrap core CSS -->
    <link href="classroomobservation/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/classroomobserve.css" rel="stylesheet">

     <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">

     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script src="js/saveObservationSheet.js"></script>

      <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
   
  </head>

  <body style="background-color: #f1bd60;">

  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--logo-->
            <a class="navbar-brand" href="#"><img src="classroomobservation/images/bedalogo.png"></a>
        </div>
         <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
             <li><a href="performanceappraisal/home.php" style="color:#ecf0f1;" onMouseOver="this.style.color='#777'" onMouseOut="this.style.color='#ecf0f1'">Home</a></li>
      <li><a href="performanceappraisal/reports.php" style="color:#ecf0f1;" onMouseOver="this.style.color='#777'" onMouseOut="this.style.color='#ecf0f1'">Reports</a></li>
      <li><a href="performanceappraisal/summary.php">Summary</a></li>
          </ul>
             <ul class="nav navbar-nav navbar-right">
             <li><a href="#" class="welcome-text">Welcome, <?php echo $welcome;?></a></li>
             <li class="dropdown create">
                  <button id="dropdownMenu1" style="background-color: #9f0000; border-style: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img src="<?php echo getImage(); ?>" class="img-rounded img-responsive" style="width:46px; display:inline-block; margin-top: 5px;">         
                  <span class="caret" style="color:#fff;"></span></button>
                       
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Settings</a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
          </ul>
        </div>
      </div>
    </nav>
    
      
     
      <div class="container-fluid" style="margin-top:70px;">
        <div class="row">
             <img src="classroomobservation/images/pattern3.png" class="bg-top img-responsive">
             <h1 class="text-top">Classroom Observation<br>Sheet</h1>
        </div>
      </div>
   
      <div class="container">
         <div class="row">
          <div class="col-md-3">
          <div class="profile">
       
              <br>
              <img src="<?php echo getEmployeeImage($profname); ?>" class="img-responsive center-block img-circle img-profile">
              <br>
              <div class="profile-info">
                <h4 class="title"><b>Faculty<br>Information</b></h4>   
                <br>
                  
                <h5 class='info'>Professor</h5>
                <h1 class='name'><?php echo $profname; ?></h1>
                <hr>
                  
                <h5 class='info'>Department</h5>
                <h1 class='name'>Infomation Technology</h1>
                <hr>
                  
              
                
                <h4 class="title"><b>Details of Classroom<br>Observation</b></h4>   
                <br>
                  
                <h5 class='info'>Subject Code</h5>
                <br>
      
                 
          <?php

                          include("indexDB.php");
                          include('session.php');

                          $conn = new mysqli($servername, $username, $password, $dbname)
                                  or die ('Cannot connect to db');

                                  $result = $conn->query("select * from assigned_schedule where faculty = '". $profname ."' GROUP BY course_code ");

                     ?>
                          <select class= "form-control subj-code" name="subj" id="subj" style="width: 270px;" id="department" onchange="showUser(this.value)">
                             <?php

                                  echo "<option value=''>Select</option>";

                                  while ($row = $result->fetch_assoc()) {

                                       unset($option1);
                                    $option1 = $row['course_code'];
                                    echo "<option value='$option1'>$option1</option>";
                                    
                                   

                                   }

                                    echo "</select>";

                                         if(isset($_POST['department'])){ //check if $_POST['examplePHP'] exists
          
                        echo '<script>alert('. $_POST['department'] .')</script>'; // echo the data
                          die(); // stop execution of the script.
                       }

                             ?> 

                              <div id="txtHint" ></div>
                <hr>
				<div id="space" style="margin-top: 463px;"><br></div>
          </div>
             
          </div>
             </div>
          <div class="col-md-9" style="color: #000; margin-bottom: 40px;">
          <div class="questions">
          <br>
          <div class="margin-questions">
          <h2 class="boxed-title">RESPONSE CODE</h2>
          <h4 class="text-center score">5 - Outstanding | 4 - Very Satisfactory | 3 - Satisfactory </h4>
          <h4 class="text-center score2">2 - Moderately Satisfactory | 1 - Needs Improvement</h4>
        
          <h3>Instructional Performance</h3> <br>

                 <h4>A. <b>Teacher</b></h4>
      
      <div  style="position:relative; margin-left: 406px; margin-top: -40px; margin-bottom: 35px;">
     <h4 class="numbering" class="radio-inline"><b>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
                </b></h4>
               </div>
         
               <h4>1. Teaching personality</h4>
               <div  style="position:relative; margin-left: 453px; margin-top: -40px; margin-bottom: 35px;">
               
               <form id="myform" name="myform" onsubmit="return false">

                  <input type="text"  name="emp_id" id="emp_id" style="display: none;" value="<?php include('session.php'); if(getemptype() == 'Chairperson'){echo $emptype;}else{echo $_SESSION['login_user'];} ?>"  form="myform" >

                  <input type="text"  name="scode" id="scode" style="display: none;" form="myform" >
                  

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
         
         <div  style="position:relative; margin-left: 406px; margin-top: -40px; margin-bottom: 35px;">
     <h4 class="numbering" class="radio-inline"><b>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
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
         
         <div  style="position:relative; margin-left: 406px; margin-top: -40px; margin-bottom: 35px;">
     <h4 class="numbering" class="radio-inline"><b>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
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
         
         <div  style="position:relative; margin-left: 406px; margin-top: -40px; margin-bottom: 35px;">
     <h4 class="numbering" class="radio-inline"><b>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
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
                  <button class="btn btn-primary" style="margin-bottom: 20px;" type="submit" name="action" id="saveevaluation" disabled="">Submit</button>
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
    <script>	
    function valthis() {
        /
    var checkBoxes = document.getElementsByClassName( 'myCheckBox' );
    var isChecked = false;
        for (var i = 0; i < checkBoxes.length; i++) {
            if ( checkBoxes[i].checked ) {
                isChecked = true;
            };
        };
        if ( isChecked ) {
            alert( 'At least one checkbox checked!' );
            } else {
                alert( 'Please, check at least one checkbox!' );
            }   
            /
    }
    </script>

    <script type="text/javascript">
        $(".question1").change(function() {
        $(".question1").prop('checked', false);
        $(this).prop('checked', true);
    });
    </script>

    <script>

    var submitBtn = document.getElementById("saveevaluation");

    function showUser(str)  {

var dd = document.getElementById('subj');

        //var div = document.getElementById("evaluationform");

        

        if (str == "") {
            //div.style.display = "none";
            document.getElementById("txtHint").innerHTML = "";
            document.getElementById("scode").innerHTML = "";
            $('#scode').val("");
            
            submitBtn.disabled = true;
            return;
        } else { 
           document.getElementById("scode").innerHTML=  $("#subj :selected").text();
           $('#scode').val($("#subj :selected").text());
         
            //div.style.display = "block";
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  submitBtn.disabled = false;
                    document.getElementById("txtHint").innerHTML = this.responseText;
                    
                }
            };
            xmlhttp.open("GET","getInfoCo.php?q="+str,true);
            xmlhttp.send();
        }

    }

    </script>



   
     


  </body>
</html>