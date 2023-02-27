<?php
session_start();

require_once("controller/config_bdd.php");
require_once("controller/controleur.class.php");
$unControleur = new Controleur($serveur, $bdd, $user, $mdp);

$questions = $unControleur->selectAll("questions_quiz");

foreach ($questions as $key => $value) {
    var_dump(utf8_encode($unControleur->selectAllWhere("reponses_quiz", "id_question", $value["id_question"])));
}

// echo utf8_encode(json_encode($questions));
