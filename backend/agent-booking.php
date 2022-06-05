<?php 
include "includes/session.php";
$type = "booking";
$tablename = "$type";

include "includes/dbconfig.php";

$limit = 5;
$imagePath = "../uploads/images/";

// to check the user id
if(isset($_SESSION['loginAccess'])){
    $email = $_SESSION['loginAccess'];
    $query = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
    $rows = mysqli_fetch_assoc($query);
    $agent_id = $rows['id'];

    //for displaying header for dashboard
    // $role_id = $rows['role_id'];

    // switch($role_id){
    //     case 2: include "includes/headers/agent-header.php";
    //     break;
    //     case 3: include "includes/headers/customer-header.php";
    //     break;
    //     default:
    //     echo "Sorry you don't have any credetetial to access the file.";
    // }
    // var_dump($agent_id);
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
    $query = mysqli_query($conn,$sql);
    $editData  = mysqli_fetch_array($query);
    // echo $editData["confirm-password"];
    // die();
    // print_r($editData);
    // die();
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
    // $pacckage = $_POST['package_id'];
$sql = "SELECT * FROM $tablename LIMIT $start,$limit";
// var_dump($sql);
}

$query = mysqli_query($conn,$sql);
// // print_r(mysqli_fetch_array($query));
// // print_r(mysqli_fetch_array($query));
$rowsSize = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
$package_id = $row['package_id'];
// var_dump($package_id);
if($rowsSize>0){
    $count = $rowsSize;
}
else {
    "";
}

$subsql = "SELECT * FROM packages WHERE user_id_packages = '$agent_id'";
// var_dump($subsql);
$subquery = mysqli_query($conn,$subsql);
$subrow = mysqli_fetch_assoc($subquery);
// var_dump($subquery);
// var_dump($subsql);
// print_r($count);

include "includes/headers/agent-header.php";

//form, search and datalist by login
if(isset($_GET['new']) or isset($_GET['edit'])){
    include "manager/agent-booking/form.php";
}else {
    include "manager/agent-booking/search.php";
    include "manager/agent-booking/datalist.php";
}

?>


<?php 
include "includes/footer.php";

?>