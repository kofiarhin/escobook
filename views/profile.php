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

		echo "<form method='post' action='../controller/post.inc.php' class='form_post'>

				<input type='text' name='post' placeholder='..what is on your mind'>
				<button type='submit' name='postSubmit'>Post</button>
			</form>
		";

	}


 ?>