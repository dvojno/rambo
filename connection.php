<?php

$base_url = "http://ramboamadeus.com"; //@alert
//$base_url = "163.172.159.22"; //@alert
$servername = "localhost";
$username = "rambo";
$password = "Tmqo87@4";
$dbname = "vojno_rambo";

// $base_url = "163.172.159.22"; //@alert
// $servername = "localhost";
// $username = "vojno";
// $password = "gitarica";
// $dbname = "ciklomot_main";

// Create connection
//$connection = mysqli_connect($servername, $username, $password, $dbname);
//mysqli_set_charset("UTF8");
$connection = mysqli_connect($servername, $username, $password, $dbname);
$connection->set_charset("utf8");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


?>