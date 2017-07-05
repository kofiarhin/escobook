<?php 

	include "header.php";
	require_once "../core/init.php";

	if(isset($_SESSION['id'])) {

		$id = $_SESSION['id'];


		$user = new User;

		$user->load_user($id);


		$tweet = $user->load_all_tweets($id);

	}


 ?>