<?php

class Database
{

	private static $_db;  // singleton connection object

	private function __construct() {}  // disallow creating a new object of the class with new Database()
	private function __clone() {}  // disallow cloning the class
	private function __destruct() {$_db->close();}
	
	private static $_Host = 'localhost';
	private static $_Database = 'cresite';
	private static $_User = 'cresite';
	private static $_Pass = 'cresite';
	
	public static function getInstance() // get the database connection
	{
		if (static::$_db === NULL) {
			static::$_db = new mysqli(static::$_Host, static::$_User, static::$_Pass, static::$_Database) or die ("Could not connect to database");
		}
		return static::$_db;
	}
	
	public static function close(){
		static::$_db->close();
	}
}