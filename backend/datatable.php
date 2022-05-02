<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SERVER SIDE DATATABLE CRUD OPERATION</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
 </head>
<body>
<h1 class="text-center">Datatable CRUD</h1>
<?php include "connection.php";?>
<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<table id = "datatable" class="table">
						
						<thead>
							<th>
								SNO.
							</th>
							<th>
								Username
							</th>
							<th>
								Email
							</th>
							<th>
								Mobile
							</th>
							<th>
								City
							</th>
							<th>
								Options
							</th>
						</thead>
							
						<tbody>
							<?php 
							include('connection.php');

							$sql = "SELECT * FROM users";
							$query = mysqli_query($conn,$sql);
							$nums = mysqli_num_rows($query);

							while(
							$res = mysqli_fetch_array($query)):
							?>
								<tr>
								<td><?php echo $res['id'];?></td>
								<td><?php echo $res['fullname'];?></td>
								<td><?php echo $res['email'];?></td>
								<td><?php echo $res['address'];?></td>
								<td><?php echo $res['role_id'];?></td>
								<td><a class="btn" href="">Edit</a><a href="">Delete</a></td>
							</tr>
							?>
							<?php endwhile; ?>
				
						</tbody>
					</table>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
} );
</script>
</body>
</html>