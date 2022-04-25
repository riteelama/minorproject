<?php 
include "includes/session.php";
$type = "posts";
$tablename = "$type";


include "includes/dbconfig.php";

$imagePath = "../uploads/images/";

$limit = 1;

if(isset($_SESSION['loginAccess'])){
    $email = $_SESSION['loginAccess'];
    $query = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
    $rows = mysqli_fetch_assoc($query);
    $user_id = $rows['id'];
}


//to create new record
if(isset($_POST['create'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image'];
    // $postdate = $_POST['postdate'];
    $status = $_POST['status'];


    if(isset($image['name']) && !empty($image['name'])){

        //copy to the image path
        $move = move_uploaded_file($image['tmp_name'],$imagePath.$image['name']);
        if($move){
            $image = $image['name'];
        }
    }
    // var_dump($image);
    // print_r($imagePath.$image['name']);
    // print_r($image);
    //Array ( [name] => 274186292_1304552783376454_1356609208025864271_n.jpg [type] => image/jpeg [tmp_name] => D:\xampp\tmp\phpC6D5.tmp [error] => 0 [size] => 49634 )
    // exit;

    if(!empty($title) && !empty($url)){
        //process to data entry
        
        $sql= "INSERT INTO $tablename(title,description,image,user_id,status) VALUES ('$title','$description','$image','$user_id','$status')";
        // echo $sql;
        // die();
        $query = mysqli_query($conn,$sql);
        if($query){
            $success = "Post has been successfully created.";
            header("location:login.php");
        }
        else {
            $error = "Tour post and URL already exists";
            // echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }else {
        $error = "Title and URL cannot be blank";
    }
}




//to delete record
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM $tablename WHERE id = '$id'";    
    $query = mysqli_query($conn,$sql);
    // echo $query.mysqli_error($conn);
    if($query){
        $msg = "Post deleted successfully.";
    }
    else {
        $msg = "Post can't be deleted.";
    }
}


//to get editable record
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM $tablename WHERE id = '$id'";
    // var_dump($id);
    // die();
    $query = mysqli_query($conn,$sql);
    $editData  = mysqli_fetch_array($query);
    // echo $editData["confirm-password"];
    // die();
    // print_r($editData);
    // die();
}

//to update existing record
if(isset($_POST['save'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    // $user_id = $_POST['user_id'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    if(isset($image['name']) && !empty($image['name'])){

        //copy to the image path
        $move = move_uploaded_file($image['tmp_name'],$imagePath.$image['name']);
        if($move){
            $image = $image['name'];
        }
    }
    }elseif(!empty($title) && !empty($description)){
        
        //working to encrypt the password if changed
        $sql = "SELECT password FROM $tablename WHERE id = '$id'";
        $query = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($query);
        if($data['password'] != $password){
            $password = md5($password);
        }
        
        //process to data entry        
        $sql = "UPDATE $tablename SET fullname = '$fullname', username ='$username', password='$password', email='$email', status = '$status' WHERE id = '$id'";
        // echo $sql;
        var_dump($sql);
        $query = mysqli_query($conn,$sql);
        // $query.mysqli_error($conn);
        if($query){
            $success = "Post has been successfully updated.";
        }
        else {
            $error = "Couldnot complete update operation";
            // echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }else {
        $error = "Title and description cannot be blank";
    }




//to change the status of the record
if(isset($_GET['status'])){
    $id = $_GET['status'];
    $sql = "UPDATE $tablename SET status = !status WHERE id = '$id'";
    $query = mysqli_query($conn,$sql);
    // $editData  = mysqli_fetch_array($query);
    if($query){
        $msg = "Post status has been successfully changed.";
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
        $page = 1;
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

if(isset($_SESSION['loginAccess'])){
    $email = $_SESSION["loginAccess"];
    
    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query($conn,$sql);
    // echo $sql;
    // $rows=mysqli_num_rows($query)
    // print_r($rows);

    // if($rows>0){
    $num_rows = mysqli_fetch_assoc($query);
    $role_id = $num_rows['role_id'];
    $email = $num_rows['email'];
    // echo $role_id;
    // }
    
    switch($role_id){

    case 1:
     include "dashboard/admin-dashboard.php";
     break;

    case 2: 
    include "dashboard/agents-dashboard.php";
    break;

    case 3:
    include "dashboard/customer-dashboard.php";
    break;

    default:
    echo "Sorry, You don't have any creditentials for accessing the dashboard.";
    }
}
// var_dump($role_id);
//form, search and datalist by login
if(isset($_GET['new']) or isset($_GET['edit'])){
    include "manager/posts/form.php";
}else {
    include "manager/posts/search.php";
    include "manager/posts/datalist.php";
}

?>


<?php 
include "includes/footer.php";

?>