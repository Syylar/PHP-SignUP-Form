 <?php

 if (isset($_POST['submit-login'])) {
    include 'dbcon.inc.php';

    $mailoruser = $_POST['username'];
    $password = $_POST['password'];

    if (empty($mailoruser) || empty($password)) {
      header("Location: ../index.php?error=emptyfields");
      exit();
    } else {
      $sql = "SELECT * FROM users WHERE username=?;";
      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $mailoruser);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
          $passcheck = password_verify($password, $row['password']);
          if ($passcheck == false) {
            header("Location: ../index.php?error=wrongpw");
            exit();
          } elseif ($passcheck == true) {
            session_start();
            $_SESSION['userid'] = $row['id'];
            $_SESSION['usernick'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            header("Location: ../index.php?login=succes");
            exit();

          } else {
            header("Location: ../index.php?error=wrongpw");
            exit();
          }
        } else {
          header("Location: ../index.php?error=nouser");
          exit();
        }
      }
    }
 } else {
   header("Location: ../index.php");
 }
