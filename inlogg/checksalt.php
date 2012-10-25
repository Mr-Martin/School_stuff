<?php
$con = mysqli_connect("localhost", "root", "", "inlogg");

if(isset($_POST['username']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$username = mysqli_real_escape_string($con, $username);
	$username = htmlspecialchars($username);
	
	$sql = "SELECT username, pass FROM usertable WHERE username = '$username'";
	$res = mysqli_query($con, $sql);
	
	if($row = mysqli_fetch_assoc($res))
	{
		//User exist
		$dbpass = $row['pass'];
		$salt = substr($dbpass, 0, 64);
		$sentpass = hash('sha256', $salt.$password);
		$sentwithsalt = $salt.$sentpass;
		
		if($sentwithsalt == $dbpass)
		{
			session_start();
			$_SESSION['loggedin'] = "japp";
			header("Location:hemlig.php");
			die();
			echo "Korrekt inloggning!";
		}
		else
		{
			echo "Felaktigt användarnamn/lösenord!";
			die();
		}
	}
	else
	{
		//User did not exist
		echo "Felaktigt användarnamn/lösenord!";
		die();
	}
}

?>
<html>
	<head>
		<title>Inlogg</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<form method="post" action="checksalt.php">
			Användarnamn<br>
			<input type="text" name="username"><br>
			Lösenord<br>
			<input type="password" name="password"><br>
			
			<input type="submit" value="Logga in"><br>
		</form>
	</body>
</html>