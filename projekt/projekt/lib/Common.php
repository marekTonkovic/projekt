<?php


namespace lib;


class Common
{
    private $menu = [
        1 => [
            "Domov" => "index.php",
            "Promotion" => "promotion.php",
            "Products" => "products.php",
            "Kontakt" => "contact.php"
        ]
    ];

    public function getMenu(int $type): void
    {
        $printMenu = "";

        if($type === 1) {
            foreach ($this->menu[$type] as $menuName => $menuUrl) {
                $printMenu .= '<li><a href="'.$menuUrl.'">'.$menuName.'</a></li>';
            }
        } else {
            throw new \Exception('Nevalidne menu');
        }

        echo $printMenu;
    }

}