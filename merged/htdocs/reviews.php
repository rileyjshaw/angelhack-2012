<?php
include "include/mysql.php";
$mysql = new mysql;
$mysql->dbconnect();

function display_reviews($hotel) {
    global $mysql;
    $res = $mysql->dbquery_select("reviews", '*');
    if(!$res) {
        echo "No reviews for hotel<br>";
    }
    
    while($row = mysql_fetch_array($res)) {
        echo "<b>$row[review_title]</b><br>
	$row[review_description]<br>
	User rating: <b>$row[review_rating]</b><br>
	<p align='right'>Date posted $row[review_date]</p>
	<br><br>";
    }
}

display_reviews('*');
?>
