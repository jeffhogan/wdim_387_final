<?php 

	require_once 'db.php';

/**
 * Library of functions for handling login and authentication
 */

/**
 * check to see if the attempted username is something resembling a proper email
 *
 * @return boolen
 * @author jeffreyhogan
 **/
function checkUserName($name) {

	if(filter_var($name, FILTER_VALIDATE_EMAIL)) {

		$available = checkAvailable($name);

		return $available;
	
	} else { 

		return false;
	
	}

}

/**
 * check the db to see if the username is available
 *
 * @return boolean
 * @author jeffreyhogan
 **/
function checkAvailable($name) {

	GLOBAL $mysqli;

	$sql = "SELECT id FROM members WHERE username='$name'";

	$result = $mysqli->query($sql);

	$result = $result->num_rows;

	if ($result > 0) {

		return false;
	
	} else {
	
		return true;
	
	}

}

/**
 * check to make sure two submitted passwords match each other
 *
 * @return boolean
 * @author jeffreyhogan
 **/
function checkPass($pass1, $pass2) {

	if($pass1 != "" && $pass2 != "") {
		if ($pass1 == $pass2) {
			
			return true;

		} else {
			
			return false;

		}
	}	
}

/**
 * register a valid user into the database
 *
 * @return void
 * @author jeffreyhogan
 **/
function register($username, $password) {

	GLOBAL $mysqli;

	$encrypt = md5($password);

	$sql = "INSERT INTO members (username, password) VALUES ('$username', '$encrypt')";

	$results = $mysqli->query($sql);

	if ($results) {
		
		$msg["name"] = $username;
		$msg["contents"] = "<p class=\"success\">Thank you, $username, your account has been created. <a href=\"dashboard.php\">Home</a></p>";

	} else {
		
		$msg["contents"] = "<p class=\"error\">There was an error with your registration...shoot.</p>";

	}

	return $msg;

}
/**
 * Cleaning function
 */
function cln($str) {
	// strip dangerous characters.       
	$chars = preg_quote("={}:<?(^$!>)*");
	$str = strip_tags(preg_replace("/[$chars]/", '', $str));
	return $str;
}

/**
 * Check if a user is logged in and redirect as neccessary
 */

function is_logged_in($restricted=true) {
 	
 	session_start();

 	if(!$restricted && !empty($_SESSION)) {

	 	if($_SESSION["username"] && $_SESSION["password"]) {

	 		header("location:dashboard.php");

		} 

	} elseif ($restricted) {
		
		if($_SESSION["username"] && $_SESSION["password"]) {

	 		return true;

		} else {
			
			header("location:index.php");

		}

	}
}	

?>