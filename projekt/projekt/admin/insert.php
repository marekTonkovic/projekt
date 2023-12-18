<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}


?>
<br><br>
<form action="insert_item.php" method="post">
    <input type="text" name="name" value="" placeholder="product"><br>
    <input type="text" name="category" value="" placeholder="kategoria"><br>
    <input type="submit" name="submit" value="Vlozit">
</form>
