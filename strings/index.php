<?php
include("functions.php");
?>
<html>
	<head>
	
	</head>

	<body>
	<?php
	$string = "Martin Nilsson heter jag, vad heter du?";
	
	//SUBSTR tar Vad? Var ska jag börja? Hur många tecken?
//	echo substr($string, 0, 7);
	
	//Man kan behandla en sträng som en Array
//	echo $string[5];

	//Man kan ta reda på hur lång en sträng är med STRLEN
//	echo strlen($string);

	//writeVert($string);
	//letterTab($string);
	//reverse($string);
	//rovarsprak($string);
	//echo randomColor();
	colorMe($string);
	
	?>
	</body>
</html>