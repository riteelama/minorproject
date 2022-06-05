<?php 
// include "includes/session.php";
$type = "index";
include "includes/headers/admin-header.php";

?>

        <!-- Content Wrapper -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <h2 class="text-primary">Hello there, Welcome to the Admin dashboard</h2>

        <!-- Package Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">View all Users</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <a href="users.php" class="text-dark">Users</a>
                </div>
            </div>
        </div>

        <!-- Bookings -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">View all bookings</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <a href="admin-booking.php" class="text-dark">All Bookings</a>
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

</div>
<?php 

// include "includes/footer.php";

?>