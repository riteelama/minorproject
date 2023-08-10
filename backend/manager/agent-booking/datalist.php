<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Your Bookes packeges details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Package Name</th>
                            <th>Package Booked Date</th>
                            <th>Total Amount</th>
                            <th>Booked By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                            <th>S.N.</th>
                            <th>Package Name</th>
                            <th>Package Booked Date</th>
                            <th>Total Amount</th>
                            <th>Booked By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                        <?php 
                            $sn = 1;
                            // var_dump($queryBookDetails);
                            while($row=mysqli_fetch_assoc($queryBookDetails)){
                            ?>
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $row['package_name']?></td>
                                <td><?php echo $row['booked_date']?></td>
                                <td><?php echo $row['total_amount']?></td>
                                <td><?php echo $row['cust_name']?></td>
                                <td><a href="?status=<?php echo $row['booking_id']; ?>" 
                                    style="color:<?php echo $row['status'] ? 'green' : 'red'; ?>" 
                                    onclick="return confirm('Are you sure to change the status of this item?')"> 
                                    <?php echo $row['status'] ? 'Approved' : 'Pending Approval'; ?></a></a> </td>
                                <td>
                                    <a href="?delete=<?php echo $row['booking_id']; ?>" onclick="return confirm('Are you sure to change the status to complete. Once you click on ok bitton item will be removed from your table?')" class="btn btn-danger btn-block"><i class="fas fa-check-circle"></i> Complete</a>
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