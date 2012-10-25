<?php
//Connection
$db_hostname = 'localhost';
$db_database = 'tenta';
$db_username = 'root';
$db_password = '';

// Connect
$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

$sql = "SELECT c.firstname, c.lastname, c.email, c.departmentID, d.departmentID, d.adress, d.postnummer, d.stad FROM contacts c
INNER JOIN departments d ON c.departmentID = d.departmentID";
$res = mysqli_query($dbConn, $sql);

while($row = mysqli_fetch_assoc($res))
{
	$firstname	= $row['firstname'];
	$lastname	= $row['lastname'];
	$fullname	= $firstname . " " . $lastname;
	$email		= $row['email'];
	$adress		= $row['adress'];
	$postnummer	= $row['postnummer'];
	$stad		= $row['stad'];

	echo "<div>";
	echo "<h3>$fullname<h3>";
	echo "<a href='mailto:$email'>Maila $firstname</a><br>";
	echo "$adress<br>$postnummer $stad";
	echo "</div>";
}
?>