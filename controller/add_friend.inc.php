<?php 

	session_start();

	include "../core/init.php";

	if(!isset($_GET['id'])) {

		header("Location: ../views/members.php");
	} 


	$friend_id = $_GET['id'];
	$user_id = $_SESSION['id'];

	$user = new User;

	$friend_request = $user->add_friend($user_id, $friend_id);

	if($friend_request) {

		header("Location: ../views/members.php");
	}




 ?>