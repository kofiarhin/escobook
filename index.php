<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Escobook</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
		

		<!--====  create a login system=======-->

		<form action='controller/login.inc.php' method='post'>
			<h2 class='title'>Escobook</h2>
			<input type='text' name='uid' placeholder='Username' autofocus>
			<input type='password' name='pwd' placeholder='Password'>
			<button type='submit' name='loginSubmit'>Login</button>
			<p>Dont have an account? <a href='views/signup.php' class='signup'>Signup</a></p>
		</form>
</body>
</html>