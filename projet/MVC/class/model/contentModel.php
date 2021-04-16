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
        $alldata  =  $this->bdd->prepare("SELECT *  FROM content ORDER BY :A");
        $alldata->bindParam(":A", $order);

        $alldata->execute();
        $reponse = $alldata->fetchAll();


        return $reponse;
    }


    public function viewOneContentById($id)
    {
        $alldata  =  $this->bdd->prepare("SELECT * FROM content WHERE id = :A");
        $alldata->bindParam(":A", $id);

        $alldata->execute();
        $reponse = $alldata->fetch();
        return $reponse;
    }

    public function deleteContentByMail($id)
    {
        $delete  =  $this->bdd->prepare("DELETE FROM content WHERE id = :A");
        $delete->bindParam(":A", $id);

        $reponse =  $delete->execute();


        return $reponse;
    }

    public function updateOneContent($name, $pratique, $specialite, $photo, $type, $description, $content, $id)
    {
        $update  =  $this->bdd->prepare("UPDATE content SET  name = :A,
                                                            description = :B,
                                                            content = :C,
                                                            practice = :D,
                                                            speciality = :E,
                                                            type = :F,
                                                            picutre = :G,
                                                            time = NOW()
                                                            WHERE id = :H");
        $update->bindParam(":A", $name);
        $update->bindParam(":B", $description);
        $update->bindParam(":C", $content);
        $update->bindParam(":D", $pratique);
        $update->bindParam(":E", $specialite);
        $update->bindParam(":F", $type);
        $update->bindParam(":G", $photo);
        $update->bindParam(":H", $id);

        $reponse =  $update->execute();

      
        return $reponse;
    }

    public function insertOneContent($name, $pratique, $specialite, $photo, $type, $description, $content)
    {
        $update  =  $this->bdd->prepare("INSERT INTO content SET name = :A,
                                                                description = :B,
                                                                content = :C,
                                                                practice = :D,
                                                                speciality = :E,
                                                                type = :F,
                                                                picutre = :G,
                                                                time = NOW(),
                                                                published = 0
                                                            ");
        $update->bindParam(":A", $name);
        $update->bindParam(":B", $description);
        $update->bindParam(":C", $content);
        $update->bindParam(":D", $pratique);
        $update->bindParam(":E", $specialite);
        $update->bindParam(":F", $type);
        $update->bindParam(":G", $photo);



        $reponse =  $update->execute();


        return $reponse;
    }

    public function viewAllTypeByDistinct()
    {
        $alldata  =  $this->bdd->prepare("SELECT DISTINCT  type  FROM content ");


        $alldata->execute();
        $reponse = $alldata->fetchAll();


        return $reponse;
    }
    public function viewAllPracticeByDistinct()
    {
        $alldata  =  $this->bdd->prepare("SELECT DISTINCT  practice  FROM content ");


        $alldata->execute();
        $reponse = $alldata->fetchAll();


        return $reponse;
    }
    public function viewAllSpecialityByDistinct()
    {
        $alldata  =  $this->bdd->prepare("SELECT DISTINCT  speciality  FROM content ");


        $alldata->execute();
        $reponse = $alldata->fetchAll();


        return $reponse;
    }

    public function publishedContentON($id)
    {
        $one = 1;

        $update  =  $this->bdd->prepare("UPDATE content SET  published = :A
                                                            WHERE id = :B");
        $update->bindParam(":A", $one);
        $update->bindParam(":B", $id);

        $reponse =  $update->execute();


        return $reponse;
    }

    public function publishedContentOFF($id)
    {
        $one = 0;
        $update  =  $this->bdd->prepare("UPDATE content SET  published = :A
                                                          
                                                            WHERE id = :H");
        $update->bindParam(":A", $one);
        $update->bindParam(":H", $id);

        $reponse =  $update->execute();


        return $reponse;
    }
}
