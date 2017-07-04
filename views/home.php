<?php 

	include "header.php";
	require_once "../core/init.php";

	if(isset($_SESSION['id'])) {

		$id = $_SESSION['id'];

		$user = new User;

		$user->load_user($id);

		echo "Populate friends feeds here";

	}


 ?>