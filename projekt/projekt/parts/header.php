<?php
include_once "projekt/lib/Common.php";

use projekt\lib\Common;


$common = new Common();


?>
<header class="container main-header">
    <div class="logo-holder">
        <a href="index.php"><img src="img/logo.png" height="40 "></a>
    </div>
    <nav class="main-nav">
        <ul class="main-menu" id="main-menu container">
            <?php
            try {
                $common->getMenu(1);
            } catch (Exception $exception) {
                file_put_contents("error.log", "Menu error", FILE_APPEND);
                echo '<li><a href="index.php">Home</a></li>';
            }
            ?>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>