<?php
session_start();
if(!isset($_SESSION["login"])){
  header("location:index.php");
}
?>

<div id="error"></div>
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
session_start();
$q = intval($_GET['q']);

$sql="SELECT * FROM tblcustomer WHERE customer_id = '$q'";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result)) {

$crt_code = $row['crt_code'];
$_SESSION['crtcode'] = $crt_code;
   echo "<ul class='list-group'>";
   echo "<li class='list-group-item'>Name : ". $row['lname']." ".$row['fname']."</li>";
   echo "<li class='list-group-item'>Houseno. : ". $row['houseno'] ."</li>";
   echo "<li class='list-group-item'>Streetno. : ". $row['streetno'] ."</li>";
   echo "<li class='list-group-item'>City. : ". $row['city'] ."</li>";
   echo "<li class='list-group-item'>Province. : ". $row['province'] ."</li>";
   echo "<li class='list-group-item'>Zipcode. : ". $row['zipcode'] ."</li>";
   echo "<li class='list-group-item'>Code. : ". $row['crt_code'] ."</li>";
   echo "</ul>";
}


 $sql_order = "SELECT tblproducts.prod_name, tblorders.qty, tblorders.price,tblorders.status FROM tblorders 
 			INNER JOIN tblproducts ON tblproducts.product_id = tblorders.product_id 
 			WHERE crt_code ='$crt_code' ";
          $result1 = mysqli_query($conn, $sql_order);
          if (mysqli_num_rows($result1) > 0) {
              while($row = mysqli_fetch_assoc($result1)) {
              $product_name = $row['prod_name'];
              $qty = $row['qty'];
              $price = $row['price'];
              $status = $row['status'];

  
          echo "<tr>
                <td>".$product_name."</td>
                <td>".$qty."</td>
                <td>PHP ".$price."</td>
                <td>".$status."</td>
                </tr>";
            
        }
      }

 $sql_total = "SELECT sum(price) FROM tblorders WHERE crt_code ='$crt_code' ";
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