<?php

/*  Congratulations ! The key is 1nclud3me1nUrPr4y3rs */

if (isset($_POST['f']))
{
	if ((strpos($_POST['f'], '../') !== false) || (strpos($_POST['f'], '..\\') !== false))
		die('IDS: Attack detected.');
		
	$fil = $_POST['f'];
	
	die(file_get_contents($fil.".txt"));
}
?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8" /><title>KICTM 2017 CTF - restricted</title></head>
<body>
<p>Read articles from our collection of story files</p>
<form method="post">
<select name="f" >
   <option value="charkuehtiow">Char kway teow</option>
   <option value="roticanai">Roti Canai</option>
</select><input type="submit" value="View article" />
</form></body></html>