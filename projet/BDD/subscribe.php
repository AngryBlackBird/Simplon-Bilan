<?php
include '../secure/log.php';

$bdd;
$array;
try {
    $bdd  = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8', $username, $password);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


function selectPseudo($pseudo, $bdd)
{
    $alldata  =  $bdd->prepare("SELECT pseudo FROM users WHERE pseudo = :A");
    $alldata->bindParam(":A", $pseudo);
    $alldata->execute();
    $reponse = $alldata->fetch();
    // var_dump($reponse);
    return $reponse;
}
function selectMail($mail, $bdd)
{
    $alldata  =  $bdd->prepare("SELECT  mail FROM users WHERE mail = :A");
    $alldata->bindParam(":A", $mail);
    $alldata->execute();
    $reponse = $alldata->fetch();
    // var_dump($reponse);
    return $reponse;
}


function injectUser($pseudo, $name, $lastname, $mail, $pass, $role, $bdd)
{

    try {

        $inject = $bdd->prepare("INSERT INTO users (pseudo,name,lastname,mail,pass,role) VALUE (:A,:B,:C,:D,:E,:F)");
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
controller($bdd);

function controller($bdd)
{
    if (isset($_POST["name"]) & isset($_POST["lastname"]) & isset($_POST["pseudo"]) & isset($_POST["mail"]) & isset($_POST["pass1"]) & isset($_POST["pass2"])) {

        if ($_POST["pass1"] != $_POST["pass2"]) {

            $array["message"] = 'mot de passe incorect';


            return $array;
        }
        $pseudo = $_POST["pseudo"];
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $mail = $_POST["mail"];
        $pass = password_hash($_POST["pass1"], PASSWORD_DEFAULT);
        $role = 1;





        $selectPseudo = selectPseudo($pseudo, $bdd);
        $selectMail = selectMail($mail, $bdd);


        if (($selectPseudo == false ||  $selectPseudo[0] != $pseudo) && ($selectMail == false  || $selectMail[0] != $mail)) {

            $inject = injectUser($pseudo, $name, $lastname, $mail, $pass, $role, $bdd);
            // var_dump($bdd);
            $array["message"] = 'Compte crée';
            return $array;
        } else {
            $array["message"] = 'Pseudo ou email déja existant';
            return $array;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="ASSET/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous" defer></script>

    <title>Document</title>

    <title>

    </title>



</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Optimum</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                </ul>

            </div>
        </nav>
    </header>
    <main>
        <section>
            <div class="container ">
                <div class="row row2 ">
                    <form action="" method="POST" class="col-12 ">
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input class="form-control" type="text" placeholder="Dubois" name="lastname" required>
                        </div>
                        <div class="form-group">
                            <label for="">Prénom</label>
                            <input class="form-control" type="text" placeholder="Pierre" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pseudo</label>
                            <input class="form-control" type="text" placeholder="Azerlto" name="pseudo" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Addresse email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@email.com" name="mail" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="pass1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="pass2" required>
                            <small id="emailHelp" class="form-text text-muted">Verifiez votre mot de passe</small>
                        </div>
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                        <?php
                      
                        if (isset($result["message"]) == true)
                            echo "<p>" . $array["message"] . "</p>";
                        ?>
                    </form>

                </div>
            </div>

        </section>
    </main>
    <footer class=" bg-dark ">
    </footer>

</body>

</html>