<?php
require_once("functions.php");
if (isset($_FILES['filen']))
{
	//Här laddar jag in funktionen som validerar filformatet, samt att om det är ett godkänt filnamn (filändelse) så ska filen laddas upp.
	if(validateImage())
	{
		//2 Parametrar// Vilken temp-fil? ( $_FILES['filen']['tmp_name']; ) - Vad ska den heta? ( basename($_FILES['filen']['name']); )
		move_uploaded_file($_FILES['filen']['tmp_name'], basename($_FILES['filen']['name']) );
		
		echo "Filen laddades upp";
	}
	else
	{
		echo "Filformat ej godkänt!";
	}
}


?>
<html>
<head>

</head>
<body>

<form method="post" action="upload.php" enctype="multipart/form-data" >
<input type="file" name="filen">
<input type="submit">

</form>

</body>
</html>
<?php
function validateImage()
{
	$allowedFormats	= array(".jpg", ".png", ".gif");
	$filnamn		= basename($_FILES['filen']['name']);
	$antalTecken	= strlen($filnamn);
	$filFormat		= substr($filnamn, $antalTecken-4,4);
	
	if(! in_array($filFormat, $allowedFormats))
	{
		return false;
	}
	else
	{
		return true;
	}
	
}

?>