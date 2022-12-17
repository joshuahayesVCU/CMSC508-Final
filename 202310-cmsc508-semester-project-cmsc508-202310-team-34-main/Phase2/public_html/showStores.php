<?php
include_once 'includes/dbh.inc.php';

$k = $_POST['city'];

$query = "SELECT * FROM Store WHERE store_location= '{$k}'";

$res = mysqli_query($conn, $query);
echo"$query";
while($rows = mysqli_fetch_array($res)) {
    $query2 = "SELECT * FROM Gear WHERE STORE_ID = $rows[STORE_ID]";
    $res2 = mysqli_query($conn, $query2);
    while($rows2 = mysqli_fetch_array($res2)){
?>
<tr>
    <td><?php echo $rows['STORE_ID'];?></td>
    <td><?php echo $rows['store_name'];?></td>
    <td><?php echo $rows2['GEAR_ID'];?></td>
    <td><?php echo $rows2['gear_name'];?></td>
    <td><?php echo $rows2['gear_type'];?></td>
    <td><?php echo $rows2['gear_length'];?></td>
    <td><?php echo $rows2['type_of_climbing'];?></td>
</tr>
<?php
    }

}