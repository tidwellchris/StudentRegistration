<html lang="en">
<head>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
</head>
</html>

<?php

//ENTER YOUR DATABASE CONNECTION INFO BELOW:
$hostname = 'mysql.server266.com';
$username = 'noneofyourbusiness';
$password = 'noneofyourbusiness';
$database = 'gsoponline_test_sis';
//$database = 'gsoponline_sis';

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

?>
