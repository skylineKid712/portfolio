<?php

$DB_host = "localhost";
$DB_user = "gwwhitney";
$DB_pass = "ichiBahn_712";
$DB_name = "gwhit-db";

try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

//add neccessary code to import class.crud.php once
include_once ("class.crud.php");

$crud = new crud($DB_con);

?>