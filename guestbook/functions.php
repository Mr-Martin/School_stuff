<?php

//Write posts
function write_posts($catID)
	{
		global $dbConn;
		
		$sql = sprintf("SELECT posted, gbID, content, postername, posted FROM gbPosts WHERE catID = $catID ORDER BY gbID DESC LIMIT 0,10  ");
		$res = mysqli_query($dbConn, $sql);
		
		while ( $row = mysqli_fetch_assoc($res) )
		{
		$content = $row['content'];
		$postername = $row['postername'];
		$posted = $row['posted'];
		 
			echo "<div class='box'>".   $content ; 
			echo "<p>" . $postername . " - " . $posted ."</p>";
			echo "</div>";
		}
	}

//Remove all unsafe chars
function safe_insert($string)
	{
		global $dbConn;
		$string = htmlentities($string);
		$string = mysqli_real_escape_string($dbConn , $string);
		
		return $string;
	}
	
//Meny
function displayCategories($currentCatID)
	{
		global $dbConn;
		$sql = "SELECT catID, catname, description FROM gbcategory";
		$res = mysqli_query($dbConn, $sql);

		while( $row = mysqli_fetch_assoc($res))
			{
				$catID = $row['catID'];
				$catname = $row['catname'];
				if($catID == $currentCatID)
					{
						$description = $row['description'];
					}
					
				echo "<li><a href='guestbook_cat.php?ID=$catID'>$catname</a></li>";
			}
		return $description;
	}
?>