<!doctype html>
<html>
<head>
<title>Bilduppladdning</title>
</head>
<body>
<h1>Detaljutvisning av bild</h1>




<?php displayImage();?>




</body>

</html>

<?php

function displayImage()
{
	$dbConn = mysqli_connect("localhost", "root", "", "foto");
	$imageID = (int) $_GET['id'];
	$sql = "SELECT imageName, description from images where imageID = $imageID";
	
	
	$res = mysqli_query($dbConn, $sql);
	if ($row = mysqli_fetch_assoc($res))
		{
			$image = $row['imageName'];
			$description = $row['description'];
			echo "<a href='orginal/$image'><img src='generated/500_$image'></a>";
			echo "<p>$description</p>";
			// h�r kunde vi ocks� haft en l�nk till en php-sida som h�mtade bilden direkt i databasen
			
		}
	else
		{
			echo "<img src='dummy.jpg'>";
		}
	
	
	
}//end function

?>