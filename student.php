<?php


function getYear(){

 include("indexDB.php");
 include('session.php');
 
     $getyear = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_information where student_id = '".  $_SESSION['login_user'] ."' " ;
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

function getCourse(){

 include("indexDB.php");
include('session.php');
 
     $getcourse = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_information where student_id = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getcourse = $row['course'];

      }
       return $getcourse;
  }
  else{
  	 $getcourse = "None";
          
      return $getcourse;
  }
   

}

function getGender(){

 include("indexDB.php");
include('session.php');
 
     $getgender = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_information where student_id = '".  $_SESSION['login_user'] ."' " ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

       $getgender = $row['gender'];

      }
       return $getgender;
  }
  else{
  	 $getgender = "None";
          
      return $getgender;
  }
   

}

function getAge(){

 include("indexDB.php");
include('session.php');
 
     $getage = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_information where student_id = '".  $_SESSION['login_user'] ."' " ;
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

 include("indexDB.php");
include('session.php');
 
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

 include("indexDB.php");
include('session.php');
 
     $getsection = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_information where student_id = '".  $_SESSION['login_user'] ."' " ;
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
<html>
<head>

<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<link rel="icon" type="image/png" href="images/icons/icoEvaluation.png"/>
	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/navBarFooter.css">
	<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
	
	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
	<!-- Scripts -->
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="js/menu_toggle.js"></script>
	<title>Students Evaluation of Faculty</title>
	
<style>
body{
	background-image: url(images/bgRedEvaluation.jpg);
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
	background-size: 1536px 800px;
}

.sidebar_menu{
	position: fixed;
	width: 300px;
	margin-left: 100px;
	margin-top: 75px;
	overflow: hidden;
	height: 70vh;
	max-height: 100vh;
	background-color: rgba(17,17,17,0.9);
	border: solid 5px black;
	opacity: 0.9;
	transition: all 0.3s ease-in-out;
	overflow-y: auto;
}

.score_card{
	width: 800px;
	border-radius: 7px;
	background-color: red;
	display: block;
	padding: 30px;
	box-sizing: border-box;
	overflow: hidden;
	margin: 40px auto;
	background-color: rgba(17,17,17,0.9);
	border: solid 6px black;
	
	margin-left:430px; 
	margin-top: 85px;
}

.fact_card{
	width: 800px;
	height: 240px;
	background-color: rgba(17,17,17,0.9);
	border: solid 5px black;
	display: block;
	margin: 50px auto;
	overflow-y: auto;
	box-sizing: border-box;
	padding: 20px;
	
	margin-left:430px; 
	margin-top: 20px;
}

.start{
	width: 100%;
	font-family: 'Open Sans';
	font-size: 16px;
	color: white;
	display: block;
	text-align: left;
}

#topBar{
   position:fixed;
   top:0;
   left:0;
   width:100%;
   height:60px;
   background-color:rgb(35, 31, 31);
}

.boxed_item{
	font-family: 'Open Sans';
	font-weight: 200;
	padding: 10px 20px;
	display: inline-block;
	border: solid 2px white;
	box-sizing: border-box;
	font-size: 22px;
	color: white;
	text-align: center;
	margin-top: 70px;
}

.radioButtonAlignment{

	

}

</style>
	
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/saveEvaluation.js"></script>

     <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2/dist/sweetalert2.min.js"></script>

</head>
<body>

	<div id="topBar">
	<a href="C:\Users\user\Desktop\Web Dev Finals Website Project\NEW WEBSITE\mainpage.html"><img id="roar" src="images/sbcaLogo.png" alt= "SBCA LOGO" style="margin-left:200px;" width="300" height="60"></a>
	<span style="color: white; float: right; margin-right: 150px; margin-top: 10px;" >Welcome, <?php include('session.php'); echo  $_SESSION['login_user'];  ?></span>
	<a href="logout.php" style="color: white; float: right; margin-right: -160px; margin-top: 30px;" >Logout</a>
	</div>

	<div class="sidebar_menu" style="margin-top:70px;">
		
		<div style="margin-top:-70px;">
			<a href="http://www.marchinton.com"><h1 class="boxed_item"><span class="logo_bold">Students Evaluation of Faculty</span></h1>
			</a><!--<h2 class="logo_title">Class Schedule</h2>-->
		
		<form action="/action_page.php">
		<ul class="navigation_section">

