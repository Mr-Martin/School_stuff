<!doctype html >
<html>
	<head>
		<title>Arrays och Loopar</title>
		<meta charset="UTF-8">
		
		<style>
			body{font-family: verdana; font-size: 13px;}
			.passed {background-color: #0f0;}
			.failed {background-color: #f00;}
		</style>
	</head>
	<body>
		<?php
			//Kalle är Nyckel och Godkänd är värdet
			$prov = array(
			"Kalle" => "Godkänd",
			"Lisa" => "Godkänd",
			"Stina" => "Underkänd",
			"Per" => "Godkänd",
			"Ossian" => "Underkänd"
			);
			
		//	echo $prov['Kalle'] . "<br>";
		//	echo $prov['Lisa'] . "<br>";
		//	echo $prov['Stina'] . "<br>";
		
		/*
			//Value sort
			asort($prov);
			//Value sort reverse
			arsort($prov);
			//Key sort
			ksort($prov);
			//Key sort reverse
			krsort($prov);
		*/
		
			ksort($prov);
			
			//Alltid Nyckel först sen => Värdet
			foreach ($prov as $namn => $betyg)
				{
				if($betyg == "Godkänd")
					{
						$cssClass = "passed";
					}
				else
					{
						$cssClass = "failed";
					}
					
					echo "<div class='$cssClass'>";
					echo $namn . " - " . $betyg;
					echo "<br>";
					
				}
		
		
		
		
		?>
	</body>
</html