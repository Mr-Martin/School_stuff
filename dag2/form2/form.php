<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Form2</title>
		
		<style>
			body {
				font-family: verdana;
				font-size: 13px;
				background-color: rgb(<?php randomColors();?> );
				}
			
			#formen {
				width: 500px;
				margin: 50px auto;
			}
			
			textarea { max-width: 500px; border-radius: 3px; border: none; }
			input { border-radius: 3px; border: none; }
		</style>
	</head>
	<body>
		<div id="formen">
			<form method="post" action="form.php" >
				<label for="fnamn">Namn:</label><br>
				<input type="text" name="namn" /><br>
				
				<label for="bio">Om dig själv:</label><br>
				<textarea name="bio" cols="40" rows="5" ></textarea><br>
				
				<select name="color">
					<option value="#00ff00">Grön</option>
					<option value="fuchsia">Fuchsia</option>
					<option value="#0000ff">Blå</option>
					<option value="#ff0000">Röd</option>
					<option value="#cccccc">Grå</option>
				</select>
				
				<input type="submit" value="Skicka">
			</form>
			
			<?php
			
			if(isset($_POST['namn']))
				{
					$namn 	= $_POST['namn'];
					$bio 	= $_POST['bio'];
					$color 	= $_POST['color'];
					
					echo "<h1>" . $namn . "</h1>";
					echo "<p style='background: " . $color . "'>" . $bio . "</p>";
				}
			?>
		</div>
	
	</body>
</html>

<?php
function randomColors()
	{
		$red	= rand(0,255);
		$green	= rand(0,255);
		$blue	= rand(0,255);
		
		echo $red . "," . $green . "," . $blue ;
		
	}//end function randomColors


?>