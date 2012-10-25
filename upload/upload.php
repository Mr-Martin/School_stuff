<?php
require_once("functions.php");
if (isset($_FILES['filen']))
{
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