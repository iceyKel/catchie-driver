
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


  <script>


</script>
</head>
<body>
<div class = 'main'>



<div class="icon-bar">
  <a href=""><div style="padding-left:5px; ">CATCHIECART </div></a><a href=""></a>
  <a style=" background-color: #e74c3c;" href="checkout.php" class="notification"><i class="fa fa-bell"><span class="badge">
    
        <?php 

          $driverid = $_COOKIE["driver_id"];
          $sql = "SELECT count(*) FROM tblorders WHERE driver_id = '$driverid' AND status = 'Ongoing'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                 $count= $row["count(*)"];
             
                echo $count;  

                  }
    }
        ?>

  </span></i>


  </a> 
  <a href="driver_account.php"><i class="fa fa-user"></i></a>
  <a href="commands/sign_out.php"><i class="fa fa-sign-out"></i></a>
  
</div>



  <div class = 'block2'>
   

<table>
 <tr>
     <th colspan="4">Oder List</th>
     
  </tr>
  <?php
 

  $driverid = $_COOKIE['driver_id'];
  $sql_fetch_prd = "SELECT tblcustomer.customer_id as 'custid',concat(tblcustomer.lname , ' ' , tblcustomer.fname ) as 'fullname', tblproducts.prod_name as 'prodname', sum(tblorders.price) as 'prodprice', tblorders.status as 'status' FROM tblorders 
                          LEFT JOIN tblcustomer ON tblcustomer.crt_code = tblorders.crt_code
                          LEFT JOIN tblstore ON tblstore.store_id = tblorders.store_id
                          LEFT JOIN tblproducts ON tblproducts.product_id = tblorders.product_id WHERE driver_id = '$driverid'";

        $result = mysqli_query($conn, $sql_fetch_prd);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {

               //$prod_nid = $row['tblproducts.product_id'];     
               $custid = $row['custid'];         
               $cust_name = $row['fullname'];
               //$prod_name = $row['prodname'];
               //$prod_des = $row['tblproducts.description'];
              // $qty = $row['qty'];
               $price = $row['prodprice'];
               $status = $row['status'];
               //$store = $row['storename'];                   

             echo "<form action = 'getuser.php' method = 'GET'>";
              echo "<tr><td>".$cust_name." " . $custid ."</td>";
              //echo "<td>".$prod_name."</td>";
             // echo "<td>".$prod_des."</td>";
            //  echo "<td>".$qty."</td>";
              echo "<td>PHP ".$price."</td>";
              echo "<td>". $status ."</td>";
             // echo "<td>".$store."</td>";
              echo "<td><input type = 'hidden' name='prod_id' value='".$custid."'>
                        <center><button  name='users' class= 'btn btn-primary' data-toggle='modal' data-target='#myModal' value='".$custid."'>Check</button></center>
                    </td></tr>";
             echo "</form>";
            
              }}
    ?>
<tr>
      <td></td>
      
      <td></td>
      <td>
     
      </td>
  
    
</tr>
<tr>
</tr>

</table>

  </div>
</div>



 


</body>
</html>


    




