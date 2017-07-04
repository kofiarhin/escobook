<?php 
	
	session_start();
	require_once "../core/init.php";


	if(isset($_GET['id'])) {

		$user_id = $_SESSION['id'];
		$friend_id = $_GET['id'];

		$user = new User;

		$user->remove_friend($user_id, $friend_id);

		if(!$user->remove_friend($user_id, $friend_id)) {

			echo "Error Message";
		} else {

			header("Location: ../views/friends.php?success");
		}
		
		
	}
 ?>