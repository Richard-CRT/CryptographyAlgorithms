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
	echo "	A - <input type='input' name='a' size='3' value='".$_POST['a']."'><br />\n";
	echo "	B - <input type='input' name='b' size='3' value='".$_POST['b']."'><br />\n";
	echo "	C - <input type='input' name='c' size='3' value='".$_POST['c']."'><br />\n";
	echo "	D - <input type='input' name='d' size='3' value='".$_POST['d']."'><br />\n";
	echo "	E - <input type='input' name='e' size='3' value='".$_POST['e']."'><br />\n";
	echo "	F - <input type='input' name='f' size='3' value='".$_POST['f']."'><br />\n";
	echo "	G - <input type='input' name='g' size='3' value='".$_POST['g']."'><br />\n";
	echo "	H - <input type='input' name='h' size='3' value='".$_POST['h']."'><br />\n";
	echo "	I - <input type='input' name='i' size='3' value='".$_POST['i']."'><br />\n";
	echo "	J - <input type='input' name='j' size='3' value='".$_POST['j']."'><br />\n";
	echo "	K - <input type='input' name='k' size='3' value='".$_POST['k']."'><br />\n";
	echo "	L - <input type='input' name='l' size='3' value='".$_POST['l']."'><br />\n";
	echo "	M - <input type='input' name='m' size='3' value='".$_POST['m']."'><br />\n";
	echo "	N - <input type='input' name='n' size='3' value='".$_POST['n']."'><br />\n";
	echo "	O - <input type='input' name='o' size='3' value='".$_POST['o']."'><br />\n";
	echo "	P - <input type='input' name='p' size='3' value='".$_POST['p']."'><br />\n";
	echo "	Q - <input type='input' name='q' size='3' value='".$_POST['q']."'><br />\n";
	echo "	R - <input type='input' name='r' size='3' value='".$_POST['r']."'><br />\n";
	echo "	S - <input type='input' name='s' size='3' value='".$_POST['s']."'><br />\n";
	echo "	T - <input type='input' name='t' size='3' value='".$_POST['t']."'><br />\n";
	echo "	U - <input type='input' name='u' size='3' value='".$_POST['u']."'><br />\n";
	echo "	V - <input type='input' name='v' size='3' value='".$_POST['v']."'><br />\n";
	echo "	W - <input type='input' name='w' size='3' value='".$_POST['w']."'><br />\n";
	echo "	X - <input type='input' name='x' size='3' value='".$_POST['x']."'><br />\n";
	echo "	Y - <input type='input' name='y' size='3' value='".$_POST['y']."'><br />\n";
	echo "	Z - <input type='input' name='z' size='3' value='".$_POST['z']."'><br />\n";
	echo "	Data:<br /><textarea name='data' rows='4' cols='50' style='font-family:serif'>".$_POST['data']."</textarea><br />\n";
	echo "	<input type='submit' value='Submit'>\n";
	echo "</form><br />";
	
	$characters = array();
	$characters['A'] = $_POST['a'];
	$characters['B'] = $_POST['b'];
	$characters['C'] = $_POST['c'];
	$characters['D'] = $_POST['d'];
	$characters['E'] = $_POST['e'];
	$characters['F'] = $_POST['f'];
	$characters['G'] = $_POST['g'];
	$characters['H'] = $_POST['h'];
	$characters['I'] = $_POST['i'];
	$characters['J'] = $_POST['j'];
	$characters['K'] = $_POST['k'];
	$characters['L'] = $_POST['l'];
	$characters['M'] = $_POST['m'];
	$characters['N'] = $_POST['n'];
	$characters['O'] = $_POST['o'];
	$characters['P'] = $_POST['p'];
	$characters['Q'] = $_POST['q'];
	$characters['R'] = $_POST['r'];
	$characters['S'] = $_POST['s'];
	$characters['T'] = $_POST['t'];
	$characters['U'] = $_POST['u'];
	$characters['V'] = $_POST['v'];
	$characters['W'] = $_POST['w'];
	$characters['X'] = $_POST['x'];
	$characters['Y'] = $_POST['y'];
	$characters['Z'] = $_POST['z'];
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
