<?php


use lib\DB;


session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include_once "../lib/DB.php";



$db = new DB("localhost", 3306, "root", "", "stone");


if(isset($_POST['submit'])) {
    $update = $db->updateItem($_POST['id'], $_POST['name'], $_POST['category']);

    if($update) {
        header("Location: home.php?status=5");
    } else {
        header("Location: home.php?status=6");
    }
} else {
    header("Location: home.php");
}
