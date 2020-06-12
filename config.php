<?php
$servername = "den1.mysql3.gear.host";
$username = "catchiecartdb";
$password = "Qy2w??YKh8qD";
$dbase= "catchiecartdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbase);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
