<?php
$con = mysqli_connect("localhost", "root", "", "inlogg");

if(isset($_POST['username']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$username = mysqli_real_escape_string($con, $username);
	$username = htmlspecialchars($username);
	$password = hash('sha256', $password);
	
	$sql = "SELECT username FROM usertable WHERE pass = '$password' AND username = '$username'";
	$res = mysqli_query($con, $sql);
	
	if($row = mysqli_fetch_assoc($res))
	{
		echo "Korrekt inloggning!";
	}
	else
	{
		echo "Felaktig inloggning!";
	}
}

?>
<html>
	<head>
		<title>Inlogg</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<form method="post" action="simplecheck.php">
			Användarnamn<br>
			<input type="text" name="username"><br>
			Lösenord<br>
			<input type="password" name="password"><br>
			
			<input type="submit" value="Logga in"><br>
		</form>
	</body>
</html>