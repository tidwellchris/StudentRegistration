<?php

//ENTER YOUR DATABASE CONNECTION INFO BELOW:
$hostname = 'mysql.server266.com';
$username = 'dgsopb';
$password = 'Preaching3ch00l';
$database = 'gsoponline_sis';

//DO NOT EDIT BELOW THIS LINE
try {
    $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }








/*
$db = mysql_connect($hostname, $username, $password);
$db = new PDO($hostname, $username, $password);
if (!$db) {
die('Connection failed: ' . mysql_error());
}
else{
     echo "Connection to MySQL server " .$hostname . " successful!
" . PHP_EOL;
}

$db_selected = mysql_select_db($database, $db);
if (!$db_selected) {
    die ('Can\'t select database: ' . mysql_error());
}
else {
    echo 'Database ' . $database . ' successfully selected!';
}

//mysql_close($db);
*/
?>
