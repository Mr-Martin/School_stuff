<?php
session_start();
//nämn att vi inte gör det optimalt
//steg ett skapa rand-variabler, skriv sedan ut dem
//steg två en if-sats för att visa bilderna
//steg tre - gör en funktion för att skapa bilderna



		


$slot1 = rand(1,100);
$slot2 = rand(1,100);
$slot3 = rand(1,100);

//echo "$slot1 <br> $slot2 <br> $slot3";
$slot1 = visaBild($slot1);
$slot2 = visaBild($slot2);
$slot3 = visaBild($slot3);

if ($slot1 =="cherry" && $slot2 =="cherry" && $slot3=="cherry") {
		echo "<h1>Vinst!</h1>";
		echo "tre körsbär i rad ger 50 kr";
		$_SESSION["money"] = $_SESSION["money"] + 50; 
	}
	elseif ($slot1=="bar" && $slot2 =="bar" && $slot3=="bar")

	{
		echo "<h1>Vinst!</h1>";
		echo "tre bar i rad! Vinst 100 kr  ";
		$_SESSION["money"] = $_SESSION["money"] + 100; 
	}
	elseif ($slot1=="bar" && $slot2 =="bar" && $slot3=="bar")
	{
		echo "tre bar i rad! Vinst 100 kr  ";
		$_SESSION["money"] = $_SESSION["money"] + 100; 
	}
	elseif ($slot1=="orange" && $slot2 =="orange" && $slot3=="orange")
	{
		echo "tre apelsiner i rad! Vinst 250 kr  ";
		$_SESSION["money"] = $_SESSION["money"] + 250; 
	}
	elseif ($slot1=="bell" && $slot2 =="bell" && $slot3=="bell")
	{
		echo "tre klockor i rad! Vinst 500 kr  ";
		$_SESSION["money"] = $_SESSION["money"] + 500; 
	}
	elseif ($slot1=="citron" && $slot2 =="citron" && $slot3=="citron")
	{
		echo "tre citroner i rad! Vinst 500 kr  ";
		$_SESSION["money"] = $_SESSION["money"] + 500; 
	}


function visaBild($randValue) {

	if ($randValue <40  ) 
		{
			echo "<img src='bilder/cherry.gif'>";
			return "cherry";
		}
	elseif ($randValue < 70)
		{
			echo "<img src='bilder/bar.gif'>";
			return "bar";
		}
	elseif ($randValue > 85)
		{
			
			echo "<img src='bilder/orange.gif'>";
			return "orange";
		}
	elseif ($randValue > 95)
		{
			echo "<h1>Vinst!</h1>";
			echo "<img src='bilder/bell.gif'>";
			return "bell";
		}
		else
		{
			
			echo "<img src='bilder/citron.gif'>";
			return "citron";
		}
}

if (isset($_SESSION["money"]))
	{
		$_SESSION["money"] = $_SESSION["money"] - 5; 
		echo "Du har". $_SESSION["money"]." kvar <br/>";
			if ($_SESSION["money"]  <= 0 )
				{
					echo "Du har inga pengar kvar! ";
					die();
				}
	}
else
	{
		echo "du har 100 dollars kvar!";
		$_SESSION["money"] =100;
	}



?>

