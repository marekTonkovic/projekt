<?php

function getMenu(int $type): void
{
    $headerMenu = [
        "Domov" => "index.php",
        "Products" => "products.php",
        "Promotion" => "qna.php",
        "Contact" => "contact.php",
    ];
    $printMenu = "";

    if($type === 1) {
        foreach ($headerMenu as $menuName => $menuUrl) {
            $printMenu .= '<li><a href="'.$menuUrl.'">'.$menuName.'</a></li>';
        }
    } else {
        foreach ($headerMenu as $menuName => $menuUrl) {
            $printMenu .= '<li><a href="'.$menuUrl.'">'.$menuName.'</a></li>';
        }
    }

    echo $printMenu;
}
