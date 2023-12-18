<head>
    <meta charset="utf-8">
    <title>Stone Responsive Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!--
    Stone Template
    http://www.templatemo.com/preview/templatemo_452_stone
    -->
    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Normailize Stylesheet -->
    <link rel="stylesheet" href="css/normalize.min.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="css/templatemo-style.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>

<?php

use lib\DB;


if (session_status() == PHP_SESSION_ACTIVE) {
} else {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include_once "../lib/DB.php";




$db = new DB("localhost", 3306, "root", "", "stone");

$dbInstance = new lib\DB();


$menuItems = $db->getItems();

if(isset($_GET['status'])) {
    if($_GET['status'] == 1) {
        echo "<br><p style='color: green'>Polozka vlozena korektne</p><br>";
    } elseif ($_GET['status'] == 2) {
        echo "<br><p style='color: red'>Polozka nebola vlozena korektne</p><br>";
    } elseif ($_GET['status'] == 3) {
        echo "<br><p style='color: green'>Polozka bola vymazana korektne</p><br>";
    } elseif ($_GET['status'] == 4) {
        echo "<br><p style='color: red'>Polozka nebola vymazana korektne</p><br>";
    } elseif ($_GET['status'] == 5) {
        echo "<br><p style='color: green'>Polozka bola aktualizovana korektne</p><br>";
    } elseif ($_GET['status'] == 6) {
        echo "<br><p style='color: red'>Polozka nebola aktualizovana korektne</p><br>";
    }
}


 foreach ($menuItems as $item) : ?>

                <div class="col-lg-4 col-md-6 col-12">


                    <div class="menu-image-wrap">
                        <img src="../<?php echo $item['img'];  ?>" class="img-fluid menu-image" alt="">
                    </div>


                    <div class="menu-info d-flex flex-wrap align-items-center">
                        <h4 class="mb-0"><?php echo $item['name'];  ?></h4>

                        <span class="price-tag bg-white shadow-lg ms-4"><?php echo $item['category'];  ?></span>


                    </div>

                    <ul class="admin-icon">
                            <a href='delete.php?id=<?php echo $item['id']; ?>'>
                                <span>Delete</span>
                            </a>
                            <a href='update.php?id=<?php echo $item['id']; ?>'>
                            <span>Edit</span>
                            </a>

                    </ul>

                </div>
<a href='insert.php?id=<?php echo $item['id']; ?>'>
    <span>Add</span>
            <?php endforeach; ?>

    <a href="logout.php">
