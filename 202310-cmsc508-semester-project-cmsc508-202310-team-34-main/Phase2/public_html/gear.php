<?php
    require_once 'header.php';
    require_once 'includes/dbh.inc.php';

    $user_id = $_SESSION["userid"];

    $query = "SELECT * FROM Owned_Gear WHERE CLIMBER_ID = $user_id";
    $res = mysqli_query($conn, $query);

    echo"
    <!DOCTYPE html>
    <html>
    <head>
        <title>Gear</title>
    </head>
    <h1>Gear and Equipment</h1>
    ";

    if(mysqli_num_rows($res)!=0){
        echo"    
    <h3>Owned Gear</h3>
    <body>
    <table>
        <thead>
            <th style='width: 10%'>Gear ID</th>
            <th style='width: 10%'>Product Name</th>
            <th style='width: 10%'>Quantity</th>
            <th style='width: 10%'>Gear Type</th>
            <th style='width: 10%'>Gear Length</th>
            <th style='width: 10%'>Type of Climbing</th>
        </thead>
        <tbody>
        ";
        while($rows = mysqli_fetch_array($res)){
            $query = "SELECT * FROM gear WHERE GEAR_ID = $rows[GEAR_ID]";
            $temp = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($temp);
            $product = $row['gear_name'];
            $type = $row['gear_type'];
            $length = $row['gear_length'];
            $climb_type = $row['type_of_climbing'];

            echo"
            <tr>
                <td>$rows[GEAR_ID]</td>
                <td>$product</td>
                <td>$rows[quantity]</td>
                <td>$type</td>
                <td>$length</td>
                <td>$climb_type</td>
            </tr>
            ";
        }
        echo"
        </tbody>
        </table>
        </body>
        ";
    }
    else{
        echo"<h4>Unforunately, you don't own any items... yet</h4>";
    }


    $query = 'SELECT * FROM gear';
    $res = mysqli_query($conn, $query);

    echo"
    <br>
    <h3>Add/Remove Gear</h3>
    <form action='showGear.php' method='post'>
        <select name='gear'>
        <option>Select Purchased Gear</option>
";
    while($rows = mysqli_fetch_array($res)){
        echo"<option value=$rows[GEAR_ID]>$rows[gear_name] $rows[gear_length]</option>";
    };

    echo"
        </select>
        <select name='quantity'>
            <option>Quantity?</option>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='0'>Remove Item</option>
        </select>
        <input type='hidden' name='CLIMBER_ID' value=$user_id>
        <input type='submit' name='Submit'>
        
        </form>
        </html>
    ";





?>
