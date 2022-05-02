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
                    <h6 class="m-0 font-weight-bold text-primary">All <?php echo ucfirst($type);?></h6>
                </div>
                <div class="card-body">
                    <h6 class ="mb-3 font-weight-bold text-danger"><?php echo isset($error)?$error:'';?></h6>
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                            <?php 
                               
                            ?>
                                <tr role="row">
                                    <th name="id">ID</th>
                                    <th name="title">Title</th>
                                    <th name="description">Description</th>
                                    <th name="postdate">Postdate</th>
                                    <th name="status">Status</th>
                                    <th name="action">Action</th>
                                </tr>
                                    <?php 
                                     if($count>0){
                                    $sn = 1;
                                        while($row = mysqli_fetch_assoc($query)){
                                    ?>    
                            </thead>

                            <tbody>
                                
                            <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title'];?></td>
                                    <td><?php echo $row['description'];?></td>
                                    <td><?php echo $row['postdate'];?>
                                   <td align="center"><a href="?status=<?php echo $row['id']; ?>" style ="color:<?php echo $row['status']?'green' : 'red'; ?>"onclick="return confirm('Are you sure to change the status of this item?')"> <?php echo $row['status']?'Active' : 'In-Active';?></a>  </td>
                                    <td colspan="2">
                                        <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-success btn-block" name="save">Edit</a>
                                        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger btn-block">Delete</a>
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
                                    
                                <td colspan="9" align="center">
                                    <?php include "includes/pagination.php"; ?>
                                    </div> 
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






