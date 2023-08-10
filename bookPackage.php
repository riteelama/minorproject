<?php
global $conn;
//include "frontend/includes/dbconfig.php";
//include "frontend/includes/session.php";
include "frontend/includes/header.php";
global $tablename;
$tablename = "booking";

if (!isset($_SESSION['loginAccess'])) {
    header("backend/login.php");
} else {
    if (isset($_GET['book'])) {
        $packageid = $_GET['book'];

        $packageDetailSql = "SELECT * FROM packages WHERE id = '$packageid'";
//        var_dump($packageDetailSql);
        $packageDetailQuery = mysqli_query($conn, $packageDetailSql);
        $packageDetailsRow = mysqli_fetch_assoc($packageDetailQuery);
        $packageName = $packageDetailsRow['name'];
        $packagePrice = $packageDetailsRow['price'];
    }
    $email = $_SESSION['loginAccess'];
    $userDetailsSql = "SELECT * FROM users WHERE email = '$email'";
    $userDetailsQuery = mysqli_query($conn, $userDetailsSql);
    $userDetailRows = mysqli_fetch_assoc($userDetailsQuery);
    $userId = $userDetailRows['id'];
    $username = $userDetailRows['username'];
    $status = 0;
}

if (isset($_POST['save'])) {
    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $adultPrice = number_format($packagePrice) * $adult;
//    echo gettype($adultPrice);
    $childPrice = number_format($packagePrice) / 2 * $child;
    $totalPrice = $adultPrice + $childPrice;
//    var_dump($totalPrice);
    $bookedDate = $_POST['bookedfor'];

    $bookInsertSql = "INSERT INTO $tablename(package_id,package_name,booked_for,children_count,adult_count,total_amount,user_custid,user_name,status) VALUES ('$packageid','$packageName','$bookedDate',$child,'$adult','$totalPrice','$userId','$username','$status')";
    $bookInsertQuery = mysqli_query($conn, $bookInsertSql);
//    var_dump($bookInsertSql);
}
?>

    <section class="container card mx-6 col-md-8 bookingForm">
        <div class="card-header text-center">
            <h1>Booking Form</h1>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="packagename">Package Name</label>
                    <input type="text" class="form-control" id="packagename" value="<?php echo $packageName ?>">
                </div>

                <div class="form-group">
                    <label for="date">Book For</label>
                    <input type="date" class="form-control" id="date" type="text" name="bookedfor">
                </div>

                <div class="form-group" style="width:100%">
                    <label for="adult" style="margin-right:3rem">Number of adult</label>
                    <input class="form-control" id="adult" type="number" name="adult" min="1" max="500">
                </div>
                <div class="form-group">
                    <label for="child" style="margin-right:3rem">Number of child</label>
                    <input class="form-control" id="child" type="number" name="child" min="1" max="500">
                </div>
        </div>
        <!--        <div class="form-group">-->
        <!--            <label for="totalprice">Total Price</label>-->
        <!--            <input type="text" class="form-control" id="totalprice" name = "totalprice" value="-->
        <?php //echo $totalPrice;?><!--">-->
        <!--        </div>-->
        <!--        <button type="submit" class="btn btn-secondary"  name="payesewa" style="width: 25%; margin: auto; margin-bottom:2rem; background: #54B4D3">Book Now</button>-->
        <!--        <button type="submit" class="btn btn-secondary"  name="payesewa" style="width: 25%; margin: auto; margin-bottom:2rem; background: #54B4D3">Book Now</button>-->
        <div class="d-flex justify-content-md-end mb-3">
            <button class="btn btn-primary mr-4" name="save">Save</button>
            <a href="after-book.php?next=<?php echo $packageid;?>" class="btn btn-primary">Next</a>
        </div>
        </div>
    </section>

<?php include "frontend/includes/footer.php" ?>