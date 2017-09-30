<?php
if (isset($_POST['password']))
{
	if (('admin' == $_POST['u']) && ('abc123' == $_POST['p']))
		die("Congratulations ! The flag is: BruT34llt3hP4ssw0rd");
	else
		die('Nope!');
}
?>
<!--
TODO: Change admin password. Currently using very weak password.
-->
<!DOCTYPE html>
<html><head><meta charset="UTF-8" /><title>KICTM 2017 CTF - sendme</title></head>
<body>
<p>STOP! ONLY admin can view restricted info (^^,)</p>
<form method="post">
<input type="text" name="p" value="" /><input type="submit" value="Check" />
</form><input type="hidden" name="u" value="user" />
</body>
</html>
