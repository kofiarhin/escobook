<?php 
		require_once "../core/init.php";
		//show all memebers
		include "header.php";
		if(isset($_SESSION['id'])) {

			$id = $_SESSION['id'];


		

			$user = new User();

			$members = $user->get_all_members($id);

			if(!$members) {

				"There are no more members";

				die();
			} 


			$friends = $user->get_all_friends($id);

			if(!$friends) {

				$users = $user->show_all_users($id);

				foreach ($users as $key => $value) {
							$u_id = $value['id'];
							$u_first = $value['first'];
							$u_last = $value['last'];
							$u_uid = $value['uid'];

							echo "<div class='member'>";
									echo "<img src='../img/default.jpg'>";
									echo "<p>{$u_first} {$u_last}</p>";
									echo "<a href='../controller/add_friend.inc.php?id=$u_id'>Add as Friend</a>";
									echo "</div>";
				}
				die();
			}
			
			//var_dump($members);
			//var_dump($friends);




			foreach ($members as $member) {

				if(!in_array($member, $friends)) {
					//get details about user

					$person = $user->show_user($member);

					foreach ($person as $key => $value) {
						
						$p_id = $value['id'];
						$p_first = $value['first'];
						$p_last = $value['last'];

						echo "<div class='member'>";
							echo "<img src='../img/default.jpg'>";
							echo "<p>{$p_first} {$p_last}</p>";
							echo "<a href='../controller/add_friend.inc.php?id=$p_id'>Add As friend</a>";
					echo "</div>";
					}
				} 
			}

			if(count($members) == count($friends)) {

				echo "<p class='error'>You Have Added All Users</p>";
				echo "<a class='error_link' href='../views/friends.php'>Check out friends</a>";
			}





			

		


			

			
		}

 ?>