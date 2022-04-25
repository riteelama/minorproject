<?php 
include "includes/session.php";
$type = "tour";
$tablename = "$type";

include "includes/dbconfig.php";

$limit = 2;
$imagePath = "../uploads/";


//to create new record
if(isset($_POST['create'])){
    $category_id = $_POST['category_id'];
    $toppackages = $_POST['toppackages'];
    $title = $_POST['title'];
    $url = $_POST['url'];
    $seotitle = $_POST['seotitle'];
    $seodesc = $_POST['seodesc'];
    $summary = $_POST['summary'];
    $detail = $_POST['detail'];
    $status = $_POST['status'];
    $image = $_FILES['image'];


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
        
        $sql= "INSERT INTO $tablename(category_id,toppackages,title,url,seotitle,seodesc,image,summary,details,status) VALUES ('$category_id','$toppackages','$title','$url','$seotitle','$seodesc','$image','$summary','$detail','$status')";
        // echo $sql;
        // die();
        $query = mysqli_query($conn,$sql);
        if($query){
            $success = "Tour post has been successfully created.";
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


//to update existing record
if(isset($_POST['save'])){
    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $url = $_POST['url'];
    $seotitle = $_POST['seotitle'];
    $seodesc = $_POST['seodesc'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    if(!empty($title) && !empty($url)){
        
        
        //process to data entry        
        $sql = "UPDATE $tablename SET category_id = '$category_id', title ='$title', url='$url', seotitle ='$seotitle' ,seodesc='$seodesc', status = '$status' WHERE id = '$id'";
        // echo $sql;
        $query = mysqli_query($conn,$sql);
        if($query){
            $success = "Tour Post has been successfully updated.";
        }
        else {
            $error = "Couldnot complete update operation";
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
    if($query){
        $msg = "Tour post deleted successfully.";
    }
    else {
        $msg = "Tour post can't be deleted.";
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



//to get view record
if(isset($_GET['view'])){
    $id = $_GET['view'];
    $sql = "SELECT * FROM $tablename WHERE id = '$id'";
    $query = mysqli_query($conn,$sql);
    $viewData  = mysqli_fetch_array($query);
    // echo $editData["confirm-password"];
    // die();
    // print_r($editData);
    // die();
}



//to change the status of the record
if(isset($_GET['status'])){
    $id = $_GET['status'];
    $sql = "UPDATE $tablename SET status = !status WHERE id = '$id'";
    $query = mysqli_query($conn,$sql);
    // $editData  = mysqli_fetch_array($query);
    if($query){
        $msg = "Tour post status has been successfully changed.";
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

//function to return the tour post title
function getCatTitle($id){
    $sql = "SELECT title FROM categories WHERE id='$id'";
    global $conn;
    $query = mysqli_query($conn,$sql);
    // $query = mysqli_query(hostname,username,password,database,$sql);
    $data = mysqli_fetch_assoc($query);
    if($data){
        return $data['title'];
    }
    else {
        return "Main tour  post";
    }
}

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
         
        // echo isset($msg)?$msg:"";  -->
        
    <!-- <hr>
    <a href="?new">Add New</a>
    <a href="?all">View All</a> -->
 





<?php
include "includes/header.php";

//form, search and datalist by login
if(isset($_GET['new']) or isset($_GET['edit'])){
    include "manager/$type/form.php";
}else if(isset($_GET['view'])) {
    include "manager/$type/view.php";
    
}else {
    include "manager/$type/datalist.php";
}

?>


<?php 
include "includes/footer.php";

?>