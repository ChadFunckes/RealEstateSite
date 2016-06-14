<?php
require_once('includes/init.php');

$name = $_POST['name'];

if (User::checkEmail($name)) echo "true";

else echo "false";