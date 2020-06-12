<?php

include 'config.php';
$prodname = $_POST['prodname'];
$description = $_POST['description'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$store = "";


$sql = "SELECT * FROM tblstore where store_name = '$store'";
$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
    		$store  = $row['store_id'];
    				
    		}
		}

$sql_insert_prod = "INSERT INTO tblproducts (prod_name,description,qty,price,store_id)
						VALUES ('$prodname','$description','$qty','$price','$store')"
if(mysqli_query($conn, $sql_insert_prod)){
	header("location:manage_productds.php");
}

?>