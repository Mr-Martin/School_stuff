<?php
function getCat()
	{
		global $dbConn;
		
		$sql = "SELECT catID, catname FROM mpcategory";
		$res = mysqli_query($dbConn, $sql);
		
		while($row = mysqli_fetch_assoc($res))
			{
				$catID = $row['catID'];
				$catname = $row['catname'];
				
				echo "<option value='$catID'>$catname</option>";
			}
	}

//Remove all unsafe chars
function safe_insert($string)
	{
		global $dbConn;
		$string = htmlentities($string);
		$string = mysqli_real_escape_string($dbConn, $string);
		
		return ($string);
	}
	
//Show post
function writePosts()
	{
		global $dbConn;
		
		$sql = "SELECT mpp.*, mpc.* FROM mpposts mpp
				INNER JOIN mpcategory mpc ON mpp.catID = mpc.catID
				ORDER BY mpp.articleID DESC";
		$res = mysqli_query($dbConn, $sql);
			
		while($row = mysqli_fetch_assoc($res))
		{					
			echo "<div class='post-box'>";
			
			$articleID = (int) $row['articleID'];
			$catID = (int) $row['catID'];
			
			echo "<div class='box'>";
			echo "<h2>" . $row['title'] . "</h2>"; 
			echo "<p class='author'>Skrivet av <b>" . $row['username'] . "</b> i <a href='index.php?catID=$catID'><b style='color: #cc2f2f;'>" . $row['catname'] . "</b></a> - " . $row['posted'] ."</p><br>";
			echo $row['content'];
			echo "</div>";

			echo "</div>";
		}
	}
?>