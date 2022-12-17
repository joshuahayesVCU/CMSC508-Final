<?php

function emptyInputSignup($name, $email, $userName, $pwd, $pwdRepeat) {
	$result; 
	if (empty($name) || empty($email) || empty($userName) || empty($pwd) || empty($pwdRepeat)) {
		$result = true; 
	} 
	else {
	$result = false; 
	}
	return $result; 
}

function invalidUid($userName) {
	$result; 
	if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
		$result = true; 
	}
	else {
		$result = false; 
	}

	return $result; 
}

function invalidEmail($email) {
	$result; 
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true; 
	}
	else {
		$result = false; 
	}
	
	return $result; 
}

function pwdMatch($pwd, $pwdRepeat) {
	$result; 
	if ($pwd !== $pwdRepeat) {
		$result = true; 
	}
	else {
		$result = false; 
	}
	
	return $result; 
}

function uidExist($conn, $userName, $email) {
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit(); 
	} 

	mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);   

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row; 
	}
	else {
		$result = false; 
		return $result; 
	}

	mysqli_stmt_close($stmt); 
}

function createUser($conn, $name, $email, $userName, $pwd) {

    // adding the user to the user table
    // *********************************
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit(); 
	} 

	$hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $userName, $hashPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

    // adding the user to the climber table
    // ************************************

    // Getting the userId from the new account
    $uidExists = uidExist($conn, $userName, $userName);
    $usersID = $uidExists["usersId"];

    // Set variables for user profile data
    $sql = "INSERT INTO Climber (CLIMBER_ID, climber_name) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $usersID, $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // adding the user to the fitness table
    // ************************************

    $sql = "INSERT INTO Fitness (CLIMBER_ID) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $usersID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");

	exit(); 
}

function emptyInputLogin($userName, $pwd) {
		$result; 
	if (empty($userName) || empty($pwd)) {
		$result = true; 
	} 
	else {
	$result = false; 
	}
	return $result; 
}

function loginUser($conn, $userName, $pwd) {

    $uidExists = uidExist($conn, $userName, $userName);

	if ($uidExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit(); 
	}

	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit(); 
	}
	else if ($checkPwd === true) {
		
		// starting a new session, this is what changes the app for user
		session_start(); 
		$_SESSION['userid'] = $uidExists["usersId"];
		$_SESSION['userUid'] = $uidExists["usersUid"];
		header("location: ../index.php");
		exit(); 
	}
}




