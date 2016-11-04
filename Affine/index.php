<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../output.css">
</head>
<body>
<?php
	function findInverse($a, $m)
	{
		$inverse = 0;
		for ($x = 1; $x < $m; $x++)
		{
			if (($a * $x) % $m == 1)
			{
				return $x;
			}
		}
		return false;
	}
	
	function charToNum($alphabet, $char)
	{
		$num = array_search($char,$alphabet);
		return $num;
	}
	
	function numToChar($alphabet, $num)
	{
		return $alphabet[$num];
	}
	
	function properMod($num, $divisor)
	{
		$mod = $num % $divisor;
		if ($mod < 0)
		{
			$mod += $divisor;
		}
		return $mod;
	}
	
	function decryptChar($a, $b, $m, $inverse, $cipherNum)
	{
		$mod = properMod($inverse*($cipherNum - $b),$m);
		return $mod;
	}
	
	function decrypt($cipherText, $alphabet, $a, $b, $m, $inverse)
	{
		$cipherArr = str_split($cipherText);
		$plainText = "";
		foreach ($cipherArr as $cipherChar)
		{
			$cipherNum = charToNum($alphabet, $cipherChar);
			if ($cipherNum !== false)
			{
				$plainNum = decryptChar($a, $b, $m, $inverse, $cipherNum);
				$plainChar = numToChar($alphabet, $plainNum);
				$plainText .= $plainChar;
			}
		}
		return $plainText;
	}
	
	function gcd ($x, $y) {
		return $y ? gcd($y, $x % $y) : $x;
	}

	echo "<a href='../'>HOME</a><br /><br />";
	echo "<title>Affine</title>";
	echo "Affine<br /><br />\n";
	
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
	
	$alphabet = str_split(strtoupper($_POST['alphabet']));
	$m = count($alphabet);
	$cipherText = strtoupper($_POST['data']);
	
	echo "<form action='#' method='post'>\n";
		echo "	Data:<br /><textarea name='data' rows='4' cols='50' style='font-family:serif'>".$_POST['data']."</textarea><br /><br />\n";
		echo "	Alphabet - <input type='input' name='alphabet' size='40' value='".$_POST['alphabet']."'><br /></br>\n";
	
	echo "<table class='affine'>";
	echo "<tr><th>Brute</th><th>Mathematically Crack f(x) = (ax + b) mod ".$m."</th></tr>";
	echo "<tr>";
	echo "<td>";
		echo "	<input name='bruteForceButton' type='submit' value='Brute Force'><br /><br />\n";
	echo "</td>";
	echo "<td>";
		echo "	f(<input type='input' name='plainchar1' size='3' value='".$_POST['plainchar1']."'>) = <input type='input' name='cipherchar1' size='3' value='".$_POST['cipherchar1']."'><br />\n";
		echo "	f(<input type='input' name='plainchar2' size='3' value='".$_POST['plainchar2']."'>) = <input type='input' name='cipherchar2' size='3' value='".$_POST['cipherchar2']."'><br /><br />\n";
		echo "	<input name='crackButton' type='submit' value='Crack'>\n";
	echo "</td>";
	echo "</tr></table>";
	echo "</form><br />\n";
	
	$crack = false;
	if (isset($_POST['crackButton']) and isset($_POST['cipherchar1']) and $_POST['cipherchar1'] != "" and isset($_POST['cipherchar2']) and $_POST['cipherchar2'] != "" and isset($_POST['plainchar1']) and $_POST['plainchar1'] != "" and isset($_POST['plainchar2']) and $_POST['plainchar2'] != "")
	{
		$crack = true;
	}
	
	echo "f(x) = (ax + b) mod (".$m.")<br /><br />";
	if ($cipherText != "")
	{
		if ($crack)
		{
			echo "Crack Results:<br /><br />";
			$cipherNum1 = charToNum($alphabet, strtoupper($_POST['cipherchar1']));
			$plainNum1 = charToNum($alphabet, strtoupper($_POST['plainchar1']));
			// ($plainNum1 * a) + b = $cipherNum1 (mod m)
		
			$cipherNum2 = charToNum($alphabet, strtoupper($_POST['cipherchar2']));
			$plainNum2 = charToNum($alphabet, strtoupper($_POST['plainchar2']));
			// ($plainNum2 * a) + b = $cipherNum2 (mod m)
			
			if ($plainNum1 == $plainNum2)
			{
				echo "Error<br />";
			}
			else
			{
				echo "a(".strtoupper($_POST['plainchar1']).") + b = ".strtoupper($_POST['cipherchar1'])."<br />";
				echo "a(".strtoupper($_POST['plainchar2']).") + b = ".strtoupper($_POST['cipherchar2'])."<br /><br />";
				
				echo $plainNum1."a + b = ".$cipherNum1." (mod ".$m.")<br />";
				echo $plainNum2."a + b = ".$cipherNum2." (mod ".$m.")<br /><br />";
				if ($plainNum1 > $plainNum2)
				{
					$differenceA = $plainNum1 - $plainNum2;
					$differenceCipher = $cipherNum1 - $cipherNum2;
					// ($plainNum1 - $plainNum2)a = ($cipherNum1 - $cipherNum2)
				}
				else if ($plainNum1 < $plainNum2)
				{
					$differenceA = $plainNum2 - $plainNum1;
					$differenceCipher = $cipherNum2 - $cipherNum1;
					// ($plainNum2 - $plainNum1)a = ($cipherNum2 - $cipherNum1)
				}
				
				echo "[".$differenceA."a = ".$differenceCipher." (mod ".$m.")]<br />";		
				
				$differenceCipher = properMod($differenceCipher, $m);			
				echo $differenceA."a = ".$differenceCipher." (mod ".$m.")<br /><br />";
				
				$inverseOfDifference = findInverse($differenceA,$m);
				$a = properMod($inverseOfDifference * $differenceCipher,$m);
				echo "&#8658; a = ".$a."<br /><br/>";
				
				$aProduct = $plainNum1 * $a;
				echo $plainNum1."(".$a.") + b = ".$cipherNum1." (mod ".$m.")<br />";
				echo $aProduct." + b = ".$cipherNum1." (mod ".$m.")<br />";
				echo "b = ".$cipherNum1." - ".$aProduct." (mod ".$m.")<br /><br />";
				
				$b = $cipherNum1-$aProduct;
				echo "[b = ".$b." (mod ".$m.")]<br />";
				
				$b = properMod($b, $m);
				echo "&#8658; b = ".$b."<br /><br />";
				
				echo "f(x) = (".$a."x + ".$b.") mod ".$m."<br /><br />";
				
				echo "Decrypted Text:<br />";
				$inverse = findInverse($a, $m);
				$plainText = decrypt($cipherText, $alphabet, $a, $b, $m, $inverse);
				echo strtoupper($plainText)."<br />";
			}
		}
		else
		{
			echo "Brute Force Results:<br /><br />";
			echo "##############################################################<br>\n";
			echo "Original:<br />\n";
			echo nl2br($cipherText)."<br />\n";
			for ($a = 1; $a <= $m; $a++)
			{
				$gcd = gcd($a, $m);
				if ($gcd == 1)
				{
					$inverse = findInverse($a, $m);
					for ($b = 0; $b < $m; $b++)
					{
						echo "-------------------------------------------<br />\n";
						echo "a = ".$a." | b = ".$b." | f(x) = (".$a."x + ".$b.") mod ".$m."<br />";
						$plainText = decrypt($cipherText, $alphabet, $a, $b, $m, $inverse);
						echo $plainText."<br />";
					}
				}
			}
			echo "##############################################################<br>\n";
		}
	}
?>
</body>
</html>
