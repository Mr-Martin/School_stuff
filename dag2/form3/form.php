<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Handla</title>
		<link href="style.css" rel="stylesheet" type="text/css" >
	</head>
	<body>
		<div id="wrapper">
			<form method="get" action="form.php">
				<label for="produkt">Välj vara:</label>
				<select name="produkt">
					<option value="100">Napp</option>
					<option value="400">Snuttefilt</option>
					<option value="300">Gosedjur</option>
				</select><br>
				
				<label for="antal" width="50">Antal:</label>
				<input type="text" name="antal" ><br><br>
				
				<label for="produkt2">Välj vara:</label>
				<select name="produkt2">
					<option value="100">Ägg</option>
					<option value="200">Mjölk</option>
					<option value="500">Smör</option>
				</select><br>
				
				<label for="antal2" width="50">Antal:</label>
				<input type="text" name="antal2" ><br>
				
				<input type="submit" value="Beställ" >
			</form><!-- end form -->
		
			<?php
				$produkt		= $_GET['produkt'];
				$antal		= $_GET['antal'];
				orderInfo($antal, $produkt );
				
				echo "<hr>";
				
				$produkt	= $_GET['produkt2'];
				$antal		= $_GET['antal2'];
				orderInfo($antal, $produkt );
				
				echo "<p><strong>Totalt: </strong>" . $totalsumma . "</p>";
				
				
				
				/*
				if(isset($_GET['produkt']))
					{
						$produkt	= $_GET['produkt'];
						$antal		= $_GET['antal'];
						$summa		= $pris * $antal;
						$inklmoms	= $summa * 1.25;
						$moms		= $summa * 0.25;
						
						echo "<p><strong>Produkt: </strong>" . $produkt . "</p>" . "<p><strong>Antal: </strong>" . $antal . " st" . "<p><strong>Summa:</strong> " . 
						$summa . ":- (exkl. moms) " . $inklmoms . ":- (inkl.moms) " . "<p><strong>Moms: </strong>" . $moms . ":-</p>";
					}
				*/
			?>
		</div><!-- end wrapper -->
	</body><!-- end body -->
</html>


<?php
function orderInfo ($antal, $pris)
	{
		global $totalsumma;
		$kostnad		= $antal * $pris;
		$moms			= $kostnad * 0.25;
		$summaMedMoms	= $moms + $kostnad;

		echo "<br>" . $antal . " á " . $pris . " kostar " . $kostnad . " kr exkl moms. Inkl " . $moms . " kr moms. <strong>Summa:</strong> " . $summaMedMoms;
		
		$totalsumma = $totalsumma + $summaMedMoms;
	
	}


?>