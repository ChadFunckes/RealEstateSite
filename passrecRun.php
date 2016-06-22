<?php
require_once('includes/init.php');

$email = $_POST['passrecovery'];
$random_code = mt_rand(11111, 99999);

$query = 'CALL putTempCode("' . $email . '","' . $random_code . '")';
$result = Database::getInstance()->query($query) or die ("error");

// send email ....
$to      = '$email';
$subject = 'Temporary password from BizRealty.com';
$message = 'Hello, here is your temporary password:' . $random_code;
$headers = 'From: webmaster@example.com' . "\r\n" .
		'Reply-To: webmaster@example.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
 
//mail($to, $subject, $message, $headers); // fix when there is a mail server.


echo "complete";
return;