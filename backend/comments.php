<?php 
include "includes/session.php";
$type = "comments";
$tablename = "$type";

include "includes/dbconfig.php";

$limit = 5;

//to check the user id
if(isset($_SESSION['loginAccess'])){
    $email = $_SESSION['loginAccess'];
    $query = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
    $rows = mysqli_fetch_assoc($query);
    $user_id = $rows['id'];
}

//to create new record
if(isset($_POST['create'])){
    $comments = $_POST['comments'];

    if(!empty($comments)){
        //process to data entry
        
        $sql = "INSERT INTO $tablename(comments,user_id_com) VALUES ('$comments','$user_id')";
        // var_dump($sql);

        $query = mysqli_query($conn,$sql);
        // svar_dump($query);
        if($query){
            $success = "Comments has been successfully created.";
            header("location:login.php");
        }
        else {
            $error = "Failed to connect to MYSQL, MYSQLI says:".mysqli_error($conn);
        }
    }else {
        $error = "Blank comment cannot be posted";
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
    $comments = $_POST['comments'];
    $id = $_POST['id'];  

    //process to data entry        
    $sql = "UPDATE $tablename SET comments = '$comments' WHERE id = '$id'";
    // echo $sql;
    $query = mysqli_query($conn,$sql);
    // $query.mysqli_error($conn);
    if($query){
        $success = "Your comments has been successfully updated.";
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
        $msg = "Your comment status has been successfully changed.";
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
$sql = "SELECT * FROM $tablename WHERE user_id_com = '$user_id' LIMIT $start,$limit";
}

$query = mysqli_query($conn,$sql);
// // print_r(mysqli_fetch_array($query));
// // print_r(mysqli_fetch_array($query));
$count = mysqli_num_rows($query);
// echo $count;


include "includes/headers/customer-header.php";

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