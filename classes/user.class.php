<?php

class User {
		
	function login($user, $pass) {
		session_unset();
		$query = 'CALL getUser("'.$user.'", "'.$pass.'")'; // SQL Stored Procedure processes data in DB
		$result = Database::getInstance()->query($query) or die ("erroR");
		
		if ($data = $result->fetch_array(MYSQLI_ASSOC)){
			//clear password from JSON data
			unset($data['password']);
			
			$_SESSION["firstName"] = $data['first'];
			$_SESSION["lastName"] = $data['last'];
			$_SESSION["uName"] = $data['userName'];
			$_SESSION["uType"] = $data['user_Type'];
			$_SESSION["sType"] = $data['subs_type'];
			$_SESSION["email"] = $data['email'];
			
			return $data;
		}
		else return false;
	}
	
}