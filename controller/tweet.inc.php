<?php 
	
	include "../core/init.php";

	if(isset($_POST['tweetSubmit'])) {

		$user_id = $_POST['user_id'];
		$tweet = $_POST['tweet'];

		if(empty($tweet)) {

			echo "You can not tweet empty message";
			die();
		}


		$user = new User;

		if($user->send_tweet($tweet, $user_id)) {

			header("Location: ../views/profile.php?tweetsuccess");
		}else {

			echo "There was a problem sending tweet please try again";
		}
		



	}

 ?>