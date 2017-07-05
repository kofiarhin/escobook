<?php 

	class User extends Model {

		public $id, $first, $last, $uid, $errors;

		public function load_user($id) {

			//getUser;

			$user_data = $this->get_user($id);

			$this->id = $user_data['id'];
			$this->first = $user_data['first'];
			$this->last = $user_data['last'];
			$this->uid = $user_data['uid'];
		}


		public function signup($first, $last, $uid, $pwd) {

			$result = $this->insert_user($first, $last, $uid, $pwd);

			return $result;
		}

		public function update_user($id, $first, $last, $uid, $pwd) {

				//update user and return results of current values

				$update_result = $this->send_update_value($id, $first, $last,$uid,$pwd);

				if($update_result) {

					$this->load_user($id);
					header("Location: ../views/profile.php?updatesuccess");
				}


		}



		public function add_friend($user_id, $friend_id) {

			$result = $this->set_friend($user_id, $friend_id);

			return $result;
		}


		//get all friends_id


		public function get_all_members($id) {


			$result = $this->fetch_all_members($id);
			return $result;
		}

		
		//show user

		public function show_user($id) {

			$result = $this->fetch_user($id);
			return $result;
		}

		public function get_all_friends($id) {

			$result = $this->fetch_all_friends($id);

			if(!$result) {
				return false;
				die();
			}

			foreach ($result as $friend) {

				if($friend != $id) {

					$friends[] = $friend;
				}


			}

			return $friends;
		}


		public function show_all_users($id) {

			$result = $this->fetch_all_users($id);
			return $result;
		}


		public function  delete_user($user_id, $friend_id) {

			$result = $this->remove_user($user_id, $friend_id);

			if(!$result) {
				return false;
			} else {

				return true;
			}
		}


		public function send_tweet($tweet, $user_id) {

			$result = $this->insert_tweet($tweet, $user_id);
			return $result;

		}

		public function get_all_tweets($id) {

			$result = $this->fetch_all_tweets($id);

			if(!$result) {

				return false;
				die();
			}

			return $result;
		}


		public function delete_tweet($id) {

			$result = $this->remove_tweet($id);

			var_dump($result);
		}

		public function load_all_tweets($id) {

			$tweets_id = $this->get_tweets_user_id();

			if(!$tweets_id) {

				echo "There are no tweets";
				die();
			}


			$friends = $this->get_all_friends($id);

			if(!$friends) {

				
			//show user tweets
			$user_tweets = $this->get_user_tweet($id);

			if(!$user_tweets) {

				"There are no tweets from user";
			} else {

				foreach($user_tweets as $user_tweet) {
					$uid = $user_tweet['uid'];
					$tweet = $user_tweet['tweet'];
					echo "<div class='home_tweet'>";
							echo "<img src='../img/default.jpg'>";
							echo "<p class='uid'> {$uid}</p>";
							echo "<p class='tweet'> {$tweet}</p>";
						echo "</div>";
				} 
			}
				die();
			} else {

				foreach($friends as $friend) {
				
				if(in_array($friend, $tweets_id)) {

					$friends_tweet = $this->load_user_tweet($friend);

					

					foreach($friends_tweet as $friend_tweet){

						$uid = $friend_tweet['uid'];
						$tweet = $friend_tweet['tweet'];

						echo "<div class='home_tweet'>";
							echo "<img src='../img/default.jpg'>";
							echo "<p class='uid'> {$uid}</p>";
							echo "<p class='tweet'> {$tweet}</p>";
						echo "</div>";
					}
				}
			}


			}


			//show user tweets
			$user_tweets = $this->get_user_tweet($id);

			if(!$user_tweets) {

				"There are no tweets from user";
			} else {

				foreach($user_tweets as $user_tweet) {
					$uid = $user_tweet['uid'];
					$tweet = $user_tweet['tweet'];
					echo "<div class='home_tweet'>";
							echo "<img src='../img/default.jpg'>";
							echo "<p class='uid'> {$uid}</p>";
							echo "<p class='tweet'> {$tweet}</p>";
						echo "</div>";
				} 
			}

			


		}	

	}


 ?>