<?php
include 'include/header.php';
?>
<center>
<h1>Signup</h1>

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyfield") {
      echo "You have to fill all fields!";
    } elseif ($_GET["error"] == "invaliduserandmail") {
      echo "Invalid username and email!";
    } elseif ($_GET["error"] == "invalidmail") {
      echo "Invalid email!";
    } elseif ($_GET["error"] == "invalidname") {
      echo "Username is invalid!";
    } elseif ($_GET["error"] == "passwordcheck") {
      echo "Your passwords does not match!";
    } elseif ($_GET["error"] == "usertaken") {
      echo "Username is allready taken!";
    }
}

if (isset($_GET['signup'])) {
  if ($_GET["signup"] == "success") {
    echo "Siugn up is successful!";
  }
}

?>

<form action="include/signup.inc.php" method="post">
 <p><input type="text" name="username" placeholder="Username..."></p>
 <p><input type="text" name="email" placeholder="Email..."></p>
 <p><input type="password" name="password" placeholder="Password..."></p>
 <p><input type="password" name="cpassword" placeholder="Confirm Password..."></p>
 <p><button type="submit" name="submit-signup">Signup</button></p>
</form>
</center>
