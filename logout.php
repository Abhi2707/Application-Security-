<?php
setcookie('username','xss', '0','/','localhost',true, true);
header( "Set-Cookie: name=value; httpOnly" );
   session_start();
   
   if(session_destroy()) {
      header("Location: login.php");
   }
?>