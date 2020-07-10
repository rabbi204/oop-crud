<?php require_once 'vendor/autoload.php' ?>
<?php 
	
	use App\Controller\Student;
	use App\Controller\Teacher;
	use App\Controller\Staff;
 	
 	$student = new Student;
 	$teacher = new Teacher;
 	$staff = new Staff;



if (isset($_GET['edit_stu'])) {
	//Data recive for student
	$triger = "edit_stu";
	$user_data = $student -> viewStudent($_GET['edit_stu']);

}
elseif (isset($_GET['edit_tea'])) {
	//data recive for teacher 
	$triger = "edit_tea";
	$user_data = $teacher -> viewTeacher($_GET['edit_tea']);
	//data recive for staff
} elseif (isset($_GET['edit_staf'])) {
	//data recive for staff
	$triger = "edit_staf";
	$user_data = $staff -> viewStaff($_GET['edit_staf']);
	
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
	
	<?php 

		if (isset($_POST['click'])) {
			//value recieve
			$id = $user_data['id'];
			$name = $_POST['name'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$cell = $_POST['cell'];

			//file data recieve
			$old_photo = $_POST['old'];
			$new_photo = $_FILES['photo']['name'];

			//recive new photo update value
			if (empty($new_photo)) {
				$photo = old_photo;
				$photo_status = "old";
			}else{
				$photo = $_FILES['photo'];
				$photo_status = "new";
			}

			//form validation
			if (empty($name) || empty($email) || empty($cell)) {
				$mess = "<p class='alert alert-danger'>All fields are required!! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$mess = "<p class='alert alert-danger'>All fields are required!! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}
			else{

					if (isset($_GET['edit_stu'])) {

						$mess = $student -> updateStudent($id,$name, $email, $cell, $photo,$photo_status);
						header("location:studentData.php");

					}
					elseif (isset($_GET['edit_tea'])) {
			
						$mess = $teacher -> updateTeacher($id,$name, $email, $cell, $photo,$photo_status);
						header("location:teacherData.php");

					}
					elseif(isset($_GET['edit_staf'])) {

						$mess = $staff -> updateStaff($id,$name, $email, $cell, $photo,$photo_status);
						header("location:staffData.php");
			
					}

			}


		}



	 ?>


	<div class="wrap">
		<a class="btn btn-primary btn-sm" href="studentData.php">All Students Data</a>
		<a class="btn btn-primary btn-sm" href="teacherData.php">All Teachers Data</a>
		<a class="btn btn-primary btn-sm" href="staffData.php">All Staffs Data</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>Edit - <?php echo $user_data['name']?></h2>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>?<?php echo $triger;?>=<?php echo $user_data['id'] ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" value="<?php echo $user_data['name']?>" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" value="<?php echo $user_data['email']?>" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" value="<?php echo $user_data['cell']?>" class="form-control" type="text">
					</div>

					<div class="form-group">
						<img src="media/img/student/<?php echo $user_data['photo']?>" style="height:100px; width:100px; border-radius:150px 150px; " alt="">
						<input type="hidden" name="old" value="<?php echo $user_data['photo']?>" id="">
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