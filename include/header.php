<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Beta signup form</title>
<?php

if (isset($_SESSION['userid'])) {
  echo "Welcome ";
  echo '<a href=profile.php>' . $_SESSION['usernick'] . '</a>';
  echo '<form action="include/logout.inc.php" method="post">
         <button type="submit" name="submit-logout">Logout</button>
        </form>';
} else {
  echo '<form action="include/login.inc.php" method="post">
<input type="text" name="username" placeholder="Username...">
<input type="password" name="password" placeholder="Password...">
<button type="submit" name="submit-login">Login</button>
<a href="signup.php">Signup</a>
</form>
';
}

 ?>


           <hr>
           <center>
       <a href="index.php">Home</a> |
       <a href="browse.php">Browse</a> |
      <?php if(isset($_SESSION['userid'])){
        echo '<a href="users.php">Users</a> |';
        echo '<a href="profile.php">Profile</a> |';
      }
      ?>
       <a href="aboutus.php">About us</a> |
       <a href="conntact.php">Conntact</a>
     </center>
     <hr>
  </head>
<body>
