<?php

//if $mois is changed selectAllHeures
if (isset($_POST['mois'])) {
    $mois = $_POST['mois'];
} else {
    $mois = date('m');
}

//retirer toute les heures dont la checkbox est cochée
if (isset($_POST['RetirerHeure'])) {
    foreach ($_POST['heureSupp'] as $uneHeure) {
        $unControleur->setTable("planning");
        $tab = array(
            "id_cc" => $uneHeure
        );
        $unControleur->delete($tab);

        $unControleur->setTable("cours_conduite");
        $unControleur->delete($tab);
    }
}

if (isset($_POST['ValiderHeure']) && isset($_POST['datehd']) && isset($_POST['heurehd']) && isset($_POST['heurehf'])) {

    $unControleur->setTable("cours_conduite");
    $tab = array(
        "id_cc" => null,
        "prixseance_cc" => 50,
        "id_v" => 4,
        "id_f" => $_SESSION['formation']['id_f']
    );

    $unControleur->insert($tab);


    $unControleur->setTable("planning");

    $datehd = new DateTime($_POST['datehd'] . " " . $_POST['heurehd']);
    //set $heureFin to $datehd + $_POST['heurehf']
    $heureFin = $datehd->format('H:i:s');
    //ajoute 1h30 à $heureFin
    $heureFin = date('H:i:s', strtotime($heureFin . ' + ' . $_POST['heurehf'] . ' minutes'));

    $datehf = new DateTime($_POST['datehd'] . " " . $heureFin);

    $datehd = $datehd->format('Y-m-d H:i:s');
    $datehf = $datehf->format('Y-m-d H:i:s');

    $tab = array(
        "id_cc" => $unControleur->lastInsertId(),
        "id_e" => $_SESSION['id_e'],
        "id_m" => 1,
        "datehd" => $datehd,
        "datehf" => $datehf,
        "etat" => "0"
    );
    $unControleur->insert($tab);
}

//convert DateTime to string
// $tab['datehd'] = $tab['datehd']->format('Y-m-d H:i:s');


if (isset($_POST['annee'])) {
    $annee = $_POST['annee'];
} else {
    $annee = date('Y');
}

//récupère les heures pour le mois sélectionné dans planning
$heures = $unControleur->selectAllHeures("planning", $_SESSION['id_e'], $mois, $annee);

$toutesLesHeures = $unControleur->selectAllHeuresAll("planning", $_SESSION['id_e']);


//calcul des heures effectuées
$heuresEffectuees = 0;
foreach ($unControleur->selectAllHeuresEffectuees("planning", $_SESSION['id_e']) as $uneHeure) {
    //time diff between $uneHeure['datehd'] and $uneHeure['datehf']
    $heuresEffectuees += (strtotime($uneHeure['datehf']) - strtotime($uneHeure['datehd'])) / 3600;
}
//récupère les minutes (au bon format)
$minutes = ($heuresEffectuees - floor($heuresEffectuees)) * 60;

//récupère les heures
$heuresEffectuees = floor($heuresEffectuees);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Accueil</title>
</head>

