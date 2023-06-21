<?php
include "includes/dbconfig.php";
// sinclude "users.php";
//to create new record
$imagePath = "../uploads/images/";

if (isset($_POST['create'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $phoneno = $_POST['phoneno'];
    $address = $_POST['address'];
    $profile_picture = $_FILES['profile_picture'];
    $role_id = $_POST['role_id'];

    //var_dump($profile_picture);

    if (isset($profile_picture['name']) && !empty($profile_picture['name'])) {

        //copy to the image path
        $move = move_uploaded_file($profile_picture['tmp_name'], $imagePath . $profile_picture['name']);
        if ($move) {
            $profile_picture = $profile_picture['name'];
            var_dump($profile_picture);
        }
    }

    if ($password != $confirmpassword) {
        $error = "Confirm password doesnot match.";
    } elseif (!empty($username) && !empty($email) && !empty($profile_picture)) {
        //process to data entry

        $sql = "INSERT INTO users(fullname,username,email,password,phoneno,address,role_id,profile_picture) VALUES ('$fullname','$username','$email',md5('$password'),'$phoneno','$address','$role_id','$profile_picture')";
        var_dump($sql);

        $query = mysqli_query($conn, $sql);
        // svar_dump($query);
        if ($query) {
            $success = "User has been successfully created.";
            header("location:login.php");
        } else {
            $error = "Username and email already exists";
            // echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    } else {
        $error = "Username and email cannot be blank";
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

    <title>Registration Form</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <form class="user" method="post" name="userForm" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="fullname">Full Name<span class="required" style="color:red;">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="fullname" value="<?php echo isset($editData) ? $editData['fullname'] : ""; ?>" name="fullname" placeholder="Fullname" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="username">Username<span class="required" style="color:red;">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="username" value="<?php echo isset($editData) ? $editData['username'] : ""; ?>" placeholder="Username" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<span class="required" style="color:red;">*</span></label>
                                    <input type="email" class="form-control form-control-user" id="email" value="<?php echo isset($editData) ? $editData['email'] : ""; ?>" placeholder="Email Address" name="email" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password">Password<span class="required" style="color:red;">*</span></label>
                                        <input type="password" class="form-control form-control-user" value="<?php echo isset($editData) ? $editData['password'] : ""; ?>" id="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="confirmpassword">Confirm Password<span class="required" style="color:red;">*</span></label>
                                        <input type="password" class="form-control form-control-user" value="<?php echo isset($editData) ? $editData['password'] : ""; ?>" id="confirmpassword" placeholder="Confirm Password" name="confirmpassword">
                                    </div>
                                    <!-- <?php
                                            // echo isset($error)?$error:'';
                                            ?> -->
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="phoneno">Phone Number</label>
                                        <input type="text" class="form-control form-control-user" value="<?php echo isset($editData) ? $editData['phoneno'] : ""; ?>" id="phoneno" placeholder="Phone number" name="phoneno">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control form-control-user" value="<?php echo isset($editData) ? $editData['address'] : ""; ?>" id="address" placeholder="Address" name="address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <br>
                                        <select name="role_id" id="role_id" class="form-select" selected style="border-radius:20px;">
                                            <?php
                                            $active = 'selected="selected"';
                                            $inactive = '';
                                            if (isset($editData)) {
                                                if (!$editData['role_id']) {
                                                    $active = '';
                                                    $inactive = 'selected = "selected"';
                                                }
                                            }
                                            ?>
                                            <option value="2" <?php echo $active; ?>>Agents</option>
                                            <option value="3" <?php echo $inactive; ?>>Customers</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group has-error">
                                        <label for="profile_picture">Choose an profile image</label><span class="text-danger">*</span>
                                        <br>
                                        <input type="file" name="profile_picture" id="profile_picture" value="<?php echo isset($editData) ? $editData['image'] : ''; ?>" required accept="jpeg/png">
                                        <!-- <span class="help-block">Input the title</span> -->
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center pt-3">
                                    <button name="create" type="submit" class="btn btn-user btn-success" style="margin-right:20px;">Register Account</button>
                                    <button name="save" type="submit" onclick="location.href='users.php'" class="btn btn-user btn-primary">Update Account</button>
                                </div>
                            </form>
                            <hr>
                            <p style="color:red;"><?php echo isset($error) ? $error : ''; ?></p>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
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