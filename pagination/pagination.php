<?php
$db = mysqli_connect("localhost", "root", "", "northwind");
 
	if (mysqli_connect_errno() )
	{
		echo "Det blev fel! Följande fel uppstod " . mysqli_connect_errno() ;
	}
	
if(isset($_GET['currPage']))
{
	$currPage = (int) $_GET['currPage'];
}
else
{
	$currPage = 0;
}

$back	 = $currPage -10;
	if($back < 0 )
	{
		$back = 0;
	}
$forward = $currPage +10;
$totalcount = productCount();

echo "Det finns $totalcount produkter";
?>

<!Doctype html>
<html>
	<head>
		<title>Northwind - alla produkter</title>
 
	</head>
	<body>
	<?php
	$sql ="SELECT * FROM nwproducts LIMIT $currPage, 10";
 
	$res = mysqli_query($db, $sql);
 
	echo "<ul>";
	while( $row = mysqli_fetch_assoc($res) )
	{
		$ID = $row['ProductID'];
		echo "<li><a href='detail.php?ID=$ID'>";
		echo $row['ProductName'];
		echo "</a></li>";
	}
	echo "</ul>";
	?>
	<?php
		if($currPage > 0)
		{
			echo "<a href='pagination.php?currPage=$back'>Bakåt</a> ";
		}
		
		$start = -1;
			
		$page = floor($totalcount / 10);
		//echo $page;
		
		while($start < $page )
		{
			$start++;
			$currPage = $start * 10;
			
			$page_number = $start+1;

			echo "<a href='pagination.php?currPage=$currPage'>$page_number</a> ";
		}
		
		if($forward < $totalcount)
		{
			echo "<a href='pagination.php?currPage=$forward'>Framåt</a>";
		}
	?>
	</body>
</html>
<?php
function productCount()
{
	global $db;
	
	$sql = "SELECT COUNT(ProductID) AS antal FROM nwproducts";
	$res = mysqli_query($db, $sql);
	
	$row = mysqli_fetch_array($res);
	return $row['antal'];
}
?>