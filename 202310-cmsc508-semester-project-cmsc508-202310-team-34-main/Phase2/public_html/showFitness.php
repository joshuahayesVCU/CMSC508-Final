<?php
require_once 'header.php';
require_once 'includes/dbh.inc.php';

$form = $_POST;
$climber_id = $form['CLIMBER_ID'];
$height = $form['height'] . 'cm';
$weight = $form['weight'] . 'kg';
$hang_weight = $form['hang_weight'] . 'kg';
$hang_time = $form['hang_time'] . 's';
$str = $height . " " . $weight . " " . $hang_weight . " " . $hang_time;

$command = escapeshellcmd('python findStrength/main.py ' . $str);
$output = shell_exec($command);
$grade = trim($output);

$query = "UPDATE Fitness SET climber_height = '$height', climber_weight = '$weight', climber_hangweight = '$hang_weight', climber_hangtime = '$hang_time', grade = '$grade' WHERE CLIMBER_ID = $climber_id";
$res = mysqli_query($conn, $query);
echo"<h2>Fitness has successfully been updated</h2>";
echo"<a href=fitness.php>Click here to return to the Fitness Page</a>"
?>

