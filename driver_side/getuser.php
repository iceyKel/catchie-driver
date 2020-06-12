
<?php
include 'config.php';
session_start();
if(!isset($_SESSION["login"])){
  header("location:index.php");
}


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_2.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../jquery/bootstrap-3.4.1-dist/css/bootstrap.min.css">
  <script src="../jquery/jquery.min.js"></script>
  <script src="../jquery/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>

  <style>

.buttoninc {

  border: none;
  background-color:transparent;
  color: #2c3e50;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  font-weight: bold;
}

  table,tr, th {  
   border: 1px solid #ddd;
   text-align: left;
  }

  table {
   border-collapse: collapse;
   width: 100%;
   font-family: "Segoe UI";
   margin-bottom: 20%;
  }



  th, td {
    padding: 10px;
  }
  </style>


</head>
<body>
<div class = 'main'>

<div class="icon-bar">
  <a href=""><div style="padding-left:5px; "> CATCHIECART </div></a><a href=""></a><a href=""></a>
  <a href="driver_account.php"></a>
  <a style = "color: #ecf0f1" href="driver_pge.php"><i class="fa fa-arrow-left"></i></a>

  
</div>

<div class="block2">
<table  class="table table-bordered">
	<thead>
		<tr>
          		<th colspan="4">Order List</th>
          	</tr>
	<tr>
		<th>Item</th>
		<th>Qty.</th>
		<th>Price</th>
		<th>Status</th>
		
	</tr>
	</thead>
<tbody>
<?php


include 'config.php';

 $q = "";
 if(isset($_GET['prod_id'])){
  $q = $_GET['prod_id'];
  $cookie_name="customerid";
  $cookie_value = $q; 
  setcookie($cookie_name,$cookie_value, time() + (86400 * 30), "/");
}else{
  $q = $_COOKIE['customerid'];; 
 
}
  
$crt_code = "";
$driverid = "";
$sql="SELECT * FROM tblcustomer WHERE customer_id = '$q'";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result)) {

$crt_code = $row['crt_code'];
$_SESSION['crtcode'] = $crt_code;
$driverid = $_COOKIE['driver_id'];
   echo "<ul class='list-group'>";
   echo "<li class='list-group-item'>Name : ". $row['lname']." ".$row['fname']."</li>";
   echo "<li class='list-group-item'>Houseno. : ". $row['houseno'] ."</li>";
   echo "<li class='list-group-item'>Phone number. : ". $row['contact'] ."</li>";
   echo "<li class='list-group-item'>City. : ". $row['city'] ."</li>";
   echo "<li class='list-group-item'>Province. : ". $row['province'] ."</li>";
   echo "<li class='list-group-item'>Zipcode. : ". $row['zipcode'] ."</li>";
   echo "<li class='list-group-item'>Code. : ". $row['crt_code'] ."</li>";
   echo "</ul>";
}

 $sql_order = "SELECT tblproducts.prod_name, tblproducts.description, tblorders.qty, tblorders.price,tblorders.status,tblorders.order_id FROM tblorders 
 			INNER JOIN tblproducts ON tblproducts.product_id = tblorders.product_id 
 			WHERE crt_code ='$crt_code' AND driver_id = '$driverid'";
          $result1 = mysqli_query($conn, $sql_order);
          if (mysqli_num_rows($result1) > 0) {
              while($row = mysqli_fetch_assoc($result1)) {
              $order_id = $row['order_id'];
              $product_name = $row['prod_name'];
              $description = $row['description'];
              $qty = $row['qty'];
              $price = $row['price'];
              $status = $row['status'];

  
          echo "<tr>
                <td>".$product_name." ".$description."</td>
                <td>".$qty."</td>
                <td>PHP ".$price."</td>
                <td>".$status."</td>
                <td>
                <form action = 'commands/success_order.php' method = 'GET'>
                <input type = 'hidden' name = 'orderid' value = '".$order_id."'>
                <button type = 'submit' class='buttonSuccess'><i class='fa fa-check' aria-hidden='true'></i></button>
                </form>
                <form action = 'commands/cancel_order.php' method = 'GET'>
                <input type = 'hidden' name = 'orderid' value = '".$order_id."'>
                <button type = 'submit' class='buttonCancel'><i class='fa fa-ban' aria-hidden='true'></i></button>
                </form>
                </td>
                </tr>";
            
        }
      }

 $sql_total = "SELECT sum(price) FROM tblorders WHERE crt_code ='$crt_code' AND status = 'Delivered'";
          $result2 = mysqli_query($conn, $sql_total);
          if (mysqli_num_rows($result2) > 0) {
              while($row = mysqli_fetch_assoc($result2)) {
              $Total = $row['sum(price)'];
        	  echo "<tr>
						<td>
						

						</td>
						<td>Total : </td>
						<td>PHP ".$Total."</td>
							<td></td>
					</tr>";
        	}
        }

mysqli_close($conn);

?>
</div>

</tbody>
</table>



</body>
</html>