<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

error_reporting(E_ERROR | E_PARSE);

$user_id = $_SESSION["userid"]; // retrieve uid from current user
$query = "SELECT * FROM users WHERE usersId = $user_id;";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

// Set variables for user profile data
$name = $row["usersName"];

$query = "SELECT * FROM Climber WHERE climber_name = '$name'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$location = $row['climber_location'];
$id = $row['CLIMBER_ID'];

$query = "SELECT * FROM Fitness WHERE CLIMBER_ID = '$id';";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);


$height = $row['climber_height'];
$weight = $row['climber_weight'];
$hangweight = $row['climber_hangweight'];
$hangtime = $row['climber_hangtime'];
$grade = $row['grade'];

mysqli_close($conn);

echo"
    <!DOCTYPE html>
    <html>
    <head>
        <title>Climber Fitness</title>
        <script type='text/javascript' src='fitness.js'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    </head>
    <body>
    <h1>User Fitness Information</h1>
    <h3>Name: $name | Location: $location</h3>
    <p><b>Height: </b>$height, <b>Weight: </b>$weight</p>
    <p><b>Hangweight (20mm): </b>$hangweight, <b>Hangtime: </b>$hangtime</p>
    <p><b>Projecting Grade: </b>$grade</p>
    </body>
    
    <body>
    <br>
    <br>
    <h3>Need to update your information?</h3>
    
    <form action='showFitness.php' method='post'>
    <input type='hidden' name='CLIMBER_ID' value=$id>
    <label for='height'>Height</label>
    <input type='text' name='height'> cm
    <br><br>
    <label for='weight'>Weight</label>
    <input type='text' name='weight'> kg
    <br><br>
    <label for='hang_weight'>Hangweight (20mm)</label>
    <input type='text' name='hang_weight'> kg
    <br><br>
    <label for='hang_time'>Hangtime</label>
    <input type='text' name='hang_time'> s
    <br><br>
    <input type='submit' name='Submit'>
    </form>
    </body>
    
    </html>
";