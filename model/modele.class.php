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

    public function insert($tab)
    {
        if ($this->unPDO != null) {
            $chaineChamps = array();
            foreach ($tab as $cle => $valeur) {
                $tabChamps[] = ":" . $cle;
                $donnees[":" . $cle] = $valeur;
            }
            $chaineChamps = implode(",", $tabChamps);
            $requete = "insert into " . $this->table . " values (" . $chaineChamps . ");";
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }

    public function update($tab, $colonne, $valeur)
    {
        if ($this->unPDO != null) {
            $chaineChamps = array();
            foreach ($tab as $cle => $value) {
                $tabChamps[] = $cle . "=:" . $cle;
                $donnees[":" . $cle] = $value;
            }
            $chaineChamps = implode(",", $tabChamps);
            $requete = "update " . $this->table . " set " . $chaineChamps . " where " . $colonne . "=:valeur;";
            $donnees[":valeur"] = $valeur;
            $update = $this->unPDO->prepare($requete);
            $update->execute($donnees);
        }
    }

    public function delete($tab)
    {
        if ($this->unPDO != null) {
            $chaineChamps = array();
            foreach ($tab as $cle => $valeur) {
                $tabChamps[] = $cle . "=:" . $cle;
                $donnees[":" . $cle] = $valeur;
            }
            $chaineChamps = implode(" and ", $tabChamps);
            $requete = "delete from " . $this->table . " where " . $chaineChamps . ";";
            $delete = $this->unPDO->prepare($requete);
            $delete->execute($donnees);
        }
    }

    public function lastInsertId()
    {
        return $this->unPDO->lastInsertId();
    }

    public function selectWhere($table, $colonne, $valeur)
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . " where " . $colonne . "=:valeur;";
            $donnees = array(
                ":valeur" => $valeur
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetch();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectAll($table)
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . ";";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectAllHeuresMois($table, $valeur, $mois, $annee)
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . " where id_e=:valeur and month(datehd)=:mois and year(datehd)=:annee order by datehd desc;";
            $donnees = array(
                ":valeur" => $valeur,
                ":mois" => $mois,
                ":annee" => $annee
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectAllHeuresAll($table, $valeur)
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . " where id_e=:valeur order by datehd asc;";
            $donnees = array(
                ":valeur" => $valeur,
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectAllHeuresEffectuees($table, $valeur)
    {
        if ($this->unPDO != null) {
            $requete = "select datehd, datehf from " . $table . " where id_e=:valeur and datehf < CURRENT_TIMESTAMP();";
            $donnees = array(
                ":valeur" => $valeur,
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function Register($tab)
    {
        if ($this->unPDO != null) {
            $requete = "insert into eleve values (null, :nom, :prenom, :date, :ville, :adr, :email, :mdp, :tel, :cp, curdate(), :sexe, null);";
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
