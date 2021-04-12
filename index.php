<?php
session_start();

include "MVC/class/rooter/root.php";

$root = new root;

if (isset($_GET["page"])) {

    if ($_GET["page"] == "connect") {
        $root->connect();
    } elseif ($_GET["page"] == "accueil") {
        $root->accueil();
    } elseif ($_GET["page"] == "admin") {
        $root->admin();
    }
} elseif (empty($_GET)) {
    $root->accueil();
}
