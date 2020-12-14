<?php
$servername = "127.0.0.1";
$dbusername = "root";
$dbpassword = "cvetomir159";
$db = "site";

$con = mysqli_connect($servername, $dbusername, $dbpassword, $db);
mysqli_set_charset($con, "utf8");
if (!$con){
  die("Connection failed: " . mysqli_connect_error());
}

 ?>
