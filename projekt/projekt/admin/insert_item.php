<?php

use lib\DB;

session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include_once "../lib/DB.php";



$db = new DB("localhost", 3306, "root", "", "stone");

if(isset($_POST['submit'])) {
    $insert = $db->insertItem($_POST["name"], $_POST['category']);

    if($insert) {
        header("Location: home.php?status=1");
    } else {
        header("Location: home.php?status=2");
    }
} else {
    header("Location: home.php");
}
