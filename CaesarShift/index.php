<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../output.css">
</head>
<body>
<?php
	echo "<a href='../'>HOME</a><br /><br />";
	echo "<title>Caeser Shift</title>";
	echo "Caeser Shift<br /><br />\n";
	
	if (!isset($_POST['alphabet']))
	{
		$_POST['alphabet'] = "abcdefghijklmnopqrstuvwxyz";
	}
	
	if (strlen($_POST['alphabet']) > 50)
	{
		$_POST['alphabet'] = substr($_POST['alphabet'],0,50);
	}
	
	if (strlen($_POST['data']) > 3000)
	{
		$_POST['data'] = substr($_POST['data'],0,3000);
	}
	
	echo "<form action='#' method='post'>\n";
		echo "	Data:<br /><textarea name='data' rows='4' cols='50' style='font-family:serif'>".$_POST['data']."</textarea><br /><br />\n";
		echo "	Alphabet - <input type='input' name='alphabet' size='40' value='".$_POST['alphabet']."'><br />\n";
		echo "	<input type='submit' value='Submit'>\n";
	echo "</form><br />\n";
	
	$alphabet = str_split(strtolower($_POST['alphabet']));
	$uAlphabet = str_split(strtoupper($_POST['alphabet']));
	
	echo "##############################################################<br>\n";
	echo nl2br($_POST['data'])."<br />\n";
	echo "--------------------<br>\n";
	for ($i = 1; $i < count($alphabet); $i ++) {
		$offsetString = "";
		$length = strlen($_POST['data']);
		for ($x = 0; $x < $length; $x++) {
			$char = substr($_POST['data'],$x,1);
			$index = array_search(strtolower($char),$alphabet);
			if ($index !== False) {
				if ($index+$i > count($alphabet)-1) {
					$index -= count($alphabet);
				}
				$offsetString .= $uAlphabet[$index+$i];
			}
		}
		echo str_pad($i, 2, '0', STR_PAD_LEFT).": ".$offsetString."<br>\n";
	}
	echo "##############################################################<br>\n";
?>
</body>
</html>
