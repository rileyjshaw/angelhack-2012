<?php

session_start();
include "include/mysql.php";
$mysql = new mysql;
$mysql->dbconnect();

function register_user() {
    global $mysql;
    if($_POST['password'] !== $_POST['confirm_password']) {
        echo("<b>Error: Passwords do not match</b>");
        display_register_form();
        die("");
    }
    $insert = array(
                        'username' => $_POST['username'],
                        'password' => $_POST['password'],
                        'email' => $_POST['email'],
                        'date' => date('H:i:y')
    );
    $insert_keys = array_keys($insert);
    $insert_values = array_values($insert);
    
    $mysql->dbquery_insert('users', $insert_keys, $insert_values);
    echo "New user created! You may now login!";
    
}

function login_user() {
global $mysql;
if(isset($_SESSION['username'])){
        header('Location: index.php');
}
if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $mysql->dbconnect();
        $fetch = $mysql->dbquery_select("users", array("password"), "password=".trim($password));
        $pass = mysql_fetch_array($fetch);
        if($password == $pass['password']){
                $_SESSION['username'] = $username;
                // redirect back to index
                echo "You are logged in as: " . htmlentities($username);
        }else{
                echo "Wrong password!";
        }
}
}

function display_login_form() {
	echo "<form action='' method='post'>
Username:<input type='text' name='username' />
Password:<input type='password' name='password' />
<input type='submit' value='Login'/>
</form>";

}

function display_register_form() {
    echo "<form method='post' action=''>
    Username: <input type='username' name='username'><br>
    Password: <input type='password' name='password'><br>
    Confirm password: <input type='password' name='confirm_password'><br>
    Email: <input type='text' id='email'> <input type='submit' name='do_register'></form>";
}

function check_user_login($user) {
	global $mysql;
	$table = "users";
	$keys = array("username", "password");
	$where = "username=$user";
}

function get_user_prefs($user) {
	global $mysql;
	$table = "users";
	$keys = array("user_prefs");
	$where = "username=$user";
}

?>
