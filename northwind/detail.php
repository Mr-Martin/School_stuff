<!doctype html >
<html>
	<head>
		<title>Northwind - alla produkter</title>
		<meta charset="UTF-8">
		
		<style>
			body{font-family: verdana; font-size: 13px;}
		</style>
	</head>
	<body>
		<a href="northwind.php?order=asc">Tillbaka till produkter</a>
		<?php
		require_once("../../conn.php");
		
		//Uppkoppling // 4 parametrar: Hostname, Användarnamn, Lösenord och Databas
		$db = mysqli_connect($host, $user, $password, "northwind" );
		
		//Kolla om uppkopplingen till databasen funkar.
		if(mysqli_connect_errno())
			{
				echo "Det blev fel! Följande fel uppstod " . mysqli_connect_errno() ;
			}
			
		//Hämta ID från URL fältet
		$ID = (int)$_GET['ID'];
		
		//Om något blir fel, visa detta
		if($ID == 0)
			{
				$notice = "<p class='notice'> Du har inte valt någon produkt - varför inte testa produkten nedan istället? </p>";
				$ID = 2;
			}
		
		//SQL-fråga
		$sql = "SELECT * FROM nwproducts WHERE ProductID = $ID";
		
		//Skicka fråga till Databas // 2 parametrar: Vilken uppkoppling? Vilken fråga?
		$res = mysqli_query($db, $sql);
		
		$row = mysqli_fetch_assoc($res);
		
		if($row['UnitsInStock'] > 1)
			{
				if(isset($notice))
					{
						echo $notice;
					}
				echo "<h1>" . $row['ProductName'] . "</h1>";
				echo "<p> Kostar: " . $row['UnitPrice'] . "$</p>";
				echo "<p> Lagerstatus: " . $row['UnitsInStock'] . "st</p>";
			}
		else
			{
				echo "<br>";
				echo "Tyvärr, varan finns ej i Lager!";
			}

		?>
	</body>
</html>