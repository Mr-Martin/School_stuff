<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Skicka data via URL</title>
		<link href="style.css" rel="stylesheet" type="text/css" >
	</head>
	<body>
	<?php
	if(isset ($_GET['link'] ))
		{
			$link = $_GET['link'];
		}
	else
		{
			$link =".....";
		}
		
	$link = $_GET['link'];
		if($link =="a")
			{
				echo "Du kom från Länk A";
			}
		elseif ($link =="b")
			{
				echo "Du kom från Länk B";
			}
		else
			{
				echo "Du kom varken från a eller b";
			}
	
	
	
	?>
	</body><!-- end body -->
</html>