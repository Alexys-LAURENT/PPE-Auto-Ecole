<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos forfaits | Val'auto</title>
    <link rel="stylesheet" href="./css/forfaits.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    require_once("./views/_navbar.php");
    ?>

    <div class="banner"></div>


    <div class="bouttons-container">
        <div class="boutton">Permis B</div>
        <div class="boutton">Permis A</div>
        <div class="boutton">Code</div>
    </div>

    <div class="d-flex flex-column align-items-center">
        <div class="form">
            <div class="form-title">
                <h1>Inscrivez vous à cette formation</h1>
            </div>
            <div class="d-flex">
                <div class="form-gauche">
                    <div class="d-flex input-form-gauche">
                        <input class="form-check-input" id="Permis-B" type="radio" name="typePermis" value="20">
                        <label for="Permis-B">Permis B</label>
                    </div>
                    <div class="d-flex input-form-gauche">
                        <input class="form-check-input" id="Permis-B-accompagné" type="radio" name="typePermis" value="20">
                        <label for="Permis-B-accompagné">Permis B accompagné</label>
                    </div>
                    <div class="d-flex input-form-gauche">
                        <input class="form-check-input" id="Permis-B-acceléré" type="radio" name="typePermis" value="20">
                        <label for="Permis-B-acceléré">Permis B acceléré</label>
                    </div>
                </div>
                <div class="form-milieu">
                    <div class="d-flex input-form-milieu">
                        <input class="form-check-input" id="Boite-automatique" type="radio" name="typeBoite" value="20">
                        <label for="Boite-automatique">Boite automatique</label>
                    </div>
                    <div class="d-flex input-form-milieu">
                        <input class="form-check-input" id="Boite-manuelle" type="radio" name="typeBoite" value="20">
                        <label for="Boite-manuelle">Boite manuelle</label>
                    </div>
                </div>
                <div class="form-droite">
                    <div class="d-flex input-form-droite">
                        <input class="form-check-input" id="20" type="radio" name="nbCours" value="20">
                        <label for="20">20</label>
                    </div>
                    <div class="d-flex input-form-droite">
                        <input class="form-check-input" id="25" type="radio" name="nbCours" value="5">
                        <label for="25">25</label>
                    </div>
                    <div class="d-flex input-form-droite">
                        <input class="form-check-input" id="30" type="radio" name="nbCours" value="10">
                        <label for="30">30</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-sinscrire">
            <p id="Montant-Display"></p>
            <button id="validate-form-forfaits">S'inscrire</button>
        </div>
    </div>

    <?php require_once('./views/_footer.php') ?>
    <script src="./Js/forfaits.js"></script>
</body>

</html>