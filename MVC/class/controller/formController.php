<?php


class formController
{
    private $array;

    public function __construct()
    {
        include_once "MVC/class/model/connectModel.php";
    }

    public function connect()
    {
        if (isset($_POST["pseudo"]) == true & isset($_POST["pass"]) == true) {

            $pseudo = $_POST["pseudo"];
            $pass = $_POST["pass"];

            $bdd  = new connectModel;
            $pseudo = $_POST["pseudo"];


            $resultPass = $bdd->selectPassFromUser($pseudo);



            if (isset($resultPass[0]) == true) {

                if (password_verify($pass, $resultPass[0])) {

                    $_SESSION["pseudo"] = $pseudo;
                    header("Location: ?page=admin");
                } else {

                    $result["message"] = "Mot de passe incorrect";

                    return $result;
                }
            } else {
                $result["message"] = "Pseudo inexistant, veulliez vous inscrire.";

                return $result;
            }
        }
    }
    public function deconnect()
    {
        session_destroy();
        header("Location: /Bilan");
    }
}
