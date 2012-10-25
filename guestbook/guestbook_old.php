<?php
require_once("conn.php");
require_once("functions.php");
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
		
	$sql = "INSERT INTO gbposts ( postername, content, posted ) VALUES ( '$postername' , '$content' , NOW() )";
	
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
			<li><a href="php.php">PHP</a></li>
			<li><a href="mysql.php">MySQL</a></li>
			<li><a href="css.php">CSS</a></li>
			<li style="border-right:none;"><a href="#">Sida 4</a></li>
		</ul>
	</div>
	<div id="content">
	
    <h2>Senaste inläggen</h2>
	<form class="box" action="guestbook.php" method="post" >
		<label for="postername">Namn:</label><br>
		<input type="text" name="postername"><br>
		
		<label for="content">Inlägg:</label><br>
		<textarea name="content" rows="5" cols="73" ></textarea><br>
		
		<input type="submit" value="Skicka">
		
	</form>
	
    <?php
		write_posts();
	?>

	</div>
	<div id="footer">Layout: CSS-esset</div>
</div>

</body>

</html>
