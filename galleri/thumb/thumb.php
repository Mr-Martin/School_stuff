<?php
	$image = imagecreatefromjpeg("luke2.jpg");
	$orgWidth = imagesx($image);
	$orgHeight = imagesy($image);
	
	$thumbWidth = ceil(($orgWidth / $orgHeight) * 150);
	
	$thumb = imagecreatetruecolor($thumbWidth, 150);
	imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumbWidth, 150, $orgWidth, $orgHeight);
	
	imagejpeg($thumb, "bilden.jpg", 100);
	imagedestroy($thumb);
	imagedestroy($image);
?>