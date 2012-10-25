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
		<form method="post" action="array_4.php">
			<select name="produkt">
				<option value="napp">Napp</option>
				<option value="snuttefilt">Snuttefilt</option>
				<option value="docka">Docka</option>
			</select>
			
			<input type="submit" value="Beställ">
		</form>
		
		<?php
			if(isset($_POST['produkt']))
				{
				$prislista = array(
					"napp" => 25,
					"snuttefilt" => 100,
					"docka" => 400
					);
					
				$valdProdukt = $_POST['produkt'];
				$pris = $prislista[$valdProdukt];
				
				echo "Du valde $valdProdukt, den kostar: $pris:-";
				}
		?>
	</body>
</html>