<?php
include '../config.php';
if(isset($_POST['submit'])){

	$driverid = $_POST['driverid'];
	$drivername = $_POST['drivername'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$route = $_POST['route'];
	$address = $_POST['address'];
	$licenseno = $_POST['licenseno'];

	$sql_upd = "UPDATE tbldriver SET driver_name = '$drivername', username = '$username',password = '$password', route = '$route',licenseno = '$licenseno', address = '$address' WHERE driver_id = '$driverid'";
	if(mysqli_query($conn,$sql_upd)){
		header("location:../driver_account.php");echo "success";
	}
}

?>