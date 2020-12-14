<?php


if (isset($_POST['submit-news'])) {
  include 'dbcon.inc.php';
  $news = $_POST['news'];
  $title = $_POST['title'];

      if (empty($news) || empty($title)) {
        header('Location: ../index.php?error=emptyfield');
        exit();
      } else {
        $sql = "INSERT INTO `news` (`title`, `new`) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($con);
                   if (!mysqli_stmt_prepare($stmt, $sql)) {
                       header("Location: ../index.php?error=sqlerror");
                       exit();
                 } else {
                   mysqli_stmt_bind_param($stmt, "ss", $title, $news);
                   mysqli_stmt_execute($stmt);
                   header("Location: ../index.php?addnew=success");
                   exit();
                 }
             }
      }
