<?php  

	namespace App\Controller;

	//database class use
	use App\Support\Database;


	/**
	 * All Staff info
	 */
	class Staff extends Database
	{
		/**
		 * Get all Staff data
		 */
		public function allStaff()
		{
			$teacher_data = $this -> all('staffs', 'DESC');

			if ($teacher_data) {
				return $teacher_data;
			}
		}

		/**
		 * Delete single Staff
		 */
		public function deleteStaff($id)
		{
			$notification = parent::delete('staffs',$id);

			if ($notification) {
				return "<p class='alert alert-success'>Teacher Data Deleted Successfully!! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}
		}

		/**
		 * View single Staff 
		 */
		public function viewStaff($id)
		{
			$data = parent::find('staffs',$id);
			
			return $data -> fetch_assoc();
		}

		/**
		 *  Update Staff data
		 */
		public function updateStaff($id,$name, $email, $cell, $photo,$photo_status)
		{
			if ( $photo_status == "new") {
				$photo_name = parent::fileUpload($photo,'media/img/student/');
			}else{
				$photo_name = $photo;
			}

			$data = parent ::update( 'staffs',$id, [

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


