<?php
//Fråga 1
echo "Jag är en mjukstart och ger en enkel poäng";
echo "<hr>";

//Fråga 2
write_numbers(10, 5);
echo "<hr>";

//Fråga 3
uclast("Jag är en sträng");
echo "<hr>";

//Fråga 4b
/*
BLOGG
--------------
postID (int - ai)
postContent (text)
author (varchar 50)

POSTS
--------------
id (int - ai)
postID (int)
comID (int)

COMMENTS
--------------
comID (int - ai)
commentContent (text)
comAuthor (varchar 50)
*/

//Fråga 5
/*
5a) SELECT * FROM guestbook ORDER BY GID DESC LIMIT 0, 10 
5b) INSERT INTO guestbook (theContent, thePoster, datePosted) VALUES ('Inläggets innehåll', 'Martin', NOW() )
5c) SELECT * FROM guestbook WHERE datePosted >= '2011-1-1 00:00:00' AND datePosted <= '2011-12-31 23:59:59'
*/

?>

<!-- FUNCTIONS -->
<?php
//Fråga 2
function write_numbers($str1, $str2)
{
	$res = $str1 * $str2;
	echo "$str1 gånger $str2 är $res";
}

//Fråga 3
function uclast($string)
{
	$ordet  = $string;
	$uclast = strrev(ucwords(strrev($string)));
	
	echo $uclast;
}
?>