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
            <h6 class ="mb-3 font-weight-bold text-danger"><?php echo isset($error)?$error:'';?></h6>                       
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table" width="100%" cellspacing="0" role="grid" style="width: 100%; margin-left:auto;margin-right:auto; ">
                    <thead class="thead-dark">
                    <?php 
                        if($count>0){
                    ?>
                        <tr role="row">
                            <th rowspan="1" colspan="1" style="width: 60px;" name="id">ID</th>
                            <th rowspan="1" colspan="1" style="width: 710px;" name="comments">Comments</th>
                            <th rowspan="1" colspan="1" style="width: 190px;" name="postdate">Postdate</th>
                            <th rowspan="1" colspan="2" style="width: 120px; text-align:center" name="action">Action</th>
                        </tr>
                            <?php 
                            $sn = 1;
                            // var_dump($commSql);
                                while($row = mysqli_fetch_assoc($commQuery)){
                                    
                            ?>    
                    </thead>

                    <tbody>
                        
                    <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $row['comments'];?></td>
                            <td><?php echo $row['postdate'];?>
                            <td colspan="2" class="mx-auto">
                                <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-success btn-lg" name="save"><i class="fas fa-edit"></i> Edit</a>
                                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger btn-lg"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                    </tr>
                    <?php
                        }//end of while loop
                    
                        }else{
                    ?>
                    <tr>
                            <td colspan="8">No comments found</td>
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
                            <?php 
                            include "includes/pagination.php"; 
                            ?>
                        </td>
                    </tr>
                </table>
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






