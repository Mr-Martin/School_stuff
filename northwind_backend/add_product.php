<?php
require_once("functions.php");
require_once("nwconn.php");
	$dbConn = mysqli_connect( $hostname, $username, $password, $db );

	if (mysqli_connect_errno())
	{
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
		
$message = "";

if(isset($_POST['productname']))
	{
		//Hämta all data
		$productname = safe_insert($_POST['productname']);
		$unitprice = safe_insert($_POST['unitprice']);
		$unitsinstock = safe_insert($_POST['unitsinstock']);
		$supplierID = (int) ($_POST['supplierid']);
		
		//Skicka data
		$sql = "INSERT INTO nwproducts (productname, unitprice, unitsinstock, supplierid)
				VALUES ('$productname' , $unitprice , $unitsinstock , $supplierID )";
		
		mysqli_query ($dbConn, $sql);
		if(mysqli_affected_rows($dbConn) != -1 )
			{
				$message = "<p class='notice' style='color: red;'>Produkten $productname är tillagd</p>";
			}
	}//end if $_POST
?>
<!doctype html>

<html>
<head>
	<title>Ny produkt</title>
	<meta charset="UTF-8">
	<link href='style.css' rel='stylesheet' type='text/css'>
</head>

<body>

<div id="wrapper">
	<div id="header"><h1>Northwind</h1></div> <!-- Kommentar -->
	<div id="sidebar">
		<ul>
			<li><a href="add_supplier.php">Ny leverantör</a></li>
			<li><a href="add_product.php">Ny produkt</a></li>
			<li><a href="remove_products.php">Redigera produkt</a></li>
		</ul>
	</div>
	<div id="content">
	
    <h2>Lägg till ny produkt</h2>
	
	<?php
		
		echo $message;
	
	?>
	
	<form class="box" action="add_product.php" method="post" >
		<label for="productname">Produktnamn:</label>
		<input type="text" name="productname"><br>
		
		<label for="unitprice">Pris:</label>
		<input type="text" name="unitprice"><br>
		
		<label for="unitsinstock">I lager:</label>
		<input type="text" name="unitsinstock"><br>
		
		<select name="supplierid">
			<?php
				get_suppliers();
			?>
		</select><br>
		
		<input type="submit" value="Lägg till" id="submit">
		
	</form>

	</div>
	<div id="footer">Layout: CSS-esset</div>
</div>

</body>

</html>
<?php
function get_suppliers($string)
	{
		global $dbConn;
		$sql ="SELECT supplierID, companyname FROM nwsuppliers";
		
		$res = mysqli_query($dbConn, $sql);
		
		while($row = mysqli_fetch_assoc($res))
			{
				$supplierID = $row['supplierID'];
				$companyname = $row['companyname'];
				echo "<option value='$supplierID'>$companyname</option>";
			}
	}
?>