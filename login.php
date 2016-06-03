<?php
require_once('includes/init.php');

$user = $_POST['name'];
$passwrd = $_POST['password'];

$thisUser = new User;

if ($thisUser->login($user, $passwrd)){
	return;
}

echo "error";
?>