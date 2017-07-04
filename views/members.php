<?php 
		require_once "../core/init.php";
		//show all memebers
		include "header.php";
		if(isset($_SESSION['id'])) {

			$id = $_SESSION['id'];

			$user = new User();



			$friends_list = $user->get_friends_id($id);

			$members_list = $user->get_members_id($id);

			if(!$friends_list) {

				$users = $user->show_all_users($id);

				foreach($users as $user) {

					$id = $user['id'];
					$first = $user['first'];
					$last = $user['last'];
					$uid = $user['uid'];

					echo "<div class='friend'>";
							echo "<img src='../img/default.jpg'>";
							echo "<div class='details'>";
							echo "<p> Name: ".$first." ".$last."</p>";
							echo "<p> Handle: @".$uid."</p>";

							echo"</div>";


							echo "<a href='../controller/add_friend.inc.php?id=$id' class='remove'>Add as Friend</a>";
						echo "</div>";


				}

				die();
			}


			foreach ($members_list as $member) {

				if(!in_array($member, $friends_list)) {

					$details = $user->get_user($member);

					$id = $details['id'];
					$first = $details['first'];
					$last = $details['last'];
					$uid = $details['uid'];

					echo "<div class='friend'>";
							echo "<img src='../img/default.jpg'>";
							echo "<div class='details'>";
							echo "<p> Name: ".$first." ".$last."</p>";
							echo "<p> Handle: @".$uid."</p>";

							echo"</div>";


							echo "<a href='../controller/add_friend.inc.php?id=$id' class='remove'>Add as Friend</a>";
						echo "</div>";


				}
			}



			

			
			//var_dump($friends_list);
			//var_dump($members_list);


			

			
		}

 ?>