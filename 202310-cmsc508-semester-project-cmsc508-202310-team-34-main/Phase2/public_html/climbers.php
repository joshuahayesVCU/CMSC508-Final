<?php
require_once 'header.php';
require_once 'includes/dbh.inc.php';

$query = 'SELECT * FROM Climber';
$res = mysqli_query($conn, $query);

echo "
    <html>
    <head>
    <title></title>
    <script type='text/javascript' src='climbers.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    </head>
    <body>
        <h2>Climbers</h2>
        
        <select id='location' onchange='selectLocation()'>
            <option>Choose Location...</option>
            <option value='Richmond'>Richmond</option>
            <option value='Boulder'>Boulder</option>
            <option value='Summersville''>Summersville</option>
            <option value='Yosemite'>Yosemite</option>
        </select>
        
    <select id='order' onchange='selectLocation()'>
        <option value='ASC'>Ordered by...</option>
        <option value='ASC'>Ascending</option>
        <option value='DESC'>Descending</option>
    </select>
    <table>
    <thead>
        <th style='width: 10%'>Climber Location</th>
        <th style='width: 10%'>Climber Name</th>
    </thead>
    <tbody id='climber'>
</tbody>
</table>
";
?>