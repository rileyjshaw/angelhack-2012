<?php

include "mysql.php";
$mysql = new mysql;
$mysql->dbconnect();

function parse_preferences($user_pref_data, $tags) {
    $total = 0;
    $results = array();
    $top = array();
    $user_prefs = explode(',', $user_pref_data);
    $res = mysql_query("SELECT * FROM content");
    while($row = mysql_fetch_assoc($res)) {
        $results['name'][] = $row['name'];
        $results['rankings'][] = $row['rankings'];
    }
    for($x = 0; $x < count($results['name']); $x++) {
        $destination = $results['name'][$x];
        $rankings = explode(',', $results['rankings'][$x]);
        for($i = 0; $i < count($user_prefs); $i++) {
            $top[$destination]['rankings'] += ($user_prefs[$i] * $rankings[$i]);
        }
    }
    array_multisort($top, SORT_DESC);
    $best_selection = array_keys($top);
    $thaboss = $best_selection[0];
    $second_suggestion = $best_selection[1];
    $third_suggestion = $best_selection[2];
    
    $res = mysql_query("SELECT * FROM content WHERE name = '".$thaboss."'");
    $row = mysql_fetch_array($res);
    echo "Destination choosen: <b>$row[name]</b><br>$row[address] ($row[phone_number])<br><br>$row[description]<br><br>Price: <b>\$$row[price]</b>";
}

parse_preferences("0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 3, 0.5, 0.5", 'mus');

?>
