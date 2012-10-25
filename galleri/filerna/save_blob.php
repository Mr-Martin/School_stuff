<?php

if(isset($_FILES['filen']))
{
	$dbConn = mysqli_connect("localhost", "root", "", "bilder");
	
	$imgData = file_get_contents($_FILES['filen']['tmp_name']); //Tar allt innehåll i filen och lagrar det som en sträng
	$imgData = mysqli_real_escape_string($dbConn, $imgData);
 
	$sql = "INSERT INTO images (imageData) VALUES ( '$imgData' )";
	mysqli_query($dbConn, $sql);
 
	echo "Du sparade $imgData";
}
?>
 
<html>
	<head>
	 
	</head>
	<body>
		<form method="post" action="save_blob.php" enctype="multipart/form-data">
			<input type="file" name="filen" >
			<input type="submit" value="ladda upp">
			<textarea name="description"></textarea>
		</form>
	</body>
</html>