<?php
require_once 'header.php';
require_once 'includes/dbh.inc.php';

$query = 'SELECT * FROM Crag';
$res = mysqli_query($conn, $query);

echo"
    <html>
    <head>
    <title></title>
    <script type='text/javascript' src='climbs.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    </head>
    <body>
        <h2>Crag Climbing Repo</h2>
        <select id='crag' onchange='selectCrag()'>
            <option value='0'>Select Crag</option>
";
while($rows = mysqli_fetch_array($res)){
    $temp = $rows['crag_location'] . " - " . $rows['crag_name'];
    echo"<option value=$rows[CRAG_ID]>$temp</option>";
}
mysqli_close($conn);
echo"
    </select>
    
    <select id='sort' onchange='selectCrag()'>
        <option value='route_name'>Sort By...</option>
        <option value='route_name'>Route Name</option>
        <option value='route_rating'>Route Rating</option>
        <option value='route_type'>Route Type</option>
        <option value='route_height'>Route Length</option>
        <option value='route_stars'>Route Stars</option>
    </select>
    
    <select id='order' onchange='selectCrag()'>
        <option value='ASC'>Ordered by...</option>
        <option value='ASC'>Ascending</option>
        <option value='DESC'>Descending</option>
    </select>
    
    <table>
    <thead>
        <th style='width: 10%'>Route Name</th>
        <th style='width: 10%'>Route Rating</th>
        <th style='width: 10%'>Route Type</th>
        <th style='width: 10%'>Route Length</th>
        <th style='width: 10%'>Route Stars</th>
    </thead>
    <tbody id='ans'>
    
</tbody>

</table>
";
?>