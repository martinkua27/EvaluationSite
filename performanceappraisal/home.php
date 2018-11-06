<?php

function getImage(){

 include("../indexDB.php");
include('../session.php');
 
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
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.ico">

    <title>Home | San Beda College Alabang</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/homeperformance.css" rel="stylesheet">
	
	<link href="css/summary.css" rel="stylesheet">
	
     <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
   
   <style>
#container {
  position: relative;
}

.image {
  display: block;
}

.overlay {
  position: absolute; 
  left: 15px;
  bottom: 30px; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  width: 90%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 13px;
  text-align: center;
}

#container:hover .overlay {
  opacity: 1;
  border-radius: 5px;
}

	html, body{
		height: 30%;
		min-height: 100%;
	}
	
	.profile {
    background-color: #9F0026 !important;
    border-radius: 100px 0px 0px 100px;
    margin-top: 5px;
    margin-right: -30px;
	height: 800px;
	width: 300px;
	}
	
	.questions {
    margin-left:0px;
	margin-top:5px;
	height: 800px;
	background-color: #ddd;
	border-radius: 0px 100px 100px 0px;
	}
	
	.boxed-title {
    border: 3px solid #000;
    font-weight: bold;
    max-width: 18%;
    padding: 5px;
	}
	
	.signature {
    border: 0;
    border-bottom: 3px solid #000;
	}

