<?php

if (isset($_POST['u']))
{
	$i = $_POST['u'];
	
	if (strlen($i) > 15)
		die("Username too long !");
	
	if ((strpos(strtolower($i), ' or ') !== false) || (strpos($i, '<') !== false) || (strpos($i, ' = ') !== false) || (strpos($i, '1=1') !== false) || (strpos($i, '--') !== false) || (strpos($i, '/*') !== false))
		die('IDS: SQL injection detected !');
		
	if (strpos(strtolower($i), '\'=\'\' limit 1,1#') === 0)
		die("Flag is 5h0Rt4nD4w33t$QLiYa4y");
	
	//simulate
	if ((strpos(strtolower($i), '\'=\'\' limit') === 0)&&(strpos(strtolower($i), '#') > 0))
		die("Not an admin level user !");
	
	if ((strpos(strtolower($i), '\'=\'\'') === 0)&&(strpos(strtolower($i), '#') > 0)&&(strlen($i) < 9))
		die("Not an admin level user !");
	
	die();
}
?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8" /><title>KICTM 2017 CTF - admin</title></head>
<body>
<p>Only user with 'admin' privileges is allowed to login !</p>
<form method="post">
<input type="text" name="u" />
<input type="password" name="p" />
<input type="submit" value="Login" />
</form></body></html>











