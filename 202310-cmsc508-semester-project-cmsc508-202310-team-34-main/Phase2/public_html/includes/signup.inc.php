<?php

if (isset($_POST["submit"])) {
	
	// grab the data from the url
	$name = $_POST["name"];
	$email = $_POST["email"];
	$userName = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	// error checking

	if (emptyInputSignup($name, $email, $userName, $pwd, $pwdRepeat) !== false) {
		header("location: ../signup.php?error=emptyinput");
		exit(); // stops script from running
	}

	if (invalidUid($userName) !== false) {
		header("location: ../signup.php?error=invaliduid");
		exit(); // stops script from running
	}	

	if (invalidEmail($email) !== false) {
		header("location: ../signup.php?error=invalidemail");
		exit(); // stops script from running
	}	

	if (pwdMatch($pwd, $pwdRepeat) !== false) {
		header("location: ../signup.php?error=passwordsdontmatch");
		exit(); // stops script from running
	}

	if (uidExist($conn, $userName, $email) !== false) {
		header("location: ../signup.php?error=usernametaken");
		exit(); // stops script from running
	}

	createUser($conn, $name, $email, $userName, $pwd); 


}
else {
	header("location: ../signup.php");
	exit(); 
}