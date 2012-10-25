<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Exempel på </title>
		<link href="style.css" rel="stylesheet" type="text/css" >
	</head>
	<body>
		<form action="mini.php" method="get">
			Tal1 <input type="text" name="tal1" /><br>
			Tal2 <input type="text" name="tal2" /><br>
			
			+ <input type="radio" value="+" name="operator" ><br>
			* <input type="radio" value="*" name="operator" ><br>
			/ <input type="radio" value="/" name="operator" ><br>
			- <input type="radio" value="-" name="operator" ><br>
		
			<input type="submit" value="Räkna ut">
			<input type="reset" value="Rensa">		
		</form>
		
		<?php
			//Tal 1 + tal 2 = summa
			if(isset ($_GET['tal1'] ))
				{			
				$tal1 = $_GET['tal1'];
				$tal2 = $_GET['tal2'];
				$operator = $_GET['operator'];
				
				
				
				//Om + gör detta
				if($operator == "+")
					{
						echo $tal1 + $tal2;
					}
				
				//annarsom * gör detta
				elseif($operator == "*")
					{
						echo $tal1 * $tal2;
					}
					
				//annarsom / gör detta
				elseif($operator == "/")
					{
						echo $tal1 / $tal2;
					}
					
				//annarsom - gör detta
				elseif($operator == "-")
					{
						echo $tal1 - $tal2;
					}
			}
			else
				{
				echo "Skriv i fälten";
				}
		
		?>
		
	</body><!-- end body -->
</html>