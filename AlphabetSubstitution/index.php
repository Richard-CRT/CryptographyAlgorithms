<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../output.css">
</head>
<body>
<?php
	echo "<a href='../'>HOME</a><br /><br />";
	echo "<title>Alphabet Substitution</title>";
	echo "Alphabet Substitution<br /><br />\n";
	
	echo "<form action='#' method='post'>\n";
	echo "	f(<input type='input' name='a' size='3' value='".substr($_POST['a'],0,1)."'>) - <span style='color:#ff0000;'>A</span><br />\n";
	echo "	f(<input type='input' name='b' size='3' value='".substr($_POST['b'],0,1)."'>) - <span style='color:#ff0000;'>B</span><br />\n";
	echo "	f(<input type='input' name='c' size='3' value='".substr($_POST['c'],0,1)."'>) - <span style='color:#ff0000;'>C</span><br />\n";
	echo "	f(<input type='input' name='d' size='3' value='".substr($_POST['d'],0,1)."'>) - <span style='color:#ff0000;'>D</span><br />\n";
	echo "	f(<input type='input' name='e' size='3' value='".substr($_POST['e'],0,1)."'>) - <span style='color:#ff0000;'>E</span><br />\n";
	echo "	f(<input type='input' name='f' size='3' value='".substr($_POST['f'],0,1)."'>) - <span style='color:#ff0000;'>F</span><br />\n";
	echo "	f(<input type='input' name='g' size='3' value='".substr($_POST['g'],0,1)."'>) - <span style='color:#ff0000;'>G</span><br />\n";
	echo "	f(<input type='input' name='h' size='3' value='".substr($_POST['h'],0,1)."'>) - <span style='color:#ff0000;'>H</span><br />\n";
	echo "	f(<input type='input' name='i' size='3' value='".substr($_POST['i'],0,1)."'>) - <span style='color:#ff0000;'>I</span><br />\n";
	echo "	f(<input type='input' name='j' size='3' value='".substr($_POST['j'],0,1)."'>) - <span style='color:#ff0000;'>J</span><br />\n";
	echo "	f(<input type='input' name='k' size='3' value='".substr($_POST['k'],0,1)."'>) - <span style='color:#ff0000;'>K</span><br />\n";
	echo "	f(<input type='input' name='l' size='3' value='".substr($_POST['l'],0,1)."'>) - <span style='color:#ff0000;'>L</span><br />\n";
	echo "	f(<input type='input' name='m' size='3' value='".substr($_POST['m'],0,1)."'>) - <span style='color:#ff0000;'>M</span><br />\n";
	echo "	f(<input type='input' name='n' size='3' value='".substr($_POST['n'],0,1)."'>) - <span style='color:#ff0000;'>N</span><br />\n";
	echo "	f(<input type='input' name='o' size='3' value='".substr($_POST['o'],0,1)."'>) - <span style='color:#ff0000;'>O</span><br />\n";
	echo "	f(<input type='input' name='p' size='3' value='".substr($_POST['p'],0,1)."'>) - <span style='color:#ff0000;'>P</span><br />\n";
	echo "	f(<input type='input' name='q' size='3' value='".substr($_POST['q'],0,1)."'>) - <span style='color:#ff0000;'>Q</span><br />\n";
	echo "	f(<input type='input' name='r' size='3' value='".substr($_POST['r'],0,1)."'>) - <span style='color:#ff0000;'>R</span><br />\n";
	echo "	f(<input type='input' name='s' size='3' value='".substr($_POST['s'],0,1)."'>) - <span style='color:#ff0000;'>S</span><br />\n";
	echo "	f(<input type='input' name='t' size='3' value='".substr($_POST['t'],0,1)."'>) - <span style='color:#ff0000;'>T</span><br />\n";
	echo "	f(<input type='input' name='u' size='3' value='".substr($_POST['u'],0,1)."'>) - <span style='color:#ff0000;'>U</span><br />\n";
	echo "	f(<input type='input' name='v' size='3' value='".substr($_POST['v'],0,1)."'>) - <span style='color:#ff0000;'>V</span><br />\n";
	echo "	f(<input type='input' name='w' size='3' value='".substr($_POST['w'],0,1)."'>) - <span style='color:#ff0000;'>W</span><br />\n";
	echo "	f(<input type='input' name='x' size='3' value='".substr($_POST['x'],0,1)."'>) - <span style='color:#ff0000;'>X</span><br />\n";
	echo "	f(<input type='input' name='y' size='3' value='".substr($_POST['y'],0,1)."'>) - <span style='color:#ff0000;'>Y</span><br />\n";
	echo "	f(<input type='input' name='z' size='3' value='".substr($_POST['z'],0,1)."'>) - <span style='color:#ff0000;'>Z</span><br />\n";
	echo "	Data:<br /><textarea name='data' rows='4' cols='50' style='font-family:serif'>".$_POST['data']."</textarea><br />\n";
	echo "	<input type='submit' value='Submit'>\n";
	echo "</form><br />";
	
	if (strlen($_POST['data']) > 3000)
	{
		$_POST['data'] = substr($_POST['data'],0,3000);
	}
	
	$characters = array();
	$characters['A'] = substr($_POST['a'],0,1);
	$characters['B'] = substr($_POST['b'],0,1);
	$characters['C'] = substr($_POST['c'],0,1);
	$characters['D'] = substr($_POST['d'],0,1);
	$characters['E'] = substr($_POST['e'],0,1);
	$characters['F'] = substr($_POST['f'],0,1);
	$characters['G'] = substr($_POST['g'],0,1);
	$characters['H'] = substr($_POST['h'],0,1);
	$characters['I'] = substr($_POST['i'],0,1);
	$characters['J'] = substr($_POST['j'],0,1);
	$characters['K'] = substr($_POST['k'],0,1);
	$characters['L'] = substr($_POST['l'],0,1);
	$characters['M'] = substr($_POST['m'],0,1);
	$characters['N'] = substr($_POST['n'],0,1);
	$characters['O'] = substr($_POST['o'],0,1);
	$characters['P'] = substr($_POST['p'],0,1);
	$characters['Q'] = substr($_POST['q'],0,1);
	$characters['R'] = substr($_POST['r'],0,1);
	$characters['S'] = substr($_POST['s'],0,1);
	$characters['T'] = substr($_POST['t'],0,1);
	$characters['U'] = substr($_POST['u'],0,1);
	$characters['V'] = substr($_POST['v'],0,1);
	$characters['W'] = substr($_POST['w'],0,1);
	$characters['X'] = substr($_POST['x'],0,1);
	$characters['Y'] = substr($_POST['y'],0,1);
	$characters['Z'] = substr($_POST['z'],0,1);
	$stringArr = str_split(strtoupper($_POST['data']));
	$newData = "";
	foreach ($stringArr as $char) {
		if (array_key_exists($char,$characters)) {
			if ($characters[$char] != "") {
				$newData .= strtoupper($characters[$char]);
			} else {
				$newData .= "<span style='color:#ff0000;'>".$char."</span>";
			}
		} else {
			$newData .= $char;
		}
	}
	echo "##############################################################<br />\n";
	echo $newData."<br />\n";
	echo "##############################################################<br />\n";
?>
</body>
</html>
