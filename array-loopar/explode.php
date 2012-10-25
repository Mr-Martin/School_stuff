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
		<form method="post" action="array_2.php">
			<select name="produkt">
				<option value="5000;Kanot">Kanot</option>
				<option value="200;Flytväst">Flytväst</option>
				<option value="400;Paddel">Paddel</option>
			</select>
			
			<input type="submit" value="Beställ">
		</form>
		
		<?php
			if(isset($_POST['produkt']))
				{
				$produkt = explode (";" , $_POST['produkt'] );
				
				echo "En " . $produkt[1] . " kostar " . $produkt[0];
				}
		?>
	</body>
</html>