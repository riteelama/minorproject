<?php 
// include "includes/session.php";
// $type = "index";
include "includes/headers/agent-header.php";

?>

<!-- Content Wrapper -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
            <h1 class="h3 mb-0 text-gray-800">Agents Dashboard</h1>
        </div>
        
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">View your packages</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <a href="packages.php" class="text-dark">Packages</a>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Your posts title</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <a href="posts.php" class="text-dark">Posts</a>
                    </div>
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