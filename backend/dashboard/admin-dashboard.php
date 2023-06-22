<?php
global $username;
//include "includes/session.php";
$type = "index";
include "includes/headers/admin-header.php";

include "includes/counter.php";

?>

<!-- Content Wrapper -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h1 mb-0 text-gray-800 text-center">Hello <?php echo ucfirst($username) ?>, Welcome to your admin dashboard</h1>
    </div>

    <h4 class="h4 text-dark">Here are the total numbers of users, posts and bookings</h4>

    <!-- Content Row -->
    <div class="row">
        <!-- Bookings -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Bookings
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo ( $total ); ?></div>
                                    <a href="admin-booking.php">View all bookings</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-800"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $uTotal; ?></div>
                            <a href="users.php">View all users</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-800"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Posts -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $postsTotal; ?></div>
                            <a href="posts.php">View all posts</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-800"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php

// include "includes/footer.php";

?>