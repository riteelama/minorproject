<?php 
//for displaying the username for dashboard
$email = $_SESSION["loginAccess"];
$userSql = "SELECT * FROM users where email = '$email'";
$userQuery = mysqli_query($conn, $userSql);
$userRows = mysqli_fetch_assoc($userQuery);
$username = $userRows['username'];
$user_id = $userRows['id'];

//count the number of posts 
$postSql = "SELECT COUNT(*) FROM posts where user_id = '$user_id'";
$postQuery = mysqli_query($conn, $postSql);
$postRow = mysqli_fetch_array($postQuery);
$postTotal = $postRow[0];

//Count the number of packages for agents
$packSql = "SELECT COUNT(*) FROM packages WHERE user_id_packages = '$user_id'";
// var_dump($packSql);
$packQuery = mysqli_query($conn, $packSql); 
$packRows = mysqli_fetch_array($packQuery);
$packsTotal = $packRows[0];

//Count the number of packages for customers
$bookPackSql = "SELECT COUNT(*) FROM booking WHERE user_custid = '$user_id';";
// var_dump($packSql);
$bookPackQuery = mysqli_query($conn, $bookPackSql); 
$bookPackRows = mysqli_fetch_array($bookPackQuery);
$bookPacksTotal = $bookPackRows[0];

//Count the number of comments done
$commSql = "SELECT COUNT(*) FROM comments WHERE user_comid='$user_id'";
// var_dump($commSql);
$commQuery = mysqli_query($conn, $commSql); 
$commRows = mysqli_fetch_array($commQuery);
$commTotal = $commRows[0];
?>