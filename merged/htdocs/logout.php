<?php
session_start();
unset($_SESSION['username']);
session_destroy();
echo "Successfully logged out...";
header("Location: index.php");
?>
