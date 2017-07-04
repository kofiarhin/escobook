<?php 

	include "header.php";
	require_once "../core/init.php";

	if(isset($_SESSION['id'])) {

		$id = $_SESSION['id'];

		$user = new User;

		$user->load_user($id);

		//show user
		echo "<div class='user'>";

			echo "<img src='../img/default.jpg'>";
			echo "<p class='name'>".$user->first." ".$user->last."</p>";
			echo "<a href='edit_profile?id=$id' class='edit_profile'>Edit Profile</a>";
		echo "</div>";

	}


 ?>