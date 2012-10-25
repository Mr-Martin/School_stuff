<?php
require_once("conn.php");
require_once("functions.php");

$currentCatID = (int)$_GET['ID'];

if($currentCatID == 0)
	{
		$currentCatID = 1;
	}

$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (mysqli_connect_errno())
	{
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}	

if(isset($_POST['content']))
	{
	//Form was sent
	$content = safe_insert($_POST['content']);
	$postername = safe_insert($_POST['postername']);
	$catID = (int) $_POST['catID'];
		
	$sql = "INSERT INTO gbposts ( postername, content, posted, catID ) VALUES ( '$postername' , '$content' , NOW(), $catID )";
	
	mysqli_query ($dbConn, $sql);
	}
	
	
?>
<!doctype html>

<html>
	<head>
		<meta charset="UTF-8">
		<link href='style.css' rel='stylesheet' type='text/css'>

	</head>

	<body>

		<div id="wrapper">
			<div id="header"><h1>Gästbok</h1></div> <!-- Kommentar -->
			<div id="sidebar">
				<ul>
					<?php $catDesc = displayCategories($currentCatID); ?>
				</ul>
			</div>
			<div id="content">
			
				<h2>Senaste inläggen</h2>
				
				<?php
					echo $catDesc;
				?>
				<form class="box" action="guestbook_cat.php?ID=<?php echo $currentCatID; ?>" method="post" >
					<label for="postername">Namn:</label><br>
					<input type="text" name="postername"><br>
					
					<input type="hidden" name="catID" value="<?php echo $currentCatID; ?>">
					
					<label for="content">Inlägg:</label><br>
					<textarea name="content" rows="5" cols="73" ></textarea><br>
					
					<input type="submit" value="Skicka">
					
				</form>
				
				<?php
					write_posts($currentCatID);
				?>

			</div>
			<div id="footer">Layout: CSS-esset</div>
		</div>

	</body>

</html>
