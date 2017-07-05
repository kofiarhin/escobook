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

	}


 ?>