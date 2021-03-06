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
                    <h6 class="m-0 font-weight-bold text-primary">All Packages</h6>
                </div>
                <div class="card-body">
                    <h6 class ="mb-3 font-weight-bold text-danger"><?php echo isset($error)?$error:'';?></h6>
                    <!-- <div class="table-responsive"> -->
                        <div>
                            
                            <div class="row">
                                <div class="col-sm-12"><table class="table" width="100%" cellspacing="0" role="grid" style="width: 100%;">
                            <thead class="thead-dark">
                          
                                <tr role="row">
                                    <th name="id">SN</th>
                                    <th name="name">Name</th>
                                    <th name="excerpt">Excerpt</th>
                                    <th name="price">Price</th>
                                    <th name="image">Image</th>
                                    <th name="postdate">Postdate</th>
                                    <th name="status">Status</th>
                                    <th name="action">Action</th>
                                </tr>
                                <?php 
                                    if($count>0){
    
                                    $sn = 1;
                                        while($row = mysqli_fetch_assoc($packQuery)){
                                    ?>    
                            </thead>
                            <!-- <tfoot>
                                <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                            </tfoot> -->
                            <tbody>
                                
                            <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td width="400px"><?php echo $row['excerpt'];?></td>
                                    <td><?php echo $row['price'];?></td>
                                    <td><?php echo $row['image'];?></td>
                                    <td><?php echo $row['postdate'];?>
                                    <td><a href="?status=<?php echo $row['id']; ?>" style ="color:<?php echo $row['status']?'green' : 'red'; ?>"onclick="return confirm('Are you sure to change the status of this item?')"> <?php echo $row['status']?'Active' : 'In-Active';?></a>  </td>
                                    <td colspan="2">
                                        <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-success" name="save"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
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
                                    <td></td> -->
                            </tr>                          
                            </tbody>
                            <?php } ?>
                            <tr>
                                <!--pagging-->
<!--                                     
                                <td colspan="9" align="center">
                                    <?php 
                                    // include "includes/pagination.php"; ?>
                                    </div> 
                                </td> -->
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