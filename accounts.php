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

    <title>Accounts | San Beda College Alabang</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 	<link href="css/upload.css" rel="stylesheet">

   <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>

    <style type="text/css">
      .hidetext { -webkit-text-security: circle; }
    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/resetPass.js"></script>
    <script src="js/resetPassStudent.js"></script>

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
           <li><a href="upload.php">Upload</a></li>
		   <li><a href="accounts.php">Accounts</a></li>
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

	<br><br><br>
	
      <div class="container">
	  
	  <h1 style="color:#fff">Accounts</h1>
	  
        <div class="row">
    
          <div class="col-md-6">
            <!-- Website Overview-->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg" style="background-color:#9f0000; color:#fff">
                <h3 class="panel-title">Employees</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <input class="form-control" type="text" id="search" placeholder="Filter Employees...">

                    <button type="button" data-toggle="modal" id="addUserBtn" data-toggle="modal" data-target=".showEmployee" style="display: none;">Users</button> 
                  </div>
                </div>
                <br>
                <div class="table-responsive"> 
                <table class="table table-striped table-hover" id="empTbl">
                  <thead class="thead-dark">                            
                       <tr>
                         <td>Username</td>
                         <td>Password</td>
                       </tr>
                    </thead>                            
                
                    <?php
                       include("indexDB.php");
                      $conn = new mysqli($servername, $username, $password, $dbname);
                       $sql = "SELECT * FROM login_table where emp_type != 'Admin - MIS' and emp_id != emp_pass group by emp_id";
                       $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                       while($row = $result->fetch_assoc()) {
                    ?>
          
                     <tr>
                  <td data-label="id"><?php echo $row['emp_id']?></td>
                  <td data-label="pass" class="hidetext"><?php echo $row['emp_pass']?></td>
                    
                     </tr>
                  <?php
                        }
                       }
                    ?>
            
                                                
                                            
                </table>
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
		  
		  <div class="col-md-6">
            <!-- Website Overview-->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg" style="background-color:#9f0000; color:#fff">
                <h3 class="panel-title">Students</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <input class="form-control" type="text" id="search" placeholder="Filter Students...">

                      <button type="button" data-toggle="modal" id="studentBtn" data-toggle="modal" data-target=".showStudent" style="display: none;">Users</button> 
                  </div>
                </div>
                <br>
                <div class="table-responsive"> 
                <table class="table table-striped table-hover" id="studentTbl">
                  <thead class="thead-dark">                            
                       <tr>
                         <td>Username</td>
                         <td>Password</td>
                       </tr>
                    </thead>                            
                
                    <?php
                       include("indexDB.php");
                      $conn = new mysqli($servername, $username, $password, $dbname);
                       $sql = "SELECT * FROM student_list where student_id != student_pass group by student_id";
                       $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                       while($row = $result->fetch_assoc()) {
                    ?>
          
                     <tr>
                  <td data-label="id"><?php echo $row['student_id']?></td>
                  <td data-label="pass" class="hidetext"><?php echo $row['student_pass']?></td>
                    
                     </tr>
                  <?php
                        }
                       }
                    ?>
            
                                                
                                            
                </table>
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
        </div>
      </div>

    <!-- Modals -->
    
    <!-- 1 Employees -->

<div class="modal fade showEmployee" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
          <form id="myformOne" name="myformOne" method="post" onsubmit="return false">
          <div class="modal-header">
            <button type="button" class="close" onclick="clearText()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Employee</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label id="empnumLbl">Do you want to reset the password?</label>
                 <input type="text" id="emp" style="display: none;" class="form-control" form="myformOne" required>
            </div>
			
           <!--<div class="form-group">
                <label>Type New Password</label>
                <input type="text" id="password" class="form-control" placeholder="Password" form="myform" required>
            </div>-->
			
          </div>
          <div class="modal-footer">
            <button type="submit" name="action" id="confirmBtn" class="btn btn-warning" data-dismiss="modal" onClick = "location.reload();">Yes</button>
              <button type="button" class="btn btn-danger" id="closeBtn" data-dismiss="modal" style=" float: right;">No</button>

          </div>
          </form>
        </div>
  </div>
</div>
	
	<!-- 2 Students -->
    <div class="modal fade showStudent" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content"> <form id="myformTwo" name="myformOne" method="post" onsubmit="return false"> 
          <div class="modal-header">
            <button type="button" class="close" onclick="clearText()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Student</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
               <label id="studentNumLbl">Do you want to reset the password?</label>
                 
            </div>
           
		   <!--<div class="form-group">
                <label>Type New Password</label>
                <input type="text" id="password" class="form-control" placeholder="Password" form="myform" required>
            </div>-->
			
          </div>
          <div class="modal-footer">
            <button type="submit" name="action" id="confirmBtnStudent" class="btn btn-warning" data-dismiss="modal">Yes</button>
              <button type="button" class="btn btn-danger" id="closeBtn" data-dismiss="modal" style=" float: right;">No</button>

          </div>
          </form>
        </div>
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

<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
    </script>
	
	<script>
      $(function() {
      $('#userstbl').each(function() {
          var $table = $(this);
          var $nextPage = $('.pager .next');
          var $previousPage = $('.pager .previous');

          var currentPage = 0;
          var numPerPage  = 10;

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
      

    
                var table = document.getElementById('empTbl');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                  document.getElementById('empnumLbl').innerHTML = 'Do you want to reset the password for employee number' + ' "'+this.cells[0].innerHTML+'"';
                  
      document.getElementById('emp').value = this.cells[0].innerHTML;

                          var addUsers = document.getElementById('addUserBtn');
                          addUsers.click();
                        

                        

                    };
                }
</script>

 <script type="text/javascript">
      

    
                var table = document.getElementById('studentTbl');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                  document.getElementById('studentNumLbl').innerHTML = 'Do you want to reset the password for username' + ' "'+this.cells[0].innerHTML+'"';
                  
      document.getElementById('emp').value = this.cells[0].innerHTML;

                          var addUsers = document.getElementById('studentBtn');
                          addUsers.click();
                        

                        

                    };
                }
</script>
    
</html>