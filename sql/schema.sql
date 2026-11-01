-- Schema only. No exported user or business data.
SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT  ;

SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS  ;

SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION  ;

SET NAMES utf8  ;

SET @OLD_TIME_ZONE=@@TIME_ZONE  ;

SET TIME_ZONE='+00:00'  ;

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0  ;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0  ;

SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO'  ;

SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0  ;

DROP TABLE IF EXISTS `eleve`;

SET @saved_cs_client     = @@character_set_client  ;

SET character_set_client = utf8  ;

CREATE TABLE `eleve` (
  `id_u` bigint(20) NOT NULL,
  `id_formation` int(11) DEFAULT NULL,
  `dateinscription` date DEFAULT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET character_set_client = @saved_cs_client  ;

ALTER TABLE `eleve` DISABLE KEYS  ;

ALTER TABLE `eleve` ENABLE KEYS  ;

DROP TABLE IF EXISTS `formule`;

SET @saved_cs_client     = @@character_set_client  ;

SET character_set_client = utf8  ;

CREATE TABLE `formule` (
  `id_f` int(11) NOT NULL AUTO_INCREMENT,
  `nom_f` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `prix_f` decimal(15,2) NOT NULL,
  `nb_heures` float(4,2) DEFAULT NULL,
  `type_boite` enum('Manuelle','Automatique') CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id_f`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

SET character_set_client = @saved_cs_client  ;

ALTER TABLE `formule` DISABLE KEYS  ;

ALTER TABLE `formule` ENABLE KEYS  ;

DROP TABLE IF EXISTS `moniteur`;

SET @saved_cs_client     = @@character_set_client  ;

SET character_set_client = utf8  ;

CREATE TABLE `moniteur` (
  `id_u` bigint(20) NOT NULL,
  `dateembauche` date NOT NULL,
  `dateobtentionbafm` date NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET character_set_client = @saved_cs_client  ;

ALTER TABLE `moniteur` DISABLE KEYS  ;

ALTER TABLE `moniteur` ENABLE KEYS  ;

DROP TABLE IF EXISTS `planning`;

SET @saved_cs_client     = @@character_set_client  ;

SET character_set_client = utf8  ;

CREATE TABLE `planning` (
  `id_e` int(11) NOT NULL,
  `id_m` int(11) NOT NULL,
  `matricule` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `datehd` datetime NOT NULL,
  `datehf` datetime DEFAULT NULL,
  `etat` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `motifAnnulation` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `NbkmStatus` tinyint(4) DEFAULT '0',
  `compteRendu` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id_e`,`id_m`,`matricule`,`datehd`),
  KEY `id_e` (`id_e`),
  KEY `id_m` (`id_m`),
  KEY `planning_ibfk_3` (`matricule`),
  CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `user` (`id_u`),
  CONSTRAINT `planning_ibfk_2` FOREIGN KEY (`id_m`) REFERENCES `user` (`id_u`),
  CONSTRAINT `planning_ibfk_3` FOREIGN KEY (`matricule`) REFERENCES `vehicule` (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET character_set_client = @saved_cs_client  ;

ALTER TABLE `planning` DISABLE KEYS  ;

ALTER TABLE `planning` ENABLE KEYS  ;

SET @saved_cs_client      = @@character_set_client   ;

SET @saved_cs_results     = @@character_set_results   ;

SET @saved_col_connection = @@collation_connection   ;

SET character_set_client  = utf8mb4   ;

SET character_set_results = utf8mb4   ;

SET collation_connection  = utf8mb4_unicode_ci   ;

SET @saved_sql_mode       = @@sql_mode   ;

SET sql_mode              = 'IGNORE_SPACE,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO'   ;

DELIMITER ;;

CREATE    TRIGGER AFFECTATION_MONITEUR BEFORE INSERT ON 
planning FOR EACH ROW BEGIN 
DECLARE id_moniteur INT;
SELECT id_m INTO id_moniteur
FROM planning
WHERE id_e = NEW.id_e
ORDER BY datehd ASC
LIMIT 1;
IF id_moniteur IS NULL THEN
SELECT id_u INTO id_moniteur
FROM user
WHERE
    role_u = 'moniteur'
    AND id_u NOT IN (
        SELECT id_m
        FROM planning
    )
LIMIT 1;
END IF;
IF id_moniteur IS NULL THEN
SELECT id_m INTO id_moniteur
FROM (
        SELECT
            id_m,
            COUNT(*) AS nb_heures
        FROM planning
        GROUP BY id_m
        ORDER BY
            nb_heures ASC
    ) AS t
LIMIT 1;
END IF;
SET NEW.id_m = 15;
END  ;;

DELIMITER ;

SET sql_mode              = @saved_sql_mode   ;

SET character_set_client  = @saved_cs_client   ;

SET character_set_results = @saved_cs_results   ;

SET collation_connection  = @saved_col_connection   ;

SET @saved_cs_client      = @@character_set_client   ;

SET @saved_cs_results     = @@character_set_results   ;

SET @saved_col_connection = @@collation_connection   ;

SET character_set_client  = utf8mb4   ;

SET character_set_results = utf8mb4   ;

SET collation_connection  = utf8mb4_unicode_ci   ;

SET @saved_sql_mode       = @@sql_mode   ;

SET sql_mode              = 'IGNORE_SPACE,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO'   ;

DELIMITER ;;

CREATE    TRIGGER AFFECTATION_VEHICULE BEFORE INSERT ON 
planning FOR EACH ROW BEGIN 
	DECLARE idvehicule VARCHAR(50);

DECLARE x INT;

SELECT COUNT(*) INTO x
FROM planning
WHERE
    id_e = NEW.id_e
    AND matricule NOT IN (
        SELECT matricule
        FROM planning
        WHERE (
                NEW.datehd >= datehd
                AND NEW.datehd <= datehf
            )
            OR (
                NEW.datehf >= datehd
                AND NEW.datehf <= datehf
            )
    );

IF x > 0 THEN
SELECT
    matricule INTO idvehicule
FROM planning p
WHERE
    p.id_e = NEW.id_e
    AND datehf = (
        SELECT MIN(datehf)
        FROM planning
        WHERE id_e = NEW.id_e
    );

ELSEIF (
    SELECT nom_f
    FROM formule
    WHERE id_f = (
            SELECT
                id_formation
            FROM eleve
            WHERE
                id_u = new.id_e
        )
) like '%Permis B%' THEN
select
    matricule into idvehicule
from vehicule v
where v.type_boite = (
        SELECT type_boite
        FROM formule
        WHERE id_f = (
                SELECT
                    id_formation
                FROM eleve
                WHERE
                    id_u = new.id_e
            )
    )
    and type_v = '4 roues'
    and matricule not in (
        select matricule
        from planning p
        where (
                new.datehd >= datehd
                and new.datehd <= datehf
                or new.datehf >= datehd
                and new.datehf <= datehf
            )
    )
order by RAND()
limit 1;

ELSEIF (
    SELECT nom_f
    FROM formule
    WHERE id_f = (
            SELECT
                id_formation
            FROM eleve
            WHERE
                id_u = new.id_e
        )
) like '%Permis A%'
or (
    SELECT nom_f
    FROM formule
    WHERE id_f = (
            SELECT
                id_formation
            FROM eleve
            WHERE
                id_u = new.id_e
        )
) like '%Passerelle A%' THEN
select
    matricule into idvehicule
from vehicule v
where type_v = '2 roues'
    and matricule not in (
        select matricule
        from planning p
        where (
                new.datehd >= datehd
                and new.datehd <= datehf
                or new.datehf >= datehd
                and new.datehf <= datehf
            )
    )
order by RAND()
limit 1;

END IF;

SET NEW.matricule = idvehicule;
	END  ;;

DELIMITER ;

SET sql_mode              = @saved_sql_mode   ;

SET character_set_client  = @saved_cs_client   ;

SET character_set_results = @saved_cs_results   ;

SET collation_connection  = @saved_col_connection   ;

DROP TABLE IF EXISTS `questions_quiz`;

SET @saved_cs_client     = @@character_set_client  ;

SET character_set_client = utf8  ;

CREATE TABLE `questions_quiz` (
  `id_qq` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `choix` json NOT NULL,
  `reponse` json NOT NULL,
  `explication` longtext,
  `subTitre` varchar(250) DEFAULT NULL,
  `subChoix` json DEFAULT NULL,
  `subReponse` json DEFAULT NULL,
  `subExplication` longtext,
  PRIMARY KEY (`id_qq`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

SET character_set_client = @saved_cs_client  ;

ALTER TABLE `questions_quiz` DISABLE KEYS  ;

ALTER TABLE `questions_quiz` ENABLE KEYS  ;

DROP TABLE IF EXISTS `roule`;

SET @saved_cs_client     = @@character_set_client  ;

SET character_set_client = utf8  ;

CREATE TABLE `roule` (
  `matricule` varchar(50) CHARACTER SET utf8mb4 NOT NULL, 
  `annee_mois` datetime NOT NULL,
  `nb_km_mois` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`matricule`,`annee_mois`),
  CONSTRAINT `roule_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `vehicule` (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET character_set_client = @saved_cs_client  ;

SET @saved_cs_client      = @@character_set_client   ;

SET @saved_cs_results     = @@character_set_results   ;

SET @saved_col_connection = @@collation_connection   ;

SET character_set_client  = utf8mb4   ;

SET character_set_results = utf8mb4   ;

SET collation_connection  = utf8mb4_unicode_ci   ;

SET @saved_sql_mode       = @@sql_mode   ;

SET sql_mode              = 'IGNORE_SPACE,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO'   ;

DELIMITER ;;

CREATE    TRIGGER assignation_nbkm after
insert on roule for each row begin
update vehicule
set km = km + new.nb_km_mois
where matricule = new.matricule;
end  ;;

DELIMITER ;

SET sql_mode              = @saved_sql_mode   ;

SET character_set_client  = @saved_cs_client   ;

SET character_set_results = @saved_cs_results   ;

SET collation_connection  = @saved_col_connection   ;

DROP TABLE IF EXISTS `user`;

SET @saved_cs_client     = @@character_set_client  ;

SET character_set_client = utf8  ;

CREATE TABLE `user` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `nom_u` varchar(255) NOT NULL,
  `prenom_u` varchar(255) NOT NULL,
  `datenaissance_u` date NOT NULL,
  `email_u` varchar(255) NOT NULL,
  `tel_u` char(10) NOT NULL,
  `adresse_u` varchar(255) NOT NULL,
  `ville_u` varchar(255) NOT NULL,
  `codepos_u` varchar(5) NOT NULL,
  `sexe_u` char(1) DEFAULT NULL,
  `role_u` enum('eleve','moniteur','admin') NOT NULL,
  `mdp_u` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  PRIMARY KEY (`id_u`),
  UNIQUE KEY `UNIQUE_EMAIL` (`email_u`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

SET character_set_client = @saved_cs_client  ;

ALTER TABLE `user` DISABLE KEYS  ;

ALTER TABLE `user` ENABLE KEYS  ;

SET @saved_cs_client      = @@character_set_client   ;

SET @saved_cs_results     = @@character_set_results   ;

SET @saved_col_connection = @@collation_connection   ;

SET character_set_client  = cp850   ;

SET character_set_results = cp850   ;

SET collation_connection  = cp850_general_ci   ;

SET @saved_sql_mode       = @@sql_mode   ;

SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO'   ;

DELIMITER ;;

CREATE    TRIGGER HASH_PASSWORD BEFORE INSERT ON user 
FOR EACH ROW BEGIN 
SET NEW.mdp_u = SHA1(NEW.mdp_u);
END  ;;

DELIMITER ;

SET sql_mode              = @saved_sql_mode   ;

SET character_set_client  = @saved_cs_client   ;

SET character_set_results = @saved_cs_results   ;

SET collation_connection  = @saved_col_connection   ;

SET @saved_cs_client      = @@character_set_client   ;

SET @saved_cs_results     = @@character_set_results   ;

SET @saved_col_connection = @@collation_connection   ;

SET character_set_client  = cp850   ;

SET character_set_results = cp850   ;

SET collation_connection  = cp850_general_ci   ;

SET @saved_sql_mode       = @@sql_mode   ;

SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO'   ;

DELIMITER ;;

CREATE    TRIGGER INSERT_ELEVE AFTER INSERT ON user FOR 
EACH ROW BEGIN 
IF NEW.role_u = 'eleve' THEN
INSERT INTO eleve
VALUES (NEW.id_u, null, curdate());
END IF;
END  ;;

DELIMITER ;

SET sql_mode              = @saved_sql_mode   ;

SET character_set_client  = @saved_cs_client   ;

SET character_set_results = @saved_cs_results   ;

SET collation_connection  = @saved_col_connection   ;

SET @saved_cs_client      = @@character_set_client   ;

SET @saved_cs_results     = @@character_set_results   ;

SET @saved_col_connection = @@collation_connection   ;

SET character_set_client  = utf8mb4   ;

SET character_set_results = utf8mb4   ;

SET collation_connection  = utf8mb4_unicode_ci   ;

SET @saved_sql_mode       = @@sql_mode   ;

SET sql_mode              = 'IGNORE_SPACE,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO'   ;

DELIMITER ;;

CREATE    TRIGGER HASH_PASSWORD_UPDATE before update on user for each row begin IF NEW.mdp_u <> OLD.mdp_u THEN
SET NEW.mdp_u = SHA1(NEW.mdp_u);
END IF; END  ;;

DELIMITER ;

SET sql_mode              = @saved_sql_mode   ;

SET character_set_client  = @saved_cs_client   ;

SET character_set_results = @saved_cs_results   ;

SET collation_connection  = @saved_col_connection   ;

DROP TABLE IF EXISTS `vehicule`;

SET @saved_cs_client     = @@character_set_client  ;

SET character_set_client = utf8  ;

CREATE TABLE `vehicule` (
  `matricule` varchar(50) CHARACTER SET utf8mb4 NOT NULL, 
  `type_v` enum('4 roues','2 roues') CHARACTER SET utf8mb4 NOT NULL,
  `model_v` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `marque_v` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `anneimmatri_v` year(4) NOT NULL,
  `anneachat_v` year(4) NOT NULL,
  `type_boite` enum('Manuelle','Automatique') DEFAULT NULL,
  `km` float DEFAULT 0,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

SET character_set_client = @saved_cs_client  ;

ALTER TABLE `vehicule` DISABLE KEYS  ;

ALTER TABLE `vehicule` ENABLE KEYS  ;

SET @save_time_zone= @@TIME_ZONE   ;

DROP EVENT IF EXISTS `mettre_a_jour_etat`  ;

DELIMITER ;;

SET @saved_cs_client      = @@character_set_client   ;;

SET @saved_cs_results     = @@character_set_results   ;;

SET @saved_col_connection = @@collation_connection   ;;

SET character_set_client  = cp850   ;;

SET character_set_results = cp850   ;;

SET collation_connection  = cp850_general_ci   ;;

SET @saved_sql_mode       = @@sql_mode   ;;

SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO'   ;;

SET @saved_time_zone      = @@time_zone   ;;

SET time_zone             = 'SYSTEM'   ;;

CREATE    EVENT `mettre_a_jour_etat` ON SCHEDULE EVERY 1 MINUTE STARTS '2023-03-01 17:24:02' ON COMPLETION NOT PRESERVE ENABLE DO CALL verifier_et_mettre_a_jour_etat()   ;;

SET time_zone             = @saved_time_zone   ;;

SET sql_mode              = @saved_sql_mode   ;;

SET character_set_client  = @saved_cs_client   ;;

SET character_set_results = @saved_cs_results   ;;

SET collation_connection  = @saved_col_connection   ;;

DELIMITER ;

SET TIME_ZONE= @save_time_zone   ;

DROP PROCEDURE IF EXISTS `verifier_et_mettre_a_jour_etat`  ;

SET @saved_cs_client      = @@character_set_client   ;

SET @saved_cs_results     = @@character_set_results   ;

SET @saved_col_connection = @@collation_connection   ;

SET character_set_client  = cp850   ;

SET character_set_results = cp850   ;

SET collation_connection  = cp850_general_ci   ;

SET @saved_sql_mode       = @@sql_mode   ;

SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO'   ;

DELIMITER ;;

CREATE  PROCEDURE `verifier_et_mettre_a_jour_etat`()
BEGIN
  UPDATE planning SET etat = 'Effectuer'
  WHERE datehf < NOW() AND etat = 'Valider';

  UPDATE planning SET etat = 'Annuler', motifAnnulation = 'Date de validation d?pass?e'
  WHERE datehf < NOW() AND etat IN ('En attente user', 'En attente moniteur');
END ;;

DELIMITER ;

SET sql_mode              = @saved_sql_mode   ;

SET character_set_client  = @saved_cs_client   ;

SET character_set_results = @saved_cs_results   ;

SET collation_connection  = @saved_col_connection   ;

SET TIME_ZONE=@OLD_TIME_ZONE  ;

SET SQL_MODE=@OLD_SQL_MODE  ;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS  ;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS  ;

SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT  ;

SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS  ;

SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION  ;

SET SQL_NOTES=@OLD_SQL_NOTES  ;
