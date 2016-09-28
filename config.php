<?php
error_reporting(0);
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'vijay');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if(!$link) {
die('Failed to connect to server: ' . mysql_error());
}

$db = mysql_select_db(DB_DATABASE);
if(!$db) {
die("Unable to select database");
}
ini_set('post_max_size', '64M');
$mainurl="http://localhost/provab/";
?>