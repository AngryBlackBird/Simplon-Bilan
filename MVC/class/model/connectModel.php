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

    public function injectUser($pseudo, $name, $lastname, $mail, $pass, $role)
    {

        try {

            $inject = $this->bdd->prepare("INSERT INTO users (pseudo,name,lastname,mail,pass,role) VALUE (:A,:B,:C,:D,:E,:F)");
            $inject->bindParam(":A", $pseudo);
            $inject->bindParam(":B", $name);
            $inject->bindParam(":C", $lastname);
            $inject->bindParam(":D", $mail);
            $inject->bindParam(":E", $pass);
            $inject->bindParam(":F", $role);
            $inject->execute();

            //var_dump($pseudo);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function recoveryPass($mail)
    {
        $query = $this->bdd->prepare('SELECT COUNT(*) AS nb FROM users WHERE mail = :A');
        $query->bindValue(":A", $mail);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
    public function insertTokenMailing($token, $mail)
    {
        // On insère la date et le token dans la DB
        $query = $this->bdd->prepare('UPDATE users SET dateRecuperates = NOW(),tokenRecuperates = :A WHERE mail = :B');
        $query->bindValue(":A", $token);
        $query->bindValue(":B", $mail);
        $query->execute();
        return $query;
    }

    public function selectTokenByToken($token)
    {
        // On récupère les informations par rapport au token dans la base de données
        $query = $this->bdd->prepare('SELECT tokenRecuperates, dateRecuperates FROM users WHERE tokenRecuperates = ?');
        $query->bindValue(1, $token);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updatePass($password, $token)
    {
        $query = $this->bdd->prepare('UPDATE users SET pass = :A, tokenRecuperates = "" WHERE tokenRecuperates = :B');
        $query->bindParam(":A", $password);
        $query->bindParam(":B", $token);
        $query->execute();
    }
}
