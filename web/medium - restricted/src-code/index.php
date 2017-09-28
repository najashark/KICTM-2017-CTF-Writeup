<?php

if (isset($_POST['f']))
{
	if ((strpos($_POST['f'], '../') !== false) || (strpos($_POST['f'], '..\\') !== false))
		die('IDS: Attack detected.');
		
	$fil = $_POST['f'];
	
	$e = strpos($fil, '%00');
	
	if (strpos($fil, 'index.php%00') === 0)
		die(file_get_contents('fake.php'));
	
	if ($e > 0) //simulate
	{
		$fil = substr($fil, 0, $e);
		die(file_get_contents($fil));
	}
	else
		die(file_get_contents($fil.".txt"));
}
?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8" /><title>KICTM 2017 CTF - restricted</title></head>
<body>
<p>Read articles from our collection of txt story files</p>
<form method="post">
<select name="f" >
   <option value="charkuehtiow">Char kway teow</option>
   <option value="roticanai">Roti Canai</option>
</select><input type="submit" value="View article" />
</form></body></html>











