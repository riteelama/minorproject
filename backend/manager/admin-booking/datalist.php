<!-- <body id="page-top"> -->

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Booked Packages</h6>
            </div>
            <div class="card-body">
                <h6 class="mb-3 font-weight-bold text-danger"><?php echo isset($error) ? $error : ''; ?></h6>
                <!-- <div class="table-responsive"> -->
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table" width="100%" cellspacing="0" role="grid" style="width: 100%;">
                            <thead>

                                <tr role="row">
                                    <th name="sn">S.N.</th>
                                    <th name="name">Package Name</th>
                                    <th name="excerpt">Booked by</th>
                                    <th name="status">Status</th>
                                    <th name="action">Action</th>
                                </tr>
                                <?php


                                $sn = 1;
                                while ($row = mysqli_fetch_assoc($adminBookQuery)) {
                                ?>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $sn++ ?></td>
                                    <td><?php echo $row['package_name']; ?></td>
                                    <td><?php echo $row['user_name']; ?>
                                    <td align="center"><a href="?status=<?php echo $row['id']; ?>" 
                                    style="color:<?php echo $row['status'] ? 'green' : 'red'; ?>" 
                                    onclick="return confirm('Are you sure to change the status of this item?')"> 
                                    <?php echo $row['status'] ? 'Approved' : 'Pending Approval'; ?></a> </td>
                                    <td class="mx-auto">
                                        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger btn-md btn-block"><i class="fas fa-trash-alt"></i> Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                        <tr>
                            <!--pagging-->

                            <td colspan="9" align="center">
                                <?php include "includes/pagination.php"; ?>
                    </div>
                    </td>
                    </tr>

                </div>
                </td>
                </tr>
                </table>
            </div>
        </div>


        <!-- </div> -->
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->