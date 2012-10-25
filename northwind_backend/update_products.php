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
	
	$productID = (int) $_POST['productID'];
	
	if(isset($_POST['ProductName']))
		{
			$ProductName = safe_insert($_POST['ProductName']);
			$UnitPrice = safe_insert($_POST['UnitPrice']);
			$QuantityPerUnit = safe_insert($_POST['QuantityPerUnit']);
			
			$sql = "UPDATE nwproducts SET ProductName = '$ProductName', UnitPrice = $UnitPrice, QuantityPerUnit = '$QuantityPerUnit' WHERE productID = $productID";
			$res = mysqli_query($dbConn, $sql);
		}
	
	$sql = "SELECT ProductName, UnitPrice, QuantityPerUnit FROM nwproducts WHERE productID = $productID";
	$res = mysqli_query($dbConn, $sql);
	
	if($row = mysqli_fetch_assoc($res))
		{
			$ProductName = $row['ProductName'];
			$UnitPrice = $row['UnitPrice'];
			$QuantityPerUnit = $row['QuantityPerUnit'];
		}
?>

<!doctype html>
 
<html>
	<head>
	<meta charset="UTF-8">
	<link href='style.css' rel='stylesheet' TYPE='text/css'>
	<title>Ta bort produkter</title>
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
		 
				<h2>Uppdatera produkt</h2>
				<ul>
					<form method="post" action="update_products.php">
						<label for="ProductName">Produktnamn</label>
						<input type="text" name="ProductName" value="<?php echo $ProductName; ?>" >
						
						<label for="UnitPrice">Pris per enhet</label>
						<input type="text" name="UnitPrice" value="<?php echo $UnitPrice; ?>" >
						
						<label for="QuantityPerUnit">Antal enheter</label>
						<input type="text" name="QuantityPerUnit" value="<?php echo $QuantityPerUnit; ?>" >
						
						<input type="hidden" value="<?php echo $productID ?>" name="productID">
						
						<input type="submit" value="Uppdatera" id="submit">
					</form>
				</ul>
			</div>
			<div ID="footer">Layout: CSS-esset</div>
		</div>
	 
	</body>
 
</html>