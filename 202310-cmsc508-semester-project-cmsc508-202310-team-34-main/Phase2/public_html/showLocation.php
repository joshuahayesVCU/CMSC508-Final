<?php
include_once 'includes/dbh.inc.php';

$form = $_POST;
$loc = $form['loc'];
$climber_id = $form['uid'];

$query = "UPDATE Climber SET climber_location = '$loc' WHERE CLIMBER_ID = '$climber_id'";
$res =mysqli_query($conn, $query);
echo"<h2>Location has successfully been updated</h2>";
echo"<a href=profile.php>Click here to return to your profile</a>"
?>

