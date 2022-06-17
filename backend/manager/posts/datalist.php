<!-- <body id="page-top"> -->

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
            </div>
            <div class="card-body">
                <h6 class="mb-3 font-weight-bold text-danger"><?php echo isset($error) ? $error : ''; ?></h6>
                <div class="table-responsive">
                    <div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table" width="100%" cellspacing="0" role="grid" style="width: 100%;">
                                    <thead class="thead-dark">
                                        <?php
                                        if ($count > 0) {
                                        ?>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1" style="width: 50px;" name="id">ID</th>
                                                <th rowspan="1" colspan="1" style="width: 200px;" name="name">Name</th>
                                                <th rowspan="1" colspan="1" style="width: 400px;" name="description">Description</th>
                                                <th rowspan="1" colspan="1" style="width: 141px;" name="image">Image</th>
                                                <th rowspan="1" colspan="1" style="width: 141px;" name="postdate">Postdate</th>
                                                <th rowspan="1" colspan="2" style="width: 120px; text-align:center" name="status">Status</th>
                                                <th rowspan="1" colspan="2" style="width: 120px; text-align:center" name="action">Action</th>
                                            </tr>
                                            <?php
                                            $sn = 1;
                                            while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['image']; ?></td>
                                            <td><?php echo $row['postdate']; ?>
                                            <td><a href="?status=<?php echo $row['id']; ?>" style="color:<?php echo $row['status'] ? 'green' : 'red'; ?>" onclick="return confirm('Are you sure to change the status of this item?')"> <?php echo $row['status'] ? 'Active' : 'In-Active'; ?></a> </td>
                                            <td colspan="2">
                                                <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-success btn-block" name="save"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger btn-block"><i class="fas fa-trash-alt"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                            } //end of while loop

                                        } else {
                                    ?>
                                    <tr>
                                        <td colspan="8">Sorry, No posts found</td>
                                    </tr>
                                    </tbody>
                                <?php } ?>
                                <tr>
                                    <!--pagging-->

                                    <!-- <td colspan="8" align="center">
                                        <?php 
                                        // include "includes/pagination.php"; ?>
                                             <?php
                                            //   echo $totalPage; ?> 
                                    </td> -->
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