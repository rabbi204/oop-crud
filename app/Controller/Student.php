<?php  

	namespace App\Controller;

	//database class use
	use App\Support\Database;

	/**
	 * Add new Student 
	 */
	class Student extends Database
	{
		public function addNewStudent($name,$email,$cell,$img,$table_name)
		{
			//photo upload
			//$this -> fileUpload($img, 'media/img/students/');


			//data send
			$data= parent::insert($table_name,[
				'name' => $name,
				'email' => $email,
				'cell' => $cell,
				'photo' => $this -> fileUpload($img, 'media/img/students/'),

			]);	

			if ($data) {
				return"<p class='alert alert-success'>Student added successfully!! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}
		}


		/**
		 * Get all value 
		 */
		public function allStudent( )
		{
			$data = $this -> all('students', 'DESC');

			if ($data ) {
				return $data;
			}

			
		}

		/**
		 * Delete single student
		 */
		public function deleteStudent($id)
		{
			$data = $this -> delete('students',$id);

			if ($data) {
				return "<p class='alert alert-success'>Student Data Deleted Successfully!! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}
		}

		/**
		 * Single student data
		 */
		public function viewStudent($id)
		{
			$data = $this -> find('students', $id);

			return $data -> fetch_assoc();

		}

		/**
		 * Update Student data
		 */
		public function updateStudent($id,$name, $email, $cell, $photo,$photo_status)
		{
			if ( $photo_status == "new") {
				$photo_name = parent::fileUpload($photo,'media/img/student/');
			}else{
				$photo_name = $photo;
			}

			$data = parent ::update( 'students',$id, [

				'name'	=> $name,
				'email'	=> $email,
				'cell'	=> $cell,
				'photo'	=> $photo_name,

			]);

			if ($data) {

				return "<p class=\"alert alert-danger\"> update sucessfull data sucess  <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
			}

		}

	}


