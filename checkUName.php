<?php
require_once('includes/init.php');

$name = $_POST['name'];

if (User::checkUserName($name)) echo "true";

else echo "false";