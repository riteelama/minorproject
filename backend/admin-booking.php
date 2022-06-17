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

    // //for displaying header for dashboard
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

//to book new package
if(isset($_POST['book'])){
    $package_id = $_POST['package_id'];
    $status = $_POST['status'];
    $id = $_POST['user_custid'];
    
    if(!empty($package_id)){
        //process to data entry
        
        $sql = "INSERT INTO $tablename(package_id,user_custid,status) VALUES ('$package_id','$agent_id','$status')";
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

// to change the status of the record
if(isset($_GET['status'])){
    $id = $_GET['status'];
    // var_dump($id);
    $sql = "UPDATE $tablename SET status = !status WHERE id = '$id'";
    // var_dump($sql);
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


    $start = $page*$limit;
}


    //find all records
$adminBookSql = "SELECT * FROM $tablename LIMIT $start,$limit";
// var_dump($sql);
}

$adminBookQuery = mysqli_query($conn,$adminBookSql);
// // print_r(mysqli_fetch_array($query));
// // print_r(mysqli_fetch_array($query));
$rowsSize = mysqli_num_rows($adminBookQuery);
if($rowsSize>0){
    $count = $rowsSize;
}
else {
    "";
}
// print_r($count);

include "includes/headers/admin-header.php";

//form, search and datalist by login
if(isset($_GET['new']) or isset($_GET['edit'])){
    include "manager/admin-booking/form.php";
}else {
    include "manager/admin-booking/search.php";
    include "manager/admin-booking/datalist.php";
}

?>


<?php 
include "includes/footer.php";

?>