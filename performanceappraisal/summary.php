<?php

$dateNow = date("l") . " " . date("Y-m-d");

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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.ico">

    <title>Summary | San Beda College Alabang</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
	
	<link href="css/summary.css" rel="stylesheet">
	
	<style>
	html, body{
		height: 30%;
		min-height: 100%;
	}
	
	.profile {
    background-color: #9F0026 !important;
    border-radius: 100px 0px 0px 100px;
    margin-top: 5px;
    margin-right: -30px;
	height: 950px;
	}
	
	.questions {
    margin-left:0px;
	margin-top:5px;
	height: 950px;
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
      <div class="container navbar-summary">
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
            <li><a href="home.php">Home</a></li>
			<li><a href="reports.php">Reports</a></li>
			<li><a href="summary.php">Summary</a></li>
            <li><a href="upload.php">Upload</a></li>
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
    
      
		<br><br><br><br>
   
	<!--
      <div class="col-md-12" style="padding-left: 80px;padding-right: 80px;padding-top:30px;">
            
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Summary</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  
				<h5 class='department'>Name of Faculty</h5>
				<h1 class='name'></h1>
	            <hr>
				
				<h5 class='department'>Department/Area</h5>
				<h1 class='name'></h1>
	            <hr>
				
				<h5 class='department'>Evaluation Period</h5>
				<h1 class='name'></h1>
	            <hr>
				
				<h5 class='department'>Date/s of Class Observation</h5>
				<h1 class='name'></h1>
	            <hr>
				  
                </div>
                
              </div>
            </div>                   
                  
          </div>
		  -->
		  
		  <div class="container" id="printablearea">
         <div class="row">
          <div class="col-md-3">
          <div class="profile">
    
                  <br>
              <!--<img src="images/001.png" id="profpic" class="img-responsive center-block img-circle img-profile">-->
              <br>
              <div class="profile-info">
                    
               
                 
                <!-- student profile -->
                <h3 class='boxed_item'>Summary</h3>
				
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
  
			<button id="openpdf" type="button" class="btn btn-default" style="color: black; margin-top: 5px;" onclick="printpdf();" disabled>save PDF</button>



     
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
          <div>
            <p id="nameprof" style="font-size: 40px; margin-left: 10px;"></p>
          </div>
          <div class="margin-questions">
          <h2 class="boxed-title">Elements</h2>
		  
		  <!--
		  <div class="radio">
               <div class="radio-group">
		 <h4 class="title" class="radio-inline"><b>
                  &nbsp&nbsp&nbspRating&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp%&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTotal
                </b></h4>
               </div>
			   </div>
		   -->
		
		<div class="col-md-12">
		
			<table class="table table-responsive"  style="width:770px;">
				<th>
				<tr>
					<th><h4><b>Classroom Observation (35%)</b></h4></th>
					<th class="text-center"><h4><b>Rating</b></h4></th>
					<th class="text-center"><h4><b>%</b></h4></th>
					<th class="text-center"><h4><b>Total</b></h4></th>
				</tr>
                </th>	
				<!--1 Dean/VDAA-->
				<tr>
					
					<td>
						<h4>1. DEAN/VDAA (5%)</h4>
					</td>
					
					<td class="text-center"><label>
						<p id="vdaaClassroomObservationRating">-</p>
						</label>
					</td>
					
					<td class="text-center"><label>
                  .05<?php echo $filterProf; ?>
						</label>
					</td>
					
					<td class="text-center"><label>
						<p id="vdaaClassroomObservationTotal">-</p>
						</label>  
					</td>
					
				</tr>
				
				<!--2 Chair/Coordinator-->
				<tr>
				
					<td>
						<h4>2. Chair/Coordinator (20%)</h4>
					</td>
					
					<td class="text-center"><label>
						<p id="chairClassroomObservationRating">-</p>
						</label>
					</td>
					
					<td class="text-center"><label>
					  .30
						</label>
					</td>
					
					<td class="text-center"><label>
						<p id="chairClassroomObservationTotal">-</p>
						</label>       
					</td>
				
				</tr>
				
				<!--Header Performance Appraisal-->
				<tr>
				
					<th>
						<h4><b>Performance Appraisal (40%)</b></h4>
					</th>
					
					<th>
					</th>
					
					<th>
					</th>
					
					<th>      
					</th>
				
				</tr>
				
				<!--3 Dean/VDAA-->
				<tr>
				
					<td>
						<h4>1. Dean/VDAA (20%)</h4>
					</td>
				
					<td class="text-center"><label>
						<p id="deanVdaaPerformanceAppraisalRating">-</p>
						</label>
					</td>
					
					<td class="text-center"><label>
                  .20<?php echo $filterProf; ?>
						</label>
					</td>
					
					<td class="text-center"><label>
						<p id="deanVdaaPerformanceAppraisalTotal">-</p>
						</label>  
					</td>
				
				</tr>
				
				<!--3 Chair/Coordinator-->
				<tr>
				
					<td>
						<h4>2. Chair/Coordinator (20%)</h4>
					</td>
				
					<td class="text-center"><label>
						<p id="chairPerformanceAppraisalRating">-</p>
						</label>
					</td>
					
					<td class="text-center"><label>
                  .20<?php echo $filterProf; ?>
						</label>
					</td>
					
					<td class="text-center"><label>
						<p id="chairPerformanceAppraisalTotal">-</p>
						</label>  
					</td>
				
				</tr>
				
				<!--4 Students Evaluation-->
				<tr>
				
					<td>
						<h4><b>Students Evaluation (20%)</b></h4>
					</td>
				
					<td class="text-center"><label>
						<p id="studentsEvaluationRating">-</p>
						</label>
					</td>
					
					<td class="text-center"><label>
                  .20<?php echo $filterProf; ?>
						</label>
					</td>
					
					<td class="text-center"><label>
						<p id="studentsEvaluationTotal">-</p>
						</label>  
					</td>
				
				</tr>
				
				<!--5 Self Evaluation-->
				<tr>
				
					<td>
						<h4><b>Self Evaluation (5%)</b></h4>
					</td>
				
					<td class="text-center"><label>
						<p id="selfEvaluationRating">-</p>
						</label>
					</td>
					
					<td class="text-center"><label>
                  .05<?php echo $filterProf; ?>
						</label>
					</td>
					
					<td class="text-center"><label>
						<p id="selfEvaluationTotal">-</p>
						</label>  
					</td>
				
				</tr>
						
			</table>
			
		</div>
               
			<br><br><br>
			  
            <h3 class="panel-title rating-text" style="margin-left:400px;">OVER-ALL RATING</h3><h4 class="signature" style="margin-left: 550px; width:200px; margin-top:-20px;"><p style="margin-left: 90px;" id="overallTotal">-</p></h4>

			<br><br>
			
<!--
                <h5 class='department'>Prepared by:</h5>
				<br>
				<h1 class='name'><h4 class="signature" style="margin-left: 0px; width:220px; margin-top:-20px;"><img src="images/signatureOne.png" alt="Smiley face" height="42" width="200" style="display: none;" id="sign"></h4></h1>
	            
				<h5 class='department' style="margin-left: 0px; margin-top:-10px;">Department Chair/Coordinator</h5>
				
				<br>
				
				<h5 class='department' style="margin-left: 0px; margin-top:30px;">Endorsed by:</h5>
				
				<br>
				<h1 class='name'><h4 class="signature" style="margin-left: 0px; width:220px; margin-top:-20px;"><img src="images/signatureTwo.png" alt="Smiley face" height="42" width="200" style="display: none;" id="signTwo"></h4></h1>
	            
				<h5 class='department' style="margin-left: 0px; margin-top:-10px;">Vice Dean for Academic Affairs</h5>
-->
				
				
<!--
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
-->
              </div>
            
              </div>
              </div>
			  
            </div>
			
			</form>
    </div>

    <footer id="footer" style="margin-top: 10px">
      <p class="footer-text">Copyright @ 2018 San Beda College Alabang. All rights reserved.</p>
    </footer>  
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
  
  var valueOfDepartment = "";
  var signatureImg = document.getElementById("sign");
  var signatureImgTwo = document.getElementById("signTwo");
  var signatureImgThree = document.getElementById("signThree");

 // var printBtn = document.getElementById("print");
   var openpdf = document.getElementById("openpdf");

  var getnamedropdown = "";

  function showUser(str)  {


       

        if (str == "") {
           document.getElementById('nameprof').innerHTML = "";
           document.getElementById("txtHint").innerHTML = "";
            document.getElementById("vdaaClassroomObservationRating").innerHTML = "-";
            document.getElementById("vdaaClassroomObservationTotal").innerHTML = "-";

             document.getElementById("chairClassroomObservationRating").innerHTML = "-";
            document.getElementById("chairClassroomObservationTotal").innerHTML = "-";


             document.getElementById("deanVdaaPerformanceAppraisalRating").innerHTML = "-";
            document.getElementById("deanVdaaPerformanceAppraisalTotal").innerHTML = "-";

             document.getElementById("chairPerformanceAppraisalRating").innerHTML = "-";
            document.getElementById("chairPerformanceAppraisalTotal").innerHTML = "-";
            
             document.getElementById("studentsEvaluationRating").innerHTML = "-";
            document.getElementById("studentsEvaluationTotal").innerHTML = "-";

             document.getElementById("selfEvaluationRating").innerHTML = "-";
            document.getElementById("selfEvaluationTotal").innerHTML = "-";

            document.getElementById("overallTotal").innerHTML = "-";
              
           //   printBtn.disabled = true;
          openpdf.disabled = true;
           //   resetSignature();
            
            return;
        } else { 
               
            //  resetSignature();
             //   printBtn.disabled = true;
           openpdf.disabled = true;

            valueOfDepartment = str;

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
            xmlhttp.open("POST","getProf.php?q="+str,true);
            xmlhttp.send();
        }

    }

     function showProf(str)  {


        //var div = document.getElementById("evaluationform");

        if (str == "") {
            //div.style.display = "none";
            document.getElementById('nameprof').innerHTML = "";
             document.getElementById("vdaaClassroomObservationRating").innerHTML = "-";
            document.getElementById("vdaaClassroomObservationTotal").innerHTML = "-";

             document.getElementById("chairClassroomObservationRating").innerHTML = "-";
            document.getElementById("chairClassroomObservationTotal").innerHTML = "-";


             document.getElementById("deanVdaaPerformanceAppraisalRating").innerHTML = "-";
            document.getElementById("deanVdaaPerformanceAppraisalTotal").innerHTML = "-";

             document.getElementById("chairPerformanceAppraisalRating").innerHTML = "-";
            document.getElementById("chairPerformanceAppraisalTotal").innerHTML = "-";
            
             document.getElementById("studentsEvaluationRating").innerHTML = "-";
            document.getElementById("studentsEvaluationTotal").innerHTML = "-";

              document.getElementById("selfEvaluationRating").innerHTML = "-";
            document.getElementById("selfEvaluationTotal").innerHTML = "-";

              document.getElementById("overallTotal").innerHTML = "-";

            

            //  printBtn.disabled = true;
             openpdf.disabled = true;

            return;
        } else { 
            document.getElementById('nameprof').innerHTML = "Professor: " + str;

            document.getElementById("inviData").innerHTML = "";
            getnamedropdown = str;
             if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("inviData").innerHTML = this.responseText;
                    document.getElementById("studentsEvaluationRating").innerHTML = parseFloat(document.getElementById("studentTotal").innerHTML).toFixed(2);
                    document.getElementById("selfEvaluationRating").innerHTML = parseFloat(document.getElementById("selfTotal").innerHTML).toFixed(2);
                    document.getElementById("deanVdaaPerformanceAppraisalRating").innerHTML = parseFloat(document.getElementById("deanvicedeanPa").innerHTML).toFixed(2);
                    document.getElementById("vdaaClassroomObservationRating").innerHTML = parseFloat(document.getElementById("deanvicedeanCo").innerHTML).toFixed(2);
                    document.getElementById("chairClassroomObservationRating").innerHTML = parseFloat(document.getElementById("chairpersonCo").innerHTML).toFixed(2);
                    document.getElementById("chairPerformanceAppraisalRating").innerHTML = parseFloat(document.getElementById("chairpersonPa").innerHTML).toFixed(2);

                    //computation for Classroom Observation total dean/vdaa
                     var totalCo = parseFloat(document.getElementById("deanvicedeanCo").innerHTML) * 0.05;
                     document.getElementById("vdaaClassroomObservationTotal").innerHTML = (totalCo.toFixed(2)).toString();
                     //end

                     //computation for Classroom Observation total chairperson
                      var totalCoChair = parseFloat(document.getElementById("chairpersonCo").innerHTML) * 0.30;
                     document.getElementById("chairClassroomObservationTotal").innerHTML = (totalCoChair.toFixed(2)).toString();
                     //end

                     //
                     var totalPa = parseFloat(document.getElementById("deanvicedeanPa").innerHTML) * 0.20;
                     document.getElementById("deanVdaaPerformanceAppraisalTotal").innerHTML = (totalPa.toFixed(2)).toString();
                     //

                     //
                     var totalPaChair = parseFloat(document.getElementById("chairpersonPa").innerHTML) * 0.20;
                     document.getElementById("chairPerformanceAppraisalTotal").innerHTML = (totalPaChair.toFixed(2)).toString();
                     //

                     //
                     var totalStudents = parseFloat(document.getElementById("studentTotal").innerHTML) * 0.20;
                     document.getElementById("studentsEvaluationTotal").innerHTML = (totalStudents.toFixed(2)).toString();
                     //
                     
                     //
                      var totalSelf = parseFloat(document.getElementById("selfTotal").innerHTML) * 0.05;
                      document.getElementById("selfEvaluationTotal").innerHTML = (totalSelf.toFixed(2)).toString();
                      //

                       var overallTotal = totalCo + totalCoChair + totalPa + totalPaChair + totalStudents + totalSelf;
                        document.getElementById("overallTotal").innerHTML = (overallTotal.toFixed(2)).toString();

                    resetSignature();
                     openpdf.disabled = false;
                      //printBtn.disabled = true;
                    
                }
            };
            xmlhttp.open("POST","getProfEvalSummary.php?q="+str,true);
            xmlhttp.send();

         

        }

    }



    function testPdf(){
 
    //send the div to PDF
    html2canvas($("#printablearea"), { // DIV ID HERE
        onrendered: function(canvas) {

          
          var width = canvas.width;
                var height = canvas.height;
                var millimeters = {};
                millimeters.width = Math.floor(width * 0.264583);
                millimeters.height = Math.floor(height * 0.264583);

                var imgData = canvas.toDataURL(
                    'image/png');
                var doc = new jsPDF("p", "mm", "a4");
                doc.deletePage(1);
                doc.addPage(millimeters.width, millimeters.height);
                doc.addImage(imgData, 'PNG', 0, 0);
                doc.save(getnamedropdown + '.EvaluationSummary.pdf');

               //  resetSignature();
               //  signatureBtn.disabled = true;
               //  printBtn.disabled = true;
                 showUser("");
                 document.getElementById("myForm").reset();

            }
         });

      }

function signDoc(){
  

   signatureImg.style.display = "block";
   signatureImgTwo.style.display = "block";
   signatureImgThree.style.display = "block";

    printBtn.disabled = false;
   // signatureBtn.disabled = true;
}

function resetSignature(){

  signatureImg.style.display = "none";
   signatureImgTwo.style.display = "none";
   signatureImgThree.style.display = "none";

}

 function printpdf()  {

 name = getnamedropdown;
 var win = window.open("pdf/pdf.php?varr=" + name, '_blank');
  win.focus();

 //window.location="pdf/pdf.php?varr=" + name;

        }

  

</script>


	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>







	</body>
</html>