<li class="navigation_item" id="education">
				SUBJECT/CODE
				<br>

					<?php

                                    include("indexDB.php");
                                   include('session.php');

                                     $conn = new mysqli($servername, $username, $password, $dbname)
                                    or die ('Cannot connect to db');

                                     $result = $conn->query("select * from assigned_subject_table where student_id ='". $_SESSION['login_user'] ."' ");

?>
                                      <select class= "form-control" name="subjectcode" id="subjectcode" onchange="showUser(this.value)">
<?php
                                      		echo "<option value=''>select Subject Code</option>";

                                              while ($row = $result->fetch_assoc()) {

                                      unset($option1);
                                      $option1 = $row['subject_code'];
                                      echo "<option value='$option1'>$option1</option>";

                                        }

                                          echo "</select>";

                                         if(isset($_POST['dropdownvalue'])){ //check if $_POST['examplePHP'] exists
     			
     									  echo '<script>alert('. $_POST['dropdownvalue'] .')</script>'; // echo the data
      									  die(); // stop execution of the script.
   										 }

                    ?> 


			</li>

			<li>
				<div id="txtHint"></div>
			</li>

			 <a href='#''><h1 class='boxed_item'><span class='logo_bold'>Student Profile</span></h1>
			</a>

			<li class='navigation_item' id='profile'>
				Year Level
				<br><h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo getYear(); ?></h2>
			</li>
			
			
			
			<li class="navigation_item" id="contact">
				Course
				<br><h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo getCourse(); ?></h2>
			</li>

			<li class="navigation_item" id="contact">
				Gender
				<br><h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo getGender(); ?></h2>
			</li>
			<li class="navigation_item" id="contact">
				Age
				<br><h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo getAge(); ?></h2>
			</li>
			<li class="navigation_item" id="contact">
			 Civil Status
				<br><h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo getCivilStat(); ?></h2>
			</li>
			<li class="navigation_item" id="contact">
			 Section
				<br><h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo getSection(); ?></h2>
				<input class="input100" style="display: none;" type="text" id="section" name="section" value="<?php echo getSection(); ?>" readonly>
			</li>
		</ul>
		</form>
		
		<!--
		<center>
			<a href="#"><h1 class="boxed_item boxed_item_smaller signup">
			<i class="fa fa-user"></i>
				SIGN UP
			</h1></a>
		</center>
		-->
		</div>
	</div><!-- End of sidebar -->
	
	<div class="score_card">
	
		<!--
		<div class="inner_card">
			<div class="left_team">
				<div class="team_container">
					<img src="images/england.jpg">
					<span data-id="England">0</span>
				</div>
			</div>
-->			
			<p class="start" style="font-size:30.6px; border: solid 5px white; width:31.5%; margin-top:-30px;"><u><b>Response Code</b></u></p>
			<p class="start" style="font-size:12px;">5 = Outstanding | 4 = Very Satisfactory | 3 = Satisfactory | 2 = Moderately Satisfactory | 1 = Needs Improvement</p>
		
<!--
			<div class="right_team">
				<div class="team_container">
					<img src="images/netherlands.jpg">
					<span data-id="The Netherlands">0</span>
				</div>
			</div>
		</div>
		

		<p class="start" style="font-size:30.6px;">Students Evaluation of Faculty</p>-->
	</div>
	
<form id="myform" name="myform">

	<div class="fact_card" style="padding-top: 50px; display: none;" id="evaluationform" name="evaluationform">
		
