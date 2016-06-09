<?php
require_once('includes/init.php');

$user = $_POST['name'];
$passwrd = $_POST['password'];

$thisUser = new User;

if ($thisUser->login($user, $passwrd)){
	
	echo "<script> var test='test';  </script>";
	
	return;
}

echo "error";
?>