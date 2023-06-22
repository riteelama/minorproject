<?php

//database configuration file
define ("hostname","localhost");
define("username","root");
define("password","");
define("database","minorproject");

//mysql connection
$conn = mysqli_connect(hostname,username,password,database);
if($conn){
//    echo "Connected successfully";
//    var_dump($conn);
    
<<<<<<< HEAD
}else {
    echo "Failed to connect".mysqli_connect_error();
}

?>



=======
// }else {
//     echo "Failed to connect".mysqli_connect_error();
// }
>>>>>>> 665fd2803987df6024bebf9b66746fda9877129d
