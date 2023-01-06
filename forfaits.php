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
                        <input type="radio" name="typePermis">
                        <p>Permis B</p>
                    </div>
                    <div class="d-flex input-form-gauche">
                        <input type="radio" name="typePermis">
                        <p>Permis B accompagné</p>
                    </div>
                    <div class="d-flex input-form-gauche">
                        <input type="radio" name="typePermis">
                        <p>Permis B acceléré</p>
                    </div>
                    <!-- <div class="hr"></div> -->
                </div>
                <div class="form-milieu">
                    <div class="d-flex input-form-milieu">
                        <input type="radio" name="typeBoite">
                        <p>Boite automatique</p>
                    </div>
                    <div class="d-flex input-form-milieu">
                        <input type="radio" name="typeBoite">
                        <p>Boite manuelle</p>
                    </div>
                </div>
                <div class="form-droite">
                    <div class="d-flex input-form-droite">
                        <input type="radio" name="nbCours">
                        <p>20</p>
                    </div>
                    <div class="d-flex input-form-droite">
                        <input type="radio" name="nbCours">
                        <p>25</p>
                    </div>
                    <div class="d-flex input-form-droite">
                        <input type="radio" name="nbCours">
                        <p>30</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-sinscrire">
            <p>235€</p>
            <button id="validate-form-forfaits">S'inscrire</button>
        </div>
    </div>

</body>

</html>