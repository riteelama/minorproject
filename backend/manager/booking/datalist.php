<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Your Booked packeges details</h6>
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
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                        <?php 
                            $sn = 1;
                            // var_dump($queryBookDetails);
                            while($row=mysqli_fetch_assoc($bookQuery)){
                            ?>
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $row['package_name']?></td>
                                <td><?php echo $row['booked_for']?></td>
                                <td><?php echo $row['total_amount']?></td>
                                <td style="color:<?php echo $row['status'] ? 'green' : 'red'; ?>"><?php echo $row['status'] ? 'Approved' : 'Pending Approval'; ?></td>
                                <td>
                                    <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to cancel the booking?')" class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Cancel Booking</a>
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