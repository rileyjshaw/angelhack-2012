<?php

class omgsocks {
    
    public function fetch_data($site) {
        $ch = curl_init($site) or die(curl_error());
        //curl_setopt($ch, CURLOPT_REFERER, "http://www.google.ca");
        //curl_setopt($ch, CURLOPT_USERAGENT, "wir3dev");
        //curl_setopt($ch, CURLOPT_POST, true);
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        echo $data;
        curl_close($ch);
        return $data;
    }
    
    public function parse_data($data) {
        $linez = explode("\n", $data);
        foreach($linez as $ln) {
            preg_match("/^<p class = \"partial\">(.*)<p>/", $ln, $results);
            print_r($results);
            preg_match("/^<span class = \"ratingDate\">(.*)<span class/", $ln, $results);
            print_r($results);
        }
    }
    
    
}

?>