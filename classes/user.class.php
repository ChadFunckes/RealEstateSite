<?php

class User {
	// For Profile Page..... 
	static function profile($fname, $lname, $bio, $email, $uName, $bio, $address, $wb, $skype_id, $phone, $userRole){
    	$query = 'CALL updateUser("' . $fname . '","' . $lname . '","' . $bio . '","' . $email . '","' . $uName . '","' . $bio . '","' . $address . '","' . $wb . '","' . $skype_id . '","' . $faxnumber . '","' . $phone . '","' . $userRole . '")';
    	$result = Database::getInstance()->query($query) or die ("false");
    	
    	$_SESSION["yourfname"] = $fname; 
    	$_SESSION["yourlname"] = $lname; 
    	$_SESSION["email"] = $email; 
    	$_SESSION["uName"] = $uName;
    	$_SESSION["aboutme"] = $bio;
    	$_SESSION["address"] = $address;
    	$_SESSION['work_bio'] = $wb; // work history
    	$_SESSION['skype'] = $skype_id;// skype id
    	$_SESSION['phone'] = $phone; // phone
    	$_SESSION['fax'] = $faxnumber;
    	$_SESSION['role'] = $userRole; 
		return true;
	}
	
	// For Registration function
	static function makeNewUser ($fname, $lname, $uName, $email, $pass){
    	$query = 'CALL newUser("' . $fname . '","' . $lname . '","' . $uName . '","' . $email . '","' . $pass . '")';
    	// return value false on DB error
    	$result = Database::getInstance()->query($query) or die ("false");
    	
    	$_SESSION["firstName"] = $fname;
    	$_SESSION["lastName"] = $lname;
    	//$_SESSION["uID"] = $data['user_ID'];
    	$_SESSION["uName"] = $uName;
    	$_SESSION["uType"] = "a";
    	$_SESSION["sType"] = "a";
    	$_SESSION["email"] = $email;
    	
		return true;
    }
	
	// For Login Page......
	static function login($user, $pass) {
		session_unset();
		$query = 'CALL getUser("'.$user.'", "'.$pass.'")'; // SQL Stored Procedure processes data in DB
		$result = Database::getInstance()->query($query) or die ("erroR");
		
		if ($data = $result->fetch_array(MYSQLI_ASSOC)){
			//clear password from JSON data
			unset($data['password']);
			
			$_SESSION["firstName"] = $data['first'];
			$_SESSION["lastName"] = $data['last'];
			//$_SESSION["uID"] = $data['user_ID'];
			$_SESSION["uName"] = $data['userName'];
			$_SESSION["uType"] = $data['user_Type'];
			$_SESSION["sType"] = $data['subs_type'];
			$_SESSION["email"] = $data['email'];
			
			return $data;
		}
		else return false;
	}
	
    // User Name Checker...
    static function checkUserName($name){
    	$query = 'CALL checkUName("' . $name . '")';
    	$result = Database::getInstance()->query($query) or die ("error");
    	if ($data = $result->fetch_array(MYSQLI_ASSOC)){
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    
    // Email Checker...
    static function checkEmail($name) {    	
    	$query = 'CALL checkEmail("' . $name . '")';
    	$result = Database::getInstance()->query($query) or die ("error");
    	if ($data = $result->fetch_array(MYSQLI_ASSOC)){
    		return true;
    	}
    	return false;
    }
    
    
}