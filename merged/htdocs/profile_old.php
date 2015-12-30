<?php

include "include/mysql.php";
$mysql = new mysql;
$mysql->dbconnect();


function parse_preferences($user_pref_data, $tags) {
    $total = 0;
    $totals = 0;//array('totals' => array());
    $results = array('destination' => array(), 'scores' => array());
    $res = mysql_query("SELECT * FROM content WHERE search_tags LIKE '%$tags%'");
    while($row = mysql_fetch_assoc($res)) {
        $results['destination'][] = $row['name'];
	$results['scores'][] = $row['rankings'];
    }
    print_r($results);
    $arr = explode(',', $user_pref_data);
    $user_prefs = explode(',', $user_pref_data['scores']);
    for($y = 0; $y < count($results['destination']); $y++) {
	$temp = explode(',', $results['scores'][$y]);
	print_r($temp);
        for($i = 0; $i < count($user_prefs); $i++) {
		echo "DEBUG: ".$user_prefs[$i]." * ".$temp[$i]." = " . $user_prefs[$i] * $temp[$i] . "<br>";
            $totals += (intval($user_prefs[$i]) * intval($results['scores'][$i]));
		echo $totals;
        }
    }
    print_r($totals);
}

parse_preferences("5,8,9,10,1,4,6,7,3,2,1,6,7,3", 'mus')

?>
