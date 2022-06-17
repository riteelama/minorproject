<?php 
include "includes/session.php";
$type = "categories";
$tablename = "$type";

include "includes/dbconfig.php";

$limit = 5;
$imagePath = "../uploads/images/";

//to check the user id
if(isset($_SESSION['loginAccess'])){
    $email = $_SESSION['loginAccess'];
    $query = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
    $rows = mysqli_fetch_assoc($query);
    $user_id = $rows['id'];

    //for displaying header for dashboard
    $role_id = $rows['role_id'];

    switch($role_id){
        case 1 : include "includes/headers/admin-header.php";
        break;
        case 2: include "includes/headers/agent-header.php";
        break;
        case 3: include "includes/headers/customer-header.php";
        break;
        default:
        echo "Sorry you don't have any credetetial to access the file.";
    }
}



//to create new record
if(isset($_POST['create'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    // $postdate = $_POST['postdate'];
    $status = $_POST['status'];


    if(!empty($title) && !empty($description)){
        //process to data entry
        
        $sql= "INSERT INTO $tablename(title,description,user_id_cat,status) VALUES ('$title','$description','$user_id','$status')";
        // echo $sql;
        // die();
        $query = mysqli_query($conn,$sql);
        if($query){
            $success = "Post has been successfully created.";
            // header("location:categories.php");
        }
        else {
            $error = "Tour post and URL already exists";
            // echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
}





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
    // var_dump($sql);
    $query = mysqli_query($conn,$sql);
    $editData  = mysqli_fetch_assoc($query);
    // echo $editData["confirm-password"];
    // die();
    // print_r($editData);
    // die();
}

//to update existing record
if(isset($_POST['save'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $id = $_POST['id'];  
    //process to data entry        
    $sql = "UPDATE $tablename SET title = '$title', description ='$description', status = '$status' WHERE id = '$id'";
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
$start = 0;
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page <= 1){
        $page = 0;
    }
    else 
    $page = $page - 1;
    // var_dump($page);


    $start = $page*$limit;
    // var_dump($start);
}


    //find all records
$sql = "SELECT * FROM $tablename LIMIT $start,$limit";
// var_dump($sql);
}

$query = mysqli_query($conn,$sql);
// // print_r(mysqli_fetch_array($query));
// // print_r(mysqli_fetch_array($query));
$count = mysqli_num_rows($query);
// echo $count;

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