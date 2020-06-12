<?php
session_start();
if(!isset($_SESSION["login"])){
   header("location:index.php");
}
include '../config.php';
$order_id = $_GET['orderid'];
$sql_success = "UPDATE tblorders SET status = 'Delivered' WHERE order_id = '$order_id'";
if(mysqli_query($conn,$sql_success)){
header("location:../getuser.php");}
?>