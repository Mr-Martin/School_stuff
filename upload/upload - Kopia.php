<?php


if( isset ($_FILES['filen']['name'] ))
{
$target_path = "";

$target_path = $target_path . basename( $_FILES['filen']['name']); 
if (validateImage() )
{
if(move_uploaded_file($_FILES['filen']['tmp_name'], $target_path)) {
    echo "Filen ".  basename( $_FILES['filen']['name']). 
    " laddades upp";
} else{
    echo "Det blev fel, ring polisen!";
}

} // end validate image
} //end isset 


function validateImage(){

	$filnamn = $_FILES['filen']['name'];
	$filtyp  = substr ($filnamn, strlen($filnamn)-4  ,    4);
	//kolla så att det är en bild
	$allowedFormats = array(".jpg", ".gif", ".png");
	if (! in_array($filtyp, $allowedFormats))
	{	
		echo "dålig filtyp";
		//return false;
	}

	//
	$allowedTypes = array("image/jpeg", "image/gif", "image/pjpeg", "image/png");
	$typ = $_FILES["filen"]["type"];
	if (! in_array($typ, $allowedTypes))
	{
		return false;
	}
	
	return true;
	
	
}



?>
<html>
<head>

</head>
<body>

<form method="post" action="upload.php" enctype="multipart/form-data" >
<input type="text" name="texten">
<input type="file" name="filen">
<input type="submit">

</form>

</body>
</html>