<p class="start" style="margin-top: -40px;">
<b>

A. METHODS AND STRATEGIES OF TEACHING (40%) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
<div style=" position: absolute;color:white; margin-left: 462px; margin-top: -20px; z-index: 2;">
5 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 4 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 3 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 1
</b>
</p>
</div>
<hr>
<br><div class="start" class="form-group options"> 1. Starts the lesson in an interesting manner. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
		
    <input type="radio" id="question1a" name="question1a" value="5"  form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1a" name="question1a" value="4"  form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1a" name="question1a" value="3"  form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1a" name="question1a" value="2"  form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1a" name="question1a" value="1"  form="myform"> 

	</div>
  
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>

<br><div class="start" class="form-group options"> 2. Clarifies the objective/s of the lesson. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
  
    <input type="radio" id="question2a" name="question2a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2a" name="question2a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2a" name="question2a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2a" name="question2a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2a" name="question2a" value="1" form="myform"> 

   </div>
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 3. Makes the lesson practical and relevant<br>by relating it with everyday living. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
    <input type="radio" id="question3a" name="question3a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3a" name="question3a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3a" name="question3a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3a" name="question3a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3a" name="question3a" value="1" form="myform"> 

   </div>
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 4. Relates the lesson witch current issues<br>and other subject areas whenever posssible. 

<div style="position: relative; margin-left: 463px; margin-top: -20px;">

    <input type="radio" id="question4a" name="question4a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4a" name="question4a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4a" name="question4a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4a" name="question4a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4a" name="question4a" value="1" form="myform"> 

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 5. Facilitates student's understanding by<br>rephrasing ques questions using synonyms,<br>giving examples and the like.

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
  
	<input type="radio" id="question5a" name="question5a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5a" name="question5a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5a" name="question5a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5a" name="question5a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5a" name="question5a" value="1" form="myform">	

   </div>
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 6. Formulates questions that challenge<br>the students' imaginations or reasoning ability. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question6a" name="question6a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6a" name="question6a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6a" name="question6a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6a" name="question6a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6a" name="question6a" value="1" form="myform">

   </div>
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 7. Gives students learning tasks;<br>exercises related to the topics learned/being learned. 
	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question7a" name="question7a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question7a" name="question7a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question7a" name="question7a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question7a" name="question7a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question7a" name="question7a" value="1" form="myform">

   </div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 8. Uses instructional time productively<br>by properly apportioning it to all class activities. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question8a" name="question8a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question8a" name="question8a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question8a" name="question8a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question8a" name="question8a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question8a" name="question8a" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 9. Encourages maximum participation<br>of the students in all activities.

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question9a" name="question9a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question9a" name="question9a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question9a" name="question9a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question9a" name="question9a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question9a" name="question9a" value="1" form="myform">

   </div>
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 10. Makes use of the whiteboard and<br>otheraudiovisual materials like pictures, <br>graphs, and outlines to make the lesson<br>more interesting.

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question10a" name="question10a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question10a" name="question10a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question10a" name="question10a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question10a" name="question10a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question10a" name="question10a" value="1" form="myform">

   </div>
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 11. Provides students with more<br>oppurtunities for learning by<br>giving assignments, research work,<br>and the like which could be<br>accomplished within the allotted time. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question11a" name="question11a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question11a" name="question11a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question11a" name="question11a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question11a" name="question11a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question11a" name="question11a" value="1" form="myform">	

   </div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 12. Encourages students to ask<br>intelligent and relevant questions.

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question12a" name="question12a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question12a" name="question12a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question12a" name="question12a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question12a" name="question12a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question12a" name="question12a" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 13. Establishes continuity and<br>unity of present and previous lessons.<br>Summarizes the lesson to bring out important points. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question13a" name="question13a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question13a" name="question13a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question13a" name="question13a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question13a" name="question13a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question13a" name="question13a" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 14. Evaluates students performance<br>by giving quizzes from time to time. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question14a" name="question14a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question14a" name="question14a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question14a" name="question14a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question14a" name="question14a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question14a" name="question14a" value="1" form="myform">

   </div> 
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 15. Informs students of test results<br>not later than two weeks after the exam. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
  
  	<input type="radio" id="question15a" name="question15a" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question15a" name="question15a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question15a" name="question15a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question15a" name="question15a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question15a" name="question15a" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 16. Explains the grading system and gives grades fairly. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
  
	<input type="radio" id="question16a" name="question16a" value="5" required>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question16a" name="question16a" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question16a" name="question16a" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question16a" name="question16a" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question16a" name="question16a" value="1" form="myform">

   </div>
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><hr><br>
 
