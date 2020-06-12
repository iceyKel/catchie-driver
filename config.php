<?php
$servername = "den1.mysql1.gear.host";
$username = "catchiecartdb2";
$password = "Da37s-D68U_9";
$dbase= "catchiecartdb2";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbase);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
