<?php
include_once 'includes/dbh.inc.php';

//variables from climbers.js
$location = $_POST['location'];
$location = trim($location);
$order = $_POST['order'];

$query = "SELECT *
          FROM Climber
          WHERE climber_location = '$location'
          ORDER BY '$order'";

$res = mysqli_query($conn, $query);

if ($location === "Choose Location...") {
    echo "<h4>Invalid option, please select a location</h4>";
    exit();
}

if (!$res) {
    echo "<h4>Unfortunately, there are no climbers in this location... yet</h4>";
    exit();
}

//query which continues to be updates
if (mysqli_num_rows($res) != 0) {
    
    //pastes data into the table somehow
    while ($rows = mysqli_fetch_array($res)) {
        ?>
        <tr>
            <td><?php echo $rows['climber_location']; ?></td>
            <td><?php echo $rows['climber_name']; ?></td>
        </tr>
        <?php
    }
    mysqli_close($conn);

} else {
    echo "<h4>Unforunately, there are not climbers in this location... yet</h4>";
}
?>