<p class="start">
<b>
B. MASTERY OF THE SUBJECT MATTER (20%) 
<hr>
</b>
</p> 

<br><div class="start" class="form-group options"> 1. Presents the lessons systematically.

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question1b" name="question1b" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1b" name="question1b" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1b" name="question1b" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1b" name="question1b" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1b" name="question1b" value="1" form="myform">

   </div>
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>  

<br><div class="start" class="form-group options"> 2. Explains the lesson/obejectives clearly. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question2b" name="question2b" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2b" name="question2b" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2b" name="question2b" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2b" name="question2b" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2b" name="question2b" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>

<br><div class="start" class="form-group options"> 3. Answers question of the students<br>intelligently and satisfactorily. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question3b" name="question3b" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3b" name="question3b" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3b" name="question3b" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3b" name="question3b" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3b" name="question3b" value="1" form="myform">

   </div>
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>

<br><hr><br>
 
<p class="start">
<b>
C. COMMUNICATION SKILLS (15%)
<hr> 
</b>
</p> 

<br><div class="start" class="form-group options"> 1. Speaks correct English and/or Filipino<br>and communications his/her ideas well. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question1c" name="question1c" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1c" name="question1c" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1c" name="question1c" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1c" name="question1c" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1c" name="question1c" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>

<br><div class="start" class="form-group options"> 2. Has a loud voice enough to be heard by<br>everyone in class.

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
  
	<input type="radio" id="question2c" name="question2c" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2c" name="question2c" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2c" name="question2c" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2c" name="question2c" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2c" name="question2c" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>

<br><hr><br>
 
<p class="start">
<b>
D. CLASSROOM MANAGEMENT (15%) 
<hr>
</b>
</p>

<br><div class="start" class="form-group options"> 1. Sees to it that the room is clean and orderly. 


	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
	
	<input type="radio" id="question1d" name="question1d" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1d" name="question1d" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1d" name="question1d" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1d" name="question1d" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1d" name="question1d" value="1" form="myform">

</div>

   
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div> 

<br><div class="start" class="form-group options"> 2. Maintains classroom discipline.

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question2d" name="question2d" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2d" name="question2d" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2d" name="question2d" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2d" name="question2d" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2d" name="question2d" value="1" form="myform">

</div>

<br><div class="start" class="form-group options"> 3. Checks the attendance of students. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question3d" name="question3d" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3d" name="question3d" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3d" name="question3d" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3d" name="question3d" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3d" name="question3d" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>

<br><div class="start" class="form-group options"> 4. Sees to it that the students wear<br>the prescribed uniform. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question4d" name="question4d" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4d" name="question4d" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4d" name="question4d" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4d" name="question4d" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4d" name="question4d" value="1" form="myform">

</div>

<br><div class="start" class="form-group options"> 5. Sees to it that all teaching materials<br>like whiteboard marker and erasers are prepared. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question5d" name="question5d" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5d" name="question5d" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5d" name="question5d" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5d" name="question5d" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5d" name="question5d" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>

