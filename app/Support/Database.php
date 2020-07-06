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






	}