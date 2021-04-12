<?php

class root
{
    public function __construct()
    {
        include_once "MVC/class/controller/formController.php";
        include_once "MVC/class/controller/contentController.php";


        include_once "MVC/class/view/formView.php";
        include_once "MVC/class/view/accueilView.php";
        include_once "MVC/class/view/adminView.php";
    }

    public function connect()
    {
        $controller = new formController;
        $result = $controller->connect();


        $view = new formView();
        $view->connect($result);
    }


    public function accueil()
    {

        $view = new accueilView();
        $view->accueil();
    }
}
