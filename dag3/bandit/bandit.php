<?php
//nämn att vi inte gör det optimalt
//steg ett skapa rand-variabler, skriv sedan ut dem
//steg två en if-sats för att visa bilderna
//steg tre - gör en funktion för att skapa bilderna

$slot1 = rand(1,5);
$slot2 = rand(1,5);
$slot3 = rand(1,5);

//echo "$slot1 <br> $slot2 <br> $slot3";
visaBild($slot1);
visaBild($slot2);
visaBild($slot3);

if ($slot1 == $slot2 && $slot2==$slot3) {
		echo "Vinst!";
	}
	else
	{
		echo "ingen vinst  :(";
	}



function visaBild($randValue) {

	if ($randValue==1 ) 
		{
			echo "<img src='bilder/citron.gif'>";
		}
	elseif ($randValue==2)
		{
			echo "<img src='bilder/bar.gif'>";
		}
	elseif ($randValue==3)
		{
			echo "<img src='bilder/orange.gif'>";
		}
	elseif ($randValue==4)
		{
			echo "<img src='bilder/bell.gif'>";
		}
	elseif ($randValue==5)
		{
			echo "<img src='bilder/cherry.gif'>";
		}
}

?>