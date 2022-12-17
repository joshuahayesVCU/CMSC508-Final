<?php

// This file is to handle database integration

$servername = 'cmsc508.com';
$username = 'team34';
$password = 'Shout4_team34_GOTEAM';
$dbname = '202310_teams_team34';

// connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

