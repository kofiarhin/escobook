<?php 
	
	include "../core/init.php";

	if(isset($_POST['signupSubmit'])) {

		$first = $_POST['first'];
		$last = $_POST['last'];
		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];

		$user = new User();

		if($user->signup($first, $last, $uid, $pwd)) {

			header("Location: ../index.php?signupsuccess");
		} else {

			header("Location: ../views/signup.php?error");
		}

	}

 ?>