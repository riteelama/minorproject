<?php
include "includes/session.php";
$type = "profile";

include "includes/dbconfig.php";

$limit = 5;
$imagePath = "../uploads/images/";

//to check the user id
if (isset($_SESSION['loginAccess'])) {
    $email = $_SESSION['loginAccess'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    $rows = mysqli_fetch_assoc($query);
    $user_id = $rows['id'];

    //for displaying header for dashboard
    $role_id = $rows['role_id'];

    switch ($role_id) {
        case 1:
            include "includes/headers/admin-header.php";
            break;
        case 2:
            include "includes/headers/agent-header.php";
            break;
        case 3:
            include "includes/headers/customer-header.php";
            break;
        default:
            echo "Sorry you don't have any credetetial to access the file.";
    }
}

//to get editable record
if (isset($_GET['edit'])) {
    $userEmail = $_SESSION['loginAccess'];
    $sql = "SELECT * FROM users WHERE email = '$userEmail'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $id = $row['id'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    // var_dump($sql);
    $query = mysqli_query($conn, $sql);
    $editData  = $row;
}

//to update existing record
if (isset($_POST['save'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $address = $_POST['address'];
    $phoneno = $_POST['phoneno'];
    $id = $_POST['id'];
    $profile_picture = $_FILES['profile_picture'];

    if (isset($profile_picture['name']) && !empty($profile_picture['name'])) {

        //copy to the image path
        $move = move_uploaded_file($profile_picture['tmp_name'], $imagePath . $profile_picture['name']);
        if ($move) {
            $profile_picture = $profile_picture['name'];
            // var_dump($image);
        }
    }

    if ($password != $confirmpassword) {
        $error = "Password and Confirm password doesnot match";
    } else {
        //process to data entry        
        $sql = "UPDATE users SET fullname = '$fullname', username = '$username', password = '$password', address = '$address', phoneno ='$phoneno', profile_picture = '$profile_picture' WHERE id = '$id'";
        // echo $sql;
        $query = mysqli_query($conn, $sql);
        // $query.mysqli_error($conn);
        if ($query) {
            $success = "Package has been successfully updated.";
        } else {
            $error = "Couldnot complete update operation" . mysqli_error($conn);
            // echo "Failed to connect to MySQL: " . mysqli_connect_error();

        }
    }
}

//find all records
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
// var_dump($sql);

$query = mysqli_query($conn, $sql);
// $count = mysqli_num_rows($query);

//form, search and datalist by login
if (isset($_GET['edit'])) {
    include "manager/$type/form.php";
} else {
    include "manager/$type/search.php";
    include "manager/$type/datalist.php";
}

?>


<?php
include "includes/footer.php";

?>