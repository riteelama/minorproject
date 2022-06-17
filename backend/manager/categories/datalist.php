<!-- <body id="page-top"> -->

    <!-- Page Wrapper -->
        <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All <?php echo ucfirst($type);?></h6>
                </div>
                <div class="card-body">
                        <div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table" width="100%" cellspacing="0" role="grid" style="width: 100%;">
                            <thead class="thead-dark">
                            <?php 
                               
                            ?>
                                <tr role="row">
                                    <th name="id">S.N.</th>
                                    <th name="title">Title</th>
                                    <th name="description" width="400px">Description</th>
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
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $row['title'];?></td>
                                    <td><?php echo $row['description'];?></td>
                                    <td><?php echo $row['postdate'];?>
                                   <td align="center"><a href="?status=<?php echo $row['id']; ?>" style ="color:<?php echo $row['status']?'green' : 'red'; ?>"onclick="return confirm('Are you sure to change the status of this item?')"> <?php echo $row['status']?'Active' : 'In-Active';?></a>  </td>
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