<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Packages Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Package Name</th>
                            <th>Package Description</th>
                            <th>Image</th>
                            <th>Posted Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>SN</th>
                            <th>Package Name</th>
                            <th>Package Description</th>
                            <th>Image</th>
                            <th>Posted Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                            $sn = 1;
                            // var_dump($sql);
                            while($row=mysqli_fetch_assoc($query)){
                            ?>
                        <tr>
                            <td><?php echo $sn++?></td>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['image']?></td>
                            <td><?php echo $row['postdate']?></td>
                            <td><a href="?status=<?php echo $row['id']; ?>" 
                                    style="color:<?php echo $row['status'] ? 'green' : 'red'; ?>" 
                                    onclick="return confirm('Are you sure to change the status of this item?')"> 
                                    <?php echo $row['status'] ? 'Active' : 'In-Active'; ?></a></a> </td>
                                <td>
                                    <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete the item?')" class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Delete</a>
                                    <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->