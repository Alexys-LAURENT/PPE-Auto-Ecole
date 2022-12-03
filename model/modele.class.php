<?php
class Modele
{
    private $unPDO;
    private $table; //table générique du modele

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->unPDO = null;
        try {
            $url = "mysql:host=" . $serveur . ";dbname=" . $bdd;
            $this->unPDO = new PDO($url, $user, $mdp);
        } catch (PDOException $exp) {
            echo "<br> Erreur de connexion à la BDD!";
            echo $exp->getMessage();
        }
    }

    public function setTable($uneTable)
    {
        $this->table = $uneTable;
    }

    public function verifConnection($email, $mdp) //Très bien
    {
        if ($this->unPDO != null) {
            $requete = "select * from eleve where email_e=:email and mdp_e=:mdp;";
            $donnees = array(
                ":email" => $email,
                ":mdp" => $mdp
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetch();
            return $unUser;
        } else {
            return null;
        }
    }

    public function Register($tab)
    {
        if ($this->unPDO != null) {
            $requete = "insert into eleve values (null, :nom, :prenom, :date, :ville, :adr, :email, :mdp, :tel, :cp, curdate(), :sexe);";
            $donnees = array(
                ":nom" => $tab['nom'],
                ":prenom" => $tab['prenom'],
                ":email" => $tab['email'],
                ":adr" => $tab['adr'],
                ":ville" => $tab['ville'],
                ":cp" => $tab['cp'],
                ":tel" => $tab['tel'],
                ":date" => $tab['date'],
                ":mdp" => $tab['mdp'],
                ":sexe" => $tab['sexe']
            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
            $unUser = $this->verifConnection($tab['email'], $tab['mdp']);
            return $unUser;
        } else {
            return null;
        }
    }
}
