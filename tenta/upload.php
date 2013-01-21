<?php
if (isset($_FILES['filen']))
{
	//Här laddar jag in funktionen som validerar filformatet, samt att om det är ett godkänt filnamn (filändelse) så ska filen laddas upp.
	if(validateImage())
	{
		// Här väljer jag vilken fil jag ska hantera, samt vad filen ska heta när den är uppladdad. Filen laddas nu upp i samma mapp som denna php-fil ligger i.
		move_uploaded_file($_FILES['filen']['tmp_name'], basename($_FILES['filen']['name']) );
		
		//Filformatet/filformaten godkända
		echo "Filen laddades upp";
	}
	else
	{
		//Filformatet/filformaten ej godkända
		echo "Filformat ej godkänt! Försök igen...";
	}
}


?>
<html>
<head>

</head>
<body>
<!-- Här har jag valt att använda två stycken filuppladdningsfält. Man kan använda ett och samma fält, men då måste man skriva mycket mer kod, HTML5 och javascript. Därför valde jag den enklare vägen, genom att göra så här. -->
<form method="post" action="upload.php" enctype="multipart/form-data" >
<input type="file" name="filen"><br>
<input type="file" name="filen"><br>
<input type="submit" value="Ladda upp filerna">

</form>

</body>
</html>
<?php
//Kolla filändelsen på filerna, är dem godkända -> returnera sant, annars falskt
function validateImage()
{
	//Formaten som är tillåtna
	$allowedFormats	= array(".jpg", ".txt");
	
	//Här hämtar jag namnet på filen som laddas upp och kollar de 4 sista tecknen på filen genom att använda mig utav substr. För att substr ska fungera så måste jag veta hur många tecken det är i den uppladdade filen, det gör jag genom att ta filnamnet och köra en strlen på den.
	$filnamn		= basename($_FILES['filen']['name']);
	$antalTecken	= strlen($filnamn);
	$filFormat		= substr($filnamn, $antalTecken-4,4);
	
	//Slutligen: Är formatet godkänt, då returneras värdet Sant. Är formatet inte godkänt, då returneras värdet falskt. Dessa värden använder jag sedan när jag ska ladda upp filen/filerna genom att kolla om värdet är sant eller falskt. Är värdet sant, då kan filen laddas upp säkert och man får då ett meddelande att filen laddats upp! För att kolla om värdet är godkänt så skickar jag in filformatet i min array, då kolla arrayn om filformatet finns med, om inte, då returnerar den ett falskt värde.
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