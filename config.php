<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbase= "catchiecartdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbase);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>