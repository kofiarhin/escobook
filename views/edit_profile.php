<?php 

	include "header.php";
	require_once "../core/init.php";

	if(isset($_SESSION['id'])) {

		$id = $_SESSION['id'];

		$user = new User();

		$user->load_user($id);

		echo "<form method='post' action='../controller/edit_profile.inc.php'>

			<input type='hidden' name='id' value='$id'>
			<input type='text' name='first' placeholder='".$user->first."'>
			<input type='text' name='last' placeholder='".$user->last."'>
			<input type='text' name='uid' placeholder='".$user->uid."'>
			<input type='text' name='pwd' placeholder='Password'>
			<button type='submit' name='editSubmit'>Submit</button>

		</form>";


		
	}


 ?>