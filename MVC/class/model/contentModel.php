<?php

class contentModel
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

    public function viewAllContentByOrder($order)
    {
        $alldata  =  $this->bdd->prepare("SELECT id, name, lastname, mail, time FROM client ORDER BY :A");
        $alldata->bindParam(":A", $order);

        $alldata->execute();
        $reponse = $alldata->fetchAll();


        return $reponse;
    }


    public function viewOneContentById($id)
    {
        $alldata  =  $this->bdd->prepare("SELECT id, name, lastname, mail, time FROM client WHERE id = :A");
        $alldata->bindParam(":A", $id);

        $alldata->execute();
        $reponse = $alldata->fetch();
        return $reponse;
    }

    public function deleteContentByMail($id)
    {
        $delete  =  $this->bdd->prepare("DELETE FROM client WHERE id = :A");
        $delete->bindParam(":A", $id);

        $reponse =  $delete->execute();


        return $reponse;
    }

    public function updateOneContent($name, $lastname, $mail, $time, $id)
    {
        $update  =  $this->bdd->prepare("UPDATE client SET name = :A,
                                                            lastname = :B,
                                                            mail = :C,
                                                            time = :D 
                                                            WHERE id = :E");
        $update->bindParam(":A", $name);
        $update->bindParam(":B", $lastname);
        $update->bindParam(":C", $mail);
        $update->bindParam(":D", $time);
        $update->bindParam(":E", $id);

        $reponse =  $update->execute();


        return $reponse;
    }

    public function insertOneContent($name, $lastname, $mail, $time)
    {
        $update  =  $this->bdd->prepare("INSERT INTO client SET name = :A,
                                                            lastname = :B,
                                                            mail = :C,
                                                            time = :D ");
        $update->bindParam(":A", $name);
        $update->bindParam(":B", $lastname);
        $update->bindParam(":C", $mail);
        $update->bindParam(":D", $time);


        $reponse =  $update->execute();


        return $reponse;
    }
}
