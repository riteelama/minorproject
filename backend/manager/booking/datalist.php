<!-- <body id="page-top"> -->

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Booked Packages</h6>
            </div>
            <div class="card-body">
                <div>

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead class="thead-dark">

                                    <tr role="row">
                                        <th name="id">S.N.</th>
                                        <th name="name">Package Name</th>
                                        <!-- <th name="excerpt">Customer User Name</th> -->
                                        <th name="status">Status</th>
                                        <th name="action" colspan="2">Action</th>
                                    </tr>
                                    <?php
                                    if ($count > 0) {
                                        // var_dump($sql);
                                        //     var_dump($queryBook);
                                        $sn = 1;
                                        
                                        while ($row = mysqli_fetch_assoc($bookQuery)) {

                                    ?>
                                </thead>

                                <tbody>

                                    <tr>
                                    
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $row['package_name'];?></td>
                                        <td style="color:<?php echo $row['status'] ? 'green' : 'red'; ?>"><?php echo $row['status'] ? 'Approved' : 'Not Approved'; ?></a> </td>
                                        <td>
                                            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger btn-block"><i class="fas fa-trash-alt"></i> Cancel</a>
                                        </td>
                                        <td>
                                        <a class="btn btn-danger btn-block" href="?view=<?php echo $row['id'];?>"><i class="fas fa-trash-alt"></i> View</a>
                                        </td>
                                        </td>
                                    </tr>
                                <?php
                                        } //end of while loop

                                    } else {
                                ?>
                                <tr>
                                    <td colspan="8">No data found</td>
                                </tr>
                                </tbody>
                            <?php } ?>
                            <tr>
                                <!--pagging-->

                                <!-- <td colspan="9" align="center">
                                    <?php
                                    // include "includes/pagination.php"; 
                                    ?>
                                    </div>  -->
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