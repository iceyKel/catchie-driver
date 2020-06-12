
<?php
include 'config.php';
session_start();
if(!isset($_SESSION["login"])){
   header("location:index.php");;
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

    .label {
  font-size: 12px;
  font-family: "Segoe UI"
  color:#34495e;
}


input[type=password], select {
  width: 100%;
  display: inline-block;
  border: none;
  color: #2d3436;
  border-bottom: 1px solid #ccc;
  background-color: transparent;
  font-size: 18px;
  font-family: "Segoe UI";


}
input[type=text], select {
  width: 100%;
  display: inline-block;
  border: none;
  color: #2d3436;
  border-bottom: 1px solid #ccc;
  background-color: transparent;
  font-size: 18px;
  font-family: "Segoe UI";


}

input[type=submit] {
  width: 100%;
  text-decoration: none;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

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

  table,tr,td, th {  
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
  <a href="driver_pge.php" class="notification"><i class="fa fa-bell"><span class="badge">
    
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
  <a style=" background-color: #e74c3c;"  href="driver_account.php"><i class="fa fa-user"></i></a>
        <a href="commands/sign_out.php"><i class="fa fa-sign-out"></i></a>
  
</div>



  <div class = 'block2'>
   
<form action = "commands/upd_info.php" method="POST">
<table>
 <tr>
     <th colspan="4">Account Info</th>
     
  </tr>
  <?php
 

  $driverid = $_COOKIE['driver_id'];
 $sql="SELECT * FROM tbldriver WHERE driver_id = '$driverid'";
 $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) { 
        $driverid = $row['driver_id'];
        $drivername = $row['driver_name'];
        $username = $row['username'];
        $route = $row['route'];
        $address = $row['address'];
        $password = $row['password'];
        $licenseno = $row['licenseno'];
        //$status = $row['status'];
}
    ?>
      <input type="hidden" name="driverid" value=<?php echo $driverid ?>>
      <tr><td><label>Name</label><input type="text" name="drivername" value=<?php echo "'".$drivername."'"; ?>></td></tr>
      <tr><td><label>Username</label><input type="text" name="username" value=<?php echo "'".$username."'" ?>></td></tr>
      <tr><td><label>Password</label><input type="password" name="password" value=<?php echo "'".$password."'" ?>></td></tr>
      <tr><td><label>Route</label><input type="text" name="route" value=<?php echo "'".$route."'" ?>></tr></td>
      <tr><td><label>Route</label><input type="text" name="address" value=<?php echo "'".$address."'" ?>></tr></td>
      <tr><td><label>License no.</label><input type="text" name="licenseno" value=<?php echo "'".$licenseno."'" ?>></tr></td>
      <tr><td><input class="button" type="submit" name="submit" value="Update"></td></tr>

</table>
</form>

  </div>
</div>



 


</body>
</html>


    




