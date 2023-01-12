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

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 p-3 shadow rounded-4 text-center text-white">
                    <div class="row mx-auto my-3">
                        <div class="col-8">
                            <h5 class="text-start text-dark">Ma formation : <?php echo $_SESSION['formation']['nom_f'] ?></h5>
                        </div>
                        <div class="col-4">
                            <h5 class="text-end text-dark">$heures/<?php echo $_SESSION['formation']['nb_heures'] ?>h</h5>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-6">
                            <div class="p-2 my-2 shadow rounded">
                                <h4 class="text-dark">Bienvenue <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto justify-space-between my-5">
                        <div class="col-6">
                            <div class="p-3 bg-green shadow rounded">Demander une heure</div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-danger shadow rounded">Annuler une heure</div>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-12">
                            <div class="p-3 bg-green shadow rounded">Résumé des heures passés et à venir</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 p-3 shadow rounded-4">
                    <div class="row mx-auto">
                        <div class="col-1">
                            <div class="border border-dark rounded text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="border border-dark rounded text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>
                                $mois
                            </h5>
                        </div>
                        <div class="col-4 text-end text-green">
                            <h5>
                                Afficher tout
                            </h5>
                        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap');

    html,
    body {
        font-family: 'Karla';
    }

    .text-green {
        color: #2B8C52;
    }
</style>