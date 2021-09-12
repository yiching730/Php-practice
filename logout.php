<?php 
setcookie("loginStatus", "", time() - 3600);
header("Location: http://localhost/test1/login.php"); 
