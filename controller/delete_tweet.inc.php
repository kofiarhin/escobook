<?php 
	include "../core/init.php";

	if(isset($_GET['id'])) {

		$id = $_GET['id'];

		$user = new User;

		if($user->delete_tweet($id)) {

			header("Location: ../views/profile.php?deletesuccess");
		} else {

			header("Location: ../views/profile.php?error");
		}
	}

 ?>