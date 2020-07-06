<?php  

	namespace App\Controller;

	//database class use
	use App\Support\Database;

	/**
	 * Add new Student 
	 */
	class Student extends Database
	{
		public function addNewStudent($name,$email,$cell,$img)
		{
			$data= parent::insert('students',[

				'name' => $name,
				'email' => $email,
				'cell' => $cell,
				//'photo' => $img

			]);	

			if ($data) {
				return"<p class='alert alert-success'>Student added successfully!! <button class='close' data-dismiss='alert'>&times;</button></p>";
			}
		}
	}


