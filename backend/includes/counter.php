<?php
//for displaying the username for dashboard
$email = $_SESSION["loginAccess"];
$userSql = "SELECT * FROM users where email = '$email'";
$userQuery = mysqli_query($conn, $userSql);
$userRows = mysqli_fetch_assoc($userQuery);
$username = $userRows['username'];

// Counts the total numbers of bookings done;
$sql = "SELECT COUNT(*) AS number FROM booking";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$total = $row[0];

//Counts the total numbers of users
$uSql = "SELECT COUNT(*) FROM users";
$uQuery = mysqli_query($conn, $uSql);
$uRow = mysqli_fetch_array($uQuery);
$uTotal = $uRow[0];

//Counts the total numbers of posts
$postSql = "SELECT COUNT(*) FROM posts";
$postsQuery = mysqli_query($conn, $postSql);
$postsRow = mysqli_fetch_array($postsQuery);
$postsTotal = $postsRow[0];

//Counts the total numbers of categories
// $catSql = "SELECT COUNT(*) FROM categories";
// $catQuery = mysqli_query($conn, $catSql);
// $catRow = mysqli_fetch_array($catQuery);
// $catTotal = $catRow[0];
