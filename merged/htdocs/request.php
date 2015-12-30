<?php
include "include/mysql.php";
$mysql = new mysql;
session_start();
?>

<form method="GET" action="request.php">
Username:<input type="text" name="username" />
Email:<input type="text" name="email" />
<input type="submit" value="Request Password"/>
</form>

<?php

function email_user($emailTo,$key){
	$to = $emailTo;
	$subject = "Awesome Travel Startup - Password Reset";
	$body = "Please click the link below or visit awesometravelstartup.com/reset.php and 
	enter $key\n<a href=\"http://awesometravelstartup.com/reset.php?verify=$key\"></a>";
	if(mail($to, $subject, $body)){
		echo("<p>An email has been sent to $userEmail  with instructions to reset your password.</p>");
	}else{
		echo("<p>oh crap, something broke!</p>");
	}
}

function get_random_key(){
	$string = "";
	$characters = "0123456789abcdefghijklmnopqrstuvwxyz";
	for ($i=0;$i<24;$i++){
        $string .= $characters[mt_rand(0, (strlen($characters)-1))];
	}
	return $string;
}

function set_random_key($key){
	$_SESSION['verify'] = $key;
}

if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	echo "You are already logged in as: $username";
	echo "<br>Please visit your control panel to edit your password.";
	die();
}

if(isset($_GET['email'])){
	global $mysql;
	if(!is_null($_GET['email']) && !is_null($_GET['username'])){
	$userEmail = strip_tags($_GET['email']);
	$user = strip_tags($_GET['username']);
	$mysql->dbconnect();
        $row = $mysql->dbquery_select('users', 'email', "username=$user");
       	$email = mysql_fetch_array($row);
	if($userEmail == $email['email']){
		$key = get_random_key();
		email_user($userEmail,$key);
		set_random_key($key);
		echo $key;
	}else{
		echo "Incorrect username or email address. <a href=\"request.php\">Try again</a>";
	}
    }
}
?>
