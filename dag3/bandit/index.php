<?php
session_start();
	if(isset ($_SESSION['money']))
		{
			if($_SESSION['money'] <= 0)
				{
					header('location: bank.php');
				}
		}
?>
<html>
	<head>
		<title>Bandit 1</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="wrapper">
			<?php
			$slot1 = rand(1,100);
			$slot2 = rand(1,100);
			$slot3 = rand(1,100);

			$bild1 = visaBild($slot1);
			$bild2 = visaBild($slot2);
			$bild3 = visaBild($slot3);

			if($bild1 == "cherry" && $bild2 == "cherry" && $bild3 == "cherry")
				{
					echo "<br>V I N S T</br>";
					$_SESSION['money'] += 25;
				}
			elseif($bild1 == "citron" && $bild2 == "citron" && $bild3 == "citron")
				{
					echo "<br>V I N S T</br>";
					$_SESSION['money'] += 40;
				}
			elseif($bild1 == "orange" && $bild2 == "orange" && $bild3 == "orange")
				{
					echo "<br>V I N S T</br>";
					$_SESSION['money'] += 40;
				}
			elseif($bild1 == "bell" && $bild2 == "bell" && $bild3 == "bell")
				{
					echo "<br>V I N S T</br>";
					$_SESSION['money'] += 100;
				}
			elseif($bild1 == "bar" && $bild2 == "bar" && $bild3 == "bar")
				{
					echo "<br>V I N S T</br>";
					$_SESSION['money'] += 200;
				}
			
			
			
			if(isset($_SESSION['money']))
				{
					$_SESSION['money'] = $_SESSION['money'] - 5;
					echo "<br>KVAR: " . $_SESSION['money'] . "</br>";
						
						if($_SESSION['money'] <= 0)
							{
								echo "Nu är spelet slut";
							}
				}
			else
				{
					echo $_SESSION['money'] = 100;
				}

			?>
		</div>
	</body>
</html>

<?php
function visaBild($randValue)
	{
		if($randValue <= 40)
			{
				echo "<img src='bilder/cherry.gif' />";
				return "cherry";
			}
		elseif($randValue <= 60)
			{
				echo "<img src='bilder/citron.gif' />";
				return "citron";
			}
		elseif($randValue <= 75)
			{
				echo "<img src='bilder/orange.gif' />";
				return "orange";
			}
		elseif($randValue <= 90)
			{
				echo "<img src='bilder/bell.gif' />";
				return "bell";
			}
		elseif($randValue <= 100)
			{
				echo "<img src='bilder/bar.gif' />";
				return "bar";
			}
	}

?>