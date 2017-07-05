<?php 
	require_once "../core/init.php";

	include "header.php";
	 $id = $_SESSION['id'];



	$user = new User;

	$friends_id = $user->get_all_friends($id);

	

	if(!empty($friends_id)) {

		$number = count($friends_id);

		if($number > 1) {

			echo "<p class='error'>You have ".$number." friends</p>";
		}else {

			echo "<p class='error'>You have ".$number." friend</p>";
		}
		
	}

	if(!$friends_id) {

		echo "<p class='error'>You donnot have any friend</p>";
		echo "<a class='error_link' href='../views/members.php'>Add Poeple You may Know</a>";
		exit();
	}

	foreach($friends_id as $friend) {

		$show_user = $user->show_user($friend);



		foreach ($show_user as $key => $value) {
			
			$f_id = $value['id'];
			$f_first = ucfirst($value['first']);
			$f_last = ucfirst($value['last']);
			$f_uid = $value['uid'];

			echo "<div class='member friend'>";
					echo "<img src='../img/default.jpg'>";
					echo "<p>{$f_first} {$f_last}</p>";
					echo "<a href='../controller/remove.inc.php?id=$f_id'>remove</a>";
					echo "</div>";
		}
	}



	
	






 ?>