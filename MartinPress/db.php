<?php
session_start();

//Connection
$db_hostname = 'localhost';
$db_database = 'martinpress';
$db_username = 'root';
$db_password = '';

// Connect
$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

function user_login ($username, $password) 
{
	global $dbConn;
	
	//take the username and prevent SQL injections 
	$username = mysql_real_escape_string($username); 
	//begin the query 
	$sql = "SELECT * FROM mpusers WHERE username = '$username' AND password = '$password' LIMIT 1"; 
	$res = mysqli_query($dbConn, $sql);
	//check to see how many rows were returned 
	$rows = mysqli_num_rows($res);
	
	if ($rows<=0 )
	{ 
	echo "<p class='fel'>Fel användarnamn/lösenord</p>"; 
	}
	else 
	{ 
	//have them logged in 
	$_SESSION['username'] = $username; 
	} 
}

?>