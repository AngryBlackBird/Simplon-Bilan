<?php

class connectModel
{
    private $bdd;

    public function __construct()
    {
        include 'secure/log.php';

        try {
            $this->bdd = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8', $username, $password);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function selectPseudo($pseudo)
    {
        $alldata  =  $this->bdd->prepare("SELECT pseudo FROM users WHERE pseudo = :A");
        $alldata->bindParam(":A", $pseudo);
        $alldata->execute();
        $reponse = $alldata->fetch();
        // var_dump($reponse);
        return $reponse;
    }
    public function selectMail($mail)
    {
        $alldata  =  $this->bdd->prepare("SELECT  mail FROM users WHERE mail = :A");
        $alldata->bindParam(":A", $mail);
        $alldata->execute();
        $reponse = $alldata->fetch();
        // var_dump($reponse);
        return $reponse;
    }


    public function selectPassFromUser($pseudo)
    {
        $alldata  =  $this->bdd->prepare("SELECT pass FROM users WHERE pseudo = :A");
        $alldata->bindParam(":A", $pseudo);
        $alldata->execute();
        $reponse = $alldata->fetch();
        //var_dump($reponse);
        return $reponse;
    }


}
