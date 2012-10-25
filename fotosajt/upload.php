
<?php




if (isset ($_FILES['filen']))
{
	//om det finns en fil, och den �r ok, s� sparar vi orginalet,  vi skapar en thumbnail och vi skapar en 
	//mellanstorbild med watermrk p�.
	
	if (checkImage($_FILES['filen']['tmp_name']) )
	{
		$tempfile =  $_FILES['filen']['tmp_name'] ;
		//slumpa fram namnet s� att vi inte skriver �ver en befintlig fil
		$slumpnamn =   substr (  md5(uniqid(rand())) ,0, 5)  ;
		$uniqueName = false;
		while (!$uniqueName)
		{
			if (!file_exists ("orginal/". $slumpnamn. $_FILES['filen']['name'] ))
			{
				$uniqueName = true;
				break; 
			}
			else
			{
				$slumpnamn =   substr (  md5(uniqid(rand())) ,0, 5)  ;
			}
		}
		
		//skapa en thumnbail
		generateImage($tempfile, 200, false, "thumb_".$slumpnamn);
		generateImage($tempfile , 500, true, "500_".$slumpnamn);
		$img=  $_FILES['filen']['name'];
		saveToDB($slumpnamn.$img);
		
		
		//flytta filen...
		move_uploaded_file($tempfile,"orginal/".$slumpnamn.$img );
		
	}
}


?>


<!doctype html>
<html>
<head>
<title>Bilduppladdning</title>
</head>
<body>
<h1>L�senordskyddad sida....</h1>

<form method="post" action="upload.php"  enctype="multipart/form-data">
<input type="file" name="filen">
<textarea name="description">Beskrivning av din bild</textarea>
<select name="category">
<!--H�r kunde vi h�mtat id-n automatiskt -->
	<option value="1">Djur</option>
	<option value="1">Barn</option>
	<option value="1">Natur</option>
</select>
<input type="submit" value="spara bild">
</form>



</body>

</html>

<?php

function saveToDB($imgName)
{
	$dbConn = mysqli_connect("localhost", "root", "", "foto");
	
	//h�mta orfinalbilden
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
	//simpel check - om det �r en bild s� har den en h�jd
	$check = getimagesize($file);
	
	return $check;

}

function generateImage($tempfile, $thumbHeight, $watermark, $namePrefix)
 {
	
	//Hr kunde man kontrollerat om det �r en JPG eller png och anv�nrt imagecreatefromjpeg / imagecreatefrompng
 
	$image = imagecreatefromjpeg($tempfile);
	$orgWidth = imagesx($image);
	$orgHeight = imagesy($image);
	//H�r kunde man kollat s� att den uppladdade filen inte f�rstoras beroende p� den �nskade storleken
	
	if($watermark)
	{
	//L�gg till copyrighttext
	$textcolor =  imagecolorallocate($image, 255,0,255);
	imagettftext($image, 25, 0 ,10, $orgHeight - 25 , $textcolor, "Chalkduster.ttf","LikaBra AB"); 
	}
	
	
	$thumbWidth = ceil( ($orgWidth / $orgHeight) * $thumbHeight);
	$thumb = imagecreatetruecolor ($thumbWidth, $thumbHeight);
	imagecopyresampled($thumb, $image,0,0, 0,0,$thumbWidth,$thumbHeight, $orgWidth,$orgHeight);
	$thumbname = "generated/" .$namePrefix. $_FILES['filen']['name'];
	imagejpeg($thumb, $thumbname, 60);
	imagedestroy($thumb);
	imagedestroy($image);
 
 }



?>