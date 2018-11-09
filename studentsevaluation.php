<?php
//TESTING STUDENT
//TRY EDIT

function getYear(){

 include("includes/indexDB.php");
 include('includes/session.php');
 
     $getyear = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_list where student_id = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getyear = $row['year_level'];

      }
       return $getyear;
  }
  else{
  	 $getyear = "None";
          
      return $getyear;
  }
   

}

function getCourseSection(){

 include("includes/indexDB.php");
include('includes/session.php');
 
     $getcourse = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_list where student_id = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getcourse = $row['section'];

      }
       return $getcourse;
  }
  else{
  	 $getcourse = "None";
          
      return $getcourse;
  }
   

}

function getGender(){

 include("includes/indexDB.php");
include('includes/session.php');
 
     $getgender = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_list where student_id = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getgender = $row['gender'];

      }

      if($getgender == "M"){
        $getgender = "Male";
      }else{
        $getgender = "Female";
      }

       return $getgender;
  }
  else{
  	 $getgender = "None";
          
      return $getgender;
  }
   

}

function getAge(){

 include("includes/indexDB.php");
include('includes/session.php');
 
     $getage = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_list where student_id = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getage = $row['age'];

      }
       return $getage;
  }
  else{
  	 $getage = "None";
          
      return $getage;
  }
   

}

function getCivilStat(){

 include("includes/indexDB.php");
include('includes/session.php');
 
     $getcivilstat = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_information where student_id = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getcivilstat = $row['civil_status'];

      }
       return $getcivilstat;
  }
  else{
  	 $getcivilstat = "None";
          
      return $getcivilstat;
  }
   

}

function getSection(){

 include("includes/indexDB.php");
include('includes/session.php');
 
     $getsection = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_list where student_id = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getsection = $row['year'];

      }
       return $getsection;
  }
  else{
  	 $getsection = "None";
          
      return $getsection;
  }
   

   


}

