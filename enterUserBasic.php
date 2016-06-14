<?php
require_once('includes/init.php');

if (User::makeNewUser($_POST['fname'], $_POST['lname'], $_POST['uName'], $_POST['email'], $_POST['pass'])) echo "true";
		
else echo "false";