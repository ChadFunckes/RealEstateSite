<?php
require_once('includes/init.php');

if (User::profile($_POST['yourfname'], $_POST['yourlname'], $_POST['userName'], $_POST['pwd'], $_POST['aboutme'], $_POST['wb'], $_POST['skype'], $_POST['phone'], $_POST['fax'], $_POST['role'])) echo "true";
		
else echo "false";