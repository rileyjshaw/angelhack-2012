<?php
include('include/mysql.php');
$mysql = new mysql;
$mysql->dbconnect();
$arr = $mysql->dbquery_select('users', '*', "username=Wheelz");
while($row = mysql_fetch_array($arr)) {
	print_r($row);
}
$mysql->dbquery_delete('users', username=Tom);
?>
