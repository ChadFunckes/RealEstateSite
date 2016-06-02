<?php

class User {
		
	function login($user, $pass) {
		
		$query = 'CALL getUser("'.$user.'", "'.$pass.'")';
		$result = Database::getInstance()->query($query) or die ("erroR");
		
		if ($data = $result->fetch_array(MYSQLI_ASSOC)){
			
			$data['password'] = null;
			echo json_encode($data); // returns JSON for cookie
			return true;
		}
		else return false;
		
}
	
	// test func DELETE 
	public static function t(){
		$xyz = "this is it";
		return $xyz;
	}
	
}