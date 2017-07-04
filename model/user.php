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


		


		public function load_friends($id) {

			//get all friends
			$friends = $this->get_all_friends($id);

			if($friends) {
 
				return $friends;
			} else {

				$this->errors = "You donot have any friends yet";
			}

		}


		
		

		public function get_friends_id($id) {
			
			$data = $this->fetch_friends_id($id);

			if($data) {

				return $data;
			  } 
			}
		
		
		public function get_members_id($id) {

			$data = $this->fetch_members_id($id);

			return $data;
		}

		public function remove_friend($user_id, $friend_id) {


			$remove = $this->delete_friend($user_id, $friend_id);

			if($remove) {

				return true;
			} else {

				return false;
			}
		}


		public function show_all_users($id) {

			$data = $this->get_all_users($id);

			return $data;
		}

		public function add_friend($user_id, $friend_id) {

			$add = $this->set_friend($user_id, $friend_id);

			return $add;
		}
		

	}


 ?>