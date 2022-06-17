<?php
//starting session
session_start();

//check for a session key to redirect to the access page
if (isset($_SESSION['loginAccess'])) {
    header("location: index.php"); //content type definer -> define the location of request 
}

//database connection
include "includes/dbconfig.php";

//check for login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //check email and password
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password') AND status = '1'";
    $query = mysqli_query($conn, $sql);
    // echo $sql;
    $data = mysqli_fetch_assoc($query);

    if ($data) {

        //for cookie
        if (isset($_POST['rem'])) {
            $time = time() + 3600; //for one hour
            setcookie("myCookie", $email, $time);
        }


        $_SESSION['loginAccess'] = $email;
        header("location: index.php");
    } else {
        $error = "Invalid email and password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <div class="wrapper">
        <div class="title"><span>Login</span></div>
        <form method="post">
            <div class="row">
            <i class="fa-solid fa-user"></i>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
            </div>

            <div class="row">
                <i class="fa-solid fa-key"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <small class="text-danger"><?php echo isset($error)? $error : "";?></small>
            
            <div> 
                <input type="checkbox" name="rem" id="rem"> Remember Me!
            </div>
               

            <div class="row button">
                <button type="submit" name="login" class="btn btn-lg btn-block">Login</button>
            </div>

            <div class="register-link">Don't have an account? <a href="register.php">Register Now</a></div>
        </form>
    </div>
</div>
</body>
</html>