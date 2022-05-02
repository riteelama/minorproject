<?php 
include "includes/session.php";
$type = "users";
$tablename = "$type";


include "includes/dbconfig.php";

$imagePath = "../uploads/images/";
$limit = 5;


//to create new record
if(isset($_POST['create'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $phoneno = $_POST['phoneno'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $address = $_POST['role_id'];
    $profile_picture = $_FILES['profile_picture'];

    if(isset($profile_picture['name']) && !empty($profile_picture['name'])){

        //copy to the image path
        $move = move_uploaded_file($profile_picture['tmp_name'],$imagePath.$profile_picture['name']);
        if($move){
            $image = $image['name'];
        }
    }

    if($password != $confirmpassword){
        $error = "Confirm password doesnot match.";
    }elseif(!empty($username) && !empty($email)){
        //process to data entry
        
        $sql = "INSERT INTO $tablename(fullname,username,email,password,phoneno,address,status,role_id,profile_picture) VALUES ('$fullname','$username','$email',md5('$password'),'$phoneno','$address','$status','$role_id','$profile_pictures')";
        // var_dump($sql);

        $query = mysqli_query($conn,$sql);
        // svar_dump($query);
        if($query){
            $success = "User has been successfully created.";
            header("location:login.php");
        }
        else {
            $error = "Username and email already exists";
            // echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }else {
        $error = "Username and email cannot be blank";
    }
}




//to delete record
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM $tablename WHERE id = '$id'";    
    $query = mysqli_query($conn,$sql);
    // echo $query.mysqli_error($conn);
    if($query){
        $msg = "User deleted successfully.";
    }
    else {
        $msg = "user can't be deleted.";
    }
}


//to get editable record
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM $tablename WHERE id = '$id'";
    $query = mysqli_query($conn,$sql);
    $editData  = mysqli_fetch_array($query);
    // echo $editData["confirm-password"];
    // die();
    // print_r($editData);
    // die();
}

//to update existing record
if(isset($_POST['save'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $phoneno = $_POST['phoneno'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $role_id = $_POST['role_id'];
    $profile_picture = $_FILES['profile_picture'];
    // var_dump($profile_picture);
    // $id = $_POST['edit'];
    // $id = $_GET['edit'];
    $id = $_POST['id'];

    if(isset($profile_picture['name']) && !empty($profile_picture['name'])){

        //copy to the image path
        $move = move_uploaded_file($profile_picture['tmp_name'],$imagePath.$profile_picture['name']);
        if($move){
            $profile_picture = $profile_picture['name'];
        }
    }

    if($password != $confirmpassword){
        $msg = "Confirm password doesnot match.";
    }elseif(!empty($username) && !empty($email)){
        
        //working to encrypt the password if changed
        $sql = "SELECT password FROM $tablename WHERE id = '$id'";
        // var_dump($sql);
        $query = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($query);
        if($data['password'] != $password){
            $password = md5($password);
        }
        
        //process to data entry   
        if(isset($profile_picture['name']) && !empty($profile_picture['name'])){

            //copy to the image path
            $move = move_uploaded_file($profile_picture['tmp_name'],$imagePath.$profile_picture['name']);
            if($move){
                $profile_picture = $profile_picture['name'];
            }
        }     
        $sql = "UPDATE $tablename SET fullname = '$fullname', username ='$username', email='$email', password='$password', phoneno='$phoneno', address='$address', status = '$status',role_id = '$role_id', profile_picture = '$profile_picture' WHERE id = '$id'";
        // echo $sql;
        $query = mysqli_query($conn,$sql);
        // $query.mysqli_error($conn);
        if($query){
            $success = "User has been successfully updated.";
        }
        else {
            $error = "Couldnot complete update operation";
            // echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }else {
        $error = "Username and email cannot be blank";
    }
}



//to change the status of the record
if(isset($_GET['status'])){
    $id = $_GET['status'];
    $sql = "UPDATE $tablename SET status = !status WHERE id = '$id'";
    $query = mysqli_query($conn,$sql);
    // $editData  = mysqli_fetch_array($query);
    if($query){
        $msg = "User status has been successfully changed.";
    }
}


//to search records
if(isset($_POST['search-btn'])){

    $searchby = $_POST['searchby'];
    $searchkey = $_POST['searchkey'];
    $sql = "SELECT * FROM $tablename WHERE $searchby LIKE '%$searchkey%'";
    // echo $sql;
}
else{
// working with pagination
$start = 0;
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page <= 1){
        $page = 0;
    }
    else 
    $page = $page - 1;


    $start = $page*$limit;
}


    //find all records
$sql = "SELECT * FROM $tablename LIMIT $start,$limit";
}

$query = mysqli_query($conn,$sql);
// // print_r(mysqli_fetch_array($query));
// // print_r(mysqli_fetch_array($query));
$count = mysqli_num_rows($query);
// echo $count;

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <p>
         <?php 
        // echo isset($msg)?$msg:"";  -->
        ?></p>
    <hr>
    <a href="?new">Add New</a>
    <a href="?all">View All</a>
    <?php 

include "includes/header.php";

//form, search and datalist by login
if(isset($_GET['new']) or isset($_GET['edit'])){
    include "manager/$type/form.php";
}else {
    include "manager/$type/search.php";
    include "manager/$type/datalist.php";
}

?>


<?php 
include "includes/footer.php";

?>