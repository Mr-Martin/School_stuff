<?php 

$graph ="";
if (isset ($_POST['vote'] ))
{	
	$dbConn = mysqli_connect("localhost", "root", "root", "vote")
		or die("I'm outta here!");
	//returnera data till variablen $graph, skriv sedan ut den på sidan
	//saveVote();
	$graph =     displayVotes();
	

}


?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>rösta</title>
</head>

<body>

<form method="post" action="vote.php">

JA <input type="radio" value="JA" name="vote"><br>
NEJ <input type="radio" value="NEJ" name="vote"><br>

<input type="submit" value="rösta">

</form>
<?php
	echo $graph;

?>

</body>
</html>

<?php

function displayVotes()
{
	global $dbConn;
	
	$sql = "SELECT COUNT(vote) as yesVotes  FROM vote WHERE vote=1";
	$res = mysqli_query ($dbConn, $sql);
	
	if ($row = mysqli_fetch_assoc($res))
	{
		$yesVotes = $row['yesVotes'];	
	}

	$sql = "SELECT COUNT(vote) as noVotes  FROM vote WHERE vote=0";
	
	$res = mysqli_query ($dbConn, $sql);
	
	if ($row = mysqli_fetch_assoc($res))
	{
		$noVotes = $row['noVotes'] ;	
	}

	echo $yesVotes . "-------" . $noVotes;


	
	
		
	
}

function saveVote()
{
	//should save to db.....
	
}


?>
