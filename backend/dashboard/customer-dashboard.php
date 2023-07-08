<?php
// include "includes/session.php";
// $type = "index";
include "includes/headers/customer-header.php";
include "includes/other-counter.php";

?>

<!-- Content Wrapper -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="../index.php" class="mt-3"> &larr; Go back to homepage</a>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">Hello, <?php echo ucfirst($userRows['username']); ?> Welcome to your
            dashboard</h1>

    </div>

    <!-- Content Row -->

    <div class="row ml-5">
        <!-- Booked Packages -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-base font-weight-bold text-success text-uppercase mb-1">
                                Booked Packages
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $bookPacksTotal; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-600"></i>
                        </div>
                        <a href="booking.php">View all booked packages</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Post Posted -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-base font-weight-bold text-info text-uppercase mb-1">
                                Your Posts
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $postTotal; ?></div>
                            <a href="posts.php">View your all posts</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments done -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-base font-weight-bold text-warning text-uppercase mb-1">
                                Your Comments
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $commTotal; ?></div>
                            <a href="comments.php">View your all comments</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>