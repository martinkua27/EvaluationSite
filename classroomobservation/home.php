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
          </ul>
             <ul class="nav navbar-nav navbar-right">
             <li><a href="#" class="welcome-text">Welcome, Dean!</a></li>
             <li class="dropdown create">
                  <button id="dropdownMenu1" style="background-color: #9f0000;border-style: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img src="images/001.png" class="img-rounded img-responsive" style="width:26px; display:inline-block; margin-top: 5px;">         
                  <span class="caret" style="color:#fff;"></span></button>
                       
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Settings</a></li>
                <li><a href="#">Log Out</a></li>
              </ul>
          </ul>
        </div>
      </div>
    </nav>
    
      
     
   
      <div class="container" style="margin-top:180px;">
         <div class="row">
              <a href="#">
              <div class="col-xs-6 col-md-3">
                <div class="jumbotron" style="background-color: #4E887F;">
                    <div class="container">
                       <a data-toggle="modal" data-target="#accounting" style="text-decoration: none;color: #fff;text-align: center;"> 
                        <img src="images/accounting.png" class="center-block img-responsive">
                        <hr>
                        <h3>Accounting</h3>
                       </a>
                    </div>
                
                </div>
              </div> 
              </a>
               <div class="col-xs-6 col-md-3">
                <div class="jumbotron" style="background-color: #4C7FB0;">
                    <div class="container">
                        <a href="#" style="text-decoration: none;color: #fff;text-align: center;"> 
                          <img src="images/software.png" class="center-block img-responsive">
                          <hr>
                           <h3>IT</h3>
                        </a>
                    </div>
                
                </div>
              </div>  
              <div class="col-xs-6 col-md-3">
                <div class="jumbotron" style="background-color: #B87B4E;">
                    <div class="container">
                        <a href="#" style="text-decoration: none;color: #fff;text-align: center;"> 
                          <img src="images/planet-earth.png" class="center-block img-responsive">
                          <hr>
                           <h3>IS</h3>
                        </a>
                    </div>
                
                </div>
              </div>  
              <div class="col-xs-6 col-md-3">
                <div class="jumbotron" style="background-color: #78506F;">
                    <div class="container">
                        <a href="#" style="text-decoration: none;color: #fff;text-align: center;"> 
                          <img src="images/brain.png" class="center-block img-responsive">
                          <hr>
                           <h3>Psychology</h3>
                        </a>
                    </div>
                
                </div>
              </div>  
              <div class="col-xs-6 col-md-3">
                <div class="jumbotron">
                    <div class="container">
                        <a href="#">

                        </a>
                    </div>
                
                </div>
              </div>  
             <div class="col-xs-6 col-md-3">
                <div class="jumbotron">
                    <div class="container">
                        <a href="#">
                        </a>
                    </div>
                
                </div>
              </div>  
             <div class="col-xs-6 col-md-3">
                <div class="jumbotron">
                    <div class="container">
                        <a href="#">
                        </a>
                    </div>
                
                </div>
              </div>  
             <div class="col-xs-6 col-md-3">
                <div class="jumbotron">
                    <div class="container">
                        <a href="#">
                        </a>
                    </div>
                
                </div>
              </div>  
             <div class="col-xs-6 col-md-3">
                <div class="jumbotron">
                    <div class="container">
                        <a href="#">
                        </a>
                    </div>
                
                </div>
              </div>  
             <div class="col-xs-6 col-md-3">
                <div class="jumbotron">
                    <div class="container">
                        <a href="#">
                        </a>
                    </div>
                
                </div>
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
          <form>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Accounting</h4>
          </div>
          <div class="container">
            <div class="row">

                <p class="search-text">Search: </p><input class="form-control" type="text" id="search" placeholder="Filter Professors.."> 
                  <div class="carousel slide multi-item-carousel" id="theCarousel">
                    <div class="carousel-inner">

                      <div class="item active">

                          <div class="col-xs-3"><a href="#"><img src="images/002.jpg" id="Aristotle F. Musni" alt="Aristotle F. Musni" onClick="reply_click(this.id)" alt="Image" style="max-width: 100%;"></a></div>
                          <div class="col-xs-3"><a href="#"><img src="images/edgar.JPG" id="Edgar Torres" alt="Edgar Torres" onClick="reply_click(this.id)" style="max-width: 100%;"></a></div>
                          <div class="col-xs-3"><a href="#"><img src="images/mark.JPG" id="Mark Alejandria" alt="Mark Alejandria" onClick="reply_click(this.id)" style="max-width: 100%;"></a></div>
                          <div class="col-xs-3"><a href="#"><img src="images/ponce.JPG"  id="Connie Ponce" alt="Connie Ponce" onClick="reply_click(this.id)" style="max-width: 100%;"></a></div>
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
              <label class="btn btn-secondary">
                <input type="radio" onclick="submitButtonStyle(this)" name="options" id="option2" autocomplete="off"> Faculty Performance Appraisal
              </label>
              <label class="btn btn-secondary">
                <input type="radio" onclick="submitButtonStyle(this)" name="options" id="option3" autocomplete="off"> Classroom Observation Sheet
              </label>
            </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Go</button>
          </div>
          </form>
        </div>
      </div>
    </div>
      
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
    
    

   
     


  </body>
</html>