<?php 
	
	require_once "vendor/autoload.php";

	//Class use
	use App\Controller\Staff;

	//class instance
	$staff = new Staff;


	//Data delete
	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];

		$mess = $staff -> deleteStaff($id);
	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table shadow">
		<a class="btn btn-primary btn-sm" href="index.php">Home</a>
		<a class="btn btn-primary btn-sm" href="teacherData.php">All Teachers Data</a>
		<a class="btn btn-primary btn-sm" href="staffData.php">All Staffs Data</a>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
				<?php 

					if (isset($mess)) {
						echo $mess;
					}

				 ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 

							$data= $staff -> allStaff();

							$i =1;

							while ( $staff_data = $data -> fetch_assoc() ) :
						 ?>

						<tr>
							<td><?php echo $i; $i++; ?></td>
							<td><?php echo $staff_data ['name']; ?></td>
							<td><?php echo $staff_data ['email']; ?></td>
							<td><?php echo $staff_data ['cell']; ?></td>
							<td><img src="media/img/students/<?php echo $staff_data ['photo'];?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="single-data-view.php?view_staf=<?php echo $staff_data ['id']; ?>">View</a>
								<a class="btn btn-sm btn-warning" href="edit_user.php?edit_staf=<?php echo $staff_data ['id']; ?>">Edit</a>
								<a class="btn btn-sm btn-danger" href="?delete=<?php echo $staff_data ['id']; ?>">Delete</a>
							</td>
						</tr>

					<?php endwhile; ?>
						

					</tbody>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>