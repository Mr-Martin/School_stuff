<head>
	<link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<?php
include("functions.php");
include("db.php");
	echo "<div id='post-wrapper'>";
		$catID = safe_insert ($_GET['catID']);

		echo "<form action='post.php' method='get' class='box'>";
			echo "Titel<br>";
			echo "<input type='text' name='title'><br>";
			echo "<input type='hidden' name='catID' value='$catID'><br>";
			echo "Inlägg<br>";
			echo "<textarea type='text' name='content'></textarea><br>";
			echo "<input type='submit' value='Gör inlägg' class='submit'>";
		echo "</form>";
		
		if(isset($_GET['title']))
		{
			$title = safe_insert ($_GET['title']);
			$content = safe_insert ($_GET['content']);
			$catID = safe_insert ($_GET['catID']);
			$username = safe_insert ($_SESSION['username']);
			
			$sql = "INSERT INTO mpposts ( title, content, posted, username, catID ) VALUE ( '$title', '$content', NOW(), '$username', $catID )";
			$res = mysqli_query($dbConn, $sql);
			//echo $sql;
			
			echo "<script type='text/javascript'>
					parent.$.fancybox.close();
				  </script>";
		}
	echo "</div>";
?>