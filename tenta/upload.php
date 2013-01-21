<?php
if (isset($_FILES['filen']))
{
	//H�r laddar jag in funktionen som validerar filformatet, samt att om det �r ett godk�nt filnamn (fil�ndelse) s� ska filen laddas upp.
	if(validateImage())
	{
		// H�r v�ljer jag vilken fil jag ska hantera, samt vad filen ska heta n�r den �r uppladdad. Filen laddas nu upp i samma mapp som denna php-fil ligger i.
		move_uploaded_file($_FILES['filen']['tmp_name'], basename($_FILES['filen']['name']) );
		
		//Filformatet/filformaten godk�nda
		echo "Filen laddades upp";
	}
	else
	{
		//Filformatet/filformaten ej godk�nda
		echo "Filformat ej godk�nt! F�rs�k igen...";
	}
}


?>
<html>
<head>

</head>
<body>
<!-- H�r har jag valt att anv�nda tv� stycken filuppladdningsf�lt. Man kan anv�nda ett och samma f�lt, men d� m�ste man skriva mycket mer kod, HTML5 och javascript. D�rf�r valde jag den enklare v�gen, genom att g�ra s� h�r. -->
<form method="post" action="upload.php" enctype="multipart/form-data" >
<input type="file" name="filen"><br>
<input type="file" name="filen"><br>
<input type="submit" value="Ladda upp filerna">

</form>

</body>
</html>
<?php
//Kolla fil�ndelsen p� filerna, �r dem godk�nda -> returnera sant, annars falskt
function validateImage()
{
	//Formaten som �r till�tna
	$allowedFormats	= array(".jpg", ".txt");
	
	//H�r h�mtar jag namnet p� filen som laddas upp och kollar de 4 sista tecknen p� filen genom att anv�nda mig utav substr. F�r att substr ska fungera s� m�ste jag veta hur m�nga tecken det �r i den uppladdade filen, det g�r jag genom att ta filnamnet och k�ra en strlen p� den.
	$filnamn		= basename($_FILES['filen']['name']);
	$antalTecken	= strlen($filnamn);
	$filFormat		= substr($filnamn, $antalTecken-4,4);
	
	//Slutligen: �r formatet godk�nt, d� returneras v�rdet Sant. �r formatet inte godk�nt, d� returneras v�rdet falskt. Dessa v�rden anv�nder jag sedan n�r jag ska ladda upp filen/filerna genom att kolla om v�rdet �r sant eller falskt. �r v�rdet sant, d� kan filen laddas upp s�kert och man f�r d� ett meddelande att filen laddats upp! F�r att kolla om v�rdet �r godk�nt s� skickar jag in filformatet i min array, d� kolla arrayn om filformatet finns med, om inte, d� returnerar den ett falskt v�rde.
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