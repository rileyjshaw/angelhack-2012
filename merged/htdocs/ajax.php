<?php

session_start();
print_r($_SESSION);
function set_variable($arg = '', $value = '', $type = '') {
    if($type !== '') $_SESSION[$type][$arg] = $value;
    $_SESSION[$arg] = $value;
}

if($_REQUEST['function'] == 'set') {
    set_variable($_REQUEST['arg'], $_REQUEST['value']);
}

?>