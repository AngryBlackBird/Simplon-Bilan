<?php


class formController
{
    private $array;

    public function __construct()
    {
        include_once "MVC/class/model/connectModel.php";
    }

    public function subcribe()
    {

        if (isset($_POST["name"]) & isset($_POST["lastname"]) & isset($_POST["pseudo"]) & isset($_POST["mail"]) & isset($_POST["pass1"]) & isset($_POST["pass2"])) {

            if ($_POST["pass1"] != $_POST["pass2"]) {

                $this->array["message"] = 'mot de passe incorect';


                return $this->array;
            }
            $pseudo = $_POST["pseudo"];
            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $mail = $_POST["mail"];
            $pass = password_hash($_POST["pass1"], PASSWORD_DEFAULT);
            $role = 1;

            $bdd  = new connectModel;



            $selectPseudo = $bdd->selectPseudo($pseudo);
            $selectMail = $bdd->selectMail($mail);


            if (($selectPseudo == false ||  $selectPseudo[0] != $pseudo) && ($selectMail == false  || $selectMail[0] != $mail)) {

                $inject = $bdd->injectUser($pseudo, $name, $lastname, $mail, $pass, $role);
                // var_dump($bdd);
                $this->array["message"] = 'Compte crée';
                return $this->array;
            } else {
                $this->array["message"] = 'Pseudo ou email déja existant';
                return $this->array;
            }
        }
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

    public function recoveryPass()
    {


        if (!empty($_POST)) {    // Si le formulaire a été soumis
            if (!empty($_POST['mail'])) {    // Si le formulaire est correctement remplit

                $mail = $_POST['mail'];

                // On fait une requête pour savoir si l'adresse e-mail est associé à un compte
                $bdd  = new connectModel;

                $row = $bdd->recoveryPass($mail);

                if (!empty($row) && $row['nb'] > 0) {    // Si l'adresse courriel est associé à un compte
                    // On génère notre token
                    $string = implode('', array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9')));
                    $token = substr(str_shuffle($string), 0, 20);

                    // On insère la date et le token dans la DB

                    $row = $bdd->insertTokenMailing($token, $mail);


                    /////////////////////Censé envoyer le mail mais marche po////////////////
                    /* 
                    // On prépare l'envoie du courriel
                    $link = 'http://localhost/CrudIscription/?page=recoveryPass&token=' . $token;
                    $to =  $mail;
                    $subject = 'Réinitisalisation de votre mot de passe';
                    $message = '<h1>Réinitisalition de votre mot de passe</h1><p>Pour réinitialiser votre mot de passe, veuillez suivre ce lien : <a href="' . $link . '">' . $link . '</a></p>';
                    // On défini les entêtes requis
                    $header = [];
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                    $headers[] = 'To: ' . $to . ' <' . $to . '>';
                    $headers[] = 'Mon site web <info@monsiteweb.tld>';

                    // On envoie le courriel
                    mail($to, $subject, $message, implode("\r\n", $headers));
                    */

                    $msg = '<div style="color: green;">Un courriel a été acheminé. Veuillez regarder votre boîte aux lettres et suivre les instructions à l\'intérieur du courriel.  <a href="?page=recoveryPass2&token=' . $token . '" style="color: red!important"> Voir mail</a>   </div>';
                    return $msg;
                } else {    // Si elle n'est pas associé à un compte
                    $msg = '<div style="color: red;">Cette adresse courriel n\'a pas été trouvée dans la base de données.</div>';
                    return $msg;
                }
            } else {    // Si le formulaire n'est pas correctement remplit
                $msg = '<div style="color: red;">Veuillez spécifier une adresse courriel.</div>';
                return $msg;
            }
        }
    }
    public function recoveryPass2()
    {
        $msg = '';
        if (empty($_GET['token'])) {    // Si aucun token n'est spécifié en paramètre de l'URL
            echo 'Aucun token n\'a été spécifié';
            exit;
        }
        $bdd  = new connectModel;
        $row = $bdd->selectTokenByToken($_GET['token']);

        if (empty($row)) {    // Si aucune info associée au token n'est trouvé
            echo 'Ce token n\'a pas été trouvé';
            exit;
        }

        // On calcul la date de la génération du token + 3hrs
        $tokenDate = strtotime('+3 hours', strtotime($row['dateRecuperates']));


        $todayDate = time();

        if ($tokenDate > $todayDate) {    // Si la date est dépassé le délais de 3hrs
            echo 'Token expiré !';
            exit;
        }

        if (!empty($_POST)) {    // Si le formulaire a été soumis
            if (!empty($_POST['password']) && !empty($_POST['password_confirm'])) {    // Si le formulaire est correctement remplit
                if ($_POST['password'] === $_POST['password_confirm']) {    // Si les deux mots de passes sont les mêmes
                    // On hash le mot de passe
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    // On modifie les informations dans la base de données
                    $row = $bdd->updatePass($password, $_GET['token']);




                    $msg = '<div style="color: green;">Le mot de passe a été changé !</div>';
                    return $msg;
                } else {    // si les deux mots de passe ne sont pas identiques
                    $msg = '<div style="color: red;">Les deux mots de passes ne sont pas identiques.</div>';
                    return $msg;
                }
            } else {
                $msg = '<div style="color: red;">Veuillez remplir tous les champs du formulaire.</div>';
                return $msg;
            }
        }
    }
}
