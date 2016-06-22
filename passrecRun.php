<?php
require_once('includes/init.php');

$email = $_POST['passrecovery'];
$random_code = mt_rand(11111, 99999);

echo $random_code;

return;

// We got to add a column called temp password in the database to store temporary data.
$temp_data = $_db->query("INSERT into users (temp_pass) values ('$random_code')");
$run = execute($temp_data);


// below I am checking if the email address already exists in the database
// if the email exists send the generated code to that email.
if (User::checkEmail($name) == true && $run == true)
{
	$to      = '$email';
	$subject = 'Temporary password from BizRealty.com';
	$message = 'Hello, here is your temporary password:' . $random_code;
	$headers = 'From: webmaster@example.com' . "\r\n" .
			'Reply-To: webmaster@example.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subject, $message, $headers);
}
	


?>