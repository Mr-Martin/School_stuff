<?php
session_start();
?>
<html>
	<head>
		<title>Bandit 1</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="wrapper">
			<?php
				echo "<h2>Du har inga pengar kvar... S�tt in nya!</h2>";
			?>

			<form method="post" action="bank.php">
				<p>Hur mycket vill du s�tta in?</p>
				<input type="text" name="pengar" />
				
				<input type="submit" value="S�tt in pengar" />
			</form>
			
			<?php
				if(isset ($_POST['pengar']))
					{
						$pengar = (int)$_POST['pengar'];
					
						$_SESSION['money'] = $pengar;
						echo "<a href='index.php'>SPELA!!!!</a>";
					}
			?>
		</div>
	</body>
</html>
