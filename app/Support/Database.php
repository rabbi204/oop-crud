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
		 * 
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






	}