<br><div class="start" class="form-group options"> 6. Turns off airconditioning units, all lights,<br>and makes sure that the whiteboard is clean<br>before dismissing the class. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question6d" name="question6d" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6d" name="question6d" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6d" name="question6d" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6d" name="question6d" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6d" name="question6d" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>

<br><hr><br>
 
<p class="start">
<b>
E. PERSONAL AND SOCIAL TRAITS (10%) 
<hr>
</b>
</p> 

<br><div class="start" class="form-group options"> 1. Projects self-confidence; respects the opinions,<br>suggestions, and comments of students. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   	
	<input type="radio" id="question1e" name="question1e" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1e" name="question1e" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1e" name="question1e" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1e" name="question1e" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question1e" name="question1e" value="1" form="myform">

</div>

<br><div class="start" class="form-group options"> 2. Projects a respectable and a decent image. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question2e" name="question2e" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2e" name="question2e" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2e" name="question2e" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2e" name="question2e" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question2e" name="question2e" value="1" form="myform">

</div>

<br><div class="start" class="form-group options"> 3. Practices what he/she preaches/advises. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question3e" name="question3e" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3e" name="question3e" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3e" name="question3e" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3e" name="question3e" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question3e" name="question3e" value="1" form="myform">

</div>

<br><div class="start" class="form-group options"> 4. Manifests and promotes the Benedictine<br>charism of work and prayer. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question4e" name="question4e" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4e" name="question4e" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4e" name="question4e" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4e" name="question4e" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question4e" name="question4e" value="1" form="myform">

</div>

<br><div class="start" class="form-group options"> 5. Integrates positive values in the lesson. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question5e" name="question5e" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5e" name="question5e" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5e" name="question5e" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5e" name="question5e" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question5e" name="question5e" value="1" form="myform">

</div>

<br><div class="start" class="form-group options"> 6. Recognizes students' participation in<br>institutional activities by giving proper considerations.

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question6e" name="question6e" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6e" name="question6e" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6e" name="question6e" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6e" name="question6e" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question6e" name="question6e" value="1" form="myform">

</div>

<br><div class="start" class="form-group options"> 7. Comes to class regularly.

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question7e" name="question7e" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question7e" name="question7e" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question7e" name="question7e" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question7e" name="question7e" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question7e" name="question7e" value="1" form="myform">

</div>
   
   <!--<input type = "button" value = "Submit" onClick="valthis()">-->
</div>

<br><div class="start" class="form-group options"> 8. Comes to class on time. 

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
   
	<input type="radio" id="question8e" name="question8e" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question8e" name="question8e" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question8e" name="question8e" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question8e" name="question8e" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question8e" name="question8e" value="1" form="myform">

</div>

<br><div class="start" class="form-group options"> 9. Is approachable and encourages<br>students toconsult him/her for assistance.

	<div style="position: relative; margin-left: 463px; margin-top: -20px;">
  
	<input type="radio" id="question9e" name="question9e" value="5" required form="myform">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question9e" name="question9e" value="4" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question9e" name="question9e" value="3" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question9e" name="question9e" value="2" form="myform"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" id="question9e" name="question9e" value="1" form="myform">

</div>

<br><div class="start" class="form-group options"> Other Comments:

	
   </div>
<input type='text' name="comments" id="comments">

</textarea>
 <button class="btn btn-primary" style="margin-right:5px;" type="submit" name="action" id="saveevaluation" >Save</button>


</form>

</div>

<footer id="footer" style="padding: 45px 20px;margin-top: -25px;">
      <p class="footer-text">Copyright Evaluation Site, &copy; 2018</p>
    </footer>  


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
	

function showUser(str)  {
 

	var div = document.getElementById("evaluationform");

    if (str == "") {
    	div.style.display = "none";
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
    	div.style.display = "block";
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
        xmlhttp.open("GET","getInfo.php?q="+str,true);
        xmlhttp.send();
    }

}

</script>



</body>
</html>