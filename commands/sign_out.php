<?php
session_start();
session_unset();
session_destroy();
setcookie("city_id", "", time() - 3600);
setcookie("customerid", "", time() - 3600);
setcookie("driver_id", "", time() - 3600);
setcookie("store_id", "", time() - 3600);
setcookie("user", "", time() - 3600);
setcookie("user_id", "", time() - 3600);
header("location:../index.php")
?>