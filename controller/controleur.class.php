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

    public function insert($tab)
    {
        return $this->unModele->insert($tab);
    }

    public function delete($tab)
    {
        return $this->unModele->delete($tab);
    }

    public function lastInsertId()
    {
        return $this->unModele->lastInsertId();
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

    public function selectAllHeures($table, $valeur, $mois, $annee)
    {
        return $this->unModele->selectAllHeures($table, $valeur, $mois, $annee);
    }

    public function selectAllHeuresAll($table, $valeur)
    {
        return $this->unModele->selectAllHeuresAll($table, $valeur);
    }

    public function selectAllHeuresEffectuees($table, $valeur)
    {
        return $this->unModele->selectAllHeuresEffectuees($table, $valeur);
    }

    public function Register($tab)
    {
        return $this->unModele->Register($tab);
    }
}
