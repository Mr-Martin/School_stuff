<?php
//Fr�ga 1
echo "Jag �r en mjukstart och ger en enkel po�ng";
echo "<hr>";

//Fr�ga 2
write_numbers(10, 5);
echo "<hr>";

//Fr�ga 3
uclast("Jag �r en str�ng");
echo "<hr>";

//Fr�ga 4b
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

//Fr�ga 5
/*
5a) SELECT * FROM guestbook ORDER BY GID DESC LIMIT 0, 10 
5b) INSERT INTO guestbook (theContent, thePoster, datePosted) VALUES ('Inl�ggets inneh�ll', 'Martin', NOW() )
5c) SELECT * FROM guestbook WHERE datePosted >= '2011-1-1 00:00:00' AND datePosted <= '2011-12-31 23:59:59'
*/

?>

<!-- FUNCTIONS -->
<?php
//Fr�ga 2
function write_numbers($str1, $str2)
{
	$res = $str1 * $str2;
	echo "$str1 g�nger $str2 �r $res";
}

//Fr�ga 3
function uclast($string)
{
	$ordet  = $string;
	$uclast = strrev(ucwords(strrev($string)));
	
	echo $uclast;
}
?>