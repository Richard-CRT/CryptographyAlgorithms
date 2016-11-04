<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../output.css">
</head>
<body>
<?php
	function utf8_strrev($str){
    preg_match_all('/./us', $str, $ar);
    return join('', array_reverse($ar[0]));
}
	echo "<a href='../'>HOME</a><br /><br />";
	echo "<title>Text Reverser</title>";
	echo "Text Reverser<br /><br />\n";
	
	if (!isset($_POST['text']))
	{
		$_POST['text'] = "";
	}
	
	if (strlen($_POST['text']) > 3000)
	{
		$_POST['text'] = substr($_POST['data'],0,3000);
	}
	
	echo "<form action='#' method='post'>\n";
	echo "	Data:<br /><textarea name='text' rows='4' cols='50' style='font-family:serif'>".$_POST['text']."</textarea><br /><br />\n";
	echo "	<input type='submit' value='Submit'>\n";
	echo "</form><br />\n";
	
	$text = strtoupper($_POST['text']);
	$reversedText = utf8_strrev($text);
	
	echo "##############################################################<br />\n";
	echo nl2br($text)."<br />\n";
	echo "--------------------<br>\n";
	echo nl2br($reversedText)."<br />\n";
	echo "##############################################################<br />\n";
?>
</body>
</html>