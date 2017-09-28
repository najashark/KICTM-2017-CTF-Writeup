<?php

if (isset($_COOKIE['_ga']))
{
	if (strrev(str_rot13($_COOKIE['_ga'])) == 'admin')
		$x = 'The key is : B15kuTTakB0l3M4kaN';
}
else
{
	setcookie('_ga', str_rot13(strrev('user')));
}

?>
<!DOCTYPE html>
<html><head><meta charset="UTF-8" /><title>KICTM 2017 CTF - admin</title></head>
<body><h2><?php

	if (isset($x))
		echo $x;
	else
		echo '<i>user</i> is not authorized to view this page !';



?></h2></body></html>











