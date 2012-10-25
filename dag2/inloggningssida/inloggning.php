<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Exempel på </title>
		<link href="style.css" rel="stylesheet" type="text/css" >
	</head>
	<body>
		<form action="inloggning.php" method="get">
			Namn:		<input type="text" name="namn" /><br>
			Lösenord:	<input type="password" name="pass" /><br>
			<br>
			<input type="submit" value="Logga in" />
		</form>
		
		<?php
			if(isset($_GET['namn']))
				{
					$namn = $_GET['namn'];
					$pass = $_GET['pass'];
					
					//Om användanamn är Kalle och lösenord är Anka gör:
					if($namn == "Kalle" && $pass == "Anka" )
						{
							echo "Inloggningen är korrekt";
						}
					//Om användanamn INTE är Kalle och lösenord är Anka gör:
					else
						{
							echo "Inloggningen är fel";
						}
				}
		?>
		
	</body><!-- end body -->
</html>