<?php
// include "includes/header.php";
$email = $_SESSION['loginAccess'];
$userSql = "SELECT * FROM users WHERE email = '$email'";
$userQuery = mysqli_query($conn, $userSql);
$userRow = mysqli_fetch_assoc($userQuery);
$username = $userRow['username'];
// var_dump($username);
$user_id = $userRow['id'];
// var_dump($user_id);
$sql = "SELECT * FROM packages";
$query = mysqli_query($conn, $sql);
$check = mysqli_num_rows($query) > 0;
$row = mysqli_fetch_assoc($query);
// $row = mysqli_fetch_assoc($query);
// $package_id = $row['id'];

// echo $count;
?>
<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<div id="wrapper">

	<!-- Begin Page Content -->
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Available Packages</h1>
			</div>
		</div>

		<div class="row mt-4">
			<?php
			if ($check) {
				while ($row = mysqli_fetch_array($query)) {
			?>
					<div class="col-md-4 mt-3">
						<div class="card">
							<form method="post">
							<div class="card-body">
								<img src="../uploads/images/<?php echo $row['image'] ?>" class="card-img-top" alt="image of different packages">
								<h2 class="card-title"><?php echo $row['name']; ?></h2>
								<p class="card-text">
									<?php echo $row['excerpt'] ?>
								</p>
								<p class="card-text">
									<?php echo $row['price']; ?>
								</p>
								<button class="btn btn-success btn-block" name="book" onclick="alert('You booking has been done successfully, please contact to respective agents or agency and complete the payment process. Once payment is completed your booking will be approved')">Book Now</button>
								<input type="hidden" name="package_id" value="<?php echo $row['id'];?>">
								<input type="hidden" name="package_name" value="<?php echo $row['name'];?>">
								<input type="hidden" name="user_custid" value="<?php echo $user_id;?>">
								<input type="hidden" name="user_name" value="<?php echo $username;?>">
							</div>
							</form>
						</div>
					</div>
			<?php
				}
			} else {
				echo "Sorry, Currently packages are not available";
			}
			?>
		</div>
	</div>
</div>