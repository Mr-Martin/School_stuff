<?php
header("Content-type: image/jpeg");
 
	$dbConn = mysqli_connect("localhost", "root", "", "bilder");	
	$sql = "select imageData from images where imageID=1";
	$res = mysqli_query($dbConn, $sql);
	$row = mysqli_fetch_assoc($res);
	echo $row['imageData'];
?>