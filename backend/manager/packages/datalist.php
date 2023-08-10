<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Your packages details</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Package Name</th>
                        <th>Excerpt</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Posted Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>S.N.</th>
                    <th>Package Name</th>
                    <th>Excerpt</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Posted Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php 
                        $sn = 1;
                        // var_dump($queryBookDetails);
                        while($row=mysqli_fetch_assoc($packQuery)){
                        ?>
                        <tr>
                            <td><?php echo $sn++;?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['excerpt']?></td>
                            <td><?php echo $row['price']?></td>
                            <td><?php echo $row['image']?></td>
                            <td><?php echo $row['postdate']?></td>
                            <td><a href="?status=<?php echo $row['id']; ?>" 
                                style="color:<?php echo $row['status'] ? 'green' : 'red'; ?>" 
                                onclick="return confirm('Are you sure to change the status of this item?')"> 
                                <?php echo $row['status'] ? 'Approved' : 'Pending Approval'; ?></a></a> </td>
                            <td>
                                <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Edit</a>
                                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Delete</a>
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