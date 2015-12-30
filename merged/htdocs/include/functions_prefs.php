<?php
session_start();
include "mysql.php";
$mysql = new mysql;
$mysql->dbconnect();

function add_to_prefs($user,$num,$pref){
	$row = mysql_query("SELECT user_prefs FROM users WHERE username='$user'");
	$pfetch = mysql_fetch_array($row);
	print_r($pfetch);
	$prefs = explode(",",$pfetch[0]);
	$prefs[$num-1] = $pref;
	$updated = implode(",",$prefs);
	mysql_query("UPDATE users SET user_prefs='$updated' WHERE username='$user'");
	//print_r($prefs);
}

?>
