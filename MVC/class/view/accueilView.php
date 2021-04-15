<?php

class accueilView
{
    public function accueil($data,  $resultType)
    {
        include_once "MVC/vues/header-footer/header.php";
        include_once "MVC/vues/accueil.php";
        include_once "MVC/vues/header-footer/footer.php";
    }
    public function article($array)
    {
        include_once "MVC/vues/header-footer/header.php";
        include_once "MVC/vues/plat.php";
        include_once "MVC/vues/header-footer/footer.php";
    }
}