</style>
   
   
  </head>

  <body style="background-color: #212121;">

  <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#9f0000;">
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
            <li><a href="home.php">Home</a></li>
            <li><a href="reports.php">Reports</a></li>
              <li><a href="summary.php">Summary</a></li>
          </ul>
             <ul class="nav navbar-nav navbar-right">
             <li><a href="#" class="welcome-text">Welcome, <?php include('../session.php'); echo $_SESSION['login_userStat']; ?>!</a></li>
             <li class="dropdown create">
                  <button id="dropdownMenu1" style="background-color: #9f0000;border-style: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img src="<?php echo getImage(); ?>" class="img-rounded img-responsive" style="width:36px; display:inline-block; margin-top: 5px;">         
                  <span class="caret" style="color:#fff;"></span></button>
                       
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Settings</a></li>
                <li><a href="../logout.php">Log Out</a></li>
              </ul>
          </ul>
        </div>
      </div>
    </nav>
    
      
     
   
      <div class="container" style="margin-top:180px;">
         <div class="row">
              <a href="#">
              <div id="container" class="col-xs-6 col-md-3">
                <div class="jumbotron" style="background-color: #4E887F;">
                    <div class="container">
                       <a data-toggle="modal" data-target="#accounting" style="text-decoration: none;color: #fff;text-align: center;"> 
                        <img src="images/software.png" class="center-block img-responsive" class="image">
                        <hr>
                        <h3>IT</h3>
                       </a>
					   <div class="overlay">Select this</div>
                    </div>
                
                </div>
              </div> 
              </a>
               <div id="container" class="col-xs-6 col-md-3">
                <div class="jumbotron" style="background-color: #4C7FB0;">
                    <div class="container">
                        <a href="#" style="text-decoration: none;color: #fff;text-align: center;"> 
                          <img src="images/accounting.png" class="center-block img-responsive" class="image">
                          <hr>
                           <h3>Accounting</h3>
                        </a>
						<div class="overlay">Select this</div>
                    </div>
                
                </div>
              </div>  
              <div id="container" class="col-xs-6 col-md-3">
                <div class="jumbotron" style="background-color: #8d192c;">
                    <div class="container">
                        <a href="#" style="text-decoration: none;color: #fff;text-align: center;"> 
                          <img src="images/planet-earth.png" class="center-block img-responsive" class="image">
                          <hr>
                           <h3>IS</h3>
                        </a>
						<div class="overlay">Select this</div>
                    </div>
                
                </div>
              </div>  
              <div id="container" class="col-xs-6 col-md-3">
                <div class="jumbotron" style="background-color: #c59744;">
                    <div class="container">
                        <a href="#" style="text-decoration: none;color: #fff;text-align: center;"> 
                          <img src="images/brain.png" class="center-block img-responsive" class="image">
                          <hr>
                           <h3>Psychology</h3>
                        </a>
						<div class="overlay">Select this</div>
                    </div>
                
                </div>
              </div>  
        
 
       <div class="container-fluid">
        <div class="row">
       

        
        </div>
    </div>
    <!--end-->
    <!-- Modals -->
    
    <!-- Add Page -->
    <div class="modal fade" id="accounting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Information Technology</h4>
          </div>
          <div class="container">
            <div class="row">

                <p class="search-text">Search: </p><input class="form-control" type="text" id="search" placeholder="Filter Professors.."> 
                  <div class="carousel slide multi-item-carousel" id="theCarousel">
                    <div class="carousel-inner">

                      <div class="item active">

                          <div class="col-xs-3"><a href="#"><img src="images/002.jpg" id="Musni, Aristotle" alt="Aristotle F. Musni" onClick="reply_click(this.id)" alt="Image" style="max-width: 100%;"></a></div>
                          <div class="col-xs-3"><a href="#"><img src="images/edgar.JPG" id="Torres, Edgardo" alt="Edgar Torres" onClick="reply_click(this.id)" style="max-width: 100%;"></a></div>
                          <div class="col-xs-3"><a href="#"><img src="images/mark.JPG" id="Alejandria, Mark Cherwin L." alt="Mark Alejandria" onClick="reply_click(this.id)" style="max-width: 100%;"></a></div>
                          <div class="col-xs-3"><a href="#"><img src="images/ponce.JPG"  id="Ponce, Consuelo C." alt="Connie Ponce" onClick="reply_click(this.id)" style="max-width: 100%;"></a></div>
                      </div>

                      <div class="item">
                          <div class="col-xs-3"><a href="#"><img src="images/pic2.jpg" id="musni" onClick="reply_click(this.id)" alt="Image" style="max-width: 100%;"></a></div>
                          <div class="col-xs-3"><a href="#"><img src="images/pic3.jpg" id="edgar" alt="Image" style="max-width: 100%;"></a></div>
                          <div class="col-xs-3"><a href="#"><img src="images/pic4.jpeg" alt="Image" style="max-width: 100%;"></a></div>
                          <div class="col-xs-3"><a href="#"><img src="images/pic5.jpg"  alt="Image" style="max-width: 100%;"></a></div>

                      </div>
                   

                      <!--  Example item end -->
                    </div>
                    <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                    <div class="try" style="border-style: 1px solid #000; width: 10px; margin-left: 50px; margin-right: 50px; margin-top: 20px;">

                    </div>
                  </div>


            </div>
            </div>
            <!------>
              <div id="change-name" class="text-center"><h3>Professors</h3></div>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
             
        
   
              <button type="button"  id="fpa" value="Faculty Performance Appraisal" onclick="changeText(this.value);" class="btn btn-default" > Faculty Performance Appraisal</button>
             

              <button type="button"  id="cos" value="Classroom Observation Sheet" onclick="changeText(this.value);" class="btn btn-default" > Classroom Observation Sheet</button>
            
            </div>


         
          <div class="modal-footer">
             <p id="pText" style="float: left;">Choose an option</p>
            <input type="button" data-dismiss="modal" style="float: right;" value="Close"> 
            <input type="button" id="fbtn" value="Go" onclick="go();" style="display: none; float: right;">
           <input type="button" id="sbtn" value="Go" onclick="gotwo();" style="display: none; float: right;">
          </div>
          
        </div>
      </div>
    </div>
	
		<!--BOTTOM FORM-->
          <div class="col-md-3">
          <div class="profile">
    
                  <br>
              <!--<img src="images/001.png" id="profpic" class="img-responsive center-block img-circle img-profile">-->
              <br>
              <div class="profile-info">
                    
               
                 
                <!-- student profile 
                <h3 class='boxed_item'>Summary</h3>-->
				
				<br>
				
				<form id="myForm">

          <h5>Program</h5>
                 
          <?php

                          include("../indexDB.php");
                          include('../session.php');

                          $conn = new mysqli($servername, $username, $password, $dbname)
                                  or die ('Cannot connect to db');

                                  $result = $conn->query("select * from assigned_schedule group by program");

                     ?>
                          <select class= "form-control subj-code" name="department" style="width: 270px;" id="department" onchange="showUser(this.value)">
                             <?php

                                  echo "<option value=''>Select</option>";

                                  while ($row = $result->fetch_assoc()) {

                                       unset($option1);
                                    $option1 = $row['program'];
                                    echo "<option value='$option1'>$option1</option>";
                                    
                                   

                                   }

                                    echo "</select>";

                                         if(isset($_POST['department'])){ //check if $_POST['examplePHP'] exists
          
                        echo '<script>alert('. $_POST['department'] .')</script>'; // echo the data
                          die(); // stop execution of the script.
                       }

                             ?> 
                            


                         <div id="txtHint"></div>
  
              <?php 

                //$varaa = "";
                /*
                if($varaa = "profname"){
                echo "<h5 class='department' style='margin-top: 10px;''>Name of Faculty</h5>";
                echo "<h1 class='name'>NONE</h1>";
                echo "<hr>";
        
                echo "<h5 class='department'>Department/Area</h5>";
                echo "<h1 class='name'>NONE</h1>";
                echo "<hr>";
        

                echo "<h5 class='department'>Date</h5>";
                echo "<h1 class='name'><?php echo $dateNow; ?></h1>";
                echo "<hr>";
                }

                */
				        
                 ?>
			
			<!--
			<button id="signaturebtn" type="button" style="color: black" onclick="signDoc();" disabled="true">Apply Signature</button>
			<button id="print" value="print" type="button" onclick="testPdf()" style="color: black" disabled="true">save PDF</button>
			-->
			
      <br>

       <div id="inviData" style="display: none;"></div>
              			
		</form>
		
    <form id="myform" name="myform" onsubmit="return false">
                <!-- end -->
                  
                 
              </div>
              <br>
              <br>
          </div>
             
          </div>      

          <div  class="col-md-9" style="color: #000; margin-bottom: 40px;">
          <div class="questions">
          <br>
          <div class="margin-questions">
          <h2 class="boxed-title">Elements</h2>
		  
		  <div class="radio">
               <div class="radio-group">
		 <h4 class="title" class="radio-inline"><b>
                  &nbsp&nbsp&nbspRating&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp%&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTotal
                </b></h4>
               </div>
			   </div>
        
          <h4 class="title"> <b>Classroom Observation 35%</b></h4>
			   
			   <h4>1. DEAN/VDAA (5%)</h4>
               <div class="radio">
               <div class="radio-group" style="margin-top: -10px">
               
                <label class="radio-inline" style="margin-left: 20px;">
                   <p id="vdaaClassroomObservationRating">-</p>
                </label>
                <label class="radio-inline" style="margin-left: 30px">
                  .05<?php echo $filterProf; ?>
                </label>
                <label class="radio-inline" style="margin-left: 55px">
                   <p id="vdaaClassroomObservationTotal">-</p>
                </label>                
              
              </div>
              </div>
               
               <!-- 2 -->
               <h4>2. Chair/Coordinator (30%)</h4>
               <div class="radio">
               <div class="radio-group" style="margin-top: -10px">
               
                <label class="radio-inline" style="margin-left: 20px;">
                   <p id="chairClassroomObservationRating">-</p>
                </label>
                <label class="radio-inline" style="margin-left: 35px">
                  .30
                </label>
                <label class="radio-inline" style="margin-left: 55px">
                   <p id="chairClassroomObservationTotal">-</p>
                </label>                
              
              </div>
              </div>
			  
			  <h4 class="title"> <b>Performance Appraisal 40%</b></h4>
			   
			   <h4>1. Dean/VDAA (20%)</h4>
               <div class="radio">
               <div class="radio-group" style="margin-top: -10px">
               
                <label class="radio-inline" style="margin-left: 20px;">
                   <p id="deanVdaaPerformanceAppraisalRating">-</p>
                </label>
                <label class="radio-inline" style="margin-left: 35px">
                  .20
                </label>
                <label class="radio-inline" style="margin-left: 55px">
                   <p id="deanVdaaPerformanceAppraisalTotal">-</p>
                </label>                
              
              </div>
              </div>
               
               <!-- 2 -->
               <h4>2. Chair/Coordinator (20%)</h4>
                <div class="radio">
               <div class="radio-group" style="margin-top: -10px">
               
                <label class="radio-inline" style="margin-left: 20px;">
                   <p id="chairPerformanceAppraisalRating">-</p>
                </label>
                <label class="radio-inline" style="margin-left: 35px">
                  .20
                </label>
                <label class="radio-inline" style="margin-left: 55px">
                   <p id="chairPerformanceAppraisalTotal">-</p>
                </label>                
              
              </div>
              </div>
			  
			  <h4 class="title"> <b>Students Evaluation 20%</b></h4>
			   
			   <div class="radio">
               <div class="radio-group" style="margin-top: -10px">
               
                <label class="radio-inline" style="margin-left: 10px;">
                   <p id="studentsEvaluationRating">-</p>
                </label>
                <label class="radio-inline" style="margin-left: 35px">
                  .20
                </label>
                <label class="radio-inline" style="margin-left: 55px">
                   <p id="studentsEvaluationTotal">-</p>
                </label>                
              
              </div>
              </div>
			  
			  <h4 class="title"> <b>Self Evaluation (5%)</b></h4>
			   
			   <div class="radio">
              <div class="radio-group" style="margin-top: -10px">
               
                <label class="radio-inline" style="margin-left: 20px;">
                   <p id="selfEvaluationRating">-</p>
                </label>
                <label class="radio-inline" style="margin-left: 35px">
                  .05
                </label>
                <label class="radio-inline" style="margin-left: 46.5px">
                   <p id="selfEvaluationTotal">-</p>
                </label>                
              
              </div>
              </div>
			  
			<br>
			  
            <h3 class="panel-title" style="margin-left:400px;">OVER-ALL RATING</h3><h4 class="signature" style="margin-left: 550px; width:200px; margin-top:-20px;"><p style="margin-left: 90px;" id="overallTotal">-</p></h4>

			<br><br>
			
                <h5 class='department'>Prepared by:</h5>
				<br>
				<h1 class='name'><h4 class="signature" style="margin-left: 0px; width:220px; margin-top:-20px;"><img src="images/signatureOne.png" alt="Smiley face" height="42" width="200" style="display: none;" id="sign"></h4></h1>
	            
				<h5 class='department' style="margin-left: 0px; margin-top:-10px;">Department Chair/Coordinator</h5>
				
				<br>
				
				<h5 class='department' style="margin-left: 0px; margin-top:30px;">Endorsed by:</h5>
				
				<br>
				<h1 class='name'><h4 class="signature" style="margin-left: 0px; width:220px; margin-top:-20px;"><img src="images/signatureTwo.png" alt="Smiley face" height="42" width="200" style="display: none;" id="signTwo"></h4></h1>
	            
				<h5 class='department' style="margin-left: 0px; margin-top:-10px;">Vice Dean for Academic Affairs</h5>
				
				
				<div style="margin-top: -90px">
				<h5 class='department' style="margin-left: 450px; margin-top:30px;">Approved by:</h5>
				<br>
				<h1 class='name'><h4 class="signature" style="margin-left: 450px; width:220px; margin-top:-20px;"><img src="images/signatureThree.png" alt="Smiley face" height="42" width="200" style="display: none;" id="signThree"></h4></h1>
	            
				<h5 class='department' style="margin-left: 450px; margin-top:-10px;">Dean</h5>
				
				<br><br>
				
				<h5 class='department' style="margin-left: 450px; margin-top:30px;">Copy Received by:</h5>
				<br>
				<h1 class='name'><h4 class="signature" style="margin-left: 450px; width:220px; margin-top:-20px;">NONE</h4></h1>
           
              </div>
              </div>
            
              </div>
              </div>
			
			</form>
      
    <footer id="footer">
      <p class="footer-texta">Copyright @ 2018 San Beda College Alabang. All rights reserved.</p>
    </footer>  
    
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      // Instantiate the Bootstrap carousel
        $('.multi-item-carousel').carousel({
          interval: false
        });

    </script>
    <script>
        var $rows = $('#accounting col-xs-4');
        $('#search').keyup(function() {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        });
    </script>

    <script type="text/javascript">
       
       

        function reply_click(clicked_id)
        {
           
           document.getElementById("change-name").innerHTML = clicked_id;

        
        }
    </script>
    

<script type="text/javascript">
  
 function changeText(value) {
       document.getElementById('pText').innerHTML = "You Chose " + value;

       var buttonone = document.getElementById("fbtn");
       var buttontwo = document.getElementById("sbtn");
       

               
    
                    if(value == "Faculty Performance Appraisal")
                {
                   buttonone.style.display = "block";
                   buttontwo.style.display = "none";
                }
                else{
                   
                    buttonone.style.display = "none";
                    buttontwo.style.display = "block";
                }
                
   
        
                  
            }

function go(){
      var name = document.getElementById("change-name").innerHTML;
      var varr = "";


if (name == "Professors"){
  
    swal(
  'Evaluation',
  'Please choose an Employee',
  'error'
);

}
else{
decodeURIComponent(name);
 window.location="../performanceappraisal.php?varr=" + name;
}

  
}

function gotwo(){
      var name = document.getElementById("change-name").innerHTML;
      var varr = "";


if (name == "Professors"){

   swal(
  'Evaluation',
  'please choose an employee',
  'error'
);
}
else{

decodeURIComponent(name);
window.location="../classroomobservationsheet.php?varr=" + name;
}

  
}
 
            
</script>



    

   
     


  </body>
</html>