<?php
$email = $_SESSION['loginAccess'];
$sql = "SELECT * FROM users WHERE email='$email'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$role = $row["role_id"];

$role_sql = "SELECT * FROM roles WHERE id = '$role'";
$role_query = mysqli_query($conn,$role_sql);
$role_row = mysqli_fetch_assoc($role_query);
?>
<!-- <body id="page-top"> -->
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4 container">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Your Details</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img src="../uploads/images/<?php echo $row['profile_picture']?>" alt="profile picture of <?php echo $row['username']?>" height="200px" width="200px" style="border-radius:20%;">
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Full Name</th>
                            <td><?php echo $row['fullname']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Username</th>
                            <td><?php echo $row['username']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><?php echo $row['email']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td><?php echo $row['address']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Role</th>
                            <td><?php echo $role_row['name']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td><?php echo $row['phoneno']?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>