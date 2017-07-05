<?php 
	
	session_start();
	require_once "../core/init.php";

	if(isset($_GET['id'])) {
		$user_id = $_SESSION['id'];

		$friend_id = $_GET['id'];

		$user = new User;

		$delete = $user->delete_user($user_id, $friend_id);

		if(!$delete) {

			echo "Something went wrong please try removing user again";
		} else {

			header("Location: ../views/friends.php?success");
		}
	}
 ?>