<?php
session_start();
if(isset($_SESSION['verify']) && !is_null($_SESSION['verify'])){
echo "<form action=\"reset.php\" method=\"post\">";


                $verifySesh = $_SESSION['verify'];
                $verifyGet = $_GET['verify'];
echo $verifySesh . $verifyGet;


	if(!isset($_GET['verify']) || is_null($_GET['verify'])){
		echo "Code:<input type=\"text\" name=\"verifypost\">";
	}else{
                $verifySesh = $_SESSION['verify'];
                $verifyGet = $_GET['verify'];
echo $verifySesh . $verifyGet;
                if($verifySesh == $veriftGet){
		echo "Password:<input type=\"password\" name=\"password\" />
		Confirm:<input type=\"password\" name=\"confirm\" />";
		}
	}
echo "<input type=\"submit\" value=\"Submit\" /></form>";
}else{
	echo "Invalid request!";
}

?>
