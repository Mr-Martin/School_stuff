<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Dag 1</title>
		<link href="style.css" rel="stylesheet" type="text/css" />	
	</head>
	
	<body>
		<?php
			$antalILager = 100;
			$pris = 600;
			
			if 	( $antalILager > 0 && $pris < 500 )
				{
					echo "Kostar mindre än 500 och finns i lager!";
				}
			else
				{
					echo "Produkten finns ej i lager och den är för billig!";
				}
		
		
		
		
		
		
		
			
			$user = "Martin";
			
			if	($user == "Martin" )
				{
					echo "<h1>Hej Martin</h1>";
				}
			elseif ($user == "Bob")
				{
					echo "<h1>Hej Bob</h1>";
				}
			else
				{
					echo "<h1>Okänd användare, välkommen endå!</h1>";
				}
			
			
			
			
			$pris = 1000;
			
			if	( $pris <= 200 )
				{
					echo "Det var billigt!";
				}
			elseif ( $pris < 500)
				{
					echo "Det funkar...";
				}				
			else
				{
					echo "Nu var det dyrt!";
				}
			
			
			
			
			/*
			$fnamn 	= "Kalle";
			$enamn 	= "Anka";
			$age 		= 62;
			
			printf ("Du heter %s i förnamn och %s i efternamn och är %d år gammal...", $fnamn , $enamn , $age  );
			*/
			
		?>
	</body>
</html>