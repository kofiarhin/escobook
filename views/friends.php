<?php 
	require_once "../core/init.php";

	include "header.php";
	 $id = $_SESSION['id'];

	$user = new User;

	$friend_list = $user->load_friends($id);

	if(!$friend_list) {

		echo "You have no friends";

		die();
	}


	foreach ($friend_list as $friend) {

		$first = $friend['first'];
		$last = $friend['last'];
		$uid = $friend['uid'];
		$id = $friend['friend_id'];


		echo "<div class='friend'>";
			echo "<img src='../img/default.jpg'>";
			echo "<div class='details'>";
			echo "<p> Name: ".$first." ".$last."</p>";
			echo "<p> Handle: @".$uid."</p>";

			echo"</div>";


			echo "<a href='../controller/remove_friend.php?id=$id' class='remove'>Remove</a>";
		echo "</div>";

	}



 ?>