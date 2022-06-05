<?php 
// include "includes/session.php";
// $type = "index";
include "includes/headers/customer-header.php";

?>

<!-- Content Wrapper -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        
        <h1 class="h3 mb-0 text-gray-800">Customer Dashboard</h1>
       
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Package Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">View your booked Packages</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <a href="booking.php" class="text-dark">Your Booking</a>
                </div>
            </div>
        </div>

        <!-- Comment -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">View your comments</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <a href="comments.php" class="text-dark">Your Comments</a>
                </div>
            </div>
        </div>

        <!-- Posts -->
        <div class="col-xl-4 col-lg-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">View your Posts</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <a href="posts.php" class="text-dark">Your posts</a>
                </div>
            </div>
        </div>
    </div>
<?php 

// include "includes/footer.php";

?>