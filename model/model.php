<?php 



	class Model extends Dbh {


		public function fetch_session_id($uid, $pwd) {

			//query database for id;

			$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
			$result = $this->connect()->query($sql);
			$check = $result->num_rows;

			if($check > 0) {

				while($row = $result->fetch_assoc()) {

					$id = $row['id'];
				}

				return $id;
			}

		}


		public function get_user($id) {
			
			//query database for user_info
			$sql = "SELECT * FROM user WHERE id='$id'";
			$result = $this->connect()->query($sql);
			$check = $result->num_rows;

			if($check > 0) {

				$row = $result->fetch_assoc();
				$data = $row;
				return $data;
			}
		}

		public function send_update_value($id, $first, $last, $uid, $pwd) {

			//query database with details
			$sql = "UPDATE user SET first='$first', last='$last', uid='$uid', pwd='$pwd' WHERE id='$id'";
			$result = $this->connect()->query($sql);
			if($result) {

				return true;
			} else {

				return false;
			}
		}





		public function set_friend($user_id, $friend_id) {

			echo $user_id." ".$friend_id;
			//insert into database values;
			$sql = "INSERT INTO friends (user_id, friend_id) VALUES ('$user_id','$friend_id')";
			$result = $this->connect()->query($sql);

			if($result) {

				$sql = "INSERT INTO friends (user_id, friend_id) VALUES ('$friend_id', '$user_id')";
				$result = $this->connect()->query($sql);

				return true;
			}
		}

		
		//get all members
		protected function fetch_all_members($id) {

			//query database for all users;
			$sql = "SELECT id FROM user WHERE id<>$id";
			$result = $this->connect()->query($sql);
			$check = $result->num_rows;

			if($check > 0) {

				while($row = $result->fetch_assoc()) {

					$datas[] = $row['id'];
				}

				return $datas;
			}
		}


	


		protected function fetch_user($id) {

			//query database for user
			$sql = "SELECT id, first, last, uid FROM user WHERE id='$id'";
			$result = $this->connect()->query($sql);
			$check = $result->num_rows;

			if($check > 0) {

				while($row = $result->fetch_assoc()) {

					$datas[] = $row;
				}

				return $datas;
			}
		}


		
		protected function fetch_all_friends($id) {

			//get all freinds

			$sql = "SELECT friend_id FROM friends WHERE user_id='$id' OR friend_id='$id'";
			$result = $this->connect()->query($sql);

			$check = $result->num_rows;

			if($check > 0) {

				while($row = $result->fetch_assoc()) {

					$datas[] = $row['friend_id'];
				}

				return $datas;
			}
		}


		protected function fetch_all_users($id) {


			$sql = "SELECT id, first, last, uid FROM user WHERE id<>$id";
			$result = $this->connect()->query($sql);
			$check = $result->num_rows;

			if($check > 0) {

				while($row = $result->fetch_assoc()) {


					$datas[] = $row;
				}

				return $datas;
			}
		}


		protected function remove_user($user_id, $friend_id) {

			//delete from database

			$sql = "DELETE FROM friends WHERE (user_id='$user_id' OR friend_id='$user_id') AND (user_id='$friend_id' OR friend_id='$friend_id')";
			$result = $this->connect()->query($sql);
			if(!$result) {

				return false;
			} else {

				return true;
			}


		}


		public function insert_tweet($tweet, $user_id) {

			//query database with tweet;
			$sql = "INSERT INTO tweets(user_id, tweet) VALUES ('$user_id', '$tweet')";
			$result = $this->connect()->query($sql);

			if($result) {

				return true;
			} else {

				return false;
			}
		}


		protected function fetch_all_tweets($id) {

				//get all tweets
			$sql = "SELECT * FROM tweets WHERE user_id='$id'";
			$result = $this->connect()->query($sql);
			$check = $result->num_rows;

			if($check > 0) {

				while($row = $result->fetch_assoc()) {
					$datas[] = $row;
				}

				return $datas;
			}
		}

		protected function remove_tweet($id) {
			//remove tweet

			$sql = "DELETE FROM tweets WHERE id='$id'";
			$result = $this->connect()->query($sql);

			if($result) {

				return true;
			} else {

				return false;
			}
		}
	}
 ?>