function getStudSection(){

 include("includes/indexDB.php");
include('includes/session.php');
 
     $getsection = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_list where student_id = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getsection = $row['section'];

      }
       return $getsection;
  }
  else{
     $getsection = "None";
          
      return $getsection;
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

    <title>Students Evaluation | San Beda College Alabang</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/studenteval.css" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/saveEvaluation.js"></script>
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
   
   <style>
   /*iMAC 21"*/
/* 1920 x 1080 */
@media screen and (max-width: 1920px) {
    .navbar.navbar-default.navbar-fixed-top{
        font-size: 25px;
    }
    .text-top{
        margin-top: -844px;
        font-size: 40px;
    }
    .container{
        width: 1375px !important;
    }
    h2 {
    font-size: 40px;
    }
    .boxed-title{
        max-width: 37%;
    }
    h4 {
        font-size: 20px;
    }
    h5 {
        font-size: 30px;
    }
    h3 {
        font-size: 40px;    
    }
    .radio{
        margin-left: 740px;
        margin-top: -40px;
    }
    .checkbox label, .radio label {
        padding-left: 25px;
        margin-left: -5px;
    }
    .img-profile {
        height: 200px;
    }
    
    .subj-code {
        max-width: 88%;
        font-size: 20px;
    }
    
    .name {
        font-size: 25px;
    }
    hr {
        margin-right: 40px;
        margin-top: 9px;
    }
    
    .profile {
        height: 2354px !important;
    }
    
    .footer-text {
        font-size: 25px  !important;
    }
}
</style>

  </head>

  <body style="background-color: #9f0000;">

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
            <a class="navbar-brand" href="#"><img src="images/bedalogo.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href=""></a></li>
          </ul>
             <ul class="nav navbar-nav navbar-right">
             <li><a href="#" class="welcome-text">Welcome, <?php include('session.php'); echo $_SESSION['login_user']; ?>!</a></li>
             <li><a href="logout.php">Log Out</a></li>
             </ul>
        
        </div>
      </div>
    </nav>
    
      
     
      <div class="container-fluid">
        <div class="row">
             <div class="bg-top"></div>
<!--             <img src="images/redpattern.jpg" class="bg-top img-responsive">-->
	
             <h1 class="text-top">STUDENTS EVALUATION OF<br>FACULTY</h1>
        </div>
      </div>
   
      <div class="container">
         <div class="row">
          <div class="col-md-3">
          <div class="profile" style="height: 2482px;">
    
                  <br>
            <img src="images/blank.png" id="profpic" style="display: none;" class="img-responsive center-block img-circle img-profile">
            <p id="demo"></p>
              <br>
              <div class="profile-info">
			  
              <h5>SUBJECT CODE</h5>
                 
					<?php

                          include("includes/indexDB.php");
                          include('includes/session.php');

                          $conn = new mysqli($servername, $username, $password, $dbname)
                                  or die ('Cannot connect to db');

                                  $result = $conn->query("select * from student_list where student_id = '". $_SESSION['login_user'] ."' ");

                     ?>
                          <select class= "form-control subj-code" name="subjectcode" id="subjectcode" onchange="showUser(this.value)">
                             <?php
                                  echo "<option value=''>select Subject Code</option>";

                                  while ($row = $result->fetch_assoc()) {

                                    unset($option1);
                                    $option1 = $row['subject_code_enrolled'];
                                    echo "<option value='$option1'>$option1</option>";

                                   }

                                    echo "</select>";

                                         if(isset($_POST['dropdownvalue'])){ //check if $_POST['examplePHP'] exists
     			
     									  echo '<script>alert('. $_POST['dropdownvalue'] .')</script>'; // echo the data
      									  die(); // stop execution of the script.
   										 }

                             ?> 
							 
				<br><br>			 
                        <button id="verify" name="verify" type="button" class="btn btn-default btn-verify" onclick="verifyEvaluation()" >Verify</button>
                <hr>   
                <!-- profImage and subj info -->
                <div id="txtHint"></div>
                 
                <!-- student profile -->
                <h3 class='boxed_item'>Student<br>Profile</h3>
			         <br>

			
                <h5 class='department'>Year Level</h5>
                <h1 class='name'><?php echo getSection(); ?></h1>
                <hr>
	
                <h5 class='department'>Gender</h5>
                <h1 class='name'><?php echo getGender(); ?></h1>
                <hr>
			
                <h5 class='department'>Age</h5>
                <h1 class='name'><?php echo getAge(); ?></h1>
             
			    
                 
				<input class="input100" type="text" id="block" style="display: none;" name="block" value="<?php echo getStudSection(); ?>" readonly>
        <input class="input100" type="text" id="imagename" style="display: none;" name="block" style="color: black;">
                <hr>
              
			
		</form>
    <form id="myform" name="myform" onsubmit="return false">
                <!-- end -->
 <!--                  <div id="spacer" style="margin-bottom: 1846px;"><br></div> -->
                 
              </div>
              <br>
              <br>
          </div>
             
          </div>
          <div class="col-md-9" style="color: #000; margin-bottom: 40px;">
          <div class="questions">
          <br>
          <div class="margin-questions">
          <h2 class="boxed-title">RESPONSE CODE</h2>
          <h4 class="text-center score">5 - Outstanding | 4 - Very Satisfactory | 3 - Satisfactory </h4>
          <h4 class="text-center score2">2 - Moderately Satisfactory | 1 - Needs Improvement</h4>
        
          <h4 class="title">A. <b>METHODS AND STRATEGIES OF TEACHING (40%)</b></h4>
		 
				<div class="radio">
               <div class="radio-group">
		 <h4 class="title" class="radio-inline"><b>
                  5&nbsp&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
                </b></h4>
               </div>
			   </div>
			   
			   <h4>1. Starts the lesson in an interesting manner.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question1a" name="question1a" value="5"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1a" name="question1a" value="4"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1a" name="question1a" value="3"  form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question1a" name="question1a" value="2"  form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1a" name="question1a" value="1"  form="myform">
                </label>
                
              
              </div>
              </div>
               
               <!-- 2 -->
               <h4>2. Clarifies the objective/s of the lesson.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question2a" name="question2a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2a" name="question2a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2a" name="question2a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question2a" name="question2a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2a" name="question2a" value="1" form="myform">
                </label>
                
            
              </div>
              </div>
               
              <!-- 3 -->
              <h4>3. Makes the lesson practical and relevant<br>by relating it with everyday living.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question3a" name="question3a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3a" name="question3a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3a" name="question3a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question3a" name="question3a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3a" name="question3a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              
              <!-- 4 -->
              <h4>4. Relates the lesson witch current issues<br>and other subject areas whenever posssible.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question4a" name="question4a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question4a" name="question4a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question4a" name="question4a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question4a" name="question4a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question4a" name="question4a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
               
              <!-- 5 -->
              <h4>5. Facilitates student's understanding by<br>rephrasing ques questions using synonyms,<br>giving examples and the like.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question5a" name="question5a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question5a" name="question5a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question5a" name="question5a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question5a" name="question5a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question5a" name="question5a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              
              <!-- 6 -->
              <h4>6. Formulates questions that challenge<br>the students' imaginations or reasoning ability.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question6a" name="question6a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question6a" name="question6a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question6a" name="question6a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question6a" name="question6a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question6a" name="question6a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              
               <!-- 7 -->
              <h4>7. Gives students learning tasks;<br>exercises related to the topics learned/being learned.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question7a" name="question7a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question7a" name="question7a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question7a" name="question7a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question7a" name="question7a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question7a" name="question7a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              
              <!-- 8 -->
              <h4>8. Uses instructional time productively<br>by properly apportioning it to all class activities.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question8a" name="question8a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question8a" name="question8a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question8a" name="question8a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question8a" name="question8a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question8a" name="question8a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              
              <!-- 9 -->
              <h4>9. Encourages maximum participation<br>of the students in all activities.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question9a" name="question9a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question9a" name="question9a" value="4" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question9a" name="question9a" value="3" required form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question9a" name="question9a" value="2" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question9a" name="question9a" value="1" required form="myform">
                </label>
                
              
              </div>
              </div>
              
              <!-- 10 -->
              <h4>10. Makes use of the whiteboard and<br>otheraudiovisual materials like pictures, <br>graphs, and outlines to make the lesson<br>more interesting.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question10a" name="question10a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question10a" name="question10a" value="4" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question10a" name="question10a" value="3" required form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question10a" name="question10a" value="2" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question10a" name="question10a" value="1" required form="myform">
                </label>
                
              
              </div>
              </div>
             
              <!-- 11 -->
              <h4>11. Provides students with more<br>oppurtunities for learning by<br>giving assignments, research work,<br>and the like which could be<br>accomplished within the allotted time.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question11a" name="question11a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question11a" name="question11a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question11a" name="question11a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question11a" name="question11a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question11a" name="question11a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              
              <!-- 12 -->
              <h4>12. Encourages students to ask<br>intelligent and relevant questions.
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question12a" name="question12a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question12a" name="question12a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question12a" name="question12a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question12a" name="question12a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question12a" name="question12a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
               <!-- 13 -->
              <h4>13. Establishes continuity and<br>unity of present and previous lessons.<br>Summarizes the lesson to bring out important points. 
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question13a" name="question13a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question13a" name="question13a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question13a" name="question13a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question13a" name="question13a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question13a" name="question13a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
               <!-- 14 -->
              <h4>14. Evaluates students performance<br>by giving quizzes from time to time. 
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question14a" name="question14a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question14a" name="question14a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question14a" name="question14a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question14a" name="question14a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question14a" name="question14a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
            
              <!-- 15 -->
              <h4>15. Informs students of test results<br>not later than two weeks after the exam. 
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question15a" name="question15a" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question15a" name="question15a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question15a" name="question15a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question15a" name="question15a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question15a" name="question15a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
              <!-- 16 -->
              <h4>16. Explains the grading system and gives grades fairly. 
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question16a" name="question16a" value="5" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question16a" name="question16a" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question16a" name="question16a" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question16a" name="question16a" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question16a" name="question16a" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
             
              <br>
              <!-- B -->
              <h4 class="title">B. <b>MASTERY OF THE SUBJECT MATTER (20%)</b></h4>
               <h4>1. Presents the lessons systematically.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question1b" name="question1b" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1b" name="question1b" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1b" name="question1b" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question1b" name="question1b" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1b" name="question1b" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
               
              
                  
              <!-- B 2 -->
              <h4>2. Explains the lesson/objectives clearly.</h4>
               <div class="radio">
               <div class="radio-group">
              
                <label class="radio-inline">
                  <input type="radio" id="question2b" name="question2b" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2b" name="question2b" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2b" name="question2b" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question2b" name="question2b" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2b" name="question2b" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                
              <!-- B 3 -->
              <h4>3. Answers question of the students<br>intelligently and satisfactorily. </h4>
               <div class="radio">
               <div class="radio-group">
             
                <label class="radio-inline">
                  <input type="radio" id="question3b" name="question3b" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3b" name="question3b" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3b" name="question3b" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question3b" name="question3b" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3b" name="question3b" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
               
			   <br>
              
              <!-- C -->

              <h4 class="title">C. <b>COMMUNICATION SKILLS (15%)</b></h4>
			  
			  <div class="radio">
               <div class="radio-group">
		 <h4 class="title" class="radio-inline"><b>
                  5&nbsp&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
                </b></h4>
               </div>
			   </div>
			  
               <h4>1. Speaks correct English and/or Filipino<br>and communications his/her ideas well.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question1c" name="question1c" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1c" name="question1c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1c" name="question1c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question1c" name="question1c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1c" name="question1c" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
               
               <!-- C 2 -->
               <h4>2. Has a loud voice enough to be heard by<br>everyone in class.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question2c" name="question2c" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2c" name="question2c" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2c" name="question2c" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question2c" name="question2c" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2c" name="question2c" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
			  
			  <br>
                  
               <!-- D -->

              <h4 class="title">D. <b>CLASSROOM MANAGEMENT (15%)</b></h4>
			  
			  <div class="radio">
               <div class="radio-group">
		 <h4 class="title" class="radio-inline"><b>
                  5&nbsp&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
                </b></h4>
               </div>
			   </div>
			  
               <h4>1. Sees to it that the room is clean and orderly.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question1d" name="question1d" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1d" name="question1d" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1d" name="question1d" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question1d" name="question1d" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1d" name="question1d" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
            
               <!-- D 2 -->
               <h4>2. Maintains classroom discipline.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question2d" name="question2d" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2d" name="question2d" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2d" name="question2d" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question2d" name="question2d" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2d" name="question2d" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
               
               <!-- D 3 -->
               <h4>3. Checks the attendance of students.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question3d" name="question3d" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3d" name="question3d" value="4" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3d" name="question3d" value="3" required form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question3d" name="question3d" value="2" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3d" name="question3d" value="1" required form="myform">
                </label>
                
              
              </div>
              </div>
                  
               <!-- D 4 -->
               <h4>4. Sees to it that the students wear<br>the prescribed uniform.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question4d" name="question4d" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question4d" name="question4d" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question4d" name="question4d" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question4d" name="question4d" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question4d" name="question4d" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
               <!-- D 5 -->
               <h4>5. Sees to it that all teaching materials<br>like whiteboard marker and erasers are prepared.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question5d" name="question5d" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question5d" name="question5d" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question5d" name="question5d" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question5d" name="question5d" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question5d" name="question5d" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
               <!-- D 6 -->
               <h4>6. Turns off airconditioning units, all lights,<br>and makes sure that the whiteboard is clean<br>before dismissing the class. </h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question6d" name="question6d" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question6d" name="question6d" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question6d" name="question6d" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question6d" name="question6d" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question6d" name="question6d" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
			  
			  <br>                  
				  
              <!-- E -->

              <h4 class="title">E. <b>PERSONAL AND SOCIAL TRAITS (10%)</b></h4>
			  
			  <div class="radio">
               <div class="radio-group">
		 <h4 class="title" class="radio-inline"><b>
                  5&nbsp&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp1
                </b></h4>
               </div>
			   </div>
			  
               <h4>1. Projects self-confidence; respects the opinions,<br>suggestions, and comments of students.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question1e" name="question1e" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1e" name="question1e" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1e" name="question1e" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question1e" name="question1e" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question1e" name="question1e" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
              
              <!-- E 2 -->
               <h4>1. Projects a respectable and a decent image.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question2e" name="question2e" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2e" name="question2e" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2e" name="question2e" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question2e" name="question2e" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question2e" name="question2e" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
               <!-- E 3 -->
               <h4>3. Practices what he/she preaches/advises.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question3e" name="question3e" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3e" name="question3e" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3e" name="question3e" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question3e" name="question3e" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question3e" name="question3e" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
            
               <!-- E 4 -->
               <h4>4. Manifests and promotes the Benedictine<br>charism of work and prayer. </h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question4e" name="question4e" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question4e" name="question4e" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question4e" name="question4e" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question4e" name="question4e" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question4e" name="question4e" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
                <!-- E 5 -->
               <h4>5. Integrates positive values in the lesson. </h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question5e" name="question5e" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question5e" name="question5e" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question5e" name="question5e" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question5e" name="question5e" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question5e" name="question5e" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
               <!-- E 6 -->
               <h4>6. Recognizes students' participation in<br>institutional activities by giving proper considerations.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question6e" name="question6e" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question6e" name="question6e" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question6e" name="question6e" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question6e" name="question6e" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question6e" name="question6e" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
               <!-- E 7 -->
               <h4>7. Comes to class regularly.</h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question7e" name="question7e" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question7e" name="question7e" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question7e" name="question7e" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question7e" name="question7e" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question7e" name="question7e" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
               <!-- E 8 -->
               <h4>8. Comes to class on time. </h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question8e" name="question8e" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question8e" name="question8e" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question8e" name="question8e" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question8e" name="question8e" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question8e" name="question8e" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
               <!-- E 9 -->
               <h4>9. Is approachable and encourages<br>students toconsult him/her for assistance. </h4>
               <div class="radio">
               <div class="radio-group">
               
                <label class="radio-inline">
                  <input type="radio" id="question9e" name="question9e" value="5" required form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question9e" name="question9e" value="4" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question9e" name="question9e" value="3" form="myform">
                </label>
                 <label class="radio-inline">
                  <input type="radio" id="question9e" name="question9e" value="2" form="myform">
                </label>
                <label class="radio-inline">
                  <input type="radio" id="question9e" name="question9e" value="1" form="myform">
                </label>
                
              
              </div>
              </div>
                  
              <div class="start" class="form-group options"><h4> Other Comments:</h4>
            
              </div>
              <textarea rows="4" name="comments" id="comments"></textarea><br>
              <button class="btn btn-primary" style="margin-bottom: 20px;" type="submit" name="action" id="saveevaluation" disabled="true">Save</button>
          </form>    


            
            </div>
          </div>
        </div>
       
   
   


      
    <footer id="footer">
      <p class="footer-text text-center">Copyright @ 2018 San Beda College Alabang. All rights reserved.</p>
    </footer>  
    <br>  
      
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
     var verifyBtn = document.getElementById("verify");
     var getvalue = "";

     var radioButtons = document.getElementsByTagName("input")
for(var i=0;i<radioButtons.length;i++) {
   radioButtons[i].disabled = true;
}

    function showUser(str)  {

for(var i=0;i<radioButtons.length;i++) {
   radioButtons[i].disabled = true;
   radioButtons[i].checked = false;
}
      
        //var div = document.getElementById("evaluationform");
          var section = document.getElementById("block").value;

        if (str == "") {
            //div.style.display = "none";
            document.getElementById("txtHint").innerHTML = "";
            submitBtn.disabled = true;
             verifyBtn.disabled = false;
             getvalue = "";

           // document.getElementById("spacer").style.marginBottom = "1845px";
            return;
        } else { 
             // document.getElementById("spacer").style.marginBottom = "1270.2px";
              getvalue = str;
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

                   document.getElementById("txtHint").innerHTML = this.responseText;
                    
                     verifyBtn.disabled = false;

                   var myObj = JSON.parse(this.responseText);
                    document.getElementById("imagename").value = myObj.name;
                 
                    //var empid = document.getElementById("emp_id").value 
                     // showImg(empid);
                }
            };
            xmlhttp.open("POST","includes/getInfo.php?q=" + str + "&section=" + section,true);
            xmlhttp.send();

          

        }

    }


    function showImg(str)  {

        if (str == "") {
       
            document.getElementById('profpic').src = "images/blank.png";
            return;
        } else { 
             
           

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            
            myObj = JSON.parse(this.responseText);
             document.getElementById("imagename").value = myObj.name;

           }
          };
           xmlhttp.open("GET","getImageProf.php?q=" + str,true);
          xmlhttp.send();

          

        }

    }
    
    function verifyEvaluation(){
      if (getvalue == "") {
       
          swal({
  title: 'Sytem',
  text: 'Please choose a subject by clicking the dropdown',
  imageUrl: 'images/chooseSubj.PNG',
  imageWidth: 100,
  imageHeight: 50,
  imageAlt: 'Custom image',
  animation: false
})
            return;
        } else { 
             
for(var i=0;i<radioButtons.length;i++) {
   radioButtons[i].disabled = true;
    radioButtons[i].checked = false;
}


            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
    
     

            if(this.responseText == "Existing Evaluation Found"){
              submitBtn.disabled = true;
              swal(
  'System',
  'Existing Evaluation Found',
  'error'
);
             
            }else{
              submitBtn.disabled = false;

for(var i=0;i<radioButtons.length;i++) {
   radioButtons[i].disabled = false;
}

                swal(
  'System',
  'Ready for Evaluation',
  'success'
);
            }

           }
          };
           xmlhttp.open("GET","verifySubj.php?q=" + getvalue,true);
          xmlhttp.send();
    }
  }

    


    </script>


   
     


  </body>
</html>