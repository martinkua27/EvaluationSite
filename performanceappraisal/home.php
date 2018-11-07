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
        <div class="container" style="margin-top:300px;">
            <div class="row">
                <a href="#demo" class="btn btn-info" data-toggle="collapse">Simple collapsible</a>
                <div id="demo" class="collapse">
                    <div class="col-md-3" style="color:white;">
                        kkkk
                    </div>
                    <div class="col-md-9" style="color:white;">
                        kkk
                    </div>
                </div>

            </div>
        </div>
        
         
      
    <footer id="footer">
      <p class="footer-b">Copyright @ 2018 San Beda College Alabang. All rights reserved.</p>
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