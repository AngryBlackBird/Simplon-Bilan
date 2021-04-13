<?php

class adminView
{
    public function adminAllView($result, $resultType)
    {

        include_once "MVC/vues/admin.php";
    }

    public function adminHeader()
    {
        include_once "MVC/vues/header-footer/header.php";
    }
    public function adminFooter()
    {
        include_once "MVC/vues/header-footer/footer.php";
    }

    public function insertContent($array)
    {
        include_once "MVC/vues/header-footer/header.php";
        include_once "MVC/vues/one.php";
        include_once "MVC/vues/header-footer/footer.php";
    }
}
