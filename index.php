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
			<input type='text' name='uid' placeholder='Username'>
			<input type='password' name='pwd' placeholder='Password'>
			<button type='submit' name='loginSubmit'>Login</button>
		</form>
</body>
</html>