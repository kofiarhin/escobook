<?php 

	include "header.php";

	echo "<form action='../controller/signup.inc.php' method='post'>
			<h2 class='title'>Escobook</h2>
			<input type='text' name='first' placeholder='First Name'>
			<input type='text' name='last' placeholder='Last Name'>
			<input type='text' name='uid' placeholder='Username'>
			<input type='password' name='pwd' placeholder='Password'>
			<button type='submit' name='signupSubmit'>Signup</button>
		</form>";
 ?>