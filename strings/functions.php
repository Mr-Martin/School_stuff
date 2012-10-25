<?php
function writeVert($string)
{
	//Gör något lika många ggr som antal tecken
	$slut = strlen($string);
	$start = 0;

	while($start < $slut)
		{
			echo $string[$start];
			echo "<br>";
			$start++;
		}
}

function letterTab($string)
{
	//Gör något lika många ggr som antal tecken
	$slut = strlen($string);
	$start = 0;

	while($start < $slut)
		{
			echo $string[$start];
			echo "<span style='margin-left: 50px;'></span>";
			$start++;
		}
}

function reverse($string)
{
	$start = strlen($string) -1;
	
	while ($start >= 0)
		{
			echo $string[$start];
			$start --;
		}
}

function rovarsprak($string)
{	
$konsonanter = "bcdfghjklmnpqrstwvzx";
$slut = strlen($string);
$start = 0;

while( $start < $slut )
	{
		if(stristr($konsonanter, $string[$start]))
			{
				echo $string[$start] . "o" . strtolower($string[$start]);
			}
		else
			{
				echo $string[$start];
			}
		$start++;
	}
}

function randomColor()
{
	return "#" . dechex(rand(0, 15)) . dechex(rand(0, 15)) . dechex(rand(0, 15)) . dechex(rand(0, 15)) . dechex(rand(0, 15)) . dechex(rand(0, 15));
}

function colorMe($string)
{
	//Gör något lika många ggr som antal tecken
	$slut = strlen($string);
	$start = 0;

	while($start < $slut)
		{
			echo "<span style='font-size: 50px; font-weight: bold; color:" . randomColor() . ";'>";
			echo $string[$start];
			echo "</span>";
			$start++;
		}
}
?>