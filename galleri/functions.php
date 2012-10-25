<?php
function validateImage()
{
	$allowedFormats	= array(".jpg", ".png", ".gif");
	$filnamn		= basename($_FILES['image']['name']);
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

function createThumb($src)
{
	global $dbConn;
	$image = imagecreatefromjpeg($src['tmp_name']);
	$orgWidth = imagesx($image);
	$orgHeight = imagesy($image);
	
	$thumbWidth = ceil(($orgWidth / $orgHeight) * 150);
	
	$thumb = imagecreatetruecolor($thumbWidth, 150);
	imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumbWidth, 150, $orgWidth, $orgHeight);
	
	$thumbname = "upload/thumb_" . $_FILES['image']['name'];
	
	imagejpeg($thumb, $thumbname, 100);
	imagedestroy($thumb);
	imagedestroy($image);
	
	return $_FILES['image']['name'];
}

?>