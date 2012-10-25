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