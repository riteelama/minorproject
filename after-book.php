<?php
global $conn;
include "frontend/includes/header.php";

if(isset($_GET['next'])){
    $pid = $_GET['next'];
}

$bookingDetail = "SELECT * FROM booking Where package_id = '$pid'";
//var_dump($bookingDetail);
$bookingQuery = mysqli_query($conn,$bookingDetail);

$bookingDetailData = mysqli_fetch_assoc($bookingQuery);
$totalPrice = $bookingDetailData['total_amount'];
var_dump($totalPrice);
?>
    <div class="container" xmlns="http://www.w3.org/1999/html">
           <strong></strong> <p class="text-center text-info after-book-info">
                Thank you for filling up the package booking details. Your package will be booked completed once you
                complete the payment process.
        </p></strong>
        <form action="https://uat.esewa.com.np/epay/main" method="POST">
            <input value="<?php echo $totalPrice?>" name="tAmt" type="text">
            <input value="<?php echo $totalPrice?>" name="amt" type="text">
            <input value="0" name="txAmt" type="hidden">
            <input value="0" name="psc" type="hidden">
            <input value="0" name="pdc" type="hidden">
            <input value="EPAYTEST" name="scd" type="hidden">
            <input value="<?php echo $pid?>" name="pid" type="text">
            <input value="http://localhost/minorproject/esewa_payment_success.php?q=su" type="hidden" name="su">
            <input value="http://localhost/minorproject/esewa_payment_failed.php?q=fu" type="hidden" name="fu">
            <button type="submit" class="btn btn-success bookFormSubmit">Pay with <img src="https://esewa.com.np/common/images/esewa_logo.png"></button>
        </form>
<!--            <button type="submit" class="btn btn-success bookFormSubmit" name="payesewa">Pay with <img-->
<!--                    src="https://esewa.com.np/common/images/esewa_logo.png"></button>-->
    </div>
<?php include "frontend/includes/footer.php" ?>