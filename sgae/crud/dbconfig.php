<?php

$DB_host = "db4free.net";
$DB_user = "sgaeteam";
$DB_pass = "teamsgae";
$DB_name = "sgae";


try
{
 $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $DB_con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");

}
catch(PDOException $e)
{
 echo $e->getMessage();
}

return $DB_con;

//include_once 'class.crud.php';

//$crud = new crud($DB_con);

?>