<body>
    <?php
    require_once("./views/_navbar.php");
    ?>

    <main class="py-5 bg-back">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 p-3 border rounded-3 text-center text-white my-2 bg-white">
                    <div class="row mx-auto my-3">
                        <div class="col-8">
                            <h5 class="text-start text-dark">Ma formation : <?php echo $_SESSION['formation']['nom_f'] ?></h5>
                        </div>
                        <div class="col-4">
                            <h5 class="text-end text-dark"><?php echo $heuresEffectuees . "." . $minutes ?>/<?php echo $_SESSION['formation']['nb_heures'] ?>h</h5>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-6">
                            <div class="p-2 my-2">
                                <h4 class="text-dark">Bienvenue <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto justify-space-between my-5">
                        <div class="col-6">

                            <!-- Button trigger modal -->
                            <button type="button" class="rounded border-0 bg-green text-white col-12 p-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Demander une heure
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-black" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Demande d'ajout d'heure</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="AjoutHeure" method="post">
                                                <div class="row">
                                                    <div class="col-12 my-2">
                                                        <label for="datehd">Date</label>
                                                        <input type="date" name="datehd" id="datehd" class="form-control" required min="<?php echo date('Y-m-d') ?>">
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-6">
                                                        <label for="heurehd">Heure de début</label>
                                                        <select name="heurehd" id="heurehd" class="form-select pointer">
                                                            <option value="09:00:00">09:00</option>
                                                            <option value="09:30:00">09:30</option>
                                                            <option value="10:00:00">10:00</option>
                                                            <option value="10:30:00">10:30</option>
                                                            <option value="11:00:00">11:00</option>
                                                            <option value="14:00:00">14:00</option>
                                                            <option value="14:30:00">14:30</option>
                                                            <option value="15:00:00">15:00</option>
                                                            <option value="15:30:00">15:30</option>
                                                            <option value="16:00:00">16:00</option>
                                                            <option value="16:30:00">16:30</option>
                                                            <option value="17:00:00">17:00</option>
                                                            <option value="17:30:00">17:30</option>
                                                            <option value="18:00:00">18:00</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="heurehf">Durée</label>
                                                        <select name="heurehf" id="heurehf" class="form-select pointer">
                                                            <option value="60">1h</option>
                                                            <option value="90">1h30</option>
                                                            <option value="120">2h</option>
                                                            <option value="150">2h30</option>
                                                            <option value="180">3h</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" name="ValiderHeure" id="ValiderHeure" class="btn btn-primary">Valider</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="rounded border-0 bg-danger text-white col-12 p-3" data-bs-toggle="modal" data-bs-target="#modalDeleteHeure">
                                Retirer une heure
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-black" id="modalDeleteHeure" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Demande de retrait d'heure</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="RetraitHeure" method="POST">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Heure de début</th>
                                                            <th scope="col">Heure de fin</th>
                                                            <th scope="col">Supprimer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($toutesLesHeures as $heure) {
                                                            if ($heure['datehd'] > date("Y-m-d H:i:s")) {
                                                                $dateSup = date("d/m/Y", strtotime($heure['datehd']));
                                                                $heureDebSup = date("H:i", strtotime($heure['datehd']));
                                                                $heureFinSup = date("H:i", strtotime($heure['datehf']));
                                                                echo "<tr>";
                                                                echo "<td>" . $dateSup . "</td>";
                                                                echo "<td>" . $heureDebSup . "</td>";
                                                                echo "<td>" . $heureFinSup . "</td>";
                                                                echo "<td><input class='form-check-input' type='checkbox' name='heureSupp[]' value='" . $heure['id_cc'] . "'></td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" name="RetirerHeure" id="RetirerHeure" class="btn btn-primary">Valider</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div>
                            <a href="index.php?page=7">
                                <button type="button" class="rounded border-0 bg-green text-white col-12 p-3">
                                    Demander une heure
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 p-3 border rounded-3 my-2 bg-white">
                    <div class="row mx-auto">
                        <div class="col-1 my-auto">
                            <div class="border border-dark rounded text-center pointer" onclick="changeMonth(-1);document.getElementById('filtreMois').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="col-1 my-auto">
                            <div class="border border-dark rounded text-center pointer" onclick="changeMonth(1);document.getElementById('filtreMois').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                        <div class="col-3">
                            <form id="filtreMois" method="POST">
                                <h5>
                                    <select name="mois" id="mois" class="form-select pointer">
                                        <option value="1" <?php if ($mois == 1) echo "selected" ?>>Janvier</option>
                                        <option value="2" <?php if ($mois == 2) echo "selected" ?>>Février</option>
                                        <option value="3" <?php if ($mois == 3) echo "selected" ?>>Mars</option>
                                        <option value="4" <?php if ($mois == 4) echo "selected" ?>>Avril</option>
                                        <option value="5" <?php if ($mois == 5) echo "selected" ?>>Mai</option>
                                        <option value="6" <?php if ($mois == 6) echo "selected" ?>>Juin</option>
                                        <option value="7" <?php if ($mois == 7) echo "selected" ?>>Juillet</option>
                                        <option value="8" <?php if ($mois == 8) echo "selected" ?>>Août</option>
                                        <option value="9" <?php if ($mois == 9) echo "selected" ?>>Septembre</option>
                                        <option value="10" <?php if ($mois == 10) echo "selected" ?>>Octobre</option>
                                        <option value="11" <?php if ($mois == 11) echo "selected" ?>>Novembre</option>
                                        <option value="12" <?php if ($mois == 12) echo "selected" ?>>Décembre</option>
                                    </select>
                                </h5>
                        </div>
                        <div class="col-3">
                            <h5>
                                <select name="annee" id="annee" class="form-select pointer">
                                    <option value="2021" <?php if ($annee == 2021) echo "selected" ?>>2021</option>
                                    <option value="2022" <?php if ($annee == 2022) echo "selected" ?>>2022</option>
                                    <option value="2023" <?php if ($annee == 2023) echo "selected" ?>>2023</option>
                                    <option value="2024" <?php if ($annee == 2024) echo "selected" ?>>2024</option>
                                    <option value="2025" <?php if ($annee == 2025) echo "selected" ?>>2025</option>
                                    <option value="2026" <?php if ($annee == 2026) echo "selected" ?>>2026</option>
                                    <option value="2027" <?php if ($annee == 2027) echo "selected" ?>>2027</option>
                                    <option value="2028" <?php if ($annee == 2028) echo "selected" ?>>2028</option>
                                    <option value="2029" <?php if ($annee == 2029) echo "selected" ?>>2029</option>
                                    <option value="2030" <?php if ($annee == 2030) echo "selected" ?>>2030</option>
                                </select>
                            </h5>
                            </form>
                        </div>
                        <div class="col-4 text-center text-green">
                            <!-- Button trigger modal -->
                            <button id="AffTout" type="button" class="rounded border-0 bg-green text-white col-12" data-bs-toggle="modal" data-bs-target="#modalToutesLesHeures">
                                Afficher tout
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-black" id="modalToutesLesHeures" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Toutes les heures</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Heure de début</th>
                                                        <th scope="col">Heure de fin</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($toutesLesHeures as $heure) {
                                                        $dateSup = date("d/m/Y", strtotime($heure['datehd']));
                                                        $heureDebSup = date("H:i", strtotime($heure['datehd']));
                                                        $heureFinSup = date("H:i", strtotime($heure['datehf']));
                                                        echo "<tr>";
                                                        echo "<td>" . $dateSup . "</td>";
                                                        echo "<td>" . $heureDebSup . "</td>";
                                                        echo "<td>" . $heureFinSup . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto max-height overflow-auto">
                        <?php
                        foreach ($heures as $heure) {
                            $date = date("d-m-Y", strtotime($heure['datehd']));

                            if (date("m", strtotime($date)) == $mois) {

                                //transforme la date en lettres et en français en majuscules
                                setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                $jour = substr(strtoupper(strftime("%A", strtotime($date))), 0, 3) . ".";
                                $jour_chiffres = substr($date, 0, 2);
                                $moisHeure = substr(strtoupper(strftime("%B", strtotime($date))), 0, 4);
                                strlen($moisHeure) > 4 ? $moisHeure = substr($moisHeure, 0, 4) . "." : $moisHeure = $moisHeure;

                                $dureeHeure = floor((strtotime($heure['datehf']) - strtotime($heure['datehd'])) / 3600);
                                $dureeMinute = (strtotime($heure['datehf']) - strtotime($heure['datehd'])) / 60;
                                $dureeMinute = $dureeMinute - ($dureeHeure * 60);


                                echo "
                            <div class='col-12 p-3'>
                                <div class='row'>
                                    <div class='col-2'>
                                        <div class='col-auto text-center bg-green rounded-4 d-flex flex-column justify-content-center'>
                                            <p class='p-0 m-0 text-white'><small> $jour </small></p>
                                            <p class='p-0 m-0 text-white'> $jour_chiffres </p>
                                            <p class='p-0 m-0 text-white'> $moisHeure </p>
                                        </div>
                                    </div>
                                    <div class='col-10 my-auto'>
                                        <div class='row'>
                                            <div class='col-12 bg-grey rounded'>
                                                <h5 class='text-start fs-6 fw-bold text-dark pt-1'> Session de conduite </h5>
                                                <h6 class='text-start fw-bold text-dark'> $dureeHeure.$dureeMinute" . "h (" . date("H:i", strtotime($heure['datehd'])) . " - " . date("H:i", strtotime($heure['datehf'])) . ")</h6>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>";
                            }
                        }

                        if (empty($heures)) {
                            echo "
                            <div class='col-12 p-3 text-center mt-5'>
                            <h5> Aucune heure de conduite pour ce mois 😪 </h5>
                            </div>
                            ";
                        }
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("./views/_footer.php");
    ?>


</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap');

    html,
    body {
        font-family: 'Karla';
    }

    .text-green {
        color: #2B8C52;
    }

    .bg-back {
        background-color: #f9f9f9;
    }

    .bg-grey {
        background-color: #F4F4F4;
    }

    #mois {
        transform: translateY(12.5%);
    }

    #annee {
        transform: translateY(12.5%);
    }

    #AffTout {
        transform: translateY(50%);
    }

    .max-height {
        max-height: 19rem;
    }
</style>

<script>
    function changeMonth(value) {
        var mois = document.getElementById("mois");
        var annee = document.getElementById("annee");
        var moisValue = parseInt(mois.value);
        if (moisValue + value > 12) {
            mois.value = 1;
            annee.value = parseInt(annee.value) + 1;
        } else if (moisValue + value < 1) {
            mois.value = 12;
            annee.value = parseInt(annee.value) - 1;
        } else {
            mois.value = moisValue + value;
        }
    }

    //event listener pour le changement de mois
    document.getElementById("mois").addEventListener("change", function() {
        this.form.submit();
    });

    //event listener pour le changement d'année
    document.getElementById("annee").addEventListener("change", function() {
        this.form.submit();
    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>