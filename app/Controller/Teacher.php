<?php  

	namespace App\Controller;

	//database class use
	use App\Support\Database;


	/**
	 * All Teacher info
	 */
	class Teacher extends Database
	{
		/**
		 * Get all teacher data
		 */
		public function allTeacher()
		{
			$teacher_data = $this -> all('teachers', 'DESC');

			if ($teacher_data) {
				return $teacher_data;
			}
		}

		/**
		 * Delete single Teacher
		 */
		public function deleteTeacher($id)
		{
			$notification = parent::delete('teachers',$id);

			if ($notification) {
				return "<p class='alert alert-success'>Teacher Data Deleted Successfully!! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}
		}

		/**
		 * View single teache 
		 */
		public function viewTeacher($id)
		{
			$data = parent::find('teachers',$id);
			
			return $data -> fetch_assoc();
		}

		/**
		 *  Update Teacher data
		 */
		public function updateTeacher($id,$name, $email, $cell, $photo,$photo_status)
		{
			if ( $photo_status == "new") {
				$photo_name = parent::fileUpload($photo,'media/img/student/');
			}else{
				$photo_name = $photo;
			}

			$data = parent ::update( 'teachers',$id, [

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


