<?php
require_once 'header.php';
require_once 'includes/dbh.inc.php';

$form = $_POST;
$gear_id = $form['gear'];
$quantity = $form['quantity'];
$climber_id = $form['CLIMBER_ID'];

$query = "SELECT * FROM Owned_Gear WHERE CLIMBER_ID = $climber_id AND GEAR_ID = $gear_id";
$res = mysqli_query($conn, $query);
if(mysqli_num_rows($res)!=0){
    if($quantity == 0){
        $query = "DELETE FROM Owned_Gear WHERE GEAR_ID = $gear_id AND CLIMBER_ID = $climber_id";
        $temp = mysqli_query($conn, $query);
        echo"<h2>Successfully Removed</h2>";
    }
    else{
        echo"<h2>Gear already exists, remove to change the quantity.</h2>";
    }
}
else{
    if($quantity == 0){
        echo"<h2>Nothing to remove</h2>";
    }
    else{
        $query = "INSERT INTO Owned_Gear(GEAR_ID, CLIMBER_ID, quantity)
        VALUES ('$gear_id', '$climber_id', '$quantity')";
        $temp = mysqli_query($conn, $query);
        echo"<h2>Gear has successfully been updated</h2>";
    }
}

echo"<a href=gear.php>Click here to return to the Gear Page</a>"
?>