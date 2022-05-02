<?php

//database configuration file
define ("hostname","localhost");
define("username","root");
define("password","");
define("database","minorproject");

//mysql connection
$conn = mysqli_connect(hostname,username,password,database);
// if($conn){
//     echo "Connected successfully";
    
// }else {
//     echo "Failed to connect".mysqli_connect_error();
// }

?>



