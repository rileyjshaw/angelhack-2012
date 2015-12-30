<?php
include "include/functions_user.php";
if(isset($_SESSION['username'])){
	header('Location: index.php');
}

if(isset($_POST['username'])) login_user();
else display_login_form();

?>
