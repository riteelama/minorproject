<?php
//starting session
session_start();

//check for a session key to redirect to the access page
if (isset($_SESSION['loginAccess'])) {
    header("location: index.php"); //content type definer -> define the location of request 
}

//database connection
include "includes/dbconfig.php";
global $conn;

//check for login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //check email and password
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password') AND status = '1'";
    $query = mysqli_query($conn, $sql);
     var_dump( $sql);
    // var_dump($conn);
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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <label for="email">Email<span style="color:red;">*</span></label>
                                            <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Enter your email">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Password<span style="color:red;">*</span></label>
                                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                                        </div>
                                        <small class="text-danger"><?php echo isset($error) ? $error : ""; ?></small>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="rem" class="custom-control-input" id="rem">
                                                <label class="custom-control-label" for="rem">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-user btn-block btn-primary">Login</button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div>
                                        Don't have an account? <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>