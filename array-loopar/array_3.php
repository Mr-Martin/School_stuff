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
			$klasslista = array(
				"Lisa"	=> array("Adress" => "Gatan 12, Malmö", "Telefon" => "042 - 12 34 56", "E-post" => "lisa@gmail.com"),
				"Kalle"	=> array("Adress" => "Gatan 13, Malmö", "Telefon" => "042 - 55 34 77", "E-post" => "kalle@gmail.com"),
				"Olle"	=> array("Adress" => "Gatan 14, Malmö", "Telefon" => "042 - 33 11 37", "E-post" => "olle@gmail.com")
				);
				
			//echo $klasslista ["Olle"]["E-post"];
			
			foreach($klasslista as $person => $info)
				{
					echo $person . ", ";
					echo $info['Adress'] . ", ";
					echo $info['Telefon'] . ", ";
					echo $info['E-post'] . " ";
					echo "<hr>";
				}
		?>
	</body>
</html>