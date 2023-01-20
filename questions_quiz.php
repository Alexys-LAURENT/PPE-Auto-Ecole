<?php
session_start();

if (!isset($protected)) {
    // header("Location: index.php?page=0");
}

require_once("controller/config_bdd.php");
require_once("controller/controleur.class.php");
$unControleur = new Controleur($serveur, $bdd, $user, $mdp);

$questions = $unControleur->selectAll("questions_quiz");

echo json_encode($questions);
