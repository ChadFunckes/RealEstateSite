<?php

class User {
		
	function login($user, $pass) {
		
		$query = 'CALL getUser("'.$user.'", "'.$pass.'")'; // SQL Stored Procedure processes data in DB
		$result = Database::getInstance()->query($query) or die ("erroR");
		
		if ($data = $result->fetch_array(MYSQLI_ASSOC)){
			//clear password from JSON data
			unset($data['password']);
			
			echo json_encode($data); // output JSON data for pickup
			return true;
		}
		else return false;
	}
	
}