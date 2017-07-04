<?php 
	
	require_once ('../core/init.php');

	if(isset($_POST['editSubmit'])) {

		$id = $_POST['id'];
		$first = $_POST['first'];
		$last = $_POST['last'];
		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];


		$data = array($id, $first, $last, $uid, $pwd);

		$user = new User();

		$user->update_user($id, $first, $last, $uid, $pwd);
	}

 ?>