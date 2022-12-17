<?php
include_once 'includes/dbh.inc.php';

$k = $_POST['id'];
$k = trim($k);
$l = $_POST['sort'];
$m = $_POST['order'];
//variables from climbs.js

$query = "SELECT * FROM Climbs WHERE CRAG_ID={$k} ORDER BY {$l} {$m}";
$res = mysqli_query($conn, $query);
//query which continues to be updates

//pastes data into the table somehow
while($rows = mysqli_fetch_array($res)){
    ?>
<tr>
    <td><?php echo $rows['route_name'];?></td>
    <td><?php echo $rows['route_rating'];?></td>
    <td><?php echo $rows['route_type'];?></td>
    <td><?php echo $rows['route_height'];?></td>
    <td><?php echo $rows['route_stars'];?></td>
</tr>
<?php
}
mysqli_close($conn);
?>