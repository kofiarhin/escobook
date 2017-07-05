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

		echo "<form method='post' action='../controller/tweet.inc.php' class='form_post'>
				<input type='hidden' name='user_id' value='$id'>
				<input type='text' name='tweet' placeholder='..what is on your mind'>
				<button type='submit' name='tweetSubmit'>tweet</button>
			</form>
		";


		$data = $user->get_all_tweets($id);

		if(!$data) {

			echo "<p class='error'>There are no tweets by user</p>";
			die();
		}

		foreach($data as $key => $value) {

			$tweet = $value['tweet'];
			$tweet_id = $value['id'];
			echo "<div class='tweet_unit'>";

				echo "<img src='../img/default.jpg'>";
				echo "<div class='info'>";
					echo "<p class='uid'>".$user->uid."</p>";
					echo "<p class='tweet'>{$tweet}</p>";
				echo "</div>";

				echo "<a href='../controller/delete_tweet.inc.php?id=$tweet_id'>Delete</a>";

			echo "</div>";
		}

	}


 ?>