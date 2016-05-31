<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['HTTP_HOST'] == 'localhost') {
	define('HOST', 'localhost');
	define('USER', 'sgaeteam');
	define('PASS', 'teamsgae');
	define('BASE', 'sgae');
}
else {

	define('HOST', 'mysql.hostinger.com.br'); 
	define('USER', 'u870770817_admin');
	define('PASS', 'teamsgae');
	define('BASE', 'u870770817_sgae');
}
$conn = mysql_connect(HOST, USER, PASS);
$base = mysql_select_db(BASE);

?>
