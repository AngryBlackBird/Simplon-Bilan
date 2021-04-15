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
        $data  = $content->viewAllContentByOrder("time");
        return $data;
    }

    public function viewAllFilterByDistinct()
    {
        $content = new contentModel;
        $type  = $content->viewAllTypeByDistinct();
        $pratice  = $content->viewAllPracticeByDistinct();
        $specialite  = $content->viewAllSpecialityByDistinct();
        $filter = array($type, $pratice, $specialite);

        return $filter;
    }

    public function deleteContent()
    {
        if (isset($_GET["delete"])) {
            $content = new contentModel;
            $data  = $content->viewOneContentById($_GET["delete"]);
            var_dump($data["picutre"]);
            unlink($data["picutre"]);


            $content = new contentModel;
            $delete  = $content->deleteContentByMail($_GET["delete"]);
            return $delete;
        }
    }

    public function viewOneContent()
    {

        if (isset($_GET["modify"])) {
            $id = $_GET["modify"];
            $content = new contentModel;
            $data  = $content->viewOneContentById($id);
            return $data;
        }
    }

    public function updateOneContent()
    {
        if (isset($_POST["name"]) && isset($_POST["pratique"]) && isset($_POST["specialite"]) && isset($_FILES["Photo"])  && isset($_POST["type"]) && isset($_POST["editor2"]) && isset($_POST["editor1"])) {

            $name = $_POST["name"];
            $pratique = $_POST["pratique"];
            $specialite = $_POST["specialite"];
            $description = $_POST["editor2"];
            $content = $_POST["editor1"];
            $type = $_POST["type"];


            // Constantes
            $target = "../Bilan/imgUpload/";    // Repertoire cible
            // Tableaux de donnees
            $tabExt = array('jpg', 'gif', 'png', 'jpeg');    // Extensions autorisees
            /************************************************************
             * Script d'upload
             *************************************************************/

            // On verifie si le champ est rempli
            if (!empty($_FILES['Photo']['name'])) {
                // Recuperation de l'extension du fichier
                $extension  = pathinfo($_FILES['Photo']['name'], PATHINFO_EXTENSION);

                // On verifie l'extension du fichier
                if (in_array(strtolower($extension), $tabExt)) {
                    // On recupere les dimensions du fichier

                    // Parcours du tableau d'erreurs
                    if (
                        isset($_FILES['Photo']['error'])
                        && UPLOAD_ERR_OK === $_FILES['Photo']['error']
                    ) {
                        // On renomme le fichier
                        $nomImage = $name . '.' . $extension;

                        // Si c'est OK, on teste l'upload
                        if (move_uploaded_file($_FILES['Photo']['tmp_name'], $target . $nomImage)) {
                            $urlImg =  $target . $nomImage;

                            $update = new contentModel;
                            $id = $_GET["modify"];
                            $data  = $update->updateOneContent($name, $pratique, $specialite, $urlImg, $type, $description, $content, $id);

                            if ($data == true) {
                                $message = 'Mise a jour réussite !';
                            } else {
                                $message = 'Une érreur c\'est produite';
                            }
                        } else {
                            // Sinon on affiche une erreur systeme
                            $message = 'Problème lors de l\'upload !';
                        }
                    } else {
                        $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                    }
                } else {
                    // Sinon erreur sur le type de l'image
                    $message = 'Le fichier à uploader n\'est pas une image !';
                }
            } else {
                // Sinon on affiche une erreur pour l'extension
                $message = 'L\'extension du fichier de l\'image est incorrecte !';
            }
        } else {
            // Sinon on affiche une erreur pour le champ vide
            $message = 'Veuillez remplir le formulaire svp !';
        }


        return $message;
    }

    public function insertOneContent()
    {

        if (isset($_POST["name"]) && isset($_POST["pratique"]) && isset($_POST["specialite"]) && isset($_FILES["Photo"])  && isset($_POST["type"]) && isset($_POST["editor2"]) && isset($_POST["editor1"])) {

            $name = $_POST["name"];
            $pratique = $_POST["pratique"];
            $specialite = $_POST["specialite"];
            $description = $_POST["editor2"];
            $content = $_POST["editor1"];
            $type = $_POST["type"];


            // Constantes
            $target = "../Bilan/imgUpload/";    // Repertoire cible
            // Tableaux de donnees
            $tabExt = array('jpg', 'gif', 'png', 'jpeg');    // Extensions autorisees
            /************************************************************
             * Script d'upload
             *************************************************************/

            // On verifie si le champ est rempli
            if (!empty($_FILES['Photo']['name'])) {
                // Recuperation de l'extension du fichier
                $extension  = pathinfo($_FILES['Photo']['name'], PATHINFO_EXTENSION);

                // On verifie l'extension du fichier
                if (in_array(strtolower($extension), $tabExt)) {
                    // On recupere les dimensions du fichier

                    // Parcours du tableau d'erreurs
                    if (
                        isset($_FILES['Photo']['error'])
                        && UPLOAD_ERR_OK === $_FILES['Photo']['error']
                    ) {
                        // On renomme le fichier
                        $nomImage = $name . '.' . $extension;

                        // Si c'est OK, on teste l'upload
                        if (move_uploaded_file($_FILES['Photo']['tmp_name'], $target . $nomImage)) {
                            $urlImg =  $target . $nomImage;

                            $update = new contentModel;
                            $data  = $update->insertOneContent($name, $pratique, $specialite, $urlImg, $type, $description, $content);
                            if ($data == true) {
                                $message = 'Ajout réussi !';
                            } else {
                                $message = 'Une érreur c\'est produite';
                            }
                        } else {
                            // Sinon on affiche une erreur systeme
                            $message = 'Problème lors de l\'upload !';
                        }
                    } else {
                        $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                    }
                } else {
                    // Sinon erreur sur le type de l'image
                    $message = 'Le fichier à uploader n\'est pas une image !';
                }
            } else {
                // Sinon on affiche une erreur pour l'extension
                $message = 'L\'extension du fichier de l\'image est incorrecte !';
            }
        } else {
            // Sinon on affiche une erreur pour le champ vide
            $message = 'Veuillez remplir le formulaire svp !';
        }


        return /*$message*/;
    }

    public function publishedContent()
    {
        if (isset($_POST["check"])) {

            $content = new contentModel;
            $data  = $content->publishedContentON($_POST["checkId"]);
        } else if (isset($_POST["checkId"])) {

            $content = new contentModel;
            $data  = $content->publishedContentOFF($_POST["checkId"]);
        }
    }
    public function article()
    {
        $content = new contentModel;
        $data  = $content->viewOneContentById($_GET["vu"]);
        return $data;
    }
}
