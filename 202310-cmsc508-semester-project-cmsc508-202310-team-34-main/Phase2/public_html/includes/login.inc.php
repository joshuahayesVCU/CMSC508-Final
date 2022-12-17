<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

echo "Hello world";

if (isset($_POST['submit'])) {

    echo "hellllo";

	$userName = $_POST['uid'];
	$pwd = $_POST['pwd'];

	if (emptyInputLogin($userName, $pwd) !== false) {
        echo "fail";
		header("location: ../login.php?error=emptyinput");
		exit(); // stops script from running
	}

	loginUser($conn, $userName, $pwd); 
}
else {
	header("location: ../login.php");
	exit; 
}
