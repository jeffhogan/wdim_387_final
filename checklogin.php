<?php 
	require_once '_config.php';
/**
 * Check submitted POST for loging authenticity and redirect as appropriate to dash or try again
 */

 	GLOBAL $mysqli;

	ob_start();

	$username=$_POST['username']; 
	$password=$_POST['password'];

	$username = cln($username);
	$password = md5(cln($password));

	$sql = "SELECT * FROM members WHERE username='$username' and password='$password'";

	$result = $mysqli->query($sql);
	
	if($result->num_rows == 1){
	
		session_start();

		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;
		 
		header("location:dashboard.php");

	}
	else {

		echo "Wrong Username or Password";
	
	}




	ob_end_flush();


 ?>