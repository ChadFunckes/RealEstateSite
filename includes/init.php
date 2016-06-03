<?php
// Register autoload function
spl_autoload_register('myAutoloader');

/**
 * Autoloader
 *
 * @param string $className  The name of the class
 * @return void
*/
function myAutoloader($className)
{
	require dirname(dirname(__FILE__)) . '/classes/' . $className . '.class.php';
}

// Start session
session_start();

// if user stayed logged in load data