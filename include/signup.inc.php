<?php

if (isset($_POST['submit-signup'])) {
  include 'dbcon.inc.php';

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

    if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
     header("Location: ../signup.php?error=emptyfield&username=" . $username . "&email=" . $email);
     exit();
   } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $username)) {
     header("Location: ../signup.php?error=invaliduserandmail");
     exit();
   } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     header("Location: ../signup.php?error=invalidmail&username=" . $username);
     exit();
   } elseif (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
     header("Location: ../signup.php?error=invalidname&email=" . $email);
     exit();
   } elseif ($password !== $cpassword) {
     header("Location: ../signup.php?error=passwordcheck&username=" . $username . "&email=" . $email);
     exit();
   } else {
     $sql = "SELECT `username` FROM `users` WHERE username=?";
     $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);

              if ($result > 0) {
                header("Location: ../signup.php?error=usertaken&email=" . $email);
                exit();
              } else {
                $sql = "INSERT INTO `users` (`username`, `password`, `email`) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
              } else {
                $hashedpw = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sss", $username, $hashedpw, $email);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");
                exit();
              }
          }
   }
 }
mysqli_stmt_close($stmt);
mysqli_close($con);
} else {
  header("Location: ../signup.php");
  exit();
}
