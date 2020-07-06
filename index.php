<?php 
	
	require_once "vendor/autoload.php";


	//Student class use
	use App\Controller\Student;


	//class instance
	$student = new Student;


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
	<?php 


		/**
		 * Student form management
		 */
		if (isset($_POST['click'])) {
			//receive values
			$name = $_POST['name'];
			$email = $_POST['email'];
			$cell = $_POST['cell'];

			//file manage
			$img = $_FILES['photo'];

			if ( empty($name) || empty($email) || empty($cell)|| empty($img) ) {
				$mess = "<p class='alert alert-danger'>All fields are required!! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}
			elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$mess = "<p class='alert alert-danger'>Invalid email!! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}
			else{

				$mess = $student -> addNewStudent($name,$email,$cell,$img);
			}





		}


	 ?>
	

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Add Student</h2>
				<?php 

					if (isset($mess)) {
						echo $mess;
					}

				 ?>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input  name="click" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
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