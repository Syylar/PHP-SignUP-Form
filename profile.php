<?php
include 'include/header.php';
include 'include/dbcon.inc.php';

$profile = mysqli_query($con, 'SELECT username, email FROM users');

$prof = mysqli_fetch_assoc($profile);


if (isset($_SESSION['userid'])) {
  echo "Username: " . $_SESSION['usernick'];
  echo '<br>';
  echo "Email: " . $_SESSION['email'];
}
