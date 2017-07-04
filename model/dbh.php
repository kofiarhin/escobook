<?php 


	class Dbh {

		private $server, $username, $password, $dbname;

		protected function connect() {

			$this->server = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->dbname = "friendrequest";

			$conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);

			return $conn;
		}
	}

 ?>