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
                            <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered" width="100%" cellspacing="0" role="grid" style="width: 100%;">
                                    <thead>
                                    <?php 
                                        if($count>0){
                                    ?>
                                        <tr role="row">
                                            <th rowspan="1" colspan="1" style="width: 194px;" name="id">SN</th>
                                            <th rowspan="1" colspan="1" style="width: 296px;" name="category_id">Category</th>
                                            <th rowspan="1" colspan="1" style="width: 133px;" name="title">Title</th>
                                            <th rowspan="1" colspan="1" style="width: 66px;" name="url">URL</th>
                                            <th rowspan="1" colspan="2" style="width: 120px; text-align:center" name="status">Status</th>
                                            <th rowspan="1" colspan="2" style="width: 120px; text-align:center" name="action">Action</th>
                                        </tr>
                                            <?php 
                                            $sn = 1;
                                                while($row = mysqli_fetch_assoc($query)){
                                            ?>    
                                    </thead>
                                    <tbody>
                                        
                                    <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo getCatTitle($row['category_id']);?></td>
                                            <td><?php echo $row['title'];?></td>
                                            <td><?php echo $row['url'];?></td>
                                            <td><a href="?status=<?php echo $row['id']; ?>" style ="color:<?php echo $row['status']?'green' : 'red'; ?>"onclick="return confirm('Are you sure to change the status of this item?')"> <?php echo $row['status']?'Active' : 'In-Active';?></a>  </td>
                                            <td colspan="2">
                                            <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-success btn-block">Edit</a>
                                            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger btn-block">Delete</a>
                                            <a href="?view=<?php echo $row['id']; ?>" class="btn btn-secondary btn-block">View</a>
                                        </td>
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
                                            
                                        <td colspan="8" align="center">
                                            <?php include "includes/pagination.php"; ?>
                                            <!-- <div class="pagination">
                                                <div class="float-left">
                                                    Showing <php echo $start+1;?></php>-2 of 
                                                    <?php 
                                                    // echo $totalPage;?> 
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






