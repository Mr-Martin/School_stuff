<!doctype html>
<html>
<head>
<title>Bilduppladdning</title>
</head>
<body>
<h1>Utvisning..</h1>


<?php createGallery();?>




</body>

</html>

<?php

function createGallery()
{
	$dbConn = mysqli_connect("localhost", "root", "", "foto");
	if(isset($_POST['cat']))
	{
		$cat = (int) $_POST['cat'];
		$sql = "SELECT imageName, imageID from images where catID = $cat imageID DESC";
	}
	else
	{
		$sql = "SELECT imageName, imageID FROM images order by imageID DESC Limit 0, 20";
	}
	
	$res = mysqli_query($dbConn, $sql);
	echo"<ul>";
	while ($row = mysqli_fetch_assoc($res))
		{
			$id = $row['imageID'];
			$image = $row['imageName'];
			echo "<li><a href='imageDetail.php?id=$id'><img src='generated/thumb_$image'></a></li>";

		}
	
	
	
}//end function

function saveToDB($imgName)
{
	$dbConn = mysqli_connect("localhost", "root", "", "foto");
	
	//hämta orfinalbilden
	$imgData = file_get_contents($_FILES['filen']['tmp_name']);
	$imgData = mysqli_real_escape_string($dbConn, $imgData);
	$catID = (int) $_POST['category'];
	$desc = safeInsert($_POST['description'], $dbConn);
	
	
	
	$sql = "INSERT INTO images (description, imageData, imageName, catID) VALUES ( '$desc', '$imgData', '$imgName', $catID)";
	
	//echo $sql;
	mysqli_query($dbConn, $sql);
	

}

function safeInsert($string, $conn)
{
	
	$string = mysqli_real_escape_string($conn, $string);
	$string = htmlspecialchars($string);
	return $string;
	
}



function checkImage($file)
{
	//simpel check - om det är en bild så har den en höjd
	$check = getimagesize($file);
	
	return $check;

}

function generateImage($tempfile, $thumbHeight, $watermark, $namePrefix)
 {
	
	//Hr kunde man kontrollerat om det är en JPG eller png och använrt imagecreatefromjpeg / imagecreatefrompng
 
	$image = imagecreatefromjpeg($tempfile);
	$orgWidth = imagesx($image);
	$orgHeight = imagesy($image);
	//Här kunde man kollat så att den uppladdade filen inte förstoras beroende på den önskade storleken
	
	if($watermark)
	{
	//Lägg till copyrighttext
	$textcolor =  imagecolorallocate($image, 255,0,255);
	imagettftext($image, 25, 0 ,10, $orgHeight - 25 , $textcolor, "Chalkduster.ttf","LikaBra AB"); 
	}
	
	
	$thumbWidth = ceil( ($orgWidth / $orgHeight) * $thumbHeight);
	$thumb = imagecreatetruecolor ($thumbWidth, $thumbHeight);
	imagecopyresampled($thumb, $image,0,0, 0,0,$thumbWidth,$thumbHeight, $orgWidth,$orgHeight);
	$thumbname = "generated/thumb_" .$namePrefix. $_FILES['filen']['name'];
	imagejpeg($thumb, $thumbname, 60);
	imagedestroy($thumb);
	imagedestroy($image);
 
 }



?>