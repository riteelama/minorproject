<!-- <body id="page-top"> -->

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Packages</h6>
                </div>
                <div class="card-body">
                    <h6 class ="mb-3 font-weight-bold text-danger"><?php echo isset($error)?$error:'';?></h6>
                    <!-- <div class="table-responsive"> -->
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            
                            <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                          
                                <tr role="row">
                                    <th name="id">S.N.</th>
                                    <th name="name">Package Name</th>
                                    <th name="excerpt">Customer User Name</th>
                                    <th name="status">Status</th>
                                    <th name="action">Action</th>
                                </tr>
                                <?php 
                                    if($count>0){
    
                                    $sn = 1;
                                        while($row = mysqli_fetch_assoc($query)){
                                            // var_dump($sql);
                                    ?>    
                            </thead>
                           
                            <tbody>
                                
                            <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $row['package_name'];?></td>
                                    <td><?php echo $row['user_name'];?></td>
                                    <td style ="color:<?php echo $row['status']?'green' : 'red'; ?>"><?php echo $row['status']?'Approved' : 'Not Approved';?></a>  </td>
                                    <td colspan="2">
                                        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger btn-block">Cancel</a>
                                    </td>
                            </tr>
                            <?php
                                }//end of while loop
                            
                            }else{
                            ?>
                            <tr>
                                    <td colspan="8">No data found</td>
                                    <!-- <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                            </tr> 
                            </tbody>
                            <!-- <?php } ?> -->
                            <tr>
                                <!--pagging-->
                                    
                                <!-- <td colspan="9" align="center">
                                    <?php 
                                    // include "includes/pagination.php"; ?>
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