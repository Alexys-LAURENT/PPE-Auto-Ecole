<?php
require_once("model/modele.class.php");

class Controleur
{
    private $unModele;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->unModele = new Modele($serveur, $bdd, $user, $mdp);
    }

    public function setTable($uneTable)
    {
        $this->unModele->setTable($uneTable);
    }

    /****************************LES USERS****************************/
    public function verifConnection($email, $mdp)
    {
        return $this->unModele->verifConnection($email, $mdp);
    }

    public function selectWhere($table, $colonne, $valeur)
    {
        return $this->unModele->selectWhere($table, $colonne, $valeur);
    }

    public function Register($tab)
    {
        return $this->unModele->Register($tab);
    }
}
