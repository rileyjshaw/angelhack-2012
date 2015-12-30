<?php

include "include/functions_user.php";

print_r($_POST);
if(!isset($_POST['do_register'])) display_register_form();
else register_user();

?>
