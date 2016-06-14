<?php
require_once('includes/init.php');

$user = $_POST['name'];
$passwrd = $_POST['password'];

if (User::login($user, $passwrd)){	
	return;
}
else 
	echo "error";
?>