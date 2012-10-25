<?php
//Remove all unsafe chars
function safe_insert($string)
	{
		global $dbConn;
		$string = htmlentities($string);
		$string = mysqli_real_escape_string($dbConn , $string);
		
		return $string;
	}
	
function displayProducts()
	{
		global $dbConn;
		$sql = "SELECT ProductName, ProductID FROM nwproducts";
		$res = mysqli_query($dbConn, $sql);
		
		$counter = 0;
		
		while($row = mysqli_fetch_assoc($res))
		{
			if($counter % 2 ==0)
				{
					$class = "even";
				}
			else
				{
					$class = "uneven";
				}
				
			$counter++;
			
			$productID = $row['ProductID'];
			$productname = $row['ProductName'];
			
			echo "<fieldset>";
			echo "<legend>$productname</legend>";
			echo "<form onsubmit='return displayWarning();' class='$class' method='post' action='remove_products.php'>";
			echo "<input type='hidden' name='productID' value='$productID'>";
			echo "<input type='submit' value='Ta bort' id='submit2'>";
			echo "</form>";
			
			echo "<form onsubmit='return displayWarning();' class='$class' method='post' action='update_products.php'>";
			echo "<input type='hidden' name='productID' value='$productID'>";
			echo "<input type='submit' value='Uppdatera' id='submit3'>";
			echo "</form>";
			echo "</fieldset><br>";
		}
	}
?>