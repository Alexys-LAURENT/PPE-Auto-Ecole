<?php
session_start();
require_once("controller/config_bdd.php");
require_once("controller/controleur.class.php");
$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Val'auto</title>
</head>

<body>


    <?php
    if (isset($_POST['SeConnecter'])) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        // //Hachage avec un grain de sel
        // $unControleur->setTable("grainSel");
        // $resultat = $unControleur->selectAll();
        // $nb = $resultat[0]['nb'];
        // $mdp = sha1($mdp . $nb);
        $unUser = $unControleur->verifConnection($email, $mdp);
        $formation = $unControleur->selectWhere("formule", "id_f", $unUser['id_formation']);
        if ($unUser == null) {
            echo "<div class='col-md-3 alert alert-danger'>Verifiez vos identifiants<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
              </svg> </span> </div>";
        } else {
            $_SESSION['email'] = $unUser['email_e'];
            $_SESSION['nom'] = $unUser['nom_e'];
            $_SESSION['prenom'] = $unUser['prenom_e'];
            $_SESSION['id_e'] = $unUser['id_e'];
            $_SESSION['formation'] = $formation;


            header("Location: index.php?page=0");
        }
    }

    if (isset($_POST['Register'])) {

        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['adr']) || empty($_POST['ville']) || empty($_POST['cp']) || empty($_POST['tel']) || empty($_POST['date']) || empty($_POST['mdp']) || empty($_POST['sexe'])) {
            echo "<div class='col-md-3 alert alert-danger'>Veuillez remplir tous les champs <span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
            <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
          </svg> </span> </div>";
        } else {

            $tab = array(
                "nom" => $_POST['nom'],
                "prenom" => $_POST['prenom'],
                "email" => $_POST['email'],
                "adr" => $_POST['adr'],
                "ville" => $_POST['ville'],
                "cp" => $_POST['cp'],
                "tel" => $_POST['tel'],
                "date" => $_POST['date'],
                "mdp" => $_POST['mdp'],
                "sexe" => $_POST['sexe']
            );

            // //Hachage avec un grain de sel
            // $unControleur->setTable("grainSel");
            // $resultat = $unControleur->selectAll();
            // $nb = $resultat[0]['nb'];
            // $mdp = sha1($mdp . $nb);



            $unUser = $unControleur->Register($tab);
            if ($unUser == null) {
                echo "<div class='col-md-3 alert alert-danger'>Problème technique, réessayer plus tard</div>";
            } else {
                $_SESSION['email'] = $unUser['email_e'];
                $_SESSION['nom'] = $unUser['nom_e'];
                $_SESSION['prenom'] = $unUser['prenom_e'];
                $_SESSION['id_e'] = $unUser['id_e'];


                header("Location: index.php?page=0");
            }
        }
    }



    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 0;
    }
    switch ($page) {
        case '0':
            require_once("Accueil.php");
            break;
        case '1':
            require_once("CPF.php");
            break;
        case '2':
            if ($_SESSION) {
                require_once("Account.php");
                break;
            } else {
                $_SESSION['redirect'] = true;
                header("location: index.php?page=0");
                break;
            }
        case '3':
            require_once('FAQ.php');
            break;
        case '9':
            require_once("login.php");
            break;
        case '10':
            session_destroy();
            unset($_SESSION);
            header("location: index.php?page=0");
            break;
        default:
            require_once("erreur_404.php");
            break;
    }



    ?>

</body>

</html>
<style>
    .bg-green {
        background-color: #2B8C52;
    }
</style>
<script src="./Js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>