<?php
include 'include/header.php';

if (isset($_SESSION['userid'])) {
  include 'include/dbcon.inc.php';

$news = mysqli_query($con, 'SELECT * FROM `news` ORDER BY `id` ASC');



while ($id = mysqli_fetch_assoc($news)) {
  echo '<pre>';
  echo 'ID - ' . $id['id'] . '<br>';
  echo $id['title'] . '<br>';
  echo $id['new'] . '<br><hr><br>';
  echo '</pre>';
}

 }
