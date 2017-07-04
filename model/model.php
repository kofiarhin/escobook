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


		

		public function get_all_friends($id) {

			//query database for friends
			$sql = "select friends.friend_id, user.first, user.last, user.uid from friends join user on friends.friend_id = user.id where friends.user_id=$id";
			$result = $this->connect()->query($sql);

			$check = $result->num_rows;
			if($check > 0) {

				while($row = $result->fetch_assoc()) {

					$data[] = $row;
				}

				return $data;
			}
		}


		protected function fetch_friends_id($id) {

			//query database for friends_id

			$sql = "SELECT friend_id FROM friends WHERE user_id='$id'";
			$result = $this->connect()->query($sql);
			$check = $result->num_rows;

			if($check > 0) {

				while($row = $result->fetch_assoc()) {

					$datas[] = $row['friend_id'];
				}

				return $datas;
			}

			
		}

		public function fetch_members_id($id) {

			//query database for members
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

		protected function delete_friend($user_id, $friend_id) {

			//delete from table;

			$sql = "DELETE FROM friends WHERE user_id='$user_id' AND friend_id='$friend_id'";
			$result = $this->connect()->query($sql);

			if($result) {

				return true;
			} else {

				return false;
			}

			
		}

		protected function get_all_users($id) {

			//query database for users;
			$sql = "SELECT id, first, last, uid FROM user";
			$result = $this->connect()->query($sql);
			$check = $result->num_rows;

			if($check > 0) {

				while($row = $result->fetch_assoc()) {

					$datas[] = $row;
				}

				return $datas;
			}
		}

		protected function set_friend($user_id, $friend_id) {

			//query database with values;
			$sql = "INSERT INTO friends (user_id, friend_id) VALUES ('$user_id', '$friend_id')";
			$result = $this->connect()->query($sql);

			if(!$result) {

				return false; 
			} else {

				return true;
			}
		}
		
	}
 ?>