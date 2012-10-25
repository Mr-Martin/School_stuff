<?php
$con = mysqli_connect("localhost", "root", "", "inlogg");

if(isset($_POST['username']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$slump = time() . "gubben" . $username;
	$salt = hash('sha256', $slump);
	
	$password = hash('sha256', $salt.$password);
	$password = $salt.$password;
	
	$username = mysqli_real_escape_string($con, $username);
	$username = htmlspecialchars($username);
	
	$sql = "INSERT INTO usertable (username, pass) VALUES ('$username', '$password')";
	$res = mysqli_query($con, $sql);
}

?>
<html>
	<head>
		<title>Inlogg</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<form method="post" action="new_salt.php">
			Användarnamn<br>
			<input type="text" name="username"><br>
			Lösenord<br>
			<input type="password" name="password"><br>
			
			<input type="submit" value="Logga in"><br>
		</form>
	</body>
</html>