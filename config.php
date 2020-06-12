<?php
$servername = "den1.mysql2.gear.host";
$username = "catchiecartdb3";
$password = "Ku5M-A9z0j9_";
$dbase= "catchiecartdb3";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbase);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
