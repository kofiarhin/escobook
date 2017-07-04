<?php 


	class Session extends Model {

		public $session_error;

		public function validate_data($data) {

				$message = [];

				foreach ($data as $key => $value) {

					if(empty($value)) {

						$message[] = $key." is required";
					}
				}

				if(empty($message)) {

					return true;
				} else {
					$this->session_error = $message;
				}
		}


		public function get_session_id($uid, $pwd) {

			$session_result = $this->fetch_session_id($uid, $pwd);

			if($session_result) {

				return $session_result;
			} else {

				$this->session_error = "Please check details and try again";
			}
		}
	}

 ?>