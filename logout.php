<?php
   session_start();
   
   if(session_destroy()) {
   	$_SESSION['login_user'] = "";
      header("Location: index.php");
   }
?>