<?php
require_once("functions.php");
$message = "";

if(isset($_POST['companyname']))
	{
		require_once("nwconn.php");
		
		$dbConn = mysqli_connect( $hostname, $username, $password, $db );
	
		if (mysqli_connect_errno())
		{
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	
		//Hämta all data
		$companyname = safe_insert($_POST['companyname']);
		$contactname = safe_insert($_POST['contactname']);
		$contacttitle = safe_insert($_POST['contacttitle']);
		$address = safe_insert($_POST['address']);
		$city = safe_insert($_POST['city']);
		$region = safe_insert($_POST['region']);
		$postalcode = safe_insert($_POST['postalcode']);
		$country = safe_insert($_POST['country']);
		$phone = safe_insert($_POST['phone']);
		$fax = safe_insert($_POST['fax']);
		$homepage = safe_insert($_POST['homepage']);
		
		//Skicka data
		$sql = "INSERT INTO nwsuppliers (companyname, contactname, contacttitle, address, city, region, postalcode, country, phone, fax, homepage)
				VALUES ('$companyname' , '$contactname' , '$contacttitle' , '$address' , '$city' , '$region' , '$postalcode' , '$country' , '$phone',
				'$fax' , '$homepage' )";
				
		mysqli_query ($dbConn, $sql);
		if(mysqli_affected_rows($dbConn) != -1 )
			{
				$message = "<p class='notice' style='color: red;'>Leverantören $companyname är tillagd</p>";
			}
	}//end if $_POST
?>
<!doctype html>

<html>
<head>
	<title>Ny leverantör</title>
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
	
    <h2>Lägg till ny leverantör</h2>
	
	<?php
		
		echo $message;
	
	?>
	
	<form class="box" action="add_supplier.php" method="post" >
		<label for="company">Företagsnamn</label>
		<input type="text" name="companyname"><br>
		
		<label for="contactname">Kontaktperson</label>
		<input type="text" name="contactname"><br>
		
		<label for="contacttitle">Titel</label>
		<input type="text" name="contacttitle"><br>
		
		<label for="address">Adress</label>
		<input type="text" name="address"><br>
		
		<label for="city">Stad</label>
		<input type="text" name="city"><br>
		
		<label for="region">Ort</label>
		<input type="text" name="region"><br>
		
		<label for="postalcode">Postkod</label>
		<input type="text" name="postalcode"><br>
		
		<label for="country">Land</label>
		<input type="text" name="country"><br>
		
		<label for="phone">Telefon</label>
		<input type="text" name="phone"><br>
		
		<label for="fax">Fax</label>
		<input type="text" name="fax"><br>
		
		<label for="homepage">Hemsida</label>
		<input type="text" name="homepage"><br>
		
		<input type="submit" value="Lägg till" id="submit">
		
	</form>

	</div>
	<div id="footer">Layout: CSS-esset</div>
</div>

</body>

</html>
