<!doctype html >
<html>
	<head>
		<title>Arrays och Loopar</title>
		<meta charset="UTF-8">
		
		<style>
			body{font-family: verdana; font-size: 13px;}
		</style>
	</head>
	<body>
		<?php
			$a = 1;
			
			while($a < 100)
				{
				echo "<br>a är nu......" . $a;
				$a = $a + 1;
				}

		?>
	</body>
</html>