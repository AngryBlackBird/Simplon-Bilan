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

        $controller = new contentController;
        $result = $controller->viewAllContent();
        $resultType = $controller->viewAllFilterByDistinct();

        $view = new accueilView();
        $view->accueil($result, $resultType);
    }
    public function admin()
    {
        if (isset($_SESSION["pseudo"])) {


            $controller = new contentController;
            $view = new adminView();
            $view->adminHeader();



            if (isset($_GET["delete"])) {
                
                $delete = $controller->deleteContent();

            } else if (isset($_GET["modify"])) {
                $message = $controller->updateOneContent();
                $oneContent = $controller->viewOneContent();
                $view->modifyContent($oneContent, $message);
            } else {

                $check = $controller->publishedContent();

                $result = $controller->viewAllContent();
                $controller = new contentController;
                $resultType = $controller->viewAllFilterByDistinct();

                $view->adminAllView($result, $resultType);
            }
            $view->adminFooter();
        } else {
            header("Location: ?page=connect");
        }
    }
    public function insertContent()
    {
        if (isset($_SESSION["pseudo"])) {

            $controller = new contentController;
            $view = new adminView();
            $array =  $controller->insertOneContent();
            $view->insertContent($array);
        } else {
            header("Location: ?page=connect");
        }
    }
}
