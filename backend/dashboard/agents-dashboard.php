<?php
// include "includes/session.php";
// $type = "index";
include "includes/headers/agent-header.php";
include "includes/other-counter.php";
?>

<!-- Content Wrapper -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">Welcome <?php echo ucfirst($userRows['username']); ?>, This is your admin dashboard.</h1>
    </div>

    <!-- Content Row -->

    <div class="row">
        <!-- Packages -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 text-lg font-weight-bold text-success">Packages</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <p class="text-secondary font-weight-bold">Total Packages: <span class="text-dark"><?php echo $packsTotal;?></span></p>
                    <a href="packages.php">View All Packages</a>
                </div>
            </div>
        </div>

        <!-- Posts -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 text-lg font-weight-bold text-warning">Posts</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p class="text-info text-lg font-weight-bold">Total Posts: <span class="text-dark"><?php echo $postTotal;?></span></p>
                    <a href="posts.php">View your all posts</a>
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
</div>

<?php

// include "includes/footer.php";

?>