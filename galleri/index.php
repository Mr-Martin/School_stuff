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
		<a href="upload.php">Ladda upp en bild</a>
		<hr>
		<div id="wrapper">
			<div id="choose_cat">
				<ul>
					<li><a href="index.php">Visa alla</a></li>
					<li><a href="index.php?catID=1">Tecknat</a></li>
					<li><a href="index.php?catID=2">Djur</a></li>
					<li><a href="index.php?catID=3">Nallar</a></li>
				</ul>
			</div>
			
			<div id="galleri">
				<?php
					if(isset($_GET['catID']))
					{
						$catID = $_GET['catID'];
						$sql = "SELECT filename FROM images WHERE catID=$catID";
						$res = mysqli_query($dbConn, $sql);
						
						while($row = mysqli_fetch_assoc($res))
						{
							$filename = $row['filename'];
							echo "<a href='upload/$filename'><img src='upload/thumb_$filename' /></a>";
							echo "&nbsp;&nbsp;&nbsp;";
						}
					}
					else
					{
						$sql = "SELECT filename FROM images";
						$res = mysqli_query($dbConn, $sql);
						
						while($row = mysqli_fetch_assoc($res))
						{
							$filename = $row['filename'];
							echo "<a href='upload/$filename'><img src='upload/thumb_$filename' /></a>";
						}
					}
				?>
			</div>
		</div>

	</body>
</html>