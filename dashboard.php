<?php


function getStudentName(){

  include("includes/indexDB.php");
 include('includes/session.php');

  $name = "";
  $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM student_list where student_id = '". $_SESSION['login_user'] ."'" ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

        $name = $row['student_name'];

      }
        
  }
  return $name;
}

function countUsers(){

 include("indexDB.php");

 
     $count = "";
     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "SELECT COUNT(emp_id) as 'total' FROM users_information where emp_type = 'User'" ;
     $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {

        $count = $row['total'];

      }
        
  }
  return $count;
}
 //admin


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
    <link rel="icon" href="images/favicon.ico">


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">


     <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="js/morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <script src="js/example.js"></script>
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
  <link rel="stylesheet" href="css/morris.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Student Dashboard</title>

   

  </head>



  <body background="images/redpattern.jpg" style="background-color: #9f0000;">

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <div class="sidebar-brand">
                    <a href="#"><img src="images/bedalogo.png" class="img-responsive center-block"></a>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="images/man.png" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong><?php echo getStudentName(); ?></strong>
                        </span>
                        <span class="user-role">Student</span>
                        
                    </div>
                </div>
               
                <li class=""><a href="#" onclick="changePass()" data-target="#addPage"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Change Password</a></li>
                <li class="active"><a href="studentsevaluation.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Evaluation</a></li>
                <li class="active"><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Summary</a></li>
               
            </ul>
        </div>
         
        <!-- Page Content -->
        <div id="page-content-wrapper">
          <header id="header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-8">
                      <!--when clicked, it will change layout-->
                      <span><a href="#" class="btn btn-danger glyphicon glyphicon-tasks" id="menu-toggle"></a></span>
                    <h1 class="dashboard-text">Student <small>Dashboard</small></h1>
                  </div>    
                  <div class="col-md-3 admin-text">
                    <h4>Welcome, <?php echo $_SESSION['login_user']; ?>!</h4>
                  </div>
                  <div class="col-md-1 logout-text">
                    <h4><a href="logout.php">Logout</a></h4>
                  </div>
                </div>
              </div>
          </header>
        
          <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                  <h3 class="panel-title"><b>Overview</b></h3>
              </div>
              <div class="panel-body">
                <div class="col-md-3">
                  <div class="well dash-box bg-color">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php  ?></h2>
                    <h4>Total Subjects Enrolled</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box bg-color1">
                    <h2><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> <?php  ?></h2>
                    <h4>Total Evaluations Submitted</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box bg-color2">
                    <h2><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> <?php  ?></h2>
                    <h4>Number of Subjects to Evaluate</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box bg-color3">
                    <h2><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> <?php  ?> </h2>
                    <h4>Evaluation Status</h4>
                  </div>
                </div>
              </div>
            </div>
          <input type="text"  name="pass" id="pass" style="display: none; font-size: 50px; position: absolute; margin-top: 1110px;"  value="<?php include('session.php'); echo $_SESSION['login_pass'];?>"  form="myform" >
            <!-- Latest Users -->
            <div class="col-md-6">
            <div class="panel panel-default latest-users">
              <div class="panel-heading main-color-bg">
                  <h3 class="panel-title"><b>Registered Users</b></h3>
              </div>
              <div class="panel-body">
                 <!-- Table -->
                      <div class="table-responsive">
                      <table class="table table-striped table-hover" id="usersTbl">
                        <thead class="thead-dark">                    
                           <tr>
                             <td scope="col">Employee ID</td>
                             <td scope="col">Name</td>
                             <td scope="col">Email</td>
                           </tr>
                        </thead>                        
                                                
                                                
                           <?php
                              include("indexDB.php");
                              $conn = new mysqli($servername, $username, $password, $dbname);
                              $sql = "SELECT * FROM users where emp_type = 'User'" ;
                             $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                               // output data of each row
                               while($row = $result->fetch_assoc()) {
                           ?>
                            <tr>
                                <td data-label="Employee ID"><?php echo $row['emp_id']?></td>
                                <td data-label="Name"><?php echo $row['emp_name']." ".$row['emp_lname']?></td>
                                <td data-label="Email"><?php echo $row['email']?></td>
                           
                            </tr>
                           <?php
                               }
                              }
                           ?>
            
                                                
                                            
                </table>
                  </div>
                  </div>   
                    <nav>
                      <ul class="pager">
                          <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
                          <li class="next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
                      </ul>
                    </nav>   
              </div>
              
         
           </div>

           <!-- PROGRESS BAR -->
            <div class="col-md-6">
            <div class="panel panel-default sales">
              <div class="panel-heading main-color-bg">
                  <h3 class="panel-title"><b>Users Progress</b></h3>
              </div>
              <div class="panel-body">
                 <!-- Table -->
                      <div class="table-responsive">
                      <table class="table table-striped table-hover" id="progressTbl">
                         <thead class="thead-dark">      
                     
                         <tr>                                                    
                           <td>Name</td>                                          
                           <td style="text-align:center;">Progress</td>
                         </tr>
                         </thead>
                     
                     
                         <?php
                           
                              include("indexDB.php");
                              $conn = new mysqli($servername, $username, $password, $dbname);
                              $sql = "SELECT * FROM progress_table" ;
                             $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                               // output data of each row
                               while($row = $result->fetch_assoc()) {
                          
                         ?>
                          <tr>                                                     
                              <td style="width:20%"><?php echo $row['emp_id']; ?></td>
                          
      
                               <td style="width:<?php echo  $row['progress']; ?>;">                        <div class="w3-light-grey">
  <div class="w3-container w3-green w3-center" style="width:<?php echo  $row['progress']; ?>px;"> <?php echo  $row['progress']; ?>%</div>
</div></td>

                          </tr>
                           <?php
                               }
                              }
                           ?>
                                    
                                            
                      </table>
                  </div>
              </div> 
               <nav>
                      <ul class="pager">
                          <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
                          <li class="next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
                      </ul>
                </nav>     
            </div>
            </div>            
           

    </div>
        
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      //Menu Toggle script
      $("#menu-toggle").click( function (e) {
          <!--prevent clicking action of event-->
          e.preventDefault();
          $("#wrapper").toggleClass("menuDisplayed");
      });
        
      //Chart sample
      new Morris.Area({
      // ID of the element in which to draw the chart.
      element: 'myfirstchart',
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.
      data: [
        { year: '2008', value: 20 },
        { year: '2009', value: 10 },
        { year: '2010', value: 5 },
        { year: '2011', value: 5 },
        { year: '2012', value: 20 }
      ],
      // The name of the data record attribute that contains x-values.
      xkey: 'year',
      // A list of names of data record attributes that contain y-values.
      ykeys: ['value'],
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      labels: ['Value']
    });
    </script>
     <script>
      $(function() {
      $('#usersTbl').each(function() {
          var $table = $(this);
          var $nextPage = $('.pager .next');
          var $previousPage = $('.pager .previous');

          var currentPage = 0;
          var numPerPage  = 5;

          var numRows  = 0;
          var numPages = 0;

          $table.bind('repaginate', function() {
              numRows  = $table.find('tbody tr').length;
              numPages = Math.ceil(numRows / numPerPage);

              $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

              if (currentPage == 0) {
                  $previousPage.addClass('disabled');
              } else {
                  $previousPage.removeClass('disabled');
              }

              if (currentPage == numPages-1) {
                  $nextPage.addClass('disabled');
              } else {
                  $nextPage.removeClass('disabled');
              }
          });

          $table.trigger('repaginate');

          $previousPage.bind('click', function(event) {
              if (currentPage != 0) {
                  currentPage--;
                  $table.trigger('repaginate');
              }
          });

          $nextPage.bind('click', function(event) {
              if (currentPage != numPages-1) {
                  currentPage++;
                  $table.trigger('repaginate');
              }
          });
      });
    });
    </script>
    <script>
      $(function() {
      $('#progressTbl').each(function() {
          var $table = $(this);
          var $nextPage = $('.pager .next');
          var $previousPage = $('.pager .previous');

          var currentPage = 0;
          var numPerPage  = 5;

          var numRows  = 0;
          var numPages = 0;

          $table.bind('repaginate', function() {
              numRows  = $table.find('tbody tr').length;
              numPages = Math.ceil(numRows / numPerPage);

              $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

              if (currentPage == 0) {
                  $previousPage.addClass('disabled');
              } else {
                  $previousPage.removeClass('disabled');
              }

              if (currentPage == numPages-1) {
                  $nextPage.addClass('disabled');
              } else {
                  $nextPage.removeClass('disabled');
              }
          });

          $table.trigger('repaginate');

          $previousPage.bind('click', function(event) {
              if (currentPage != 0) {
                  currentPage--;
                  $table.trigger('repaginate');
              }
          });

          $nextPage.bind('click', function(event) {
              if (currentPage != numPages-1) {
                  currentPage++;
                  $table.trigger('repaginate');
              }
          });
      });
    });
    </script>
   
     <script type="text/javascript">
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
      confirmButtonText: 'Successful'
      })
 }
  else if(values[1] != values[2]){
     swal({
      title: 'Error',
      html:
       'New Password does not match',
      confirmButtonText: 'Continue'
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
            xmlhttp.open("POST","changepassStudent.php?q=" + values[1],true);
            xmlhttp.send();


      
      }

function myFunction() {
    document.getElementById("pass").value = values[1];
}
    
  }


})
      }
     </script>
    

  </body>
</html>