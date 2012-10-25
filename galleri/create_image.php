<?php
	header("Content-type: image/jpeg");
	$image = imagecreatefromjpeg("luke2.jpg"); //imagecreate(300, 300);
	$background_color = imagecolorallocate($image, 170, 127, 89);
	$text_color = imagecolorallocate($image, 0, 0, 0);
	
	//imagestring($image, 5, 100, 50, "En text", $text_color);
	imagettftext($image, 14, 2, 123, 60, $text_color, "Chalkduster.ttf", "WOHOOO!!");
	
	imagejpeg($image);
	imagedestroy($image);
?>