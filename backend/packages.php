<?php 
include "includes/session.php";
$type = "packages";
$tablename = "$type";

include "includes/dbconfig.php";

$limit = 5;
$imagePath = "../uploads/images/";

//to create new record
if(isset($_POST['create'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $excerpt = $_POST['excerpt'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    // print_r($image['name']);
    // die();
    $status = $_POST['status'];
    

    if(isset($image['name']) && !empty($image['name'])){

        //copy to the image path
        $move = move_uploaded_file($image['tmp_name'],$imagePath.$image['name']);
        if($move){
            $image = $image['name'];
            // var_dump($image);
        }
    }

    if(!empty($name) && !empty($description)){
        //process to data entry
        
        $sql = "INSERT INTO $tablename(name,description,excerpt,price,image,status) VALUES ('$name','$description','$excerpt','$price','$image','$status')";
        // var_dump($sql);

        $query = mysqli_query($conn,$sql);
        // svar_dump($query);
        if($query){
            $success = "Category has been successfully created.";
            header("location:login.php");
        }
        else {
            $error = "Title and description already exists";
            // echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }else {
        $error = "Title and description cannot be blank";
    }
}
// var_dump($id);




//to delete record
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM $tablename WHERE id = '$id'";    
    $query = mysqli_query($conn,$sql);
    // echo $query.mysqli_error($conn);
    if($query){
        $msg = "Package has been deleted successfully.";
    }
    else {
        $msg = "Package can't be deleted. Mysql says: ".mysqli_error($conn);
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
    $name = $_POST['name'];
    $description = $_POST['description'];
    $excerpt = $_POST['excerpt'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    // $confirmpassword = $_POST['confirmpassword'];
    $id = $_POST['id'];  
    $image = $_FILES['image'];

    if(isset($image['name']) && !empty($image['name'])){

        //copy to the image path
        $move = move_uploaded_file($image['tmp_name'],$imagePath.$image['name']);
        if($move){
            $image = $image['name'];
            // var_dump($image);
        }
    }

    //process to data entry        
    $sql = "UPDATE $tablename SET name = '$name', description ='$description', excerpt='$excerpt', price='$price', image = '$image', status = '$status' WHERE id = '$id'";
    // echo $sql;
    $query = mysqli_query($conn,$sql);
    // $query.mysqli_error($conn);
    if($query){
        $success = "Package has been successfully updated.";
    }
    else {
        $error = "Couldnot complete update operation".mysqli_error($conn);
        // echo "Failed to connect to MySQL: " . mysqli_connect_error();
    
    }
}





//to change the status of the record
if(isset($_GET['status'])){
    $id = $_GET['status'];
    $sql = "UPDATE $tablename SET status = !status WHERE id = '$id'";
    $query = mysqli_query($conn,$sql);
    // $editData  = mysqli_fetch_array($query);
    if($query){
        $msg = "Package status has been successfully changed.";
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
$start = 1;
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

include "includes/headers/agent-header.php";

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