<?php
require_once("../../conn.php");
		
		//Uppkoppling // 4 parametrar: Hostname, Användarnamn, Lösenord och Databas
		$db = mysqli_connect($host, $user, $password, "northwind" );
		
		//Kolla om uppkopplingen till databasen funkar.
		if(mysqli_connect_errno())
			{
				echo "Det blev fel! Följande fel uppstod " . mysqli_connect_errno() ;
			}

?>

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
		<p><a href="northwind.php?order=asc">Visa stigande</a> / <a href="northwind.php?order=desc">Visa fallande</a></p>

		<form action="northwind.php?order=asc" method="post">
		 Search: <input type="text" name="term" /><br>
		 
		<input type="submit" name="submit" value="Submit" />
		</form><br>
		
		<form method="get" action="northwind.php?order=asc">
			<select name="categoryid">
			<?php
				get_categories();
			?>
			</select>
			<input type="submit" value="Visa Kategori">
		</form>
		
		<?php
		//Search
		if(isset($_POST['term']))
			{
			$term = $_POST['term'];
			
			//Fråga
			$sql = "SELECT * FROM nwproducts WHERE SOUNDEX(ProductName) = SOUNDEX('%$term') OR ProductName LIKE '%$term%' ORDER BY ProductName ASC";
			
			//Resultat
			$res = mysqli_query($db, $sql);
			
			echo "<h2 style='margin-left: 23px;'>" . "Sökresultat" . "</h2>";
			echo "<ul>";
			while($row = mysqli_fetch_array($res))
				{
				$ID = $row['ProductID'];
				echo "<li><a href='detail.php?ID=$ID'>" . $row['ProductName'] . "</a></li>";
				}
			}
			echo "</ul>";
			
		//Visa stigande eller fallande
		if($_GET['order'] == "asc")
			{
				$orderParameter = "asc";
			}
		else
			{
				$orderParameter = "desc";
			}
		
		//SQL-fråga
		$sql = "SELECT * FROM nwproducts ORDER BY ProductName $orderParameter";
		
		//Skicka fråga till Databas // 2 parametrar: Vilken uppkoppling? Vilken fråga?
		$res = mysqli_query($db, $sql);
		
		//Rad - Tar hela raden av t.ex. första produkten i databasen i nwproducts
		echo "<ol>";
		
		if(isset($_GET['categoryid']))
			{
				while($row = mysqli_fetch_assoc($res))
					{
						$category = $_GET['categoryid'];
						
						$sql = "SELECT * FROM nwproducts WHERE categoryid = $category";
						$res = mysqli_query($db, $sql);
						
						echo $category;
					}
			}
		else
			{
			while($row = mysqli_fetch_assoc($res))
				{
					$ID = $row['ProductID'];
					echo "<li><a href='detail.php?ID=$ID'>";
					echo $row['ProductName'];
					echo "</a></li>";
				}
			}
		echo "</ol>";
		?>
	</body>
</html>
<?php
function get_categories()
	{
		global $db;

		$sql = "SELECT nwsuppliers.supplierid, nwsuppliers.companyname, nwproducts.categoryid
		FROM nwsuppliers INNER JOIN nwproducts";

		$res = mysqli_query($db, $sql);
		
		while($row = mysqli_fetch_assoc($res))
			{
			$supplierid = $row['supplierid'];
			$companyname = $row['companyname'];
			echo "<option value='$supplierid'>$companyname</option>";
			
			}
	}

?>













