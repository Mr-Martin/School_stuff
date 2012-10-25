<?php
require_once("functions.php");
 
 
	//require_once("nwConn.php");
 
	$host="localhost";
	$user="root";
	$password ="";
	$db="northwind";
	$dbConn = mysqli_connect($host, $user, $password, $db ); 
 
	if(mysqli_connect_errno())
	{
	echo "Det blev fel. Ring polisen eller någon som bryr sig";
	exit();
	}
	
	if(isset($_POST['productID']))
		{
			//formuläret är skickat, ta bort produkt
			$productID = (int) $_POST['productID'];
			$sql = "DELETE FROM nwproducts WHERE productID = $productID";
			$res = mysqli_query($dbConn, $sql);
		}
?>

<!doctype html>
 
<html>
	<head>
	<meta charset="UTF-8">
	<link href='style.css' rel='stylesheet' TYPE='text/css'>
	<title>Ta bort produkter</title>

		<script>
			function displayWarning()
			{
				var answer = confirm("Säker?!");
				if(answer)
					{
						return true;
					}
				else
					{
						return false;
					}
			}
			
		</script>
	</head>
 
	<body>
	 
		<div ID="wrapper">
			<div ID="header"><h1>Northwind</h1></div> <!-- Kommentar -->
			<div ID="sidebar">
				<ul>
					<li><a href="add_supplier.php">Ny leverantör</a></li>
					<li><a href="add_product.php">Ny produkt</a></li>
					<li><a href="remove_products.php">Redigera produkt</a></li>
				</ul>
			</div>
			<div ID="content">
		 
				<h2>Redigera produkt</h2>
				<ul>
				<?php
					displayProducts();
				?>
				 </ul>
		 
		 
		 
		 
		 
			</div>
			<div ID="footer">Layout: CSS-esset</div>
		</div>
	 
	</body>
 
</html>