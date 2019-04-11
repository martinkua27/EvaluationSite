<?php


$var = $_GET['varr'];
$profname = $var;
$emptype = "";

echo str_replace("%20"," ",$var);

if(getDepartment() == "Dean" || getDepartment() == "Vice Dean" || getemptype() == "Chairperson"){

if(getDepartment() == "Dean"){
  $welcome = "Dean";
}
else if(getDepartment() == "Vice Dean"){
  $welcome = "Vice Dean";

}
else{
  include('includes/session.php');
 
  $empnum = getEmpNum($var);
  $welcome = "Chairperson";
  $emptype = "chairperson";
}
$getImage = getImageEmployee($profname);
}



else{

$welcome = getEmpName();
$getImage = getImage();
$profname = getEmpName();

}

function getImageEmployee($profname){

include("includes/indexDB.php");
include('includes/session.php');

 
     $getimage = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM emp_details where emp_name = '". $profname ."'";
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




$profileBanner = "";

$empid = "";





function getDepartment(){

include("includes/indexDB.php");
include('includes/session.php');
 
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

include("includes/indexDB.php");
include('includes/session.php');
 
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

include("includes/indexDB.php");
include('includes/session.php');
 
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

function getEmpName(){
  
include("includes/indexDB.php");
include('includes/session.php');
 
     $getempname = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM emp_details where emp_num = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getempname = $row['emp_name'];

      }
       return $getempname;
  }
  else{
     $getempname = "None";
          
      return $getempname;
  }

}

