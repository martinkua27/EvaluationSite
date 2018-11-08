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

    <title>Reports | San Beda College Alabang</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/homeperformance.css" rel="stylesheet">
	
	<style>
	/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}
.custom-select select {
  display: none; /*hide original SELECT element:*/
}
.select-selected {
  background-color: #9f0000;
}
/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}
/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}
/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}
/*style items (options):*/
.select-items {
  position: absolute;
  background-color: #9f0000;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}
/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}
.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>
   
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
                    
                         <span>Filter by:</span>

                    <select onchange="profdropdown(this.value)" class="custom-select" style="width:200px;">
                      <option value="">Choose</option>
                      <option value="0">Evaluator</option>
                      <option value="1">Position</option>
                      <option value="2">Employee Name</option>
                      <option value="6">Semester</option>
                      <option value="7">Academic Year</option>
                    </select>

                   <input class="form-control" type="text" id="searchprof" placeholder="Filter Reports..." style="display: none;" onkeyup="profFilter()">

                  </div>
                </div>
                <br>
                <div class="table-responsive"> 
                <table class="table table-striped table-hover" id="profreport">
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

                     <span>Filter by:</span>

                    <select onchange="studentsdropdown(this.value)" class="custom-select" style="width:200px;">
                      <option value="">Choose</option>
                      <option value="0">Subject Code</option>
                      <option value="1">Employee Code</option>
                      <option value="2">Employee Name</option>
                      <option value="9">Section</option>
                      <option value="11">Semester</option>
                      <option value="12">Academic Year</option>
                    </select>

                     <input class="form-control" type="text" id="searchstudents" placeholder="Filter Reports..." style="display: none;" onkeyup="studentsFilter()">
	

                   
                  </div>
                </div>
                <br>
                <div class="table-responsive"> 
                <table class="table table-striped table-hover" id="studentsreport">
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
                  

                    <span>Filter by:</span>

                    <select onchange="observationdropdown(this.value)" class="custom-select" style="width:200px;">
                      <option value="">Choose</option>
                      <option value="0">Evaluator</option>
                      <option value="1">Position</option>
                      <option value="2">Employee Name</option>
                      <option value="7">Subject Code</option>
                      <option value="8">Subject</option>
                      <option value="9">Semester</option>
                      <option value="10">Academic Year</option>
                    </select>

                   <input class="form-control" type="text" id="searchobservation" placeholder="Filter Reports..." style="display: none;" onkeyup="observationFilter()">

                  </div>
                </div>
                <br>
                <div class="table-responsive"> 
                <table class="table table-striped table-hover" id="observationreport">
                    <thead class="thead-dark">                            
                       <tr>
                         <td>Evaluator</td>
                         <td>Postion</td>
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
                         <td data-label="Position"><?php echo $row['position']?></td>
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
	
	<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 0; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

    <script>

      var getvaluestudent = "0";
      var getvaluesobservation = "0";
      var getvaluesprof = "0";
  

       var x = document.getElementById("searchstudents");
       var xx = document.getElementById("searchobservation");
       var xxx = document.getElementById("searchprof");


  function studentsdropdown(str)  {



       if (str == "") {
        x.value = "";
         studentsFilter();
          x.style.display = "none";
            return;

        } else { 
        x.style.display = "block";
         getvaluestudent = str;
        }

    }

    function observationdropdown(str)  {



       if (str == "") {
        xx.value = "";
         observationFilter();
          xx.style.display = "none";
            return;

        } else { 
        xx.style.display = "block";
         getvaluesobservation = str;
        }

    }

    function profdropdown(str)  {



       if (str == "") {
        xxx.value = "";
         profFilter();
          xxx.style.display = "none";
            return;

        } else { 
        xxx.style.display = "block";
         getvaluesprof = str;
        }

    }


function studentsFilter() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchstudents");
  filter = input.value.toUpperCase();
  table = document.getElementById("studentsreport");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[getvaluestudent];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function observationFilter() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchobservation");
  filter = input.value.toUpperCase();
  table = document.getElementById("observationreport");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[getvaluesobservation];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function profFilter() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchprof");
  filter = input.value.toUpperCase();
  table = document.getElementById("profreport");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[getvaluesprof];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>