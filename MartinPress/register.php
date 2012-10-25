<META HTTP-EQUIV=Refresh CONTENT="2; url=index.php">
<link href="style.css" rel="stylesheet" type="text/css">

<?php 
include("functions.php"); 
include("db.php"); 
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
	{
		//Prevent SQL injections 
		$username = safe_insert($_POST['username']); 
		$email = safe_insert($_POST['email']); 
		 
		//Get MD5 hash of password 
		$password = $_POST['password']; 
		 
		//Check to see if username exists 
		$sql = "SELECT username FROM mpusers WHERE username = '$username'";
		$res = mysqli_query($dbConn, $sql);
		if (mysqli_num_rows($res)>0) 
			{ 
				die ("<div id='konto'><h2 id='konto_skapat'>Användaren finns redan.</h2></div>"); 
			}
		
		$sql = "INSERT INTO mpusers (username, password, email) VALUES ( '$username', '$password', '$email')";
		$res = mysqli_query($dbConn, $sql);
		echo "<div id='konto'><h2 id='konto_skapat'>Konto skapat.</h2></div>";
	} 
?>