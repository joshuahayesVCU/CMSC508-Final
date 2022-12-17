<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';


// Retrieve user profile data from database
$user_id = $_SESSION["userid"]; // retrieve uid from current user
$query = "SELECT * FROM users WHERE usersId = $user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

// Set variables for user profile data
$name = $row["usersName"];
$email = $row["usersEmail"];
$uid = $row["usersUid"];

$query = "SELECT * FROM Climber WHERE CLIMBER_ID = $user_id";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);

$loc = $row['climber_location'];


echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Climber Profile</title>
    </head>
    <body>
    <h1>User Profile</h1>
    <p>Name: $name</p>
    <p>Email: $email</p>
    <p>user ID: $uid</p>
    <p>Location: $loc</p>
    </body>
    <br>
    <body>
    <p><b>Change Location</b></p>
    <form action='./showLocation.php' method='post'>
        <select name='loc'>
            <option>Choose Location...</option>
            <option value='Richmond'>Richmond</option>
            <option value='Boulder'>Boulder</option>
            <option value='Summersville''>Summersville</option>
            <option value='Yosemite'>Yosemite</option>
        </select>
        <input type='hidden' name=uid value=$user_id>
    <input type='submit', name='submit'>
    </form>
    </body>
    </html>

";

?>

