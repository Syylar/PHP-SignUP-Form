<?php
include 'include/header.php';
include 'include/dbcon.inc.php';



$result1 = mysqli_query($con, 'SELECT username FROM users');
$result2 = mysqli_query($con, 'SELECT email FROM users');

if (isset($_SESSION['userid'])){
  echo '<center><h1>Users</h1></center>';
} else {
  echo "<center><h1>You have to be logged in to see this page!</center></h1>";
}
?>

<table align="center">
  <tr>
    <td>
      <?php
      if (isset($_SESSION['userid'])) {
        while ($users=mysqli_fetch_assoc($result1)) {
          echo $users['username'] . '<br><hr>';
        }
      }
       ?>
     </td>
    <td>
      <?php
      if (isset($_SESSION['userid'])) {
        while ($email=mysqli_fetch_assoc($result2)) {
          echo  $email['email'] . '<br><hr>';
        }
      }
      ?>
    </td>
  </tr>
</table>
