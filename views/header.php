<?php 

	session_start();

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Escobook</title>
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<?php 
	
	if(isset($_SESSION['id'])) {

		echo "<header>
			<div class='header_wrap'>
			<a href='home.php'>Home</a>
			<a href='profile.php'>Profile</a>
			<a href='members.php'>Members</a>
			<a href='friends.php'>Friends</a>
			<a href=''>Inbox</a>
			<a href=''>Compose</a>
			<a href='../controller/logout.inc.php'>Logout</a>
			</div>
		</header>";
	}

 ?>
