 <?php
include 'include/header.php';

?>
<form action="include/addnews.inc.php" method="post">
<p>Title: <input type="text" name="title" placeholder="Type the tittle here..."></p>
<p>News: <textarea type="text" name="news" rows="4" cols="50" placeholder="Type news here.."></textarea></p>
<button type="submit" name="submit-news">Submit news</button>
</form>
