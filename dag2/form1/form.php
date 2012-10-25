<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Form1</title>
		
		<style>
			body {font-family: verdana; font-size: 13px;}
			
			#formen p {clear: left; margin: 0px; padding: 0px; width: 500px; height: 30px;}
			#formen label {float: left; width: 100px; padding-top: 3px; margin: 0px;}
			#formen input {float: left; margin: 0px;}
		</style>
	</head>
	<body>
		<form id="formen" method="post" action="form.php" >
			<p><label for="fnamn">Förnamn:</label>
			<input type="text" name="fnamn" /></p>
			
			<p><label for="enamn">Efternamn:</label>
			<input type="text" name="enamn" /></p>
			
			<p><select name="social">
			  <option>Mr</option>
			  <option>Mrs</option>
			</select></p>
			
			<p><input type="submit" value="Skicka"></p>
		</form>
		
		<?php
		
		if(isset($_POST['fnamn']))
			{
				$myFname = $_POST['fnamn'];
				$myEname = $_POST['enamn'];
				$social  = $_POST['social'];
				
				echo "<p>Välkommen " . $social . " " . $myFname . " " . $myEname . " du är nu inloggad!</p>";
			}
		?>

	
	</body>
</html>