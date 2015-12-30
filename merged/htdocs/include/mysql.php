<?php

include "config.php";

class mysql {
    
public function dbconnect() {
    global $db_username;
    global $db_password;
    global $db_database;
    global $db_host;    
    $conn = mysql_connect($db_host, $db_username, $db_password);
	mysql_selectdb($db_database);
}
/*
Set returnval=true if we're not returning data (i.e., seeing if a table was successfully updated etcetc..)
*/
public function query_execute($query, $returnval = false) {
    if($returnval) {
	$comm = mysql_query($query);
	if($comm === false) {
		die(mysql_error());
	}
        if(mysql_affected_rows() > 0) {
            return true;
        }
    } else {
	$comm = mysql_query($query);
        if(!$comm) {
		die(mysql_error());
                //$this->mysql_handle_errors(0);
            }
        return $comm;
    }
}

public function dbquery_select($table = '', $keys = '', $where = '') {
    $this->query = "SELECT ";
    if(is_array($keys)) {
        for($i = 0; $i < count($keys); $i++) {
            $this->query .= mysql_real_escape_string($keys[$i]);
            if($i != count($keys) - 1) {
                $this->query .= ",";
            }
        }
    } else {
        $this->query .= mysql_real_escape_string($keys);
    }
    	$this->query .= " FROM $table";
	if($where != "") {
	$this->query .= " WHERE ";
        $line = explode('=', $where);
    	$keyz = $line[0] . '=';
    	$val = mysql_real_escape_string($line[1]);
	$this->query .= "$keyz";
	$this->query .= "'$val'";
	}
        $comm = $this->query_execute($this->query);
        return $comm;
}

public function dbquery_insert($table = '', $keys = '', $vals = '') {
    $query = "INSERT INTO $table (";
    if(is_array($keys)) {
        for($i = 0; $i < count($keys); $i++) {
            $query .= "`".mysql_real_escape_string($keys[$i])."`";
            if($i != count($keys) - 1) {
                $query .= ',';
            }
        }
    } else {
        $keys = "`".mysql_real_escape_string($keys)."`";
        $query .= $keys;
    }
    $query .= ") VALUES (";
    if(is_array($vals)) {
        for($i = 0; $i < count($vals); $i++) {
            $query .= "'".mysql_real_escape_string($vals[$i])."'";
            if($i < count($vals) - 1) {
                $query .= ",";
            }
        }
    } else {
        $query .= "'".mysql_real_escape_string($vals)."'";
    }
    $query .= ')';
   echo $query;
    $this->query_execute($query, true);
}

public function dbquery_update($table='', $keys='', $vals='', $where='') {
    $query = "UPDATE $table SET ";
    if(is_array($keys)) { //Only need to check for one arg being an array...both args will be equal in set values
        for($i = 0; $i < count($keys); $i++) {
            $query .= "`".mysql_real_escape_string($keys[$i])."`"."='".mysql_real_escape_string($vals[$i])."'";
            if($i < count($keys) - 1) {
                $query .= ',';
            }
        }
    } else {
        $query .= "`".mysql_real_escape_string($keys)."`='".mysql_real_escape_string($vals)."'";
    }
    $arr = explode('=', $where); //Need to sanitize value after =, sanitize both just in case.....
    $where = " WHERE " . mysql_real_escape_string($arr[0]).'='."'".mysql_real_escape_string($arr[1])."'";
    $query .= $where;
    echo $query;
    $this->query_execute($query);
}

public function dbquery_delete($table, $where) {
    $query = "DELETE FROM $table ";
    echo $where;
    $arr = explode("=", $where); //Need to sanitize value after = ....might as well sanitize both
    $query .= " WHERE " . mysql_real_escape_string($arr[0]) . '=' . "'".mysql_real_escape_string($arr[1])."'";
    echo $query;
    $this->query_execute($query);
}
    
public function mysql_handle_errors($error) {
    global $mysql_error_display;
    global $mysql_error_extended;
    if($mysql_error_extended) {
        echo "<b>".mysql_error()." (ERRNO: ".mysql_errno().")</b><br>";
    }
        
    if($mysql_error_display) {
	switch($error) {
        case 0:
                die("Error contacting database!");
            case 1:
                die("Error executing query!");
            case 2:
                die("Table does not exist!");
	}
        } else {
            die("");
	}
    }
}

?>
