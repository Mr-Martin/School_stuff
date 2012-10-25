<?php
require_once("conn.php");


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
			<li><a href="#">Sida 1</a></li>
			<li><a href="#">Sida 2</a></li>
			<li><a href="#">Sida 3</a></li>
			<li style="border-right:none;"><a href="#">Sida 4</a></li>
		</ul>
	</div>
	<div id="content">
	
    	<h2>Senaste inläggen</h2>
        <form method="post" action="guestbook_add.php" class="box">
        Namn: <br><input type="text" name="namn"><br>
        Kommentar<br><textarea name="comment"></textarea><br>
        <input type="submit" value="skicka">
        
        </form>
        
        
        
    <?php
		
        $dbConn = mysqli_connect($db_hostname, $db_username, $db_password, "guestbook");

if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}


//add first
if (isset($_POST['namn']))
{
	$posterName = checkInput($_POST['namn'] );
	$content = checkInput($_POST['comment'] );
	
	$insertSQL = "INSERT INTO gbPosts (posterName, content, posted) VALUE ('$posterName', '$content', NOW() ) ";
	
	mysqli_query($dbConn, $insertSQL);
	
}




$sql = sprintf("SELECT posted, gbID, content, posterName, posted FROM gbPosts  order by gbID DESC  ");


$res = mysqli_query($dbConn, $sql);

 while ( $row = mysqli_fetch_assoc($res) )
 {
	 echo "<div class='box'>".   $row['content'] ; 
	 echo "<p>" . $row['posterName'] . " - " . $row['posted'] ."</p>";
	 echo "</div>";
	
}
mysqli_close($dbConn) ;




?>
        
        
        
        
	</div>
	<div id="footer">Layout: CSS-esset</div>
</div>

</body>

</html>
<?php

function checkInput($string)
{
	global $dbConn;
	$string = mysqli_real_escape_string($dbConn, $string);
	$string = htmlentities($string);
	return $string;
	
}



?>