<?php
include 'config.php';
session_start();
if(isset($_SESSION["login"])){
  header("location:driver_pge.php");
}

if(isset($_POST['submit'])){

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['pwd']);
  $sql = "SELECT * FROM tbldriver WHERE username = '$username' AND password = '$password' " ;
  $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {

                header("location:driver_pge.php");

                $_SESSION['login'] = $row['driver_id'];
                $cookie_name="driver_id";
                $cookie_value = $row['driver_id'];
                setcookie($cookie_name,$cookie_value, time() + (86400 * 30), "/");
                header("location:driver_pge.php");
  

              }

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../jquery/bootstrap-3.4.1-dist/css/bootstrap.min.css">
  <script src="../jquery/jquery.min.js"></script>
  <script src="../jquery/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
  <style>
 .main{


  margin: auto; 
 
  border: 1px solid #cccccc;
  height: 100%;
  padding: 20px;
}


  </style>
</head>
<body>
<div class="main">
 <h2>CatchIEcart</h2>
  
  <form action="index.php" method="POST">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
  
    <button type="submit" name = 'submit' class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>



