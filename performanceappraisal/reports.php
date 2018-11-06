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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.ico">

    <title>Home | San Beda College Alabang</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/homeperformance.css" rel="stylesheet">
   
  </head>

  <body style="background-color: #212121;">

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
    
      
		<br><br><br><br>
   
      <div class="col-md-12" style="padding-left: 80px;padding-right: 80px;padding-top:30px;">
            <!-- Website Overview-->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Professor's Reports</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <input class="form-control" type="text" id="search" placeholder="Filter Reports...">
                  </div>
                </div>
                <br>
                <div class="table-responsive"> 
                <table class="table table-striped table-hover" id="usersTbl">
                    <thead class="thead-dark">                            
                       <tr>
                         <td>Evaluator</td>
                         <td>Position</td>
                         <td>Employee Evaluated</td>
                         <td>A Average</td>
                         <td>B Average</td>
                         <td>C Average</td>
                         <td>Semester</td>
                         <td>Academic Year</td>
                         <td>Comments</td>
                         <td>Date Posted</td>
                       </tr>
                    </thead>                            
                
                
                    <?php
                       include("../indexDB.php");
                      $conn = new mysqli($servername, $username, $password, $dbname);
                       $sql = "SELECT * FROM evaluation_average_per_prof";
                       $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                       while($row = $result->fetch_assoc()) {
                    ?>
                     <tr>
                         <td data-label="Evaluator"><?php echo $row['evaluator']?></td>
                         <td data-label="Position"><?php echo $row['position']?></td>
                         <td data-label="Employee Evaluated"><?php echo $row['emp_name_evaluated']?></td>
                         <td data-label="A Average"><?php echo $row['a_average']?></td>
                         <td data-label="B Average"><?php echo $row['b_average']?></td>
                         <td data-label="C Average"><?php echo $row['c_average']?></td>
                         <td data-label="Comments"><?php echo $row['semester']?></td>
                         <td data-label="Comments"><?php echo $row['academic_year']?></td>
                         <td data-label="Comments"><?php echo $row['comments']?></td>
                         <td data-label="Date Posted"><?php echo $row['date_posted']?></td>
                    
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
    </section>

    <!-- Modals -->
    
    <!-- Add Page -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="myform" name="myform" method="post">
          <div class="modal-header">
            <button type="button" class="close" onclick="clearText()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add User</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" form="myform" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="Password" id="password" class="form-control" placeholder="Password" form="myform" required="">
                <input type="checkbox" onclick="showPass()">Show Password
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" id="emp_fname" class="form-control" placeholder="First Name" form="myform" required>
            </div>
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" id="emp_mname" class="form-control" placeholder="Middle Name" form="myform" >
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" id="emp_lname" class="form-control" placeholder="Last Name" form="myform" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" id="address" class="form-control" placeholder="Address" form="myform" required>
            </div>
             <div class="form-group">
              <label>Cellphone</label>
              <input type="number" id="cp" name="cp" class="form-control" placeholder="Cellphone" required>
            </div>
             <div class="form-group">
              <label>Telephone</label>
              <input type="number" id="tel" name="tel" class="form-control" placeholder="Telephone">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" class="form-control" placeholder="Email"  form="myform" required>
            </div>
            

            <div class="form-group">
               <label>Employee Type</label><br>
                <select id="emp_type" name="emp_type" class="dropdown" form="myform" required>
                    <option value="" disabled selected hidden>Select Type</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
                <label>Gender</label><br>
                <select id="gender" name="gender" class="dropdown" form="myform" required>
                    <option value="" disabled selected hidden>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <label>Status</label><br>
                <select id="status" name="status" class="dropdown" form="myform" required>
                    <option value="" disabled selected hidden>Select Gender</option>
                    <option value="Active">Active</option>
                    <option value="In-Active">In-Active</option>
                </select>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" onclick="clearText()" id="closeBtn" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" value="Save" id="saveBtn" name="action" style=" float: right; margin-right: 5px;">Save changes</button>
              <button type="button" class="btn btn-danger" id="delBtn" onclick="clickDel()" style=" float: right;">Delete</button>

             
            <button type="button" onclick="clickNo();" class="btn btn-primary"  id="noBtn" style="display: none; float: right; margin-right: 5px;">No</button>
             <button type="submit" class="btn btn-danger" value="Delete"  id="yesBtn" name="action"  style="display: none; float: right; margin-right: 5px;">Yes</button>
             <p id="confirmationTag" style="margin-right: 5px; display: none; float: right;">Are you sure?</p>
          </div>
          </form>
        </div>
      </div>
    </div>
	

	
	<br><br><br><br>
   
      <div class="col-md-12" style="padding-left: 80px;padding-right: 80px;padding-top:30px;">
            <!-- Website Overview-->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Student's Reports</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <input class="form-control" type="text" id="search" placeholder="Filter Reports...">
                  </div>
                </div>
                <br>
                <div class="table-responsive"> 
                <table class="table table-striped table-hover" id="usersTbl">
                    <thead class="thead-dark">                            
                       <tr>
                         <td>Subject Code</td>
                         <td>Employee Code</td>
                         <td>Employee Name</td>
                         <td>A Average</td>
                         <td>B Average</td>
                         <td>C Average</td>
                         <td>D Average</td>
                         <td>E Average</td>
                         <td>Comments</td>
                         <td>Section</td>
                         <td>Student ID</td>
                         <td>Semester</td>
                         <td>Academic Year</td>
                         <td>Date Posted</td>
                       </tr>
                    </thead>                            
                
                
                    <?php
                       include("../indexDB.php");
                      $conn = new mysqli($servername, $username, $password, $dbname);
                       $sql = "SELECT * FROM evaluation_average_per_stduents";
                       $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                       while($row = $result->fetch_assoc()) {
                    ?>
                     <tr>
                         <td data-label="Subject Code"><?php echo $row['subject_code']?></td>
                         <td data-label="Employee Code"><?php echo $row['emp_code']?></td>
                         <td data-label="Employee Name"><?php echo $row['emp_name']?></td>
                         <td data-label="a_average"><?php echo $row['a_average']?></td>
                         <td data-label="b_average"><?php echo $row['b_average']?></td>
                         <td data-label="c_average"><?php echo $row['c_average']?></td>
                         <td data-label="d_average"><?php echo $row['d_average']?></td>
                         <td data-label="e_average"><?php echo $row['e_average']?></td>
                         <td data-label="Comments"><?php echo $row['comments']?></td>
                         <td data-label="Section"><?php echo $row['section']?></td>
                         <td data-label="Student ID"><?php echo $row['student_id']?></td>
                         <td data-label="Semester"><?php echo $row['semester']?></td>
                         <td data-label="Academic Year"><?php echo $row['academic_year']?></td>
                         <td data-label="Date Posted"><?php echo $row['date_posted']?></td>
                    
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

  <br><br><br><br>
   
      <div class="col-md-12" style="padding-left: 80px;padding-right: 80px;padding-top:30px;">
            <!-- Website Overview-->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Classroom Observation Reports</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <input class="form-control" type="text" id="search" placeholder="Filter Reports...">
                  </div>
                </div>
                <br>
                <div class="table-responsive"> 
                <table class="table table-striped table-hover" id="usersTbl">
                    <thead class="thead-dark">                            
                       <tr>
                         <td>Evaluator</td>
                         <td>Employee Evaluated</td>
                         <td>A Average</td>
                         <td>B Average</td>
                         <td>C Average</td>
                         <td>D Average</td>
                         <td>Subject Code</td>
                         <td>Subject</td>
                         <td>Semester</td>
                         <td>Academic Year</td>
                         <td>Date Posted</td>
                       </tr>
                    </thead>                            
                
                
                    <?php
                       include("../indexDB.php");
                      $conn = new mysqli($servername, $username, $password, $dbname);
                       $sql = "SELECT * FROM observation_sheet_per_prof";
                       $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                       while($row = $result->fetch_assoc()) {
                    ?>
                     <tr>
                         <td data-label="Evaluator"><?php echo $row['evaluator']?></td>
                         <td data-label="Employee Evaluated"><?php echo $row['emp_name_evaluated']?></td>
                         <td data-label="A Average"><?php echo $row['a_average']?></td>
                         <td data-label="B Average"><?php echo $row['b_average']?></td>
                         <td data-label="C Average"><?php echo $row['c_average']?></td>
                         <td data-label="D Average"><?php echo $row['d_average']?></td>
                         <td data-label="Subject Code"><?php echo $row['subject_code']?></td>
                         <td data-label="Subject"><?php echo $row['subject_name']?></td>
                         <td data-label="Semester"><?php echo $row['semester']?></td>
                         <td data-label="Academic Year"><?php echo $row['academic_year']?></td>
                         <td data-label="Date Posted"><?php echo $row['date_posted']?></td>
                    
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

    </section>

    <!-- Modals -->
    
    <!-- Add Page -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="myform" name="myform" method="post">
          <div class="modal-header">
            <button type="button" class="close" onclick="clearText()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add User</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" form="myform" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="Password" id="password" class="form-control" placeholder="Password" form="myform" required="">
                <input type="checkbox" onclick="showPass()">Show Password
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" id="emp_fname" class="form-control" placeholder="First Name" form="myform" required>
            </div>
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" id="emp_mname" class="form-control" placeholder="Middle Name" form="myform" >
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" id="emp_lname" class="form-control" placeholder="Last Name" form="myform" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" id="address" class="form-control" placeholder="Address" form="myform" required>
            </div>
             <div class="form-group">
              <label>Cellphone</label>
              <input type="number" id="cp" name="cp" class="form-control" placeholder="Cellphone" required>
            </div>
             <div class="form-group">
              <label>Telephone</label>
              <input type="number" id="tel" name="tel" class="form-control" placeholder="Telephone">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" class="form-control" placeholder="Email"  form="myform" required>
            </div>
            

            <div class="form-group">
               <label>Employee Type</label><br>
                <select id="emp_type" name="emp_type" class="dropdown" form="myform" required>
                    <option value="" disabled selected hidden>Select Type</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
                <label>Gender</label><br>
                <select id="gender" name="gender" class="dropdown" form="myform" required>
                    <option value="" disabled selected hidden>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <label>Status</label><br>
                <select id="status" name="status" class="dropdown" form="myform" required>
                    <option value="" disabled selected hidden>Select Gender</option>
                    <option value="Active">Active</option>
                    <option value="In-Active">In-Active</option>
                </select>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" onclick="clearText()" id="closeBtn" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" value="Save" id="saveBtn" name="action" style=" float: right; margin-right: 5px;">Save changes</button>
              <button type="button" class="btn btn-danger" id="delBtn" onclick="clickDel()" style=" float: right;">Delete</button>

             
            <button type="button" onclick="clickNo();" class="btn btn-primary"  id="noBtn" style="display: none; float: right; margin-right: 5px;">No</button>
             <button type="submit" class="btn btn-danger" value="Delete"  id="yesBtn" name="action"  style="display: none; float: right; margin-right: 5px;">Yes</button>
             <p id="confirmationTag" style="margin-right: 5px; display: none; float: right;">Are you sure?</p>
          </div>
          </form>
        </div>
      </div>
    </div>


	
    <footer id="footer" style="margin-top: 809px">
      <p class="footer-texta">Copyright @ 2018 San Beda College Alabang. All rights reserved.</p>
    </footer>  
	
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>