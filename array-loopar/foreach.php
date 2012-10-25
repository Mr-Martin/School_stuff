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
			//array
			$elever = array("kalle", "olle", "pelle");
			
			echo $elever[0];
			echo "<hr>";
		//	echo count($elever);
		
			//foreach loop
			foreach ($elever as $elev)
				{
					echo $elev . " ";
				}

		?>
	</body>
</html>