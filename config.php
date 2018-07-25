<?php
ini_set('display_errors', 0);
error_reporting(0);
$mysql_host = "mysql14.000webhost.com";
$mysql_database = "a2181830_db";
$mysql_user = "a2181830_lcs";
$mysql_password = "l2c0s1w2db";

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
?>