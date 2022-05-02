<!-- <body id="page-top"> -->

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        
                        <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                        <?php 
                            if($count>0){
                        ?>
                            <tr role="row">
                                <th name="id">SN</th>
                                <th name="fullname">Full Name</th>
                                <th name="username">Username</th>
                                <th name="email">Email</th>
                                <th name="phoneno">Phoneno</th>
                                <th name="address">Address</th>
                                <th name="role_id">Role ID</th>
                                <th name="status">Status</th>
                                <th name="action">Action</th>
                            </tr>

                                <?php 
                                $sn = 1;
                                    while($row = mysqli_fetch_assoc($query)){
                                ?>    
                        </thead>
                        <!-- <tfoot>
                            <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                        </tfoot> -->
                        <tbody>
                            
                        <tr>
                                <td ><?php echo $sn++; ?></td>
                                <td><?php echo $row['fullname'];?></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['phoneno'];?></td>
                                <td><?php echo $row['address'];?></td>
                                <td><?php echo $row['role_id'];?></td>
                                <td><a href="?status=<?php echo $row['id']; ?>" style ="color:<?php echo $row['status']?'green' : 'red'; ?>"onclick="return confirm('Are you sure to change the status of this item?')"> <?php echo $row['status']?'Active' : 'In-Active';?></a>  </td>
                                <td colspan="2">
                                <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-success btn-block" name="edit">Edit</a>
                                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger btn-block" name="delete">Delete</a>
                            </td>
                                </td>
                        </tr>
                        <?php
                            }//end of while loop
                        
                            }else{
                        ?>                        
                        </tbody>
                        <?php } ?>
                        <tr>
                            <!--pagging-->
                                
                            <td colspan="8" align="center">
                                <?php include "includes/pagination.php"; ?>

                                <tr>
                                <td colspan="10">No records Found</td>
                                </tr>
                                <!-- <div class="pagination">
                                    <div class="float-left">
                                        Showing <php echo $start+1;?></php>-2 of <?php echo $totalPage;?> 
                                    </div>
                                </div> -->
                            </td>
                        </tr>
                    </table>
                </div>
                </div>

                
                
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->






