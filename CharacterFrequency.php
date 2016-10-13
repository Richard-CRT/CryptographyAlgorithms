<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../output.css">
</head>
<body>
<?php
	echo "<a href='../'>HOME</a><br /><br />";
	echo "<title>Character Frequency</title>";
	echo "Character Frequency<br /><br />\n";
	
	if (!isset($_POST['possibleCharacters']))
	{
		$_POST['possibleCharacters'] = "abcdefghijklmnopqrstuvwxyz0123456789";
	}
	
	echo "<form action='#' method='post'>\n";
	echo "	Data:<br /><textarea name='data' rows='4' cols='50' style='font-family:serif'>".$_POST['data']."</textarea><br /><br />\n";
	echo "	Characters to count - <input type='input' name='possibleCharacters' size='100' value='".$_POST['possibleCharacters']."'><br />\n";
	echo "	<input type='submit' value='Submit'>\n";
	echo "</form><br />\n";
	
	$characters = array();
	$stringArr = str_split(strtolower($_POST['data']));
	$possibleCharacters = str_split(strtolower($_POST['possibleCharacters']));
	$newData = "";
	foreach ($stringArr as $char) {
		if (in_array($char,$possibleCharacters)) {
			if (array_key_exists($char,$characters)) {
				$characters[$char] = $characters[$char] + 1;
				
			} else {
				$characters[$char] = 1;
			}
			$newData .= $char;
		}
	}
	
	$length = strlen($newData);
	
	//ksort($characters);
	arsort($characters);
	echo "##############################################################<br />\n";
	echo $newData."<br>\n";
	echo "##############################################################<br /><br />\n";
	echo "Total - ".$length."<br />";
	
	$charactersToDisplay = array();
	$englishCharactersToDisplay = array();
	
	foreach ($characters as $char => $count) {
		$character = array(strtoupper($char),($count/$length)*100);
		array_push($charactersToDisplay,$character);
		
		echo "'".htmlspecialchars($char)."' - ".$count."<br>\n";
	}
	array_push($englishCharactersToDisplay, array("E",12.49));
	array_push($englishCharactersToDisplay, array("T",09.28));
	array_push($englishCharactersToDisplay, array("A",08.04));
	array_push($englishCharactersToDisplay, array("O",07.64));
	array_push($englishCharactersToDisplay, array("I",07.57));
	array_push($englishCharactersToDisplay, array("N",07.23));
	array_push($englishCharactersToDisplay, array("S",06.51));
	array_push($englishCharactersToDisplay, array("R",06.28));
	array_push($englishCharactersToDisplay, array("H",05.05));
	array_push($englishCharactersToDisplay, array("L",04.07));
	array_push($englishCharactersToDisplay, array("D",03.34));
	array_push($englishCharactersToDisplay, array("C",03.34));
	array_push($englishCharactersToDisplay, array("U",02.73));
	array_push($englishCharactersToDisplay, array("M",02.51));
	array_push($englishCharactersToDisplay, array("F",02.40));
	array_push($englishCharactersToDisplay, array("P",02.14));
	array_push($englishCharactersToDisplay, array("G",01.87));
	array_push($englishCharactersToDisplay, array("W",01.68));
	array_push($englishCharactersToDisplay, array("Y",01.66));
	array_push($englishCharactersToDisplay, array("B",01.48));
	array_push($englishCharactersToDisplay, array("V",01.05));
	array_push($englishCharactersToDisplay, array("K",00.54));
	array_push($englishCharactersToDisplay, array("X",00.23));
	array_push($englishCharactersToDisplay, array("J",00.16));
	array_push($englishCharactersToDisplay, array("Q",00.12));
	array_push($englishCharactersToDisplay, array("Z",00.09));
?>
<br />
<table class="characterfrequency">
	<tr><th colspan=2>English</th><th colspan=2>Sample</th></tr>
	<tr><th>Letter</th><th>Percentage</th><th>Letter</th><th>Percentage</th></tr>
<?php
	for ($i = 0; $i < max(count($englishCharactersToDisplay),count($charactersToDisplay)); $i++)
	{
		if (!isset($englishCharactersToDisplay[$i]))
		{
			echo "<tr><td></td><td></td><td>".$charactersToDisplay[$i][0]."</td><td>".$charactersToDisplay[$i][1]."%</td></tr>\n";
		}
		else if (!isset($charactersToDisplay[$i]))
		{
			echo "<tr><td>".$englishCharactersToDisplay[$i][0]."</td><td>".$englishCharactersToDisplay[$i][1]."%</td><td></td><td></td></tr>\n";
		}
		else
		{
			echo "<tr><td>".$englishCharactersToDisplay[$i][0]."</td><td>".$englishCharactersToDisplay[$i][1]."%</td><td>".$charactersToDisplay[$i][0]."</td><td>".$charactersToDisplay[$i][1]."%</td></tr>\n";
		}
	}
?>
</table>
</body>
</html>
