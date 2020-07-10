<?php 
	
	namespace App\Support;

	use mysqli;

	abstract class Database 
	{

		/**
		 * Server related property
		 */
		private $host = 'localhost';
		private $user = 'root';
		private $pass = 'root';
		private $db = 'oop_crud';

		private $connection;

		/**
		 * Database connection setup
		 */
		private function connection()
		{
			return $this -> connection = new mysqli($this -> host,$this -> user,$this -> pass,$this -> db);
		}

		/**
		 * File upload management
		 */
		protected function fileUpload($file, $location='', array $file_type=['jpeg','png','jpg','gif'])
		{
			//file info
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_size = $file['size'];

			//file extension
			$file_array = explode('.', $file_name);
			$file_extension = strtolower(end($file_array));

			//file unique name
			$unique_file_name = md5(time().rand()).'.'.$file_extension;

			//file upload
			move_uploaded_file($file_tmp,$location.$unique_file_name);
			return $unique_file_name;

		}

		/**
		 *  data insert to table
		 */
		protected function insert($table, array $data)
		{
			//Make SQL column from data;
			$array_key = array_keys($data);
			$array_col = implode(',',$array_key);

			//Make SQL values from data;
			$array_val = array_values($data);

			foreach ($array_val as $value) {
				$form_value[] = "'".$value ."'";
			}

			$array_values = implode(',',$form_value);

			//data send to table;
			$sql = "INSERT INTO $table ($array_col) VALUES ($array_values)";
			$query = $this -> connection() -> query($sql);
			
			if ($query) {
				return true;
			}

		}

		/**
		 * Get all data
		 */
		
		protected function all($table, $order_by)
		{
			//data Get ;
			$sql = "SELECT *FROM $table ORDER BY id $order_by";
			$data = $this -> connection() -> query($sql);
			
			if ($data) {
				return $data;
			}
		}

		/**
		 * Delete Data
		 */
		protected function delete($table,$id)
		{
			//data delete ;
			$sql = "DELETE FROM $table WHERE id='$id' ";
			$data = $this -> connection() -> query($sql);
			
			if ($data) {
				return true;
			}
		}

		/**
		 * Show single data
		 */
		protected function find($table, $id)
		{
			//data view ;
			$sql = "SELECT *FROM $table WHERE id='$id' ";
			$data = $this -> connection() -> query($sql);

			if ($data) {
				return $data;
			}

		}
		/**
		 * Update single user method
		 */
		protected function update($table,$id = '', array $data)
		{

			foreach ($data as $key => $value) {
				$arra[] = $key."="."'".$value."'";
			}
		
			$condiation = implode(',',$arra);

			$sql = "UPDATE $table SET $condiation WHERE id = $id";
			$data = $this -> Connection()  -> query($sql);

			if ($data) {
				return true;
			}

		}





	}