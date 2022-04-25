<?php 
// include "includes/dbconfig.php";
// sinclude "users.php";
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                                <h1 class="h4 text-gray-900 mb-4">Edit an Account!</h1>
                            </div>
                            
                            <form class="user" method="post" name="userForm">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="fullname">Full Name<span class="required" style="color:red;">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="fullname" value="<?php echo isset($editData)?$editData['fullname']:"";?>" name="fullname"
                                            placeholder="Fullname" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="username">Username<span class="required" style="color:red;">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="username" value="<?php echo isset($editData)?$editData['username']:"";?>"
                                            placeholder="Username" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<span class="required" style="color:red;">*</span></label>
                                    <input type="email" class="form-control form-control-user" id="email" value="<?php echo isset($editData)?$editData['email']:"";?>"
                                        placeholder="Email Address" name="email" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password">Password<span class="required" style="color:red;">*</span></label>
                                        <input type="password" class="form-control form-control-user" value="<?php echo isset($editData)?$editData['password']:"";?>"
                                            id="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="confirmpassword">Confirm Password<span class="required" style="color:red;">*</span></label>
                                        <input type="password" class="form-control form-control-user" value="<?php echo isset($editData)?$editData['password']:"";?>"
                                            id="confirmpassword" placeholder="Confirm Password" name="confirmpassword">
                                    </div>
                                    <?php echo isset($error)?$error:'';?>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="phoneno">Phone Number</label>
                                        <input type="text" class="form-control form-control-user" value="<?php echo isset($editData)?$editData['phoneno']:"";?>"
                                            id="phoneno" placeholder="Phone number" name="phoneno">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control form-control-user" value="<?php echo isset($editData)?$editData['address']:"";?>"
                                            id="address" placeholder="Address" name="address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="status" id="status" class="form-select" selected style="border-radius:20px;">
                                        <?php 
                                            $active = 'selected="selected"';
                                            $inactive = '';
                                            if(isset($editData)){
                                                if(!$editData['status']){
                                                $active = '';
                                                $inactive = 'selected = "selected"';
                                                }
                                            }
                                        ?>
                                            <option value="1" <?php echo $active; ?>>Active</option>
                                            <option value="0" <?php echo $inactive; ?>>In-active</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="role_id" id="role_id" class="form-select" selected style="border-radius:20px;">
                                        <?php 
                                            $active = 'selected="selected"';
                                            $inactive = '';
                                            if(isset($editData)){
                                                if(!$editData['role_id']){
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
                                </div>
                            <div class="d-flex justify-content-center pt-3">
                                <button name="save" type="submit" onclick="location.href='users.php'" class="btn btn-user btn-primary">Update Account</button>
                            </div>
                            </form>
                            <hr>
                            <?php echo isset($error)?$error:'';?>
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