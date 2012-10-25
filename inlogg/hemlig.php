<?php
session_start();
if(isset($_SESSION['loggedin']))
	{
		if(!$_SESSION['loggedin'] == "japp")
			{
				echo "Sidan kräver inloggning";
				die();
			}
	}
else
	{
		echo "Du måste logga in!";
		die();
	}
	
echo "Tjääna!";
?>