<div id="content-top">
	<p>Välkommen <?php echo $user; ?>!</p>
</div>

<div id="content-middle">
	<div class="left">
		<div class="bar">
			<h3>Senaste inlägg</h3>
		</div><!-- END BAR -->
		<?php
		
		if(isset($_GET['catID']))
			{
				//Visa ut inlägg från kategori
				$catID = (int) $_GET['catID'];
				
				$sql = "SELECT mpp.*, mpc.*, mpu.username, mpu.userID FROM mpposts mpp
						INNER JOIN mpusers mpu ON mpp.username = mpu.username
						INNER JOIN mpcategory mpc ON mpc.catID = mpp.catID
						WHERE mpp.catID = $catID
						ORDER BY mpp.articleID DESC";
				$res = mysqli_query($dbConn, $sql);
					
				while($row = mysqli_fetch_assoc($res))
				{					
					echo "<div class='post-box'>";
					
					$articleID = (int) $row['articleID'];
					
					echo "<div class='box'>";
					echo "<h2>" . $row['title'] . "</h2>"; 
					echo "<p class='author'>Skrivet av <b>" . $row['username'] . "</b> i <a href='index.php?catID=$catID'><b style='color: #cc2f2f;'>" . $row['catname'] . "</b></a> - " . $row['posted'] ."</p><br>";
					echo $row['content'];
					echo "</div>";
					
					/*
					if(isset($articleID))
					{
						//Visa ut kommentarer
						echo "<div class='comment'>";
						
							//Visa hur många kommentarer
							echo "<p class='comment_count'>" . $row['commentcount'] . "</p>";
						echo "<h2>" . $row['ctitle'] . "</h2>"; 
						echo "<p class='author'>Skrivet av <b>" . $row['username'] . "</b> - " . $row['cposted'] ."</p><br>";
						echo $row['comment'];
						echo "</div>";
					}*/
					echo "</div>";
				}
			}
		else
			{
				writePosts();
			}
	?>
	</div><!-- END LEFT -->
	<div class="right">
		<?php
		if(isset($_GET['catID']))
			{
				$catID = $_GET['catID'];
				$sql = "SELECT catID, catname FROM mpcategory WHERE catID = $catID";
				$res = mysqli_query($dbConn, $sql);
				
				while($row = mysqli_fetch_assoc($res))
					{
					echo "<h2 class='catname'>" . $row['catname'] . "</h2>";
					echo "<div class='choosecat'>
							<form method='get' action='index.php'>
								<select onchange='submit()' name='catID'>
									<option value='0'>Välj en kategori</option>";
									
									echo getCat();
									
								echo "</select>
								
							</form>
							<p> | </p>
							<a href='index.php'>Visa alla</a>
							
							<a href='post.php?catID=$catID' id='post' class='iframe'>GÖR ETT INLÄGG!</a>
						</div>";
					}
			}
		else
			{
					echo "<h2 class='catname'>ALLA</h2>";
					echo "<div class='choosecat'>
							<form method='get' action='index.php'>
								<select onchange='submit()' name='catID'>
									<option value='0'>Välj en kategori</option>";
									
									echo getCat();
									
								echo "</select>
								
							</form>
							<p> | </p>
							<a href='index.php'>Visa alla</a>
							<div id='wanna_post'>
								<h2>Vill du göra ett inlägg?</h2>
								<p class='go_to'>Gå till den kategori du vill göra ditt inlägg i.</p>
							</div>
						</div>";
			}
			
		?>
		
		
	</div><!-- END RIGHT -->
</div><!-- END CONTENT-MIDDLE -->
