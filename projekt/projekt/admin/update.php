<?php

use lib\DB;


session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include_once "../lib/DB.php";

$db = new DB("localhost", 3306, "root", "", "stone");

if(!isset($_GET['id'])) {
    header("Location: home.php");
}

$menuItem = $db->getMenuItem($_GET['id']);
?>
<br><br>
<form action="update_item.php" method="post">
    <input type="text" name="name" value="<?php echo $menuItem['name']; ?>" placeholder="Page name"><br>
    <input type="text" name="category" value="<?php echo $menuItem['category']; ?>" placeholder="Page url"><br>
    <input type="hidden" name="id" value="<?php echo $menuItem['id']; ?>">
    <input type="submit" name="submit" value="Aktualizovat">
</form>