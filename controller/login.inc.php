<?php 
	
	session_start();
	require_once "../core/init.php";

	if(isset($_POST['loginSubmit'])) {

		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];

		$data = array(

				'username' => $uid,
				'password' => $pwd
			);

		//create new session and return data

		$session = new Session();

		if($session->validate_data($data)){

			//get session id;
			$session_login = $session->get_session_id($uid, $pwd);

			if($session_login) {

				$_SESSION['id'] = $session_login;

				header("Location: ../views/home.php");

			} else {

				echo $session->session_error;
			}




		} else {

			$errors = $session->session_error;

			foreach($errors as $error) {

				echo $error."<br>";
			}
		}


	}


 ?>