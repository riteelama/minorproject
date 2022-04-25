<?php 

//starting session
session_start();

unset($_SESSION['loginAccess']);
setcookie("myCookie",null,time()-123);
header("location:login.php");


?>