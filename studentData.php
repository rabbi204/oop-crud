<?php 
	
	require_once "vendor/autoload.php";

	//Class use
	use App\Controller\Student;

	//class instance
	$student = new Student;


	//Data delete
	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];

		$mess = $student -> deleteStudent($id);
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

							$data= $student -> allStudent();

							$i =1;

							while ( $student = $data -> fetch_assoc() ) :
						 ?>

						<tr>
							<td><?php echo $i; $i++; ?></td>
							<td><?php echo $student['name']; ?></td>
							<td><?php echo $student['email']; ?></td>
							<td><?php echo $student['cell']; ?></td>
							<td><img src="media/img/students/<?php echo $student['photo'];?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="single-data-view.php?id=<?php echo $student['id']; ?>">View</a>
								<a class="btn btn-sm btn-warning" href="#">Edit</a>
								<a class="btn btn-sm btn-danger" href="?delete=<?php echo $student['id']; ?>">Delete</a>
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