<?php 

	session_start();

	include "../core/init.php";

	if(!isset($_GET['id'])) {

		header("Location: ../views/members.php");
	
	}


	$user_id = $_SESSION['id'];
	$friend_id = $_GET['id'];

	$user = new User();

	$add = $user->add_friend($user_id, $friend_id);

	if(!$add) {

		echo "There was a problem adding user";
	} else {

		header("Location: ../views/members.php?useradded");
	}

 ?>