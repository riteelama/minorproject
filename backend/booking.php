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
    $user_name = $rows['fullname'];
}

//to book new package
if(isset($_POST['book'])){
    $package_id = $_POST['package_id'];
    $package_name = $_POST['package_name'];
    $status = $_POST['status'];
    $id = $_POST['user_custid'];
    $name = $_POST['user_name'];

    
    if(!empty($package_id)){
        //process to data entry
        
        $sql = "INSERT INTO $tablename(package_id,package_name,user_custid,user_name,status) VALUES ('$package_id','$package_name','$agent_id','$user_name','$status')";
        // var_dump($sql);

        $query = mysqli_query($conn,$sql);
        // svar_dump($query);
        if($query){
            $success = "Booking has been successfully created.";
            header("location:login.php");
        }
        else {
            $error = "Failed to connect to MySQL: " . mysqli_error($conn);
            // echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }else {
        $error = "Please select a package";
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
    $package_id = $_POST['package_id'];
    $package_name = $_POST['package_name'];
    $user_custid = $editData['user_custid'];

    //process to data entry        
    $sql = "UPDATE $tablename SET package_name = '$package_name', package_id = '$package_id' WHERE id = '$id'";
    var_dump($package_id);
    var_dump($package_name);
    var_dump($user_custid);

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

//to search records
if(isset($_POST['search-btn'])){

    $searchby = $_POST['searchby'];
    $searchkey = $_POST['searchkey'];
    $sql = "SELECT * FROM $tablename WHERE $searchby LIKE '%$searchkey%'";
    // echo $sql;
}
else{
//find all records
$sql = "SELECT * FROM $tablename WHERE user_custid = '$agent_id'";
// var_dump($sql);
}

$query = mysqli_query($conn,$sql);
$count = mysqli_num_rows($query);
// // print_r(mysqli_fetch_array($query));
// // print_r(mysqli_fetch_array($query));
// $rowsSize = mysqli_num_rows($query);
// if($rowsSize>0){
//     $count = $rowsSize;
// }
// else {
//     "";
// }
// print_r($count);

include "includes/headers/customer-header.php";

//form, search and datalist by login
if(isset($_GET['new'])){
    include "manager/$type/form.php";
}
    
elseif(isset($_GET['edit'])){
    include "manager/$type/edit.php";
}

else {
    include "manager/$type/search.php";
    include "manager/$type/datalist.php";
}

?>


<?php 
include "includes/footer.php";

?>