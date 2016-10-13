<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../output.css">
</head>
<body>
<?php
	echo "<a href='../'>HOME</a><br /><br />";
	echo "<title>Text Reverser</title>";
	echo "Text Reverser<br /><br />\n";
	
	if (!isset($_POST['text']))
	{
		$_POST['text'] = "";
	}
	
	echo "<form action='#' method='post'>\n";
	echo "	Data:<br /><textarea name='text' rows='4' cols='50' style='font-family:serif'>".$_POST['text']."</textarea><br /><br />\n";
	echo "	<input type='submit' value='Submit'>\n";
	echo "</form><br />\n";
	
	$text = strtoupper($_POST['text']);
	$reversedText = strrev($text);
	
	echo "##############################################################<br />\n";
	echo nl2br($text)."<br />\n";
	echo "--------------------<br>\n";
	echo nl2br($reversedText)."<br />\n";
	echo "##############################################################<br />\n";
?>
</body>
</html>
