<?php 
	
	require_once "vendor/autoload.php";


	// class use
	use App\Controller\Student;
	use App\Controller\Teacher;
	use App\Controller\Staff;


	//class instance
	$student = new Student;
	$teacher = new Teacher;
	$staff = new Staff;

	//Get id
	if (isset($_GET['view_stu'])) {
		$id = $_GET['view_stu'];

		$single_student= $student -> viewStudent($id);
	}elseif (isset($_GET['view_tea'])) {
		$id = $_GET['view_tea'];

		$single_student= $teacher -> viewTeacher($id);
	}if (isset($_GET['view_staf'])) {
		$id = $_GET['view_staf'];

		$single_student= $staff -> viewStaff($id);
	}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OOP-CRUD</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	<div class="wrap">
		<a class="btn btn-primary btn-sm" href="studentData.php">All Students Data</a>
		<a class="btn btn-primary btn-sm" href="teacherData.php">All Teachers Data</a>
		<a class="btn btn-primary btn-sm" href="staffData.php">All Staffs Data</a>
		<div class="card bg-light">
			<div class="card-header">
				<h3>Single data of: <?php echo $single_student['name']; ?></h3>
			</div>
			<div class="card-body">
				<img class=" shadow " src="media/img/students/<?php echo $single_student['photo']; ?>" style="width: 200px;height: 200px; border-radius: 50%; display: block;margin: auto;">
				<h1 style="text-align: center; font-family: sigmar one;"><?php echo $single_student['name']; ?></h1>
				<table class="table table-striped table-dark">
					<tr>
						<td>Name</td>
						<td><?php echo $single_student['name']; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $single_student['email']; ?></td>
					</tr>
					<tr>
						<td>Cell</td>
						<td><?php echo $single_student['cell']; ?></td>
					</tr>
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