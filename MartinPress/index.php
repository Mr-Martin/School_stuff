<?php
include("functions.php");
include("db.php");

if (isset($_POST['username']) && isset($_POST['password']))
	{     
		user_login($_POST['username'], $_POST['password']); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MartinPress</title>
		<meta charset="UTF-8">
		
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" media="screen" />
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script type="text/javascript" src="fancybox/jquery.easing-1.3.pack.js"></script>
		<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {

			/* This is basic - uses default settings */
			
			$("a.iframe").fancybox();
			
			/* Using custom settings */
			
			$("a#inline").fancybox({
				'hideOnContentClick': true,
			});
		});
		</script>
		
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<?php				
				if(isset($_SESSION['username']))
					{
						$user = $_SESSION['username'];
						echo "<ul>";
						echo "<li>";
						echo "Inloggad som " . $user;
						echo "<a class='logga_ut' href='logout.php'><button>LOGGA UT</button></a>";
						echo "</li>";
						echo "</ul>";
					}
				else
					{
						echo "<ul>";
						echo "<li>";
						echo "<form method='post' action='index.php'>";
						echo "<label for='username'>Användarnamn</label><input type='text' name='username'>";
						echo "<label for='password'>Lösenord</label><input type='password' name='password'>";
						echo "<input class='logga_in' type='submit' value='LOGGA IN'>";
						echo "</form>";
					//	echo "<li><a class='registrera' href='register.php'><button>REGISTRERA</button></a></li>";
						echo "</li>";
						echo "</ul>";
					}
				?>	
			</div><!-- End header -->
			
			<div id="content">
			<?php
			if(isset($_SESSION['username']))
				{
					include("content.php");
				}
			else
				{
					echo "<h2 class='login_first'>Du måste logga in för att läsa alla inlägg!<p style='font-size: 20px; font-style: italic; margin-top: 20px; color: #cc2f2f;'>Inte medlem än? Registrera dig nedan :)</p></h2>";
					echo "<div class='not_member'>";

						echo '<form method="post" action="register.php">
								<label for="username">Användarnamn</label><br>
								<input type="text" name="username"><br>
								
								<label for="password">Lösenord</label><br>
								<input type="password" name="password"><br>
								
								<label for="email">E-post</label><br>
								<input type="text" name="email"><br>
								
								<input type="submit" value="REGISTRERA" id="submit">
							</form>';
						echo "</div>";
				}
			?>
			
			</div><!-- End content -->
		</div><!-- End wrapper -->
		<div id="footer">
			<p>MartinPress © 2012</p>
		</div><!-- End footer -->
	</body>
</html>