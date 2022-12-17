<?php
require_once 'header.php';
require_once 'includes/dbh.inc.php';

echo "
    <!DOCTYPE html>
    <html>
    <head>
    <title>Climbing Store Repo</title>
        <script type='text/javascript' src='store.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    </head>
    </html>
    <h2>Where to Purchase Gear</h2>
    <body>
    <select id='city' onchange='selectStore()'>
        <option>Choose Location...</option>
        <option value='Richmond'>Richmond</option>
        <option value='Boulder'>Boulder</option>
        <option value='Summersville''>Summersville</option>
    </select>
    
    <table>
    <thead>
        <th style='width: 10%'>Store ID</th>
        <th style='width: 10%'>Store Name</th>
        <th style='width: 10%'>Gear ID</th>
        <th style='width: 10%'>Gear Name</th>
        <th style='width: 10%'>Gear Type</th>
        <th style='width: 10%'>Gear Length</th>
        <th style='width: 10%'>Type of Climbing</th>
    </thead>
    <tbody id='ans'>
    
</tbody>
";
