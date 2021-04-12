<?php

class contentController
{
    private $array;

    public function __construct()
    {
        include_once "MVC/class/model/contentModel.php";
    }

    public function viewAllContent()
    {
        $content = new contentModel;
        $data  = $content->viewAllContentByOrder("name");
        return $data;
    }

    public function deleteContent($id)
    {
        $content = new contentModel;
        $delete  = $content->deleteContentByMail($id);
        return $delete;
    }

    public function viewOneContent()
    {

        if (isset($_GET["update"])) {
            $id = $_GET["update"];
            $content = new contentModel;
            $data  = $content->viewOneContentById($id);
            return $data;
        }
    }

    public function updateOneContent()
    {
        if (isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["mail"]) && isset($_POST["date"])) {

            $id = $_GET["update"];
            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $mail = $_POST["mail"];
            $date = $_POST["date"];

            $update = new contentModel;
            $data  = $update->updateOneContent($name, $lastname, $mail, $date, $id);
            return $data;
        }
    }

    public function insertOneContent()
    {
        if (isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["mail"]) && isset($_POST["date"])) {


            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $mail = $_POST["mail"];
            $date = $_POST["date"];
            $update = new contentModel;
            $data  = $update->insertOneContent($name, $lastname, $mail, $date);
            return $data;
        }
    }

    public function insertCSV()
    {

        $brut = fopen($_FILES["userfile"]["tmp_name"], 'r');

        $insert = new contentModel;

        while ($data = fgetcsv($brut, 255, ";")) {
            
            $insert->insertOneContent($data[0], $data[1], $data[2], $data[3]);
        }


        $msg = "<p> Fichier bien ajouter<p>";
        return $msg;
    }
}
