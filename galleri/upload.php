<?php
require_once("conn.php");
require_once("functions.php");

$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (mysqli_connect_errno())
	{
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>
<html>
	<head>
		<title>Ladda upp bilder</title>
		<meta charset="UTF-8" />
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<a href="index.php">Tillbaka</a>
		<hr>
		<?php
			if(isset ($_FILES['image'])) //Hämtar allt som kommer från inputfältet 'Filen'
			{
				if(validateImage())
				{
					//Var ligger filen?
					$tempfile = $_FILES['image']['tmp_name'];
					
					//Vad heter den uppladdade filen man laddat upp? Alt. sökvägen och vad bilden SKA heta.
					$img = "upload/" . $_FILES['image']['name'];
					
					$filename = createThumb($_FILES['image']);
					$catID = $_POST['catID'];
					
					$sql = "INSERT INTO images (filename, catID) VALUES ('$filename', $catID)";
					mysqli_query($dbConn, $sql);
					
					//2 parametrar - Vilken fil vill man flytta? Vad ska filen heta?
					move_uploaded_file($tempfile, $img);
					

					echo "Filen laddades upp";
					
					
				}
				else
				{
					echo "Filformat ej godkänt!";
				}
			}
		?>

		<form method="post" action="upload.php" enctype="multipart/form-data">
			<input type="file" name="image">
			<select name="catID">
				<option value="1">Tecknat</option>
				<option value="2">Djur</option>
				<option value="3">Nallar</option>
			</select>
			<input type="submit" value="Ladda upp">
		</form>
	</body>
</html>