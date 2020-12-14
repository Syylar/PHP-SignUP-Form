<?php
include 'include/header.php';
?>

<main align="center">

<?php

if (isset($_GET['error'])) {
  if ($_GET["error"] == "emptyfield") {
    echo "You have empty field! No news added..." . '<br>';
  }
}

if (isset($_GET['addnew'])) {
  if ($_GET['addnew'] == "success") {
    echo "You successfuly added a new!" . '<br>';
  }
}

if (isset($_SESSION['userid'])) {
  echo '<a href=addnews.php>Add new</a>' . '<br><hr>';
  include 'include/dbcon.inc.php';
  $title = mysqli_query($con, "SELECT `title`, `new` FROM `news` ORDER BY `id` DESC LIMIT 1");

  while ($showtitle = mysqli_fetch_assoc($title)) {
    echo '<b>News title:</b> ' . $showtitle['title'] . '<br><hr style="width:30%;tmargin-center:0">' . $showtitle['new']. '<br><hr style="width:60%;tmargin-center:0">';
    break;
  }
  echo "<a href=news.php>All news</a";

} else {
  echo "You are not logged!";
}
 ?>


</main>
