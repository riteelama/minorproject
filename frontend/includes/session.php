<?php 

//starting session
session_start();

//if cookie found
if(isset($_COOKIE['myCookie'])){
    $_SESSION['loginAccess'] = $_COOKIE['myCookie'];
}

//check for a session key to access in the page
if(!isset($_SESSION['loginAccess'])){
    header("location: ../backend/login.php"); // content type definer -> dedine the location of request
}

?>