function getEmpNum($var){
  
include("includes/indexDB.php");
include('includes/session.php');
 
     $getempname = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM emp_details where emp_name = '".  $var ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getempname = $row['emp_num'];

      }
       return $getempname;
  }
  else{
     $getempname = "None";
          
      return $getempname;
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

    <title>Faculty Performance Appraisal | San Beda College Alabang</title>

    <!-- Bootstrap core CSS -->
    <link href="performanceappraisal/css/bootstrap.min.css" rel="stylesheet">
    <link href="performanceappraisal/css/homeperformance.css" rel="stylesheet">
     <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/test.js"></script>
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>

  </head>

  <body style="background-color: #e0e0e0;">

  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container navbar-performance">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--logo-->
            <a class="navbar-brand" href="#"><img src="performanceappraisal/images/bedalogocas.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">

            <?php 
            include('session.php');
            $type = $_SESSION['login_userStat'];

            if($type == "Employee"){


                echo  "<li><a href='#' data-toggle='modal' data-target='#historyModal'>History</a></li>";

            }
            else{

               echo  "<li><a href='performanceappraisal/home.php'>Home</a></li>";
               echo  "<li><a href='performanceappraisal/reports.php'>Reports</a></li>";
               echo  "<li><a href='performanceappraisal/summary.php'>Summary</a></li>";
            }


            ?>
          


          </ul>
             <ul class="nav navbar-nav navbar-right">
             <li><a href="#" class="welcome-text">Welcome, <p id="emp_id"><?php echo $welcome;?><p></a></li>
             <li class="dropdown create">
                  <button id="dropdownMenu1" style="background-color: #9f0000;border-style: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img src="<?php echo getImage(); ?>" class="img-rounded img-responsive" style="width:46px; display:inline-block; margin-top: 5px;">         
                  <span class="caret" style="color:#fff;"></span></button>
                       
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" onclick="changePass()">Change Password</a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        
          <div class="modal-header">
            <button type="button" class="close" onclick="clearDropdown()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">History</h4>
          </div>
      
        <button style="float: right; margin-right: 10px;" id="openpdf" type="button" onclick="printpdf();" disabled>Print</button>
         
            <div class="form-group">
                
                <?php

                          include("indexDB.php");
                          include('session.php');

                          $conn = new mysqli($servername, $username, $password, $dbname)
                                  or die ('Cannot connect to db');

                                  $result = $conn->query("SELECT * FROM evaluation_average_per_stduents group by academic_year");



                     ?>
                       
                          <div class = "row">

                              <div class = "col-md-9">
                          <select class= "form-control subj-code" name="department" style="width: 270px;" id="department" onchange="showSemester(this.value)">
                             <?php

                                  echo "<option value='' selected>Select Academic Year</option>";

                                  while ($row = $result->fetch_assoc()) {

                                       unset($option1);
                                    $option1 = $row['academic_year'];
                                    echo "<option value='$option1'>$option1</option>";
                                    
                                   

                                   }

                                    echo "</select>";

                                         if(isset($_POST['department'])){ //check if $_POST['examplePHP'] exists
          
                        echo '<script>alert('. $_POST['department'] .')</script>'; // echo the data
                          die(); // stop execution of the script.
                       }

                             ?> 
</div>
      <div class = "col-md-3">                       




                      
                               </div>
                               </div>

                 <select class= "form-control subj-code" style="width: 270px; display: none;" id="semDropdown" onchange="showHistory(this.value)" required>
                    <option value="" selected disabled>Select Semester</option>
                    <option value="1st">1st Sem</option>
                    <option value="2nd">2nd Sem</option>
                </select>

               

                <div id="txtHint"></div>
            </div>
            
          </div>
      
      
        </div>
      </div>
    </div>
    
      <!-- END OF MODAL -->
     
      <div class="container-fluid" style="margin-top:40px;">
        <div class="row">
            <img src="performanceappraisal/images/bg4.jpg" class="bg-top">
        </div>
      </div>
      <div class="container profile-bg">
          <div class="row">
            <img src="images/patternfade.png" class="img-top">
            <img src="<?php echo $getImage; ?>" class="profile-imgprof">
            <h1 class="instructor"><b><?php  echo $profname ?></b></h1>
            <hr class="line-prof">
            <h3 class="subject"></h3>
            <h3 class="dept"></h3>
            <h3 class="date"></h3>
           </div>
      </div>
      
      <div class="container scoring-bg">
        <div class="row">
            <div class="border-scoring">
            <div class="scoring-top">5- OUTSTANDING<div class="spacing-score"></div>4- VERY SATISFACTORY<div class="spacing-score"></div>3- SATISFACTORY</div>  
            <div class="scoring-bottom">2- MODERATELY SATISFACTORY<div class="spacing-score"></div>1- NEEDS IMPROVEMENT</div>
            </div>
        </div>
      </div>
      
   
      <div class="container bg-2" style="background-color: #fff;">
         <div class="row">
           
          <div class="questions">

          <h4 class="title">A. <b>PROFESSIONAL RESPONSIBILITIES (70%)</b></h4>
		  
		  <br>

      <input type="text" id="profName" style="display: none;" value="<?php echo $profname; ?>">
		  
		  <div class="radio">
               <div class="radio-group">
		 <h4 class="scoring"><b>
                  5<div class="scoring-space"></div>4<div class="scoring-space"></div>3<div class="scoring-space"></div>2<div class="scoring-space"></div>1
                </b></h4>
               </div>
			   </div>
		  
               <h4>1. Engages in professional growth activities</h4>
               <h4>a. Attends SBC/CAS seminars, conferences, workshops, etc.</h4>
               <div class="radio">
               <div class="radio-group">
                
                <form id="myform" name="myform" onsubmit="return false">



                  <input type="text"  name="pass" id="pass" style="display: none;"  value="<?php include('session.php'); echo $_SESSION['login_pass'];?>"  form="myform" >

                    <input type="text"  name="empideval" id="empideval" style="display: none;"  value="<?php include('session.php'); if($emptype == "chairperson" && $empnum != $_SESSION['login_user']){echo $emptype;}else{echo $_SESSION['login_user'];} ?>"  form="myform" >

                  <input type="text"  name="prof" id="prof" style="display: none;" value="<?php include('session.php'); echo $profname; $_SESSION['profnamesession'] = $profname;?>"  form="myform" >

                <label class="radio-inline">
                  <input type="radio" name="question1a" id="question1a" value="5"  form="myform" >
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1a" id="question1a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1a" id="question1a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question1a" id="question1a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1a" id="question1a" value="1"  form="myform">
                </label>
                
          
              </div>
              </div>
               
               <h4>b. Attends off-campus seminars, conferences, workshops, etc.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question2a" id="question2a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2a" id="question2a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2a" id="question2a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question2a" id="question2a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2a" id="question2a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>

              <h4>c. Engages in scholarly research activities</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question3a" id="question3a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3a" id="question3a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3a" id="question3a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question3a" id="question3a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3a" id="question3a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>
              <br>

              <!-- 2 -->
               <h4>2. Demonstrates dependability in professional duties</h4>
               <h4>a. Submits course syllabus that conforms with the CAS curriculum<br>(i.e. form, content)</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question4a" id="question4a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4a" id="question4a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4a" id="question4a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question4a" id="question4a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4a" id="question4a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>
               
               <h4>b. Submits a well-constructed examination</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question5a" id="question5a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5a" id="question5a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5a" id="question5a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question5a" id="question5a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5a" id="question5a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>
              
              <h4>c. Submits accurate grades that conform with CAS standards</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question6a" id="question6a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6a" id="question6a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6a" id="question6a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question6a" id="question6a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6a" id="question6a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>
              
              <h4>d. Submits other requirements prescribed by the department</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question7a" id="question7a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7a" id="question7a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7a" id="question7a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question7a" id="question7a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7a" id="question7a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>
              <br>

              <!-- 3 -->
              <h4>3. Works cooperatively in bringing about the success of the school program</h4>
               <h4>a. Cooperates to bring success of the school program<br>(i.e. spiritual, social, outreach, academic)</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question8a" id="question8a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question8a" id="question8a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question8a" id="question8a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question8a" id="question8a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question8a" id="question8a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>
              
               <h4>b. Takes care and makes optimum use of the physical and<br>materials resources that supports Instructional program</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question9a" id="question9a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question9a" id="question9a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question9a" id="question9a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question9a" id="question9a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question9a" id="question9a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>
              <br>
              <!-- 4 -->
              <h4>4. Promptness in meeting obligations</h4>
               <h4>a. Has a good and reasonable attendance record</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question10a" id="question10a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question10a" id="question10a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question10a" id="question10a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question10a" id="question10a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question10a" id="question10a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>
               
               <h4>b. Reports and leaves classes on time</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question11a" id="question11a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question11a" id="question11a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question11a" id="question11a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question11a" id="question11a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question11a" id="question11a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>    

              <h4>c. Reports to classes regularly</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question12a" id="question12a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question12a" id="question12a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question12a" id="question12a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question12a" id="question12a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question12a" id="question12a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>

              <h4>d. Attends meetings convocations and other official school<br>invitations regularly</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question13a" id="question13a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question13a" id="question13a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question13a" id="question13a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question13a" id="question13a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question13a" id="question13a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>
              <br>

              <!-- B -->
              <h4 class="title">B. <b>PROFESSIONAL RELATIONSHIPS (20%)</b></h4>
			  
			  <br>
		  
		  <div class="radio">
               <div class="radio-group">
		 <h4 class="scoring"><b>
                  5<div class="scoring-space"></div>4<div class="scoring-space"></div>3<div class="scoring-space"></div>2<div class="scoring-space"></div>1
               </div>
			   </div>
			  
               <h4>1. Maintains an effective working relationships with staff</h4>
               <h4>a. Respects needs and feelings of his/her colleagues</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question1b" id="question1b" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1b" id="question1b" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1b" id="question1b" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question1b" id="question1b" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1b" id="question1b" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
               
               <h4>b. Maintains a positive relationships with all school personnel</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question2b" id="question2b" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2b" id="question2b" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2b" id="question2b" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question2b" id="question2b" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2b" id="question2b" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              <br>
              
              <!-- B 2 -->
              <h4>2. Maintains a relationships with students that is conducive to learning</h4>
               <h4>a. Maintains a supportive, positive, and professional relationships<br>with students</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question3b" id="question3b" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3b" id="question3b" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3b" id="question3b" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question3b" id="question3b" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3b" id="question3b" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
               
               <h4>b. Exemplifies academic, moral, and ethical norms in his/her<br>personal and professional life</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question4b" id="question4b" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4b" id="question4b" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4b" id="question4b" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question4b" id="question4b" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4b" id="question4b" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              <br>
              <!-- C -->

              <h4 class="title">C. <b>PERSONAL QUALITIES (10%)</b></h4>
			  
			  <br>
		  
		  <div class="radio">
               <div class="radio-group">
		 <h4 class="scoring"><b>
                  5<div class="scoring-space"></div>4<div class="scoring-space"></div>3<div class="scoring-space"></div>2<div class="scoring-space"></div>1
               </div>
			   </div>
			  
               <h4>1. Health and vigor</h4>
               <h4>a. Displays pleasant personality</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question1c" id="question1c" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1c" id="question1c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1c" id="question1c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question1c" id="question1c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question1c" id="question1c" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
               
               <h4>b. Displays a sense of humor</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question2c" id="question2c" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2c" id="question2c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2c" id="question2c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question2c" id="question2c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question2c" id="question2c" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
            
              <h4>c. Open to suggestions, new ideas, and accepts constructive criticisms</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question3c" id="question3c" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3c" id="question3c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3c" id="question3c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question3c" id="question3c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question3c" id="question3c" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              <br>

              <!-- 2 -->
               <h4>2. Competence and Initiative</h4>
               <h4>a. Exercises tact and objectivity in articulating own ideas and concerns</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question4c" id="question4c" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4c" id="question4c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4c" id="question4c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question4c" id="question4c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question4c" id="question4c" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
               
               <h4>b. Contributes ideas, inputs for the good of the department and the<br>school</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question5c" id="question5c" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5c" id="question5c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5c" id="question5c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question5c" id="question5c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question5c" id="question5c" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              <br>

              <!-- 3 -->
              <h4>3. Grooming and appropriatness of attire</h4>
               <h4>a. Practice habits of good grooming</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question6c" id="question6c" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6c" id="question6c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6c" id="question6c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question6c" id="question6c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question6c" id="question6c" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              <br>   

              <!-- 4 -->
              <h4>4. Work attitudes</h4>
               <h4>a. Is enthusiastic and shows initiative beyond the call of duty</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question7c" id="question7c" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7c" id="question7c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7c" id="question7c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question7c" id="question7c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question7c" id="question7c" value="1" form="myform">
                </label>
                
              
              </div>
              </div>

              <h4>b. Accepts leadership and fellowships roles</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question8c" id="question8c" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question8c" id="question8c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question8c" id="question8c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question8c" id="question8c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question8c" id="question8c" value="1" form="myform">
                </label>
                
              
              </div>
              </div>

              <h4>c. Upholds the good name and integrity of the school in and out of the<br>school premises</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" name="question9c" id="question9c" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question9c" id="question9c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question9c" id="question9c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" name="question9c" id="question9c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" name="question9c" id="question9c" value="1" form="myform">
                </label>
                <br><br>
                <button class="btn btn-primary" style="margin-bottom: 20px;" type="submit" name="action" id="saveevaluation" >Submit</button>
              </form>
              </div>
              </div>
            </div>

 
             
         
      </div>
 
    </div>
    <!--end-->
    <!-- Modals -->
    
   
   


      
    <footer id="footer">
      <p class="footer-text-a">Copyright @ 2018 San Beda College Alabang. All rights reserved.</p>
    </footer>  
      
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
    <script type="text/javascript">
      
      var home = document.getElementById("homelink");
      

      function hidehome(a){
        if (a == "employee"){
           home.style.display = "none";
        }
        else{
          home.style.display = "block";
        }
      }

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
      confirmButtonText: 'Ok'
      })
 }
  else if(values[1] != values[2]){
     swal({
      title: 'Error',
      html:
       'New Password does not match',
      confirmButtonText: 'Ok'
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

    <script type="text/javascript">

      var ay = "";
      var getsem = "";

       var openpdf = document.getElementById("openpdf");
        

     function showSemester(str){
         document.getElementById("semDropdown").value = "";

      if(str == ""){
          openpdf.disabled = true;
         document.getElementById('semDropdown').style.display = "none";
         document.getElementById("txtHint").innerHTML = "";
      }
      else{
        ay = str;
        document.getElementById("semDropdown").value = "";
        document.getElementById('semDropdown').style.display = "block";
      }

     }

     function showHistory(str){

        openpdf.disabled = false;
          getsem = str; 
          var profname = document.getElementById('profName').value;

       if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

        
                  document.getElementById("txtHint").innerHTML = this.responseText;
             
               
                }
            };

            xmlhttp.open("POST","includes/gethistory.php?sem=" + str + "&prof=" + profname + "&ay=" + ay,true);
            xmlhttp.send();
     }

     function clearDropdown(){
      document.getElementById("department").value = "";
      document.getElementById('semDropdown').style.display = "none";
         document.getElementById("txtHint").innerHTML = "";
              document.getElementById("semDropdown").value = "";
                openpdf.disabled = true;


     }

      function printpdf()  {
     
          
      name =  document.getElementById("profName").value;
      var win = window.open("pdf/pdf.php?varr=" + name + "&ay=" + ay+ "&sem=" + getsem, '_blank');
      win.focus();

    //window.location="pdf/pdf.php?varr=" + name;

        }



    </script>

   
     


  </body>
</html>