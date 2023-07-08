<?php
global $conn;
include "frontend/includes/header.php";
$tablename = "booking";
if(isset($_GET['oid'])){
    $pid = $_GET['oid'];
    var_dump($pid);
    $bookFinalSql = "UPDATE $tablename SET status = '1' WHERE package_id = '$pid'";
    var_dump($bookFinalSql);
    $bookFinalQuery = mysqli_query($conn,$bookFinalSql);
}
?>

<div class="container" xmlns="http://www.w3.org/1999/html">
    <strong></strong> <p class="text-center text-info after-book-info">
        Thank you for investing your precious time and money on our tour package. You can view your package details from dashboard
    </p></strong>
    <a href="backend/booking.php" class="btn btn-primary bookDashboard">Go to dashboard</a>
</div>

<?php include "frontend/includes/footer.php"?>
