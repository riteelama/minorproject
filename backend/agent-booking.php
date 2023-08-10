<?php 
include "includes/session.php";
$type = "agent-booking";
// $tablename = "$type";

include "includes/dbconfig.php";

$limit = 3;
$imagePath = "../uploads/images/";

$userEmail = $_SESSION['loginAccess'];
$userSql = "SELECT * FROM users WHERE email = '$userEmail'";
// var_dump($userSql);
$userQuery = mysqli_query($conn,$userSql);
$userRow = mysqli_fetch_assoc($userQuery);
$user_id = $userRow['id'];

//to check the user id
if(isset($_SESSION['loginAccess'])){
    $email = $_SESSION['loginAccess'];   
    $sql = "SELECT booking.id As booking_id, booking.booked_for AS booked_date, booking.total_amount AS total_amount, booking.user_name AS cust_name, booking.status AS status, packages.id, packages.name AS package_name FROM booking 
    JOIN packages ON booking.package_id = packages.id JOIN users ON packages.user_id_packages = users.id WHERE users.role_id=2 AND users.id=$user_id";
    $queryBookDetails = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($queryBookDetails);
    // var_dump($count);
    // var_dump($sql);
}





//to delete record
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM booking WHERE id = '$id'"; 
    // var_dump($sql);   
    $query = mysqli_query($conn,$sql);
    // echo $query.mysqli_error($conn);
    if($query){
        $msg = "Package has been deleted successfully.";
    }
    else {
        $msg = "Package can't be deleted. Mysql says: ".mysqli_error($conn);
    }
}

// to view booking details

if(isset($_GET['view'])){
    $id = $_GET['view'];
    $sql = "SELECT * FROM $tablename WHERE id = '$id'";
    // var_dump($sql); 
    $query = mysqli_query($conn,$sql);
    $packageView = mysqli_fetch_assoc($query);
    $count = mysqli_num_rows($query);
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
    $sql = "UPDATE booking SET status = !status WHERE id = '$id'";
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
}


// echo $count;

include "includes/headers/agent-header.php";

//form, search and datalist by login
if(isset($_GET['view'])){
    include "manager/$type/view.php";
}
else if(isset($_GET['print'])){
    include "manager/$type/print.php";
}
else {
    include "manager/$type/search.php";
    include "manager/$type/datalist.php";
}

?>


<?php 
include "includes/footer.php";

?>