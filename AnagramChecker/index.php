<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../output.css">
</head>
<body>
<?php
	echo "<a href='../'>HOME</a><br /><br />";
	echo "<title>Anagram Checker</title>";
	echo "Anagram Checker<br /><br />\n";
	
	echo "<form action='#' method='post'>\n";
	echo "	Word 1 - <input type='input' name='word1' size='40' value='".$_POST['word1']."'><br />\n";
	echo "	Word 2 - <input type='input' name='word2' size='40' value='".$_POST['word2']."'><br />\n";
	echo "	<input type='submit' value='Submit'>\n";
	echo "</form><br />\n";
	
	if (strlen($_POST['word1']) > 40)
	{
		$_POST['word1'] = substr($_POST['word1'],0,40);
	}
	
	if (strlen($_POST['word2']) > 40)
	{
		$_POST['word2'] = substr($_POST['word2'],0,40);
	}
	
	$word1Arr = str_split(strtolower($_POST['word1']));
	$word2Arr = str_split(strtolower($_POST['word2']));
	sort($word1Arr);
	sort($word2Arr);
	echo "##############################################################<br />\n";
	echo $_POST['word1']."<br>\n";
	echo "--------------------<br>\n";
	echo $_POST['word2']."<br>\n";
	echo "##############################################################<br /><br />\n";
	if ($word1Arr === $word2Arr) {
		echo "Yes, they are anagrams<br>\n";
	} else {
		echo "No, they are not anagrams<br>\n";
	}
?>
</